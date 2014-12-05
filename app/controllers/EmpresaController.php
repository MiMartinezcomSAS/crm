<?php

class EmpresaController extends BaseController
{

    public function index($correo)
    {
        $cargos = DB::select('SELECT * FROM cargos');
        $prospectos = DB::select('SELECT * FROM prospectos WHERE correo = ?', array($correo));
        $clientes = DB::select('SELECT * FROM empresas WHERE correo = ?', array($correo));
        if(count($prospectos))
        {
            foreach ($prospectos as $prospecto ) {
                $contactos1=  DB::select('SELECT * FROM personas WHERE empresa = ?', array($prospecto->nombre_empresa));
        }
        }
        else{
            foreach ($clientes as $cliente ) {
                $contactos2=  DB::select('SELECT * FROM personas WHERE empresa = ?', array($cliente->nombre_empresa));
                
        }
        }

        return View::make('empresa.index',compact('prospectos','clientes','contactos1','contactos2','cargos'));
    }

    public function contacto($nombre_empresa)
    {
        
        $contactos=  DB::select('SELECT * FROM personas WHERE empresa = ?', array($nombre_empresa));
        return View::make('empresa.contacto',compact('contactos'));
    }

    public function create()
    {
        

        $propietario= User::whereRaw('role_id=3')->lists('username','username');
        $estado= [ 1 => "activo"]+[ 2 => "mensual"]+[ 3 => "moroso"]+[ 4 => "eliminado"];
        $url="clientes/crear";
        if(Input::get())
        {
            $inputs = $this->getInputs(Input::all());
            if($this->validateForms($inputs) === true)
            {
                $empre= new Empresa($inputs);
                $empre->empresa=1;
                $empre->logo= "perfil.png";
                if($empre){
                    
                    if($empre->save())
                    {
                        
                        return Redirect::to('clientes/crearcontacto')->with(array('mensaje' => 'la empresa ha sido creada correctamente'));
                    }
                }else{
                    return Redirect::to('clientes/crear')->with(array('mensaje' => 'nose pudo'));
                }

            }else
            {
                return Redirect::to('clientes/crear')->withErrors($this->validateForms($inputs))->withInput();
            }
        }else
        {
            return View::make('clientes.create', compact('propietario','estado'),compact('url','url'));
        }
    }

    public function createcontacto()
    {
        $empresa= Empresa::whereRaw('id>=0')->lists('nombre_empresa','nombre_empresa');
        $empresa1= Prospecto::whereRaw('id>=0')->lists('nombre_empresa','nombre_empresa');
        $empresas= $empresa+$empresa1;
        $cargos= Cargo::whereRaw('id>=0')->lists('nombre','id');
        //$file= Input::file("foto");
        if(Input::get())
        {
            $inputs = $this->getInputs(Input::all());
            if($this->validateForms1($inputs) === true)
            {
                $perso= new Persona($inputs);
                $perso->foto= "perfil.png";
                if($perso){
                    //$perso->foto=Input::file("foto")->getClientOriginalName();
                    if($perso->save())
                    {
                        //$file->move("contacto",$file->getClientOriginalName());
                        return Redirect::to('empresa/inicio')->with(array('mensaje' => 'el contacto ha sido creada correctamente'));
                    }
                }else{
                    return Redirect::to('clientes/crearcontacto')->with(array('mensaje' => 'nose pudo'));
                }

            }else
            {
                return Redirect::to('clientes/crearcontacto')->withErrors($this->validateForms1($inputs))->withInput();
            }
        }else
        {
            return View::make('clientes.createcontacto',compact('empresas','cargos'));
        }
    }

    public function prospectocontacto($id)
    {
        $empresa= Empresa::whereRaw('id>=0')->lists('nombre_empresa','nombre_empresa');
        $empresa1= Prospecto::whereRaw('id>=0')->lists('nombre_empresa','nombre_empresa');
        $nombres= prospecto::find($id);
        $empresas= $empresa+$empresa1;
        $cargos= Cargo::whereRaw('id>=0')->lists('nombre','id');
        //$file= Input::file("foto");
        if(Input::get())
        {
            $inputs = $this->getInputs(Input::all());
            if($this->validateForms1($inputs) === true)
            {
                $perso= new Persona($inputs);
                $perso->foto= "perfil.png";
                if($perso){
                    //$perso->foto=Input::file("foto")->getClientOriginalName();
                    if($perso->save())
                    {
                        //$file->move("contacto",$file->getClientOriginalName());
                        return Redirect::to('empresa/ver/'.$nombres->correo)->with(array('mensaje' => 'el contacto ha sido creada correctamente'));
                    }
                }else{
                    return Redirect::to('clientes/crearcontacto/$id')->with(array('mensaje' => 'nose pudo'));
                }

            }else
            {
                return Redirect::to('clientes/crearcontacto')->withErrors($this->validateForms1($inputs))->withInput();
            }
        }else
        {
            return View::make('empresa.crearcontacto',compact('empresas','cargos','nombres'));
        }
    }

