<?php

class ProspectoController extends BaseController
{

	public function create()
	{
		 //$file= Input::file("logo");

        $propietario= User::whereRaw('role_id=3')->lists('username','username');
        $estado= [ 1 => "contizacion ordinaria y anexo"]+[ 2 => "protafolio y propuesta"]+[ 3 => "primera llmada"]+[ 4 => "contizacion especifica"]+[ 5 => "segunda llamada"]+[ 6 => "negociacion"]+[ 7 => "contrato "];
        if(Input::get())
        {
            $inputs = $this->getInputs(Input::all());
            if($this->validateForms($inputs) === true)
            {
                $empre= new Prospecto($inputs);
                $empre->empresa=0;
                $empre->logo= "perfil.png";
                if($empre){
                    //$empre->logo=Input::file("logo")->getClientOriginalName();
                    if($empre->save())
                    {
                        //$file->move("empresa",$file->getClientOriginalName());
                        return Redirect::to('clientes/crearcontacto')->with(array('mensaje' => 'el cliente prospecto ha sido creada correctamente'));
                    }
                }else{
                    return Redirect::to('prospectos/crear')->with(array('mensaje' => 'nose pudo'));
                }

            }else
            {
                return Redirect::to('prospectos/crear')->withErrors($this->validateForms($inputs))->withInput();
            }
        }else
        {
            return View::make('prospectos.create', compact('propietario','estado'));
        }
	}
	    private function validateForms($inputs = array())
    {

        $rules = array(
            'nombre_empresa'        => 'required|min:1|max:255|unique:empresas|unique:prospectos',
            'nit'                   => 'numeric',
            'direccion'             => 'min:1|max:100',
            'tel'                   => 'numeric',
            'ext'                   => 'numeric',
            'correo'                => 'required|email|min:10|max:100|unique:empresas',
            'correo2'               => 'email|min:10|max:100|unique:empresas',
            'movil'                 => 'required|numeric',
            'pag_web'               => 'min:1|max:100|',
            'fax'                   => 'numeric|min:1|max:100',
            'fuente'                => 'min:1|max:100',
            'pais'                  => 'min:1|max:100',
            'ciudad'                => 'min:1|max:100',
            'maps'                  => 'min:1|max:100',
            'skype'                 => 'min:1|max:100'
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

     private function getInputs($inputs = array())
    {

        foreach($inputs as $key => $val)
        {
            $inputs[$key] = $val;
        }
        return $inputs;
    }
}