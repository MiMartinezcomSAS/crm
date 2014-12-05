<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Persona extends Eloquent{

    protected $fillable = array("nombre","apellido","id_cargo","tel","movil","empresa","foto","correo");


}