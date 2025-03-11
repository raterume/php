<?
    require_once 'bd.php';
?>
<html>
    <head>
        <Link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
</head>
<body>
    <div style="text-align: center; font-size: 40px">БИБЛИОТЕКА</div>

    <?php
    if(isset($_GET['name'])){
        $name=$_GET['name'];}
        echo '<div style="text-align: center; font-size: 30px">добро пожаловать, '.$name.'</div>';
    
   
    echo '<div class="books" style="text-align: center;">
    <button class="btn btn-primary" style=" margin:8px; width: 200px; hight: 60px; color: #fff; background-color: #6b9d5c;"><a href="books.php? name='.$name.'" class="text-light" style="font-size: 25px">книги</a></button>
</div><div class="readers" style="text-align: center;">
    <button class="btn btn-primary" style=" margin:8px; width: 200px; hight: 60px; color: #fff; background-color: #6b9d5c;"><a href="readers.php? name='.$name.'" class="text-light" style="font-size: 25px">читатели</a></button>
</div><div class="stat" style="text-align: center;">
    <button class="btn btn-primary" style=" margin:8px; width: 200px; hight: 60px; color: #fff; background-color: #6b9d5c;"><a href="stat.php? name='.$name.'" class="text-light" style="font-size: 25px">учет</a></button>
</div><div class="back" style="text-align: center;">
    <button class="btn btn-primary" style=" margin:8px; width: 200px; hight: 60px; color: #fff; background-color: #6b9d5c;"><a href="getin.php" class="text-light" style="font-size: 25px">выйти</a></button>
</div>';
?>

<div style="text-align: center;"><img src="pic/books.jpg"  width="260" height="190"/></div>

