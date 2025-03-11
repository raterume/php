<?php
    require_once 'bd.php';


?>
<html>
    <head>
        <Link rel="stylesheet" href="style.css">
</head>
<body>

        <div><a href="empl.php" class="butt"><button class="btn btn-primary" style="height: 60px; width: 140px;">назад</button></a></div>
        
       
                    

    <div class="container">
        <table class= "table table-border" style="margin: 20px;">
    <thead>
        <tr>
            <th scope="col">фио</th>
            <th scope="col">возраст</th>
            <th scope="col">пол</th>
            <th scope="col">аддрес</th>
            <th scope="col">телефон</th>
            <th scope="col">паспорт</th>
            <th scope="col">должность</th>
        </tr>
    </thead>
<tbody>

<?php

if(isset($_GET['d'])){
    $d_id=$_GET['d'];}

    $sql="SELECT `empl`.`id`, `empl`.`fio`, `empl`.`age`, `empl`.`sex`, `empl`.`address`, `empl`.`phone`, `empl`.`pasport`, `empl`.`dolj`, `doljnost`.`name`
        FROM `empl` 
        JOIN `doljnost` ON `empl`.`dolj` = `doljnost`.`id`
        WHERE `empl`.`dolj`=".$d_id."";
    $result=mysqli_query($Link, $sql);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $fio=$row['fio'];
            $age=$row['age'];
            $sex=$row['sex'];
            $address=$row['address'];
            $phone=$row['phone'];
            $pasport=$row['pasport'];
            $dolj=$row['dolj'];
            $dolj_n=$row['name'];
        echo'<tr>
        <td scope="row">'.$fio.'</td>
        <td>'.$age.'</td>
        <td>'.$sex.'</td>
        <td>'.$address.'</td>
        <td>'.$phone.'</td>
        <td>'.$pasport.'</td>
        <td>'.$dolj_n.'</td>';
        }}
    ?>
    </tbody>
        </table>
        </button>
        </div>
        </body>
        </html>