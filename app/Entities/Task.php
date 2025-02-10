<?php 

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Task extends Entity
{
    protected $table = 'tasks';

    protected $primaryKey = 'id';

    protected $allowedFields = ['title', 'description', 'created_at'];
}