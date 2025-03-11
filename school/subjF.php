<?php
    require_once 'bd.php';

?>
<html>
    <head>
        <Link rel="stylesheet" href="style.css">
</head>
<body>


<div style="margin-left: 210px; margin-bottom:20px;">
        <a href="subj.php" class="butt"><button class="btn btn-primary" style="width: 140px; height: 60px;">назад</button></a>
        </div>


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
if(isset($_GET['d'])){
    $d_id=$_GET['d'];}

    $sql="SELECT `subjects`.`id`, `subjects`.`subname`, `subjects`.`descript`, `subjects`.`teach`,
            `empl`.`fio`
            FROM `subjects`
            JOIN `empl` on `subjects`.`teach`=`empl`.`id`
            where `subjects`.`teach` = ".$d_id."";

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