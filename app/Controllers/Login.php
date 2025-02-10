<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Login extends BaseController
{

    private $model;
    
    public function __construct()
    {  
       $this->model = new UsersModel();
    }
    
    public function loginForm()
    {
        return view('Login/login_form', [
            'title' => 'Страница авторизации'
        ]);
    }

    public function store()
    {
        $email = $this->request->getPost('email');
        $user = $this->model->where('email', $email)->first();

        if ($user === null) {
            return redirect()->back()
                            ->withInput()
                            ->with('errors', ['Пользователь не найден в базе данных.']);

        } else {
            $password = $this->request->getPost('password');
            if (password_verify($password, $user->password_hash)){
                $session = session();
                $session->regenerate();
                $session->set('user_id', $user->id);
                $session->set('user_name', $user->name);
                $session->set('user_email', $user->email);
                return redirect()->to('/')->with('success', 'Вы успещно авторизовались');
            } else {
                return redirect()->back()
                            ->withInput()
                            ->with('errors', ['Пароль не верный.']);

            }

        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy(); //уничтожаем сессию и все что в ней было

        return redirect()->to('/')->with('success', 'Вы успешно вышли с аккаунта.');
    }

}