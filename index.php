<?php


require_once 'db.php';
try {
    $db = new DataBase();
} catch (Exception $e) {
}

try {
    $getAll = $db->getAll("SELECT card.id, card.name, card.category_id, category.id, category.name as category FROM card, category WHERE  card.category_id = category.id");
} catch (Exception $e) {

}
?>

<?php foreach ($getAll as $row): ?>
    <table border="1">
        <tr>
            <td>
                <b>ID</b>
            </td>
            <td>
                <b>Name</b>
            </td>
            <td>
                <b>Category</b>
            </td>
        <tr>
            <td> <? echo $row['id'] ?> </td>
            <td> <? echo $row['name'] ?> </td>
            <td> <? echo $row['category'] ?> </td>
        </tr>
    </table>

<?php endforeach;

$db->disconnect();