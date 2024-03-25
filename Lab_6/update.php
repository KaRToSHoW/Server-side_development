<?php
$db = require 'db.php';
$connect = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);
if (mysqli_connect_errno()) print_r(mysqli_connect_error());

// Обработка запроса на выбор записи
$selected_record_id = isset($_GET['id']) ? $_GET['id'] : null;

// Получение списка записей из базы данных, отсортированных по фамилии, затем по имени
$sql_select_all = "SELECT `id`, `firstname`, `lastname` FROM `friends` ORDER BY `lastname`, `firstname`";
$res = mysqli_query($connect, $sql_select_all);

// Отображение списка ссылок
echo "<div class='container mt-3'>";
while ($arr = mysqli_fetch_assoc($res)) {
    $selected_class = $selected_record_id == $arr['id'] ? 'selected' : '';
    echo '<a href="?p=update&id=' . $arr['id'] . '" class="' . $selected_class . '">' . $arr['firstname'] . ' ' . $arr['lastname'] . '</a><br>';
}
echo "</div>";

// Если выбрана запись, отобразить форму редактирования
if ($selected_record_id !== null) {
    if (isset($_POST['edit_submit'])) {
        $id = $selected_record_id; // используем ID выбранной записи
        $new_firstname = $_POST['edit_firstname'];
        $new_lastname = $_POST['edit_lastname'];

        $update_query = "UPDATE `friends` SET `firstname`='$new_firstname', `lastname`='$new_lastname' WHERE `id`='$id'";
        $result = mysqli_query($connect, $update_query);
        if ($result) {
            echo "Запись изменена";
        } else {
            echo "Ошибочка в изменении" . mysqli_error($connect);
        }
    }

    // Получение выбранной записи для отображения в форме
    $query = "SELECT * FROM friends WHERE id = $selected_record_id";
    $result = mysqli_query($connect, $query);
    $record = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    echo "<form action='' method='post' class='container mt-3'>";
    echo "<input type='hidden' name='edit_id' value='{$record['id']}'>";
    echo "<div class='form-group'>";
    echo "<label for='edit_firstname'>First Name:</label>";
    echo "<input type='text' name='edit_firstname' id='edit_firstname' value='{$record['firstname']}'><br>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo "<label for='edit_lastname'>Last Name:</label>";
    echo "<input type='text' name='edit_lastname' id='edit_lastname' value='{$record['lastname']}'><br>";
    echo "</div>";
    echo "<button type='submit' name='edit_submit' class='btn btn-primary mb-3'>Update</button>";
    echo "</form>";
    
}
?>
