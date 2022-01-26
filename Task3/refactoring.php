<?php
class DB
{
    private static $db;

    public function __construct()
    {
        self::$db = new mysqli("localhost", "root", "root", "test");

        if (!self::$db) {
            throw new Exception('Database connection error.');
        }
    }

    public function __destruct() {
        mysqli_close(self::$db);
    }

    public static function query($sql)
    {
        return mysqli_query(self::$db, $sql);
    }
}

class Validator
{
    /**
     * Валидация id из строки
     *
     * @param string $ids
     * @return bool
     */
    public static function validateIds(string $ids): bool
    {
        if (strpos($ids, ',')) {
            foreach (explode(',', $ids) as $id) {
                if (!is_numeric($id)) {
                    return false;
                }
            }
        }

        return true;
    }
}

class Customer
{
    /**
     * Получение все пользователей
     *
     * @param string $string
     * @return array
     *
     * @throws Exception
     */
    public static function get(string $string): array
    {
        if (!Validator::validateIds($string)) {
            throw new Exception('Validation error.');
        }

        $data = [];

        $db = new DB();
        $query = $db::query("SELECT * FROM `customers` WHERE id IN ($string)");

        while ($obj = $query->fetch_object()) {
            $data[$obj->id] = $obj->name;
        }

        return $data;
    }
}

//пример строки которая приходит: http://www.site.com/?customer_ids=1,2,3,4,5

try {
    $_GET['customer_ids'] = "1,2,3,4,5";
    $customers = Customer::get($_GET['customer_ids']);

    foreach ($customers as $id => $name) {
        echo "<a href=\"/customer.php?id=$id\">$name</a>";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

