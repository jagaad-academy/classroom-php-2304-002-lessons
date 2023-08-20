<?php

require_once "vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;
use HennadiiShvedko\Lesson4\model\Users;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'pdo_test',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

$capsule->bootEloquent();

$users = Capsule::table('users')->where('is_active', '=',0)->get();

var_dump($users);

Capsule::schema()->create('users_test', function ($table) {
    $table->increments('id');
    $table->string('email')->unique();
    $table->timestamps();
});


$users = Users::where('is_active', '=', 0)->get();

var_dump($users);
