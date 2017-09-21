<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
	{
		$articulos = Articulo::with('imagenes')
		->where('state','=',1)
		->orderBy('date','DESC')
		->paginate(5);

		$title = "Inicio | Red Joven Venezuela. Formando ciudadanos, transformando futuro";
		$sedes = Sede::get();
		return View::make('home.index')
		->with('title',$title)
		->with('sedes',$sedes)
		->with('articulos',$articulos);
	}
	public function getAbout()
	{
		$title = "Quienes Somos | Red Joven Venezuela. Formando ciudadanos, transformando futuro";
		return View::make('about.index')
		->with('title',$title);
	}
	public function getGallery()
	{
		$title = "Galeria | Red Joven Venezuela. Formando ciudadanos, transformando futuro";
		$sedes = Sede::with('imgTiles')->orderBy('nombre')->get();
	
		return View::make('gallery.index')
		->with('title',$title)
		->with('sedes',$sedes);
	}
	public function getContact()
	{
		$title = "Contactenos | Red Joven Venezuela. Formando ciudadanos, transformando futuro";
		return View::make('contact.index')
		->with('title',$title);
	}
	public function postContact()
	{
		$data  = Input::all();
		$rules = array(
			'name' 		=> 'required',
			'email' 	=> 'required|email',
			'sede' 		=> 'required',
			'msg' 		=> 'required',
		);
		$msg = array();
		$attr = array(
			'name' 		=> 'nombre',
			'subject' 	=> 'asunto',
			'msg'       => 'mensaje'
		);
		$validator = Validator::make($data, $rules, $msg, $attr);
		if ($validator->fails()) {
			Session::flash('danger','Error, verifique los campos.');
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$cc = 'redjovenvenezuela@gmail.com';
		switch ($data['sede']) {
		    case 'anzoategui': 
		        $to_Email = 'elcanoso.67@gmail.co';
				break;			        	
		    case 'apure':
		        $to_Email = 'ender.moissant@gmail.com';
				break;	
		    case 'aragua':
		        $to_Email = array('redjovenaragua@gmail.com','peterangar@gmail.com');
				break;	
		    case 'caracas': 
		        $to_Email = 'kyj2.blog@gmail.com';
		        break;
		    case 'falcon': 
		        $to_Email = array('greiarcila@gmail.com','fonso.jd@gmail.com');
				break;	
		    case 'guarico': 
		        $to_Email = 'capillasanmiguel29@gmail.com';
				break;	
		    case 'monagas': 
		        $to_Email = 'redjovenvenezuela@gmail.com';
				break;	
		    case 'merida': 
		        $to_Email = 'redjovenmda@gmail.com';
				break;	
		    case 'miranda': 
	            $to_Email = array('rosavillasmil@yahoo.es','padrepancho467@hotmail.com');
				break;	
	        case 'portuguesa': 
		        $to_Email = 'nathashatorres86@gmail.com ';
		        break;
		    case 'sucre':
		    	$to_Email = 'sngrfafa@gmail.com';
		    	break;
		    case 'zulia': 
		        $to_Email = 'angelluengo1981@gmail.com';
		        break;
			default:
				$to_Email = 'redjovenvenezuela@gmail.com';
				break;
		}
		$subject = 'Mensaje de contacto de la pagina web redjoven.com.ve';
		$data['subject'] = $subject;
		Mail::queue('emails.contact', $data, function($message) use ($to_Email, $data, $cc, $subject)
		{
			$message->to($to_Email)->from($data['email'])->subject($subject)->cc($cc);
		});
		Session::flash('success','Se ha enviado su correo satisfactoriamente.');
		return Redirect::back();
	}
	public function showGallery($id)
	{
		$title = "Galeria | Red Joven Venezuela. Formando ciudadanos, transformando futuro";
		$cat = Categoria::get();
		$img = Gallery::where('sede_id','=',$id)->get();
		return View::make('gallery.show')
		->with('cat',$cat)
		->with('img',$img)
		->with('title',$title)
		->with('sede',$id);
	}
}
