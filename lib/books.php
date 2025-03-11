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
            <th scope="col">номер</th>
            <th scope="col">название</th>
            <th scope="col">автор</th>
            <th scope="col">кол-во прочтений</th>
            <th scope="col"></th>
        </tr>
    </thead>
<tbody>
<?php
    require_once 'bd.php';
    if(isset($_GET['name'])){
        $user=$_GET['name'];}

        echo '<button class="btn btn-primary" style=" margin:8px; padding: 10px; color: #fff; background-color: #6b9d5c;"><a href="main.php? name='.$user.'" class="text-light">назад</a></button>';
        

    $sql="SELECT `books`.`id_book`, `book_name`, `book_author`, COUNT(`stat`.`id_book`) as cc
FROM `books` 
left join `stat` on `stat`.`id_book` = `books`.`id_book`
group by `books`.`id_book`
order by `cc` desc";
    $result=mysqli_query($Link, $sql);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['id_book'];
            $name=$row['book_name'];
            $author=$row['book_author'];
            $colvo=$row['cc'];
        echo'<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$name.'</td>
        <td>'.$author.'</td>
        <td>'.$colvo.'</td>';
        if($user == "заведующий"){echo '<td><button class="btn btn-danger" style=" margin:8px; padding: 10px; color: #fff; background-color: #6b9d5c;"><a href="deleted.php? deleteid='.$id.' & name='.$user.'" class="text-light">Удалить</a></button>
    </td>';}
         echo'</tr>';}}
    ?>
    </tbody>
        </table>
        </button>
        </div>
        </body>
        </html>