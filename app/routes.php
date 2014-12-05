<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Route::get('/', function()
{
	return View::make('hello');
});*/


Route::get('login', 'AuthController@showLogin');


Route::post('login', 'AuthController@postLogin');


Route::group(array('before' => 'auth'), function()
{

    // ADMINISTRACION DE CUENTAS
    Route::get('/', function()
    {
        return View::make('index');
    });

    Route::get('/', 'ClientesController@index');

    /*SUPER ADMINISTRADOR*/

    Route::group(array('before' => 'admin'), function()
    {
        Route::get('cuentas/ver', 'CrudController@index');
        Route::get('cuentas/crear', 'CrudController@create');
        Route::post('cuentas/crear', 'CrudController@create');
        Route::get('cuentas/actualizar/{id}', 'CrudController@update');
        Route::post('cuentas/actualizar/{id}', 'CrudController@update');
        Route::get('cuentas/borrar/{id}', 'CrudController@delete');
        Route::get('cuentas/cambiar/{id}', 'CrudController@cambiar');
        Route::post('cuentas/cambiar/{id}', 'CrudController@cambiar');
    });

    /*ADMINISTRADOR*/

    Route::group(array('before'=>'admin2'),function()
    {
        Route::get('cuentas/inicio/{id}','CrudController@inicio');
        Route::post('cuentas/inicio/{id}','CrudController@inicio');
        Route::get('cuentas/actualizar/{id}', 'CrudController@update');
        Route::post('cuentas/actualizar/{id}', 'CrudController@update');
        Route::get('cuentas/borrar/{id}', 'CrudController@delete');
        Route::get('cuentas/cambiar/{id}', 'CrudController@cambiar');
        Route::post('cuentas/cambiar/{id}', 'CrudController@cambiar');
    });

    //PERFIL
    Route::get('perfil/personal/', function()
    {


    return View::make('perfil.personal');



    });

        Route::get('perfil/actualizar','CrudController@actualizar');
    Route::Post('perfil/actualizar','CrudController@actualizar');

    
    Route::get('cuentas/cambiar/{id}', 'CrudController@cambiar');
    Route::post('cuentas/cambiar/{id}', 'CrudController@cambiar');
    Route::get('perfil/personal/{id}', 'CrudController@foto');
    Route::post('perfil/personal/{id}', 'CrudController@foto');

    //crear clientes
    Route::get('clientes/crear', 'EmpresaController@create');
    Route::post('clientes/crear', 'EmpresaController@create');

    Route::get('clientes/crearcontacto', 'EmpresaController@createcontacto');
    Route::post('clientes/crearcontacto', 'EmpresaController@createcontacto');

    Route::get('clientes/crearcargo' , 'EmpresaController@createcargo');
    Route::post('clientes/crearcargo' , 'EmpresaController@createcargo');

    Route::get('clientes/vincularcontacto' , 'EmpresaController@vincularcontacto');
    Route::post('clientes/vincularcontacto' , 'EmpresaController@vincularcontacto');

    //crear clientes
    Route::get('prospectos/crear', 'ProspectoController@create');
    Route::post('prospectos/crear', 'ProspectoController@create');

    //Empresa

    Route::get('empresa/inicio','ClientesController@ver');
    Route::get('empresa/ver/{correo}','EmpresaController@index');
    Route::post('empresa/ver/{correo}','EmpresaController@index');

    Route::get('empresa/contacto/{nombre_empresa}','EmpresaController@contacto');
    Route::post('empresa/contacto/{nombre_empresa}','EmpresaController@contacto');

    Route::get('empresa/update/{nombre_empresa}','EmpresaController@update');
    Route::post('empresa/update/{nombre_empresa}','EmpresaController@update');

    Route::get('empresa/updatecontacto/{id}','EmpresaController@updatecontacto');
    Route::post('empresa/updatecontacto/{id}','EmpresaController@updatecontacto');

    Route::get('empresa/crearcontacto/{id}','EmpresaController@prospectocontacto');
    Route::post('empresa/crearcontacto/{id}','EmpresaController@prospectocontacto');

    Route::get('empresa/crearcontacto1/{id}','EmpresaController@clientecontacto');
    Route::post('empresa/crearcontacto1/{id}','EmpresaController@clientecontacto');

    /*ADMINISTRAR VER CLIENTES DE LOS VENDEDORES*/

    Route::get('cuentas/cliente/{id}','ClientesController@vercliente');
    Route::post('cuentas/cliente/{id}','ClientesController@vercliente');

    //cerrar session
    Route::get('logout', 'AuthController@logOut');
});







Route::get('/hola', 'PruebaController@index');