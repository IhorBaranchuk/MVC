<?php
/**
 * Created by PhpStorm.
 * User: vlastit
 * Date: 29.07.18
 * Time: 14:31
 */
include_once "ModelAbstract.php";

class Book extends ModelAbstract
{

    public function __construct($id)
    {
        static::$table = "book";
        static::$fields = ['title', 'year'];
        static::$pk = "book_id";

        parent::__construct($id);

    }
}

$book = new Book(4);
//var_dump($book->get_all_users());
var_dump($book->get_user_by_field('Игра престолов'));
//book->create_user('а',1982);
$book->delete_user(18);