     public function clientecontacto($id)
    {
        $empresa= Empresa::whereRaw('id>=0')->lists('nombre_empresa','nombre_empresa');
        $empresa1= Prospecto::whereRaw('id>=0')->lists('nombre_empresa','nombre_empresa');
        $nombres= Empresa::find($id);
        $empresas= $empresa+$empresa1;
        $cargos= Cargo::whereRaw('id>=0')->lists('nombre','id');
        //$file= Input::file("foto");
        if(Input::get())
        {
            $inputs = $this->getInputs(Input::all());
            if($this->validateForms1($inputs) === true)
            {
                $perso= new Persona($inputs);
                $perso->foto= "perfil.png";
                if($perso){
                    //$perso->foto=Input::file("foto")->getClientOriginalName();
                    if($perso->save())
                    {
                        //$file->move("contacto",$file->getClientOriginalName());
                        return Redirect::to('empresa/ver/'.$nombres->correo)->with(array('mensaje' => 'el contacto ha sido creada correctamente'));
                    }
                }else{
                    return Redirect::to('clientes/crearcontacto/$id')->with(array('mensaje' => 'nose pudo'));
                }

            }else
            {
                return Redirect::to('clientes/crearcontacto')->withErrors($this->validateForms1($inputs))->withInput();
            }
        }else
        {
            return View::make('empresa.crearcontacto',compact('empresas','cargos','nombres'));
        }
    }

    public function updatecontacto($id)
    {
        $empresa= Empresa::whereRaw('id>=0')->lists('nombre_empresa','nombre_empresa');
        $empresa1= Prospecto::whereRaw('id>=0')->lists('nombre_empresa','nombre_empresa');
        $empresas= $empresa+$empresa1;
        $cargos= Cargo::whereRaw('id>=0')->lists('nombre','id');
        $file= Input::file("foto");
            $perso=Persona::find($id);
            if(Input::get())
            {
                if($perso)
                {
                    $inputs = $this->getInputs(Input::all());
                    if($this->validateForms1($inputs) ===true)
                    {
                        $perso->nombre=Input::get("nombre");
                        $perso->apellido=Input::get("apellido");
                        $perso->id_cargo=Input::get("id_cargo");
                        $perso->correo=Input::get("correo");
                        $perso->tel=Input::get("tel");
                        $perso->movil=Input::get("movil");
                        $perso->empresa=Input::get("empresa");
                        if(Input::file("foto"))
                        {
                            $perso->foto=Input::file("foto")->getClientOriginalName();
                        }
                        if($perso->save())
                        {
                            if(Input::file("foto"))
                            {
                                $file->move("contacto",$file->getClientOriginalName());
                            }
                            return Redirect::to('empresa/inicio')->with(array('mensaje' => 'El usuario se ha actualizado correctamente.'));
                        }

                    }else{

                        return Redirect::to('empresa/updatecontacto/$id')->withErrors($this->validateForms1($inputs))->withInput();
                    }
                }else{

                    return Redirect::to('empresa/inicio')->with(array('mensaje' => 'El usuario no existe.'));
                }
            }else{
                        return View::make('empresa.updatecontacto',compact('empresas','cargos'), array('perso' => $perso )) ;
            }


    }


    public function createcargo()
    {
        $xmlEntry = '<iframe src="https://www.google.com/calendar/embed?src=edwarddiaz92%40gmail.com&ctz=America/Bogota" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>';
        if(Input::get())
        {
            $inputs = $this->getInputs(Input::all());
            if($this->validateForms2($inputs) === true)
            {
                $cargos= new Cargo($inputs);

                if($cargos){
                    if($cargos->save())
                    {
                        return Redirect::to('clientes/crearcontacto')->with(array('mensaje' => 'el cargo ha sido creada correctamente'));
                    }
                }else{
                    return Redirect::to('clientes/createcargo')->with(array('mensaje' => 'nose pudo'));
                }

            }else
            {
                return Redirect::to('clientes/crearcargo')->withErrors($this->validateForms2($inputs))->withInput();
            }
        }else
        {
            return View::make('clientes.createcargo',compact('xmlEntry'));
        }
    }

