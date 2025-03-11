<?php
    require_once 'bd.php';

    if(isset($_POST['submit'])){
        $r_id=$_POST['r_id'];
        if($r_id!=""){
        header("location:subjF.php? d=".$r_id." ");}
        else{echo' ';}
    }
?>
<html>
    <head>
        <Link rel="stylesheet" href="style.css">
</head>
<body>


<div style="margin-left: 210px; margin-bottom:20px;">
        <a href="main.php" class="butt"><button class="btn btn-primary" style="width: 140px; height: 60px;">назад</button></a>
        <form method="POST" style="margin: 8px; margin-left:500px; width: 300px">    
            преподаватель
        <input name="r_id" style="width: 150px;" type="text" list="dolj">
                            <datalist id="dolj">
                                <?php
                            $sql1="SELECT `id`, `fio` FROM `empl`";
                            $result=mysqli_query($Link, $sql1);
                            if($result){
                                while($row=mysqli_fetch_assoc($result)){
                                    $id=$row['id'];
                                    $bl=$row['fio'];
                            echo'<option value='.$id.'>'.$bl.'</option>';}}?>
                            </datalist>
        <button type="submit" class="btn btn-primary" name="submit" style="width: 140px; height: 60px;">найти</button>
        </form></div>


    <div class="container">
        <table class= "table table-border" style="margin: 20px;">
    <thead>
        <tr>
            <th scope="col">предмет</th>
            <th scope="col">преподаватель</th>
            <th scope="col">описание</th>
        </tr>
    </thead>
<tbody>
<?php

    $sql="SELECT `subjects`.`id`, `subjects`.`subname`, `subjects`.`descript`, `subjects`.`teach`,
            `empl`.`fio`
            FROM `subjects`
            JOIN `empl` on `subjects`.`teach`=`empl`.`id`";

    $result=mysqli_query($Link, $sql);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $pr=$row['subname']; 
            $teach=$row['fio'];
            $fio=$row['descript'];
        echo'<tr>
        <td scope="row">'.$pr.'</td>
        <td>'.$teach.'</td>
        <td>'.$fio.'</td>';
        }}
    ?>
    </tbody>
        </table>
        </button>
        </div>
        </body>
        </html>