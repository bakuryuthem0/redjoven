<?php

class AdminController extends BaseController {

	public function upload_image($file,$ruta)
	{
		$extension = File::extension($file->getClientOriginalName());
		$time = time();
		$miImg = $time.'.'.$extension;
		while (file_exists($ruta.$miImg)) {
			$time = time();
			$miImg = $time.'.'.$extension;
		}
        $file->move($ruta,$miImg);

        $img 	= Image::make($ruta.'/'.$miImg);
        $mark = Image::make('images/watermark.png')->widen(round($img->width()*30/100));
        
        $img->insert($mark,'center')
       	->interlace()
       	->widen(1600)
        ->save($ruta.'/'.$miImg);
        return $miImg;
	}
	public function getLogin()
	{
		$title = "Inicio de sesión | Red Joven Venezuela. Formando ciudadanos, transformando futuro";
		return View::make('admin.login')
		->with('title',$title);
	}
	public function postLogin()
	{
		$data  = Input::all();
		$rules = array(
			'username' => 'required',
			'password' => 'required',
		); 
		$msg = array(
		);
		$attr = array(
			'username' => 'usuario',
			'password' => 'contraseña',
		);
		$validator = Validator::make($data, $rules, $msg, $attr);
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$username = Input::get('username');
		$password = Input::get('password');
		$remember = 1;
		
		$data = array(
			'username' => $username,
			'password' => $password,
			'active'   => 1,
		);
		if(Auth::attempt($data, $remember)){
			return Redirect::to('administrador/');
		}else
		{
			Session::flash('danger','Usuario o contraseña incorrectos.');
			return Redirect::back();
		}
	}
	public function getIndex()
	{
		$title = "Inicio | Administrador Red Joven Venezuela. Formando ciudadanos, transformando futuro";
		return View::make('admin.index')
		->with('title',$title);
	}
	function getChangePass()
	{
		$title = "Cambiar contraseña";
		return View::make('admin.changePass')
		->with('title',$title);
	}
	public function postUserNewPass()
	{
		$data = Input::all();
		Validator::extend('checkCurrentPass', function($attribute, $value, $parameters)
		{
		    if( ! Hash::check( $value , $parameters[0] ) )
		    {
		        return false;
		    }
		    return true;
		});
		$rules = array(
			'password_old' 			=> 'required|checkCurrentPass:'.Auth::user()->password,
			'password'	   			=> 'required|min:4|max:16|confirmed',
			'password_confirmation' => 'required',
		);
		$msg = array();
		$cust = array(
			'password_old' 			=> 'contraseña actual',
			'password'	   			=> 'nueva contraseña',
			'password_confirmation' => 'confirmación de la contraseña'
		);
		$validator = Validator::make($data, $rules, $msg, $cust);
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator);
		}

		$user = User::find(Auth::id());
		$user->password = Hash::make($data['password']);
		if ($user->save()) {
			Session::flash('success','Se ha cambiado su contraseña satisfactoriamente.');
			return Redirect::back();
		}
	}
	public function getNewArticulo()
	{
		$title = "Nuevo Artículo | Red Joven Venezuela. Formando ciudadanos, transformando futuro";
		if (Auth::user()->role > 2 && Auth::user()->role != 6) {
			$assign = Assignment::where('user_id','=',Auth::id())->first();
			$sedes   = Sede::find($assign->sede_id);
		}else
		{
			$sedes   = Sede::get();
		}
		$cat = Categoria::get();
		return View::make('admin.article.new')
		->with('title',$title)
		->with('sedes',$sedes)
		->with('cat',$cat);
	}
	public function postNewArticulo()
	{
		$data 	= Input::all();
		$rules 	= array(
			'sede'			=> 'required',
			'cat'			=> 'required',
			'title'    		=> 'required|max:100',
			'desc' 	   		=> 'required',
			'file'	   	 	=> 'required|min:1',
			'date'			=> 'required|date',
		);
		$msg 	= array(
		);
		$attr 	= array(
			'sede'			=> 'sede',
			'cat'			=> 'categoria',
			'desc'	   		=> 'descripción',
			'file'	   		=> 'imagen',
			'date'			=> 'fecha'

		); 
		$validator = Validator::make($data, $rules, $msg, $attr);
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$art = new Articulo;
		$art->sede_id     = $data['sede'];
		$art->cat_id      = $data['cat'];
		if (Input::has('pretitle')) {
			$art->antetitulo  = $data['pretitle'];
		}
		$art->title       = $data['title'];
		$art->descripcion = $data['desc'];
		$art->date 		  = $data['date'];
		$art->created_by  = Auth::id();
		$art->modified_by = Auth::id();
		$art->save();
		$id = $art->id;
		$file = Input::file();
		$ruta 	 = "images/news/";
		foreach($file['file'] as $f)
		{
			$img = new NewsImages;
			$img->articulo_id = $id;
			$img->image   	  = $this->upload_image($f,$ruta);
			$img->save();
		}

		Session::flash('success','Articulo creado satisfactoriamente.');
		return Redirect::back();

	}
	public function showArticulos()
	{
		$title = "Ver articulos | Red Joven Venezuela. Formando ciudadanos, transformando futuro";
		$article = Articulo::orderBy('id','DESC')->get();
		return View::make('admin.article.show')
		->with('title',$title)
		->with('article',$article);

	}
	public function showArt($id)
	{
		$articulo = Articulo::with('imagenes')->find($id);
		$title = "Ver artículo: ".$articulo->title." | Red Joven Venezuela. Formando ciudadanos, transformando futuro";
		return View::make('admin.article.view')
		->with('title',$title)
		->with('articulo',$articulo);
	}
	public function getProy()
	{
		$id = Input::get('id');
		$cat = Categoria::where('tipo','=',$id)->get();
		return Response::json(array(
			'data' => $cat,
			'type' => 'success',
			
		));
	}
	public function elimArticulo()
	{
		$id = Input::get('id');
		if (is_null($id) || empty($id)) {
			return Response::json(array(
				'type' => 'danger',
				'msg'  => 'Error, debe existir el id del articulo',
			));
		}
		$img = NewsImages::where('articulo_id','=',$id);
		foreach ($img->get() as $i) {
			File::delete('images/news/'.$i->image);
		}
		$img->delete();
		$art = Articulo::find($id)->delete();
		return Response::json(array(
			'type' => 'success',
			'msg' => 'Se ha eliminado el articulo',
		));
	}
	public function getModifyArt($id)
	{
		$article = Articulo::leftJoin('categorias','categorias.id','=','articulos.cat_id')
		->where('articulos.id','=',$id)
		->with('imagenes')
		->first(array(
			'articulos.id',
			'articulos.antetitulo',
			'articulos.title',
			'articulos.descripcion',
			'articulos.date',
			'articulos.cat_id',
			'articulos.sede_id',
			'articulos.created_at',
		));
		$title = "Modificar articulo: ".$article->title;
		if (Auth::user()->role > 2 && Auth::user()->role != 6) {
			$assign = Assignment::where('user_id','=',Auth::id())->first();
			$sedes   = Sede::find($assign->sede_id);
		}else
		{
			$sedes   = Sede::get();
		}
		$cat = Categoria::get();
		return View::make('admin.article.mdf')
		->with('title',$title)
		->with('article',$article)
		->with('cat',$cat)
		->with('sedes',$sedes);
	}
	public function postMdfArt()
	{
		$data 	= Input::all();
		$rules 	= array(
			'sede'			=> 'required',
			'cat'			=> 'required',
			'title'    		=> 'required|max:100',
			'desc' 	   		=> 'required',
			'date'			=> 'required|date'
		);
		$msg 	= array(
		);
		$attr 	= array(
			'sede'			=> 'sede',
			'cat'			=> 'categoria',
			'desc'	   		=> 'descripción',
			'date'			=> 'fecha',

		); 
		$validator = Validator::make($data, $rules, $msg, $attr);
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$art = Articulo::find($data['id']);
		$art->sede_id     = $data['sede'];
		$art->cat_id      = $data['cat'];
		if (Input::has('pretitle')) {
			$art->antetitulo = $data['pretitle'];
		}
		$art->title       = $data['title'];
		$art->descripcion = $data['desc'];
		$art->date 		  = $data['date'];
		$art->modified_by = Auth::id();
		$art->save();
		$ruta 	 = "images/news/";
		if (Input::hasFile('file')) {
			$file = Input::file();
			foreach($file['file'] as $id => $i)
			{
				if (!is_null($i)) {
					$img = NewsImages::find($id);
					if (empty($img)) {
						$img = new NewsImages;
						$img->articulo_id = $data['id'];
					}else
					{
						File::delete('images/news/'.$img->image);
					}
					$img->image   = $this->upload_image($i,$ruta);
					$img->save();
				}
			}
		}
		Session::flash('success','Articulo modificado satisfactoriamente.');
		return Redirect::back();
	}
	public function changeStatus()
	{
		$id = Input::get('id');
		$art = Articulo::find($id);
		if ($art->state == 0) {
			$art->state = 1;
		}else
		{
			$art->state = 0;
		}
		$art->save();
		return Response::json(array(
			'type' => 'success',
			'msg'  => 'Estado cambiado',
			'state'=> $art->state,
		));
	}
	public function elimImg()
	{
		$id = Input::get('img_id');
		$i  = NewsImages::find($id);
		File::delete('images/news/'.$i->image);
		$aux = NewsImages::where('id','=',$id)->delete();
		return Response::json(array(
			'type' => 'success',
			'msg'  => 'Se ha borrado la imagen satisfactoriamente.',
		));
	}
	public function newUser()
	{
		$title = "Nuevo Usuario | Red Joven Venezuela. Formando ciudadanos, transformando futuro";
		if (Auth::user()->role == 1) {
			$roles = Role::get();
		}else
		{
			$roles = Role::where('id','>',Auth::user()->role)->get();
		}
		$sedes = Sede::get();
		return View::make('admin.users.new')
		->with('title',$title)
		->with('role',$roles)
		->with('sedes',$sedes);
	}
	public function postNewUser()
	{
		$data  = Input::all();
		$rules = array(
			'username' => 'required|min:4|max:64|unique:users,username',
			'password' => 'required|min:6|max:32|confirmed',
			'role'	   => 'required|exists:roles,id',
			'assign'   => 'required_if:role,3,4,5'
		); 
		$msg  = array();
		$attr = array(
			'username' => 'nombre de usuario',
			'password' => 'contraseña',
			'role'	   => 'rol',
			'assign'   => 'asignación',
		);
		$validator = Validator::make($data, $rules, $msg, $attr);
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$user = new User;
		$user->username = $data['username'];
		$user->password = Hash::make($data['password']);
		$user->role     = $data['role'];
		$user->active   = 1;

		if ($user->save()) {
			$assign = new Assignment;
			$assign->user_id = $user->id;
			$assign->sede_id = $data['assign'];
			$assign->save();

			Session::flash('success', 'Se ha creado el usuario satisfactoriamente.');
			return Redirect::back();
		}
	}
	public function getUsers()
	{
		$title = "Ver usuarios | Red Joven Venezuela. Formando ciudadanos, transformando futuro";
		$users = User::where('role','!=',1)->get(); 
		return View::make('admin.users.show')
		->with('title',$title)
		->with('users',$users);
	}
	public function chageUserPass($id)
	{
		$title = "Cambiar contraseña | Red Joven Venezuela. Formando ciudadanos, transformando futuro";
		$user = User::find($id);
		return View::make('admin.users.changePass')
		->with('title',$title)
		->with('user',$user);
	}
	public function postChangePass($id)
	{
		$data = Input::all();
		$rules = array(
			'password'	   			=> 'required|min:4|max:16|confirmed',
		);
		$msg = array();
		$cust = array(
			'password'	   			=> 'nueva contraseña',
		);
		$validator = Validator::make($data, $rules, $msg, $cust);
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator);
		}
		$user = User::find($id);
		$user->password = Hash::make($data['password']);
		if ($user->save()) {
			Session::flash('success','Se ha cambiado su contraseña satisfactoriamente.');
			return Redirect::back();
		}
	}
	public function elimUser()
	{
		$id = Input::get('user_id');
		$user = User::find($id)->delete();
		if ($user) {
			return Response::json(array(
				'type' => 'success',
				'msg'  => 'Se ha eliminado el usuario satisfactoriamente.',
			));
		}else
		{
			return Response::json(array(
				'type' => 'danger',
				'msg'  => 'Error al eliminar el usuario.',
			));
		}
	}
	public function getSedes()
	{
		$title = "Nueva Sede | Red Joven Venezuela. Formando ciudadanos, transformando futuro";
		$users = User::where('role','=',3)->get();
		return View::make('admin.sedes.new')
		->with('title',$title)
		->with('users',$users);
	}
	public function postSedes()
	{
		$data  = Input::all();
		$rules = array(
			'name' 		=> 'required|min:4',
			'coord' 	=> 'required|exists:users,id',
		); 
		$msg  = array();
		$attr = array(
			'name' => 'nombre de la sede',
			'coord' => 'coordinador',
		);
		$validator = Validator::make($data, $rules, $msg, $attr);
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$sede = new Sede;
		$sede->user_id = $data['coord'];
		$sede->nombre  = $data['name'];
		if (Input::has('desc')) {
			$sede->descripcion = $data['desc'];
		}

		if ($sede->save()) {
			Session::flash('success', 'Se ha creado la sede satisfactoriamente.');
			return Redirect::back();
		}
	}
	public function getShowSedes()
	{
		$title = "Ver Sedes | Red Joven Venezuela. Formando ciudadanos, transformando futuro";
		$sedes = Sede::with('assignmentCount')->get(); 
		return View::make('admin.sedes.show')
		->with('title',$title)
		->with('sedes',$sedes);
	}
	public function getModifySede($id)
	{
		$users = User::where('role','=',3)->get();
		$sede  = Sede::find($id);
		$title = "Editar Sede ".$sede->nombre." | Red Joven Venezuela. Formando ciudadanos, transformando futuro";
		return View::make('admin.sedes.mdf')
		->with('title',$title)
		->with('users',$users)
		->with('sede',$sede);
	}
	public function postMdfSede($id)
	{
		$data  = Input::all();
		$rules = array(
			'name' 		=> 'required|min:4',
			'coord' 	=> 'required|exists:users,id',
		); 
		$msg  = array();
		$attr = array(
			'name' => 'nombre de la sede',
			'coord' => 'coordinador',
		);
		$validator = Validator::make($data, $rules, $msg, $attr);
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$sede = Sede::find($id);
		$sede->user_id = $data['coord'];
		$sede->nombre  = $data['name'];
		if (Input::has('desc')) {
			$sede->descripcion = $data['desc'];
		}

		if ($sede->save()) {
			Session::flash('success', 'Se ha modificado la sede satisfactoriamente.');
			return Redirect::back();
		}
	}
	public function elimSede()
	{
		$id = Input::get('id');
		$sede = Sede::find($id)->delete();
		if ($sede) {
			return Response::json(array(
				'type' => 'success',
				'msg'  => 'Se ha eliminado la sede satisfactoriamente.',
			));
		}else
		{
			return Response::json(array(
				'type' => 'danger',
				'msg'  => 'Error al eliminar la sede.',
			));
		}
	}
	public function getAssign($id)
	{
		$title = "Ver asignaciones | Red Joven Venezuela. Formando ciudadanos, transformando futuro";
		$assign = Assignment::with('users')->where('sede_id','=',$id)->get();
		return View::make('admin.sedes.assign')
		->with('title',$title)
		->with('assign',$assign);
	}
	public function elimAssign()
	{
		$id = Input::get('id');
		$assign = Assignment::find($id)->delete();
		if ($assign) {
			return Response::json(array(
				'type' => 'success',
				'msg'  => 'Se ha removido la asignación satisfactoriamente.',
			));
		}else
		{
			return Response::json(array(
				'type' => 'danger',
				'msg'  => 'Error al eliminar la asignación.',
			));
		}
	}
	public function getNewAssign($id)
	{
		$title = "Asignar usuario | Red Joven Venezuela. Formando ciudadanos, transformando futuro";
		$users = User::whereRaw('users.id NOT IN (SELECT users.id FROM users JOIN assignments ON assignments.user_id = users.id WHERE assignments.sede_id = '.$id.')')
 		->where('role','>',2)
 		->groupBy('users.id')
 		->get(array(
 			'users.id',
 			'users.username',
 		));
		$sede = Sede::find($id);
		return View::make('admin.sedes.newAssign')
		->with('users',$users)
		->with('title',$title)
		->with('sede',$sede);
	}
	public function postNewAssign($id)
	{
		$assign = new Assignment;
		$assign->user_id = Input::get('user');
		$assign->sede_id = $id;
		$assign->save();
		Session::flash('success', 'Se a asginado al usuario satisfactoriamente.');
		return Redirect::back();
	}
	public function newImage()
	{
		$title = "Agregar Imagenes | Red Joven Venezuela. Formando ciudadanos, transformando futuro";
		$sedes = Sede::orderBy('nombre')->get();
		$cat   = Categoria::get();
		return View::make('admin.gallery.index')
		->with('title',$title)
		->with('sedes',$sedes)
		->with('cat',$cat);

	}
	public function checkImg()
	{
		$data = Input::all();
		if (Input::hasFile('file')) {
			return Response::json(array('type' => $data));
		}
	}
	public function postImg()
	{
		$data = Input::all();
		$ruta = "images/gallery/".$data['sede'];
		$f    = Input::file('file');
		$file = new Gallery;
		$file->sede_id 		= $data['sede'];
		$file->cat_id 		= $data['actividad'];
		$file->image 		= $this->upload_image($f,$ruta);
		$file->save();
		return Response::json(array('type' => 'success','data' => $data));
	}
	public function getElimImg()
	{
		$sedes = Sede::with('imagenesCount')->get();
		$title = "Ver imagenes | Red Joven Venezuela. Formando ciudadanos, transformando futuro";
		return View::make('admin.gallery.elim')
		->with('sedes',$sedes)
		->with('title',$title);
	}
	public function galleryImages($id)
	{
		$sede = Sede::find($id);
		$gallery = Gallery::where('sede_id','=',$id)->get();
		$title = "Ver galeria sede: ".$sede->nombre.' | Red Joven Venezuela. Formando ciudadanos, transformando futuro';
		return View::make('admin.gallery.show')
		->with('title',$title)
		->with('gallery',$gallery);
	}
	public function postElimImg($value='')
	{
		$id = Input::get('id');

		$gal = Gallery::find($id);
		File::delete('images/gallery/'.$gal->sede_id.'/'.$gal->image);
		$gal->delete();
		return Response::json(array(
			'type' => 'success',
			'msg'  => 'Imagen eliminado satisfactoriamente.',
		));
	}
	public function getLogout()
	{
		Session::flash('success','Se ha cerrado sesión satisfactoriamente.');
		Auth::logout();
		return Redirect::to('administrador/login');
	}
	public function getTest()
	{

	}
}