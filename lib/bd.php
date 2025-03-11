<?php
$Link=mysqli_connect('localhost', 'root', '', 'library');
if(!$Link){
    echo 'Ошибка подключения к бд. Код ошибки: '. mysqli_connect_error(). 'ошибка: '. mysqli_connect_error();
    exit;
}
?>