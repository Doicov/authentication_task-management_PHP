<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStatusToUserTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('user', [
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'default' => 'new', //напирмер какой статус по умолчанию
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('user', 'status');
    }
}
