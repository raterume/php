<?
    require_once 'bd.php';
?>
<html>
    <head>
        <Link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <table class= "table table-border" style="margin: 20px;">
    <thead>
        <tr>
            <th scope="col">инв. номер</th>
            <th scope="col">чит. билет</th>
            <th scope="col">книга</th>
            <th scope="col">дата выдачи</th>
            <th scope="col">плановая дата возврата</th>
            <th scope="col">реальная дата возврата</th>
            <th scope="col"></th>
        </tr>
    </thead>
<tbody>  

    <?php

if(isset($_GET['name'])){
    $user=$_GET['name'];}

    echo '<button class="btn btn-primary" style=" margin:8px; padding: 10px; color: #fff; background-color: #6b9d5c;"><a href="main.php? name='.$user.'" class="text-light">назад</a></button>';
    if($user == "библиотекарь"){echo '<button class="btn btn-danger" style=" margin:8px; padding: 10px; color: #fff; background-color: #6b9d5c;"><a href="add_stat.php? name='.$user.'" class="text-light" >Добавить</a></button>';}
    echo '<button class="btn btn-danger" style=" margin:8px; padding: 10px; color: #fff; background-color: #6b9d5c;"><a href="statTaken.php? name='.$user.'" class="text-light">показать книги на руках</a></button>';

    require_once 'bd.php';
    $sql="SELECT `stat`.`id_stat`,`stat`.`id_chitb`, `stat`.`data_giv`, `stat`.`pl_data_ret`, `stat`.`real_date_ret`, `books`.`book_name`, `readers`.`fio` 
    FROM `stat` 
    join `books` on `stat`.`id_book` = `books`.`id_book` 
    join `readers` on `stat`.`id_chitb` = `readers`.`id_chitb`
     order by `stat`.`data_giv` desc";
    $result=mysqli_query($Link, $sql);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['id_stat'];
            $bl=$row['id_chitb'];
            $book=$row['book_name'];
            $giv=$row['data_giv'];
            $pl=$row['pl_data_ret'];
            $name=$row['fio'];
            $real=$row['real_date_ret']; if($real == "0000-00-00"){$real = "-";}
        echo'<tr>
        <th scope="row">'.$id.'</th>
        <td><a href="#" title="'.$name.'">'.$bl.'</a></td>
        <td>'.$book.'</td>
        <td>'.$giv.'</td>
        <td>'.$pl.'</td>
        <td>'.$real.'</td>';
        if($user == "библиотекарь"){
        echo'<td><button class="btn btn-primary" style=" margin:8px; padding: 10px; color: #fff; background-color: #6b9d5c;"><a href="update_stat.php? updateid='.$id.' & name='.$user.'" class="text-light">Изменить</a></button>
      <button class="btn btn-danger" style=" margin:8px; padding: 10px; color: #fff; background-color: #6b9d5c;"><a href="deleted.php? deleteid='.$id.' & name='.$user.'" class="text-light">Удалить</a></button>
    </td>';} '</tr>';}}
    ?>
    </tbody>
        </table>
        </button>
        </div>
        </body>
        </html>