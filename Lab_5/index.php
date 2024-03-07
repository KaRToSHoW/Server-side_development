<?php
// $file = $_SERVER['DOCUMENT_ROOT'] . '/count.txt';
// $current_value = intval(file_get_contents($file));
// $current_value++;
// file_put_contents($file, $current_value);
// echo "Страница была обновлена $current_value раз.";
?>
<?php
// $file_path = $_SERVER['DOCUMENT_ROOT'] . '/test.txt';
// $text_to_write = '12345';
// $result = file_put_contents($file_path, $text_to_write);
// if ($result !== false) {
//     echo "Текст записан в файл.";
// } else {
//     echo "Ошибка при записи в файл.";
// }
?>
<?php
// $file_path = $_SERVER['DOCUMENT_ROOT'] . '/test.txt'; // Путь к файлу в корне сайта
// $number = intval(file_get_contents($file_path));
// $squared_number = $number * $number;
// $result = file_put_contents($file_path, $squared_number);
// if ($result !== false) {
//     echo "Число $number возведено в квадрат и записано обратно в файл.";
// } else {
//     echo "Ошибка при записи в файл.";
// }
?>
<?php
// $file_path = $_SERVER['DOCUMENT_ROOT'] . '/test.txt';
// $copy_path = $_SERVER['DOCUMENT_ROOT'] . '/copy.txt';
// $file_content = file_get_contents($file_path);
// $result = file_put_contents($copy_path, $file_content);
// if ($result !== false) {
//     echo "Файл успешно скопирован.";
// } else {
//     echo "Ошибка при копировании файла.";
// }
?>

<?php
$file_path = $_SERVER['DOCUMENT_ROOT'] . '/test.txt';
if (file_exists($file_path)) {
    if (unlink($file_path)) {
        echo "Файл test.txt успешно удален.";
    } else {
        echo "Ошибка при удалении файла test.txt.";
    }
} else {
    if (file_put_contents($file_path, '') !== false) {
        echo "Файл test.txt успешно создан.";
    } else {
        echo "Ошибка при создании файла test.txt.";
    }
}
?>



