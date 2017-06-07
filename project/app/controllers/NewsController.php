<?php

class NewsController extends BaseController {
	public function getPlainNews()
	{
		$sede = Sede::get();
		$title = "Noticias | Red Joven Venezuela. Formando ciudadanos, transformando futuro";
		$cat   = Categoria::get();
		$articulos = Articulo::with('imagenes')->where('state','=',1)->orderBy('date','DESC')->paginate(6);
		return View::make('news.index')
		->with('articulos',$articulos)
		->with('title',$title)
		->with('cat',$cat)
		->with('sede',$sede);
	}
	public function getNews($id)
	{
		$sede = Sede::find($id);
		$title = "Noticias Sede".$sede->titulo." | Red Joven Venezuela. Formando ciudadanos, transformando futuro";
		$cat   = Categoria::get();
		$articulos = Articulo::with('imagenes')->where('state','=',1)->where('sede_id','=',$id)->orderBy('date','DESC')->paginate(6);
		return View::make('news.index')
		->with('articulos',$articulos)
		->with('title',$title)
		->with('cat',$cat)
		->with('id',$id);
	}
	public function getNewsCat($sede_id, $cat_id)
	{
		$sede = Sede::find($sede_id);
		$cate = Categoria::find($cat_id);
		$title = "Noticias Sede ".$sede->nombre." ".$cate->titulo." | Red Joven Venezuela. Formando ciudadanos, transformando futuro";
		$cat   = Categoria::get();
		$articulos = Articulo::with('imagenes')->where('state','=',1)->where('cat_id','=',$cat_id)->where('sede_id','=',$sede_id)->orderBy('date','DESC')->paginate(6);
		return View::make('news.index')
		->with('articulos',$articulos)
		->with('title',$title)
		->with('cat',$cat)
		->with('id',$sede_id)
		->with('cat_id',$cat_id);
	}
	public function getNewSelf($id)
	{
		$articulo = Articulo::with('imagenes')->where('id','=',$id)->where('state','=',1)->first();
		$cat = Categoria::get();
		$title = "Noticias: ".$articulo->title." | Red Joven Venezuela. Formando ciudadanos, transformando futuro";
		return View::make('news.art')
		->with('title',$title)
		->with('cat',$cat)
		->with('articulo',$articulo);
	}
}