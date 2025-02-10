<?php

namespace App\Controllers;

use App\Models\UsersModel;

class UserController extends BaseController
{

    private $model;
    
    public function __construct()
    {  
       $this->model = new UsersModel();
    }
    
    public function users()
    {
        $users = $this->model->findAll();
        
        return view('Users/index', [
            'title' => 'Зарегестрированные пользователи',
            'users' => $users,
        ]);
    }

    

}