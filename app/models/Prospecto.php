<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Prospecto extends Eloquent{

    protected $fillable = array("nombre_empresa","estado","nit","direccion","tel","ext","correo","correo2","movil","propietario_cliente","logo","pag_web","fax","fuente","pais","ciudad","maps","skype");


}