<?php

class PruebaController extends BaseController {

	public function index()
	{

		$usuario= "drawde";
		return View::make('index')->with('usuario',$usuario)->with('mensaje','esto es un mensaje');
	}
}