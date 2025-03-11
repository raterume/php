<?php
$Link=mysqli_connect('localhost', 'root', '', 'school');
if(!$Link){
    echo 'Ошибка подключения к бд. Код ошибки: '. mysqli_connect_error(). 'ошибка: '. mysqli_connect_error();
    exit;
}
?>