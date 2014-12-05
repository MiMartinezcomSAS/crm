<?php

class ClientesController extends  BaseController
{
    public function index()
    {
        $users = Empresa::all();
        $prospectos = Prospecto::all();
        return View::make("index",compact('prospectos'), array("users"=>$users));
    }

        public function ver()
    {
        $users = Empresa::all();
        $prospectos = Prospecto::all();
        return View::make("empresa.inicio",compact('prospectos'), array("users"=>$users));
    }

    public function vercliente($nombre)
    {
        $empresa= DB::select('SELECT * FROM empresas WHERE propietario_cliente = ?' ,   array($nombre));
        $prospectos = DB::select('SELECT * FROM prospectos WHERE propietario_cliente = ?', array($nombre));
        $clientes= $empresa+$prospectos;
        return View::make("cuentas.cliente",compact('clientes'));
    }
}