    public function vincularcontacto()
    {
        return View::make('clientes.vincularcontacto');
    }

    public function update($nombre)
    {
        $file= Input::file("logo");
        $propietario= User::whereRaw('role_id=3')->lists('username','username');
        $estado= [ 1 => "activo"]+[ 2 => "mensual"]+[ 3 => "moroso"]+[ 4 => "eliminado"];
        $estado1= [ 1 => "contizacion ordinaria y anexo"]+[ 2 => "protafolio y propuesta"]+[ 3 => "primera llmada"]+[ 4 => "contizacion especifica"]+[ 5 => "segunda llamada"]+[ 6 => "negociacion"]+[ 7 => "contrato "];

        $empre  = DB::select('SELECT * FROM empresas WHERE correo = ?' ,   array($nombre));
        $prosp  = DB::select('SELECT * FROM prospectos WHERE correo = ?' ,   array($nombre));
        $empresas = $empre+$prosp;
        if(count($empresas))
        {
            foreach ($empresas as $empresa)
            {
///////////////////////////PROSPECTO
                if($empresa->empresa == 0)
                {

                     $user = Prospecto::find($empresa->id);
                    if(Input::get())
                    {
                        
                        if($user){
                            
                            $inputs = $this->getInputs(Input::all());
                            if($this->validateForms4($inputs) === true){

                                if(Input::get("nombre_empresa"))
                                {
                                    $user->nombre_empresa = Input::get("nombre_empresa");
                                }
                                $user->estado = Input::get("estado");
                                $user->nit = Input::get("nit");
                                $user->direccion = Input::get("direccion");
                                $user->tel = Input::get("tel");
                                $user->ext = Input::get("ext");
                                if(Input::get("correo"))
                                {
                                    $user->correo = Input::get("correo");
                                }
                                if(Input::get("correo2"))
                                {
                                    $user->correo2 = Input::get("correo2");
                                }
                                $user->movil = Input::get("movil");
                                $user->propietario_cliente = Input::get("propietario_cliente");
                                $user->pag_web = Input::get("pag_web");
                                $user->fax = Input::get("fax");
                                $user->fuente = Input::get("fuente");
                                $user->pais = Input::get("pais");
                                $user->ciudad = Input::get("ciudad");
                                $user->maps = Input::get("maps");
                                $user->skype = Input::get("skype");
                                if(Input::file("logo"))
                                {
                                    $user->logo=Input::file("logo")->getClientOriginalName();
                                }
                                if($user->save())
                                {
                                    if(Input::file("logo"))
                                    {
                                        $file->move("empresa",$file->getClientOriginalName());
                                    }
                                    return Redirect::to('empresa/ver/'.$user->correo)->with(array('mensaje' => 'El usuario se ha actualizado correctamente.'));
                                }
                            }else{
                                return Redirect::to("empresa/update/$nombre")->withErrors($this->validateForms4($inputs))->withInput(); 
                            }

                        }else{
                            return Redirect::to('empresa/ver/'.$user->correo)->with(array('mensaje' => 'El usuario no existe.'));
                        }

                    }else{
                        return View::make("empresa.update",compact('estado1','propietario'),array("user" => $user));
                    }

///////////////////////////////CLIENTE
                }else{
                    $user = Empresa::find($empresa->id);
                    if(Input::get())
                    {

                        if($user){
                            $inputs = $this->getInputs(Input::all());
                            if($this->validateForms3($inputs) === true){

                                if(Input::get("nombre_empresa"))
                                {
                                    $user->nombre_empresa = Input::get("nombre_empresa");
                                }
                                $user->estado = Input::get("estado");
                                $user->nit = Input::get("nit");
                                $user->direccion = Input::get("direccion");
                                $user->tel = Input::get("tel");
                                $user->ext = Input::get("ext");
                                if(Input::get("correo"))
                                {
                                    $user->correo = Input::get("correo");
                                }
                                if(Input::get("correo2"))
                                {
                                    $user->correo2 = Input::get("correo2");
                                }
                                $user->movil = Input::get("movil");
                                $user->propietario_cliente = Input::get("propietario_cliente");
                                $user->pag_web = Input::get("pag_web");
                                $user->fax = Input::get("fax");
                                $user->fuente = Input::get("fuente");
                                $user->pais = Input::get("pais");
                                $user->ciudad = Input::get("ciudad");
                                $user->maps = Input::get("maps");
                                $user->skype = Input::get("skype");
                                if(Input::get("fecha_pago"))
                                {
                                    $user->fecha_pago = Input::get("fecha_pago");
                                }
                                if(Input::get("fecha_expedicion"))
                                {
                                    $user->fecha_expedicion = Input::get("fecha_expedicion");
                                }
                                if(Input::file("logo"))
                                {
                                    $user->logo=Input::file("logo")->getClientOriginalName();
                                }
                                if($user->save())
                                {
                                    if(Input::file("logo"))
                                    {
                                        $file->move("empresa",$file->getClientOriginalName());
                                    }
                                    return Redirect::to('empresa/ver/'.$user->correo)->with(array('mensaje' => 'El usuario se ha actualizado correctamente.'));
                                }
                            }else{

                                return Redirect::to("empresa/update/$nombre")->withErrors($this->validateForms3($inputs))->withInput(); 
                            }

                        }else{
                            return Redirect::to('empresa/ver'.$user->correo)->with(array('mensaje' => 'El usuario no existe.'));
                        }

                    }else{
                        return View::make("empresa.update",compact('estado','propietario'),array("user" => $user));

                    }


                }
            }
        }
        return View::make("empresa.update");
    }

