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
    'password' => ''
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

$capsule->bootEloquent();

//$data = Capsule::table('authors')
//    ->join('authors_to_books', 'authors.author_id', '=', 'authors_to_books.author_id')
//    ->join('books', 'authors_to_books.book_id', '=', 'books.book_id')
//    ->select('authors.name', 'books.title')
//    ->get();
//
//$data = Capsule::select('SELECT authors.name, books.title
//                        FROM authors
//                        LEFT JOIN authors_to_books ON authors.author_id=authors_to_books.author_id
//                        LEFT JOIN books ON books.book_id=authors_to_books.book_id
//                        WHERE authors.name= ?', ["Jackson Wilderman Sr."]);
//
//var_dump($data);

//$users = Capsule::table('users')->where('is_active', '=',0)->get();

//var_dump($users);
//
Capsule::schema()->create('users_test', function ($table) {
    $table->increments('id');
    $table->string('email')->unique();
    $table->string('password', 100);
    $table->integer('is_active')->default('1');
    $table->timestamps();
});
//
//
//
//$users = Users::where('is_active', '=', 0)->get();
//
///**
// * @var $users[0] Users
// */
//var_dump($users[0]->email);
