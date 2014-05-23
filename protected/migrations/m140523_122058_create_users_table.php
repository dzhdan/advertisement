<?php
use db\DbMigration;

class m140523_122058_create_users_table extends DbMigration
{
    public function up()
    {

        $this->createTable('users', [
            'id' => 'int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT',
            'name' =>"varchar(255) DEFAULT NULL",
            'email' =>"varchar(255) DEFAULT NULL",
            'password' =>"varchar(255) DEFAULT NULL",
            'role' =>"varchar(255) DEFAULT NULL",
            'last_activity' => 'int(10) DEFAULT NULL',
            'activation_status' => "int(1) DEFAULT NULL",
            'activation_key'  => "varchar(255) DEFAULT NULL",
            'deleted' => 'int(1) DEFAULT NULL',
        ]);

        $this->insert('users',
            ['id'=>'1',
            'name' => 'dzhdan',
                'email' => 'sekret47@gmail.com',
                'password'=>'111',
                'role'=>Users::ROLE_ADMIN,
                'last_activity' =>time(),
                'activation_status' =>Users::DEFAULT_ACTIVATION_STATUS,
                'activation_key'  => 'sdfsdfsdfsdfsdg',
                'deleted'=> null,
            ]);

        $this->insert('users',
            ['id'=>'2',
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password'=>'user',
                'role'=>Users::ROLE_USER,
                'last_activity' => time(),
                'activation_status' => Users::DEFAULT_ACTIVATION_STATUS,
                'activation_key'  => 'sdfsdf45ysdfsdfsdg',
                'deleted'=> null,
            ]);

        $this->insert('users',
            ['id'=>'3',
                'name' => 'user2',
                'email' => 'user2@gmail.com',
                'password'=>'user2',
                'role'=>Users::ROLE_USER,
                'last_activity' => time(),
                'activation_status' => Users::DEFAULT_ACTIVATION_STATUS,
                'activation_key'  => 'sdfsdfsdfs5r657dfsdg',
                'deleted'=> null,
            ]);

    }

    public function down()
    {
        $this->dropTable('users');
    }

}