    private function validateForms($inputs = array())
    {

        $rules = array(
            'nombre_empresa'        => 'required|min:1|max:255|unique:empresas|unique:prospectos',
            'nit'                   => 'numeric',
            'direccion'             => 'min:1|max:100',
            'tel'                   => 'numeric',
            'ext'                   => 'numeric',
            'correo'                => 'required|email|min:10|max:100|unique:empresas|unique:prospectos',
            'correo2'               => 'email|min:10|max:100|unique:empresas|unique:prospectos',
            'movil'                 => 'required|numeric',
            'pag_web'               => 'min:1|max:100|',
            'fax'                   => 'numeric|min:1|max:100',
            'fuente'                => 'min:1|max:100',
            'pais'                  => 'min:1|max:100',
            'ciudad'                => 'min:1|max:100',
            'maps'                  => 'min:1|max:100',
            'skype'                 => 'min:1|max:100',
            'fecha_pago'            => 'required|min:1|max:100',
            'fecha_expedicion'      => 'required|min:1|max:100'
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
        private function validateForms3($inputs = array())
    {

        $rules = array(
            'nombre_empresa'        => 'min:1|max:255|unique:empresas|unique:prospectos',
            'nit'                   => 'numeric',
            'direccion'             => 'min:1|max:100',
            'tel'                   => 'numeric',
            'ext'                   => 'numeric',
            'correo'                => 'email|min:10|max:100|unique:empresas|unique:prospectos',
            'correo2'               => 'email|min:10|max:100|unique:empresas|unique:prospectos',
            'movil'                 => 'required|numeric',
            'pag_web'               => 'min:1|max:100|',
            'fax'                   => 'numeric',
            'fuente'                => 'min:1|max:100',
            'pais'                  => 'min:1|max:100',
            'ciudad'                => 'min:1|max:100',
            'maps'                  => 'min:1|max:100',
            'skype'                 => 'min:1|max:100',
            'fecha_pago'            => 'min:1|max:100',
            'fecha_expedicion'      => 'min:1|max:100'
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
    private function validateForms4($inputs = array())
    {

        $rules = array(
            'nombre_empresa'        => 'min:1|max:255|unique:empresas|unique:prospectos',
            'nit'                   => 'numeric',
            'direccion'             => 'min:1|max:100',
            'tel'                   => 'numeric',
            'ext'                   => 'numeric',
            'correo'                => 'email|min:10|max:100|unique:empresas|unique:prospectos',
            'correo2'               => 'email|min:10|max:100|unique:empresas|unique:prospectos',
            'movil'                 => 'required|numeric',
            'pag_web'               => 'min:1|max:100|',
            'fax'                   => 'numeric',
            'fuente'                => 'min:1|max:100',
            'pais'                  => 'min:1|max:100',
            'ciudad'                => 'min:1|max:100',
            'maps'                  => 'min:1|max:100',
            'skype'                 => 'min:1|max:100',
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
            'nombre'                => 'required|min:1|max:255',
            'apellido'              => 'required|min:1|max:100',
            'tel'                   => 'numeric',
            'correo'                => 'required|email|min:10|max:100',
            'movil'                 => 'required|numeric'
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
            'nombre'        => 'required|min:1|max:255|unique:cargos'
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

        $validation2 = Validator::make($inputs, $rules, $messages);

        if($validation2->fails())
        {

            return $validation2;

        }else{

            return true;

        }

    }
        private function validateForms5($inputs = array())
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