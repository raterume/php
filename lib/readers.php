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
            <th scope="col">чит билет</th>
            <th scope="col">ФИО</th>
            <th scope="col">аддрес</th>
            <th scope="col">телефон</th>
            <th scope="col"></th>
        </tr>
    </thead>
<tbody>

    <?php

if(isset($_GET['name'])){
    $user=$_GET['name'];}

    echo '<button class="btn btn-primary" style=" margin:8px; padding: 10px; color: #fff; background-color: #6b9d5c;"><a href="main.php? name='.$user.'" class="text-light">назад</a></button>';
    if($user == "библиотекарь"){echo '<button class="btn btn-danger" style=" margin:8px; padding: 10px; color: #fff; background-color: #6b9d5c;"><a href="add_reader.php? name='.$user.'" class="text-light" >Добавить</a></button>';}


    require_once 'bd.php';
    $sql="SELECT * from readers";
    $result=mysqli_query($Link, $sql);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['id_chitb'];
            $name=$row['fio'];
            $add=$row['addres'];
            $phon=$row['phone'];
        echo'<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$name.'</td>
        <td>'.$add.'</td>
        <td>'.$phon.'</td>';
        if($user == "библиотекарь"){echo'<td><button class="btn btn-danger" style=" margin:8px; padding: 10px; color: #fff; background-color: #6b9d5c;"><a href="drop_readers.php? deleteid='.$id.'& name='.$user.'" class="text-light">Удалить</a></button>
    </td>';}
        echo'</tr>';}}
    ?>
    </tbody>
        </table>
        </button>
        </div>
        </body>
        </html>