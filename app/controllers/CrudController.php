<?php

class CrudController extends BaseController
{
    public function index()
    {
        $users = User::all();
        return View::make("cuentas.inicio",compact('url','users'), array("users" => $users));

    }

    public function inicio($nombre)
    {
        $users = DB::select('SELECT * FROM users WHERE encargado = ?', array($nombre));
        return View::make("cuentas.index",compact('users'));
    }

    public function create()
    {
        $encargados = [ "auto" => "auto"]+User::whereRaw('role_id=2')->lists('nombre','nombre');
        $cargos= [ 3 => "vendedor"]+[ 2 => "administrador"]+[ 1 => "super administrador"];
        if(Input::get())
        {
            $inputs = $this->getInputs(Input::all());
            if($this->validateForms($inputs) === true)
            {
                $user = new User($inputs);

                $user->password= Hash::make(Input::get("password"));
                $user->username= "@".input::get("username");
                //$user->foto= Input::file("foto")->getClientOriginalName();
                $user->foto= "perfil.png";
                if($user->save())
                {
                    return Redirect::to('cuentas/ver')->with(array('mensaje' => 'El usuario ha sido creado correctamente.'));
                }

            }else{

                return Redirect::to('cuentas/crear')->withErrors($this->validateForms($inputs))->withInput();
            }

        }else{

            return View::make('cuentas.create', compact('encargados','cargos'));

        }

    }
    public function foto($id){
        $user = User::find($id);
        $file= Input::file("foto");
        if(Input::get())
        {
            if($user){
                $inputs = $this->getInputs(Input::all());
                if($this->validateForms3($inputs)===true)
                {
                    if($user){
                        $user->foto=Input::file("foto")->getClientOriginalName();
                        if($user->save())
                        {
                            $file->move("imgs",$file->getClientOriginalName());
                            return Redirect::to('perfil/personal')->with(array('mensaje' => 'El usuario se ha actualizado correctamente.'));

                        }
                    }else{
                        return Redirect::to('perfil/personal/$id')->with(array('mensaje' => 'El usuario no existe.'));
                    }
                }else{
                    return Redirect::to('perfil/personal');
                }
            }else{
                return Redirect::to('perfil/personal')->with(array('mensaje' => 'El usuario no existe.'));
            }
        }else{
            return View::make('perfil.personal');
        }
    }



    public function update($id)
    {

        $user = User::find($id);
        if(Auth::user()->role_id==1)
        {
            $cargos= [ 3 => "vendedor"]+[ 2 => "administrador"]+[ 1 => "super administrador"];
            $encargados = ["auto" => "AUTO "]+ User::whereRaw('role_id=2')->lists('nombre','nombre');
        }else{
            $cargos= [ 3 => "vendedor"]+[ 2 => "administrador"];
            $encargados = ["auto" => "AUTO "]+ User::whereRaw('role_id=2')->lists('nombre','nombre');
        }

  
        if(Input::get())
        {
            if($user)
            {

                $inputs = $this->getInputs(Input::all());

                if($this->validateForms1($inputs) === true)
                {
                    $user->nombre = Input::get("nombre");
                    $user->apellido = Input::get("apellido");
                    $user->correo = Input::get("correo");
                    $user->tel = Input::get("tel");
                    $user->direccion = Input::get("direccion");
                    $user->role_id = Input::get("role_id");
                    if(Input::get("role_id")<3)
                    {
                        $user->encargado = "auto";
                    }else{
                        $user->encargado = input::get("encargado");
                    }

                    if($user->save())
                    {

                        return Redirect::to('cuentas/ver')->with(array('mensaje' => 'El usuario se ha actualizado correctamente.'));

                    }

                }else{

                    return Redirect::to("cuentas/actualizar/$id")->withErrors($this->validateForms1($inputs))->withInput();

                }

            }else{

                return Redirect::to('cuentas/ver')->with(array('mensaje' => 'El usuario no existe.'));

            }

        }else{

            return View::make("cuentas.update", compact('encargados','cargos'),array("user" => $user));

        }

    }

    public function actualizar()
    {
        $cargos= [ 3 => "vendedor"]+[ 2 => "administrador"]+[ 1 => "super administrador"];
         $encargados = ["auto" => "AUTO "]+ User::whereRaw('role_id=2')->lists('nombre','nombre');
        $user = User::find(Auth::user()->id);

        if(Input::get())
        {
            if($user)
            {

                $inputs = $this->getInputs(Input::all());

                if($this->validateForms1($inputs) === true)
                {
                    $user->nombre = Input::get("nombre");
                    $user->apellido = Input::get("apellido");
                    $user->correo = Input::get("correo");
                    $user->tel = Input::get("tel");
                    $user->direccion = Input::get("direccion");

                    if($user->save())
                    {

                        return Redirect::to('perfil/personal')->with(array('mensaje' => 'El usuario se ha actualizado correctamente.'));

                    }

                }else{

                    return Redirect::to("perfil/actualizar")->withErrors($this->validateForms1($inputs))->withInput();

                }

            }else{

                return Redirect::to('perfil/personal')->with(array('mensaje' => 'El usuario no existe.'));

            }

        }else{

            return View::make("perfil.actualizar", compact('encargados','cargos'),array("user" => $user));

        }

    }

