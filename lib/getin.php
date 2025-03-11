<?
    require_once 'bd.php';
?>
<html>
    <head>
        <Link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
</head>
<body>
    <div style="text-align: center; font-size: 40px">войти как</div>
    <div class="books" style="text-align: center;">
    <button class="btn btn-primary" style=" margin:8px; width: 200px; hight: 60px; color: #fff; background-color: #6b9d5c;"><a href="main.php? name=читатель" class="text-light" style="font-size: 25px">читатель</a></button>
</div><div class="readers" style="text-align: center;">
    <button class="btn btn-primary" style=" margin:8px; width: 200px; hight: 60px; color: #fff; background-color: #6b9d5c;"><a href="main.php? name=библиотекарь" class="text-light" style="font-size: 25px">библиотекарь</a></button>
</div><div class="stat" style="text-align: center;">
    <button class="btn btn-primary" style=" margin:8px; width: 200px; hight: 60px; color: #fff; background-color: #6b9d5c;"><a href="main.php? name=заведующий" class="text-light" style="font-size: 25px">зав. библтотеки</a></button>
</div>
<div style="text-align: center;"><img src="pic/books2.jpg"  width="200" height="200"/></div>