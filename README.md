# Тестовое задание для Malltech

## Задача 1.

Напишите код в парадигме ООП, прокомментируйте его в стиле PHPDoc. Не нужно писать код, который реализует конкретную функциональность. Необходима только общая структура методов и классов.
Сущности: авторы, книги. Связи: у каждой книги может быть только один автор, каждый автор может написать несколько книг Функционал: 
- создание статьи пользователем; 
- возможность узнать автора книги;
- получение всех книг автора; -
- изменение автора книги;

Если вы применили какие-либо паттерны при написании, то объясните, какие из них вы использовали и почему.

## Задача 2.

Имеются две таблицы

```
CREATE TABLE `customers` ( `id` INT(11) NOT NULL AUTO_INCREMENT, `customer_name` VARCHAR(255) DEFAULT NULL, `gender` INT(11) NOT NULL COMMENT '0 – пол не указан, 1 - юноша, 2 - девушка.', `birth_date` INT(11) NOT NULL COMMENT 'День рождения в Unix Time Stamp.', PRIMARY KEY (`id`) );

CREATE TABLE `books` ( `id` INT(11) NOT NULL AUTO_INCREMENT, `customer_id` INT(11) NOT NULL, `book_title` VARCHAR(255) DEFAULT NULL );
```

А. Оптимизируйте структуру таблиц

В. Напишите запрос, возвращающий имена и количества книг у юношей в возрасте от 15 до 20 лет


## Задача 3.

Проведите рефакторинг и исправьте ошибки в следующем коде. Прокомментируйте его в стиле PHPDoc. Таблица `customers` из предыдущей задачи. Дополнительно опишите какие уязвимости присутствуют, если таковые есть.
```
function get_customers($customer_ids) {

  $customer_ids = explode(',', $customer_ids);
  
  foreach ($customer_ids as $customer_id) {
    $db = mysqli_connect("localhost", "root", "password", "db_name");
    $sql = mysqli_query($db, "SELECT * FROM customers WHERE id=$customer_id");
    while($obj = $sql->fetch_object()){
      $data[$customer_id] = $obj->customer_name;
    }
    mysqli_close($db);
  }

  return $data;
}

//пример строки которая приходит: http://www.site.com/?customer_ids=1,2,3,4,5

$data = get_customers($_GET['customer_ids']);

foreach ($data as $customer_id => $customer_name) {
  echo "<a href=\"/customer.php?id=$customer_id\">$customer_name</a>";
}
```

## Задача 4.

Имеется строка:

http://www.site.com/example/my_code.html?param_1=5&param_2=20&param_3=10&param_4=30

Напишите функцию, которая:

- удалит параметр со значением “10”

- отсортирует параметры по значению в обратном порядке

- добавить параметр “url” со значением из переданной ссылки без параметров (в данном случае: /example/my_code.html)

- сформирует и вернет валидный url на корень указанного домена.

В итоге функция должна вернуть строку:

http://www.site.com/?param_4=30&param_2=20& param_1=5&url=%2Fexample%2Fmy_code.html
