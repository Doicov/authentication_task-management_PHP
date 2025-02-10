<?php

namespace App\Models;

use App\Entities\User;

class UsersModel extends \CodeIgniter\Model
{
    protected $table = 'user';

    protected $useTimestamps = true;

    protected $allowedFields = ['name', 'email', 'password', 'status'];

    protected $returnType = User::class;

    protected $beforeInsert = ['hashPassword'];

    protected $validationRules = [
        'name' => 'required|min_length[3]',
        'email' => 'required|valid_email|is_unique[user.email]',
        'password' => 'required|min_length[5]',
        'password_confirmation' => 'required|matches[password]'
    ];

    protected $validationMessages = [
        'name' => [
            'required' => 'Поле имя должно быть внесено!',
            'min_length' => 'Минимальная длина имени 3 символа'
        ],
        'email' => [
            'required' => 'Поле email должно быть внесено!',
            'valid_email' => 'Ваш адрес не похож на электронную почту',
            'is_unique' => 'Указанный Email уже существует'
        ],
        'password' => [
            'required' => 'Поле пароль должно быть внесено!',
            'min_lenght' => 'Минимальная длина пароля 5 символов'
        ],
        'password_confirmation' => [
            'required' => 'Поле повторите пароль должно быть внесено',
            'matches' => 'Пароли не совпадают'
        ]
    ];


    protected function hashPassword($data)    
    {
        if (isset($data['data']['password'])){
            $data['data']['password_hash'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
            unset($data['data']['password']);
        }

        return $data;
    }
}