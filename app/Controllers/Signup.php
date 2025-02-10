<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Signup extends BaseController
{

    private $model;

    public function __construct()
    {
        $this->model = new UsersModel();
    }




    public function new()
    {
        return view("Signup/new", [
            'title' => 'Регистрация',
        ]);
    }

    public function store()
    {
        $user = $this->request->getPost();

        if ($this->model->insert($user)) {
            return redirect()->to("/signup/success");
        } else {
            return redirect()->back()
                                ->with('errors', $this->model->errors())
                                ->with('warning', 'Invalid date')
                                ->withInput();
        }
    }

    public function success()
    {
        return view("Signup/success", [
            'title' => 'Вы успешно зарегестрировались как пользователь.',
            'description' => 'Вы успешно зарегестрировали новый аккаунт в нашей системе, вам за это бутылка вина!'
        ]);
    }
}