<?php

/**
 * @param string $customer_ids
 * @return array
 *
 * @throws Exception
 */
function get_customers(string $customer_ids): array
{
    if (!validateData($customer_ids)) {
        throw new Exception('Validation error.');
    }

    if (!$db = new mysqli("localhost", "root", "root", "test")) {
        throw new Exception('Database connection error.');
    }

    $data = [];

    $sql = "SELECT * FROM `customers` WHERE id IN (" . $customer_ids . ")";
    $query = mysqli_query($db, $sql);

    while ($obj = $query->fetch_object()) {
        $data[$obj->id] = $obj->name;
    }

    mysqli_close($db);

    return $data;
}

/**
 * @param string $data
 * @return bool
 */
function validateData(string $data): bool
{
    foreach (explode(',', $data) as $id) {
        if (is_numeric($id)) return true;
    }

    return false;
}

//пример строки которая приходит: http://www.site.com/?customer_ids=1,2,3,4,5

try {
    $data = get_customers($_GET['customer_ids']);

    foreach ($data as $customer_id => $customer_name) {
        echo "<a href=\"/customer.php?id=$customer_id\">$customer_name</a>";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

