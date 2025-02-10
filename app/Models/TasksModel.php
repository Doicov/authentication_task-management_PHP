<?php

namespace App\Models;

use App\Entities\Task;

class TasksModel extends \CodeIgniter\Model
{
    protected $table = 'tasks';

    protected $allowedFields = ['title', 'description', 'created_at'];

    protected $returnType = Task::class;

    protected $useTimestamps = true;

    protected $useEntity = true;

    protected $validationRules = [
        'title' => 'required|min_length[12]'
    ];

    protected $validationMessages = [
        'title' => [
            'required' => '66 Введите ваш Title 99',
            'min_length' => 'Ваш заголовок слшиком короткий'
        ]
        ];
}