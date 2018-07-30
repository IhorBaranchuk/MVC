<?php
/**
 * Created by PhpStorm.
 * User: vlastit
 * Date: 29.07.18
 * Time: 14:28
 */

include_once "DB.php";

abstract class ModelAbstract
{

    public static $table;
    public static $fields;
    public static $pk;

    public function __construct($id)
    {
        var_dump($this->get_by_pk($id));
    }

    public function get_by_pk($id)
    {
        $query =
            "SELECT " . implode(self::$fields, ", ") .
            " FROM " . self::$table .
            " WHERE " . self::$pk . " = " . $id;

        $result = mysqli_query(DB::get_instance(), $query);

        return mysqli_fetch_all($result);
    }

    public function get_all_users()
    {
        $query =
            "SELECT " . implode(self::$fields, ", ") .
            " FROM " . self::$table;

        $result = mysqli_query(DB::get_instance(), $query);

        return mysqli_fetch_all($result);
    }

    public function get_user_by_field($name)
    {
        $query =
            "SELECT " . implode(self::$fields, ", ") .
            " FROM " . self::$table .
            " Where  " . self::$fields[0] . " = " . "'$name'";

        $result = mysqli_query(DB::get_instance(), $query);

        return mysqli_fetch_all($result);
    }

    public function delete_user($id)
    {
        $query =
            "DELETE " .
            " FROM " . self::$table .
            " Where  " . self::$pk . " = " . $id;

        $result = mysqli_query(DB::get_instance(), $query);

        return mysqli_fetch_all($result);

    }

    public function create_user($firstF, $secondF)
    {
        $query =
            "INSERT " .
            "INTO " . self::$table .
            "(" . implode(self::$fields, ", ") . ")" .
            " VALUES" . "(" . "'$firstF'" . ", " . "'$secondF'" . ")";

        $result = mysqli_query(DB::get_instance(), $query);

        return mysqli_fetch_all($result);
    }

    public function update_user($newF, $previousF)
    {

        $query =
            "UPDATE " . self::$table .
            " SET " . self::$fields[0] . " = " . "'$newF'" .
            " WHERE " . self::$fields[0] . " = " . "'$previousF'";

        $result = mysqli_query(DB::get_instance(), $query);

        return mysqli_fetch_all($result);
    }
}