    public function cambiar($id)
    {

        $user = User::find($id);
        if(Input::get())
        {
            if($user)
            {
                $inputs = $this->getInputs(Input::all());
                if($this->validateForms2($inputs) === true)
                {
                    $user->password= Hash::make(Input::get("password"));
                    if($user->save())
                    {

                        return Redirect::to('cuentas/ver')->with(array('mensaje' => 'El usuario se ha actualizado correctamente.'));

                    }

                }else{
                    return Redirect::to("cuentas/cambiar/$id")->withErrors($this->validateForms2($inputs))->withInput();
                }
            }else{
                return Redirect::to('cuentas/ver')->with(array('mensaje' => 'El usuario no existe.'));
            }
        }else{
            return View::make("cuentas.contraseña", array("user" => $user));

        }

    }

    public function delete($id)
    {

        $user = Usuario::find($id);
        if($user)
        {

            $user->delete();
            return Redirect::to('cuentas/ver')->with(array('mensaje' => 'El usuario ha sido eliminado correctamente.'));

        }else{

            return Redirect::to('cuentas/ver')->with(array('mensaje' => "El usuario con id $id que intentas eliminar no existe."));

        }

    }

    private function validateForms($inputs = array())
    {

        $rules = array(
            'username'              => 'required|min:1|max:255|unique:users',
            'nombre'                => 'required|min:1|max:255',
            'apellido'              => 'required|min:1|max:100',
            'password'              => 'required|min:1|max:100',
            'confirmar_password'    => 'required|min:1|max:100|same:password',
            'correo'                => 'required|email|min:10|max:100|unique:users',
            'tel'                   => 'required|numeric',
            'direccion'             => 'required|min:1|max:100'
        );

        $messages = array(
            'required'  => 'El campo :attribute es obligatorio.',
            'min'       => 'El campo :attribute no puede tener menos de :min carácteres.',
            'max'       => 'El campo :attribute no puede tener más de :max carácteres.',
            'email'     => 'El correo esta mal escrito',
            'same'      => 'Las contraseñas deben ser iguales',
            'unique'    => 'El :attribute ya se encuentra registrado',
            'numeric'   => 'El :attribute va en numeros'
        );

        $validation = Validator::make($inputs, $rules, $messages);

        if($validation->fails())
        {

            return $validation;

        }else{

            return true;

        }

    }

    private function validateForms1($inputs = array())
    {

        $rules = array(
            'username'                => 'min:1|max:255',
            'nombre'                => 'required|min:1|max:255',
            'apellido'              => 'required|min:1|max:100',
            'password'              => 'min:1|max:100',
            'confirmar_password'    => 'min:1|max:100|same:password',
            'correo'                => 'required|email|min:3|max:100',
            'tel'                   => 'required|numeric',
            'direccion'             => 'required|min:1|max:100'
        );

        $messages = array(
            'required'  => 'El campo :attribute es obligatorio.',
            'min'       => 'El campo :attribute no puede tener menos de :min carácteres.',
            'max'       => 'El campo :attribute no puede tener más de :max carácteres.',
            'email'     => 'El correo esta mal escrito',
            'same'      => 'Las contraseñas deben ser iguales',
            'unique'    => 'El correo o username ya se encuentra registrado',
            'numeric'   => 'El telefono va en numeros'
        );

        $validation1 = Validator::make($inputs, $rules, $messages);

        if($validation1->fails())
        {

            return $validation1;

        }else{

            return true;

        }

    }

    private function validateForms2($inputs = array())
    {

        $rules = array(
            'password'              => 'required|min:1|max:100',
            'confirmar_password'    => 'required|min:1|max:100|same:password'
        );

        $messages = array(
            'required'  => 'El campo :attribute es obligatorio.',
            'min'       => 'El campo :attribute no puede tener menos de :min carácteres.',
            'max'       => 'El campo :attribute no puede tener más de :max carácteres.',
            'email'     => 'El correo esta mal escrito',
            'same'      => 'Las contraseñas deben ser iguales',
            'unique'    => 'El correo ya se encuentra registrado'
        );

        $validation2 = Validator::make($inputs, $rules, $messages);

        if($validation2->fails())
        {

            return $validation2;

        }else{

            return true;

        }

    }

    private function validateForms3($inputs = array())
    {

        $rules = array(
            'foto'              => 'image|required'
        );

        $messages = array(
            'required'  => 'El campo :attribute es obligatorio.',
            'min'       => 'El campo :attribute no puede tener menos de :min carácteres.',
            'max'       => 'El campo :attribute no puede tener más de :min carácteres.',
            'email'     => 'El correo esta mal escrito',
            'same'      => 'Las contraseñas deben ser iguales',
            'unique'    => 'El correo ya se encuentra registrado'
        );

        $validation3 = Validator::make($inputs, $rules, $messages);

        if($validation3->fails())
        {

            return $validation3;

        }else{

            return true;

        }

    }

    private function getInputs($inputs = array())
    {

        foreach($inputs as $key => $val)
        {
            $inputs[$key] = $val;
        }
        return $inputs;
    }

}