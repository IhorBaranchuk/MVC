<?php
/**
 * Created by PhpStorm.
 * User: vlastit
 * Date: 29.07.18
 * Time: 14:32
 */
include_once "ModelAbstract.php";

class Author extends ModelAbstract
{

    public function __construct($id)
    {
        static::$table = "author";
        static::$fields = ['fullname', 'birth'];
        static::$pk = "author_id";

        parent::__construct($id);

    }
}

$user = new Author(1);;
var_dump($user->get_user_by_field('Грегори Киз'));
$user->delete_user(21);
$user->update_user('Peter Parker','Анджей Сапковский');
