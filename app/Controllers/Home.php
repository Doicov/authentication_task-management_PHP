<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('Home/index', [
            'title' => 'Главная страница проекта'
        ]);
    }

    public function lists(): string
    {
        return view('Home/lists', [
            'title' => 'Список задач'
        ]);
    }
}
