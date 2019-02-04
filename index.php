<?php


require_once 'db.php';
try {
    $db = new DataBase();
} catch (Exception $e) {
}

try {
    $getAll = $db->getAll("SELECT card.id, card.name, card.category_id, category.id, category.name as category FROM card, category WHERE  card.category_id = category.id");
    foreach ($getAll as $row) {
        echo $row['id'] . "<br />\n";
        echo $row['name'] . "<br />\n";
        echo $row['category'] . "<br />\n";
    }
} catch (Exception $e) {
}




