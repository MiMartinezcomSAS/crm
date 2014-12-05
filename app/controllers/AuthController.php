<?php
use Illuminate\Auth\UserInterface;

class AuthController extends BaseController {

    public function showLogin()
    {
        // Verificamos que el usuario no esté autenticado
        if (Auth::check())
        {
            // Si está autenticado lo mandamos a la raíz donde estara el mensaje de bienvenida.
            return Redirect::to('/');
        }
        // Mostramos la vista login.blade.php (Recordemos que .blade.php se omite.)
        return View::make('login');
    }

    /**
     * Valida los datos del usuario.
     */
    public function postLogin()
    {

        $userdata = [
            'correo' => Input::get('correo'),
            'password' => Input::get('password')
        ];

        if (Auth::attempt($userdata, Input::get('remember-me', 0)))
        {
            // De ser datos válidos nos mandara a la bienvenida
            return Redirect::to('/');
        }
        // En caso de que la autenticación haya fallado manda un mensaje al formulario de login y también regresamos los valores enviados con withInput().
        return Redirect::to('login')
            ->with('mensaje_error', 'Tu correo o contraseña son incorrectos')
            ->withInput();
    }
    public function logOut()
    {
        Auth::logout();
        return Redirect::to('login')
            ->with('mensaje_error', 'Tu sesión ha sido cerrada.');
    }
}