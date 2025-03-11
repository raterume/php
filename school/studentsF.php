<?php
    require_once 'bd.php';
?>
<html>
    <head>
        <Link rel="stylesheet" href="style.css">
</head>
<body>
<div style="margin-left: 210px; margin-bottom:20px;">
        <a href="students.php" class="butt"><button class="btn btn-primary" style="width: 140px; height: 60px;">назад</button></a>
       </div>

    <div class="container">
        <table class= "table table-border" style="margin: 20px;">
    <thead>
        <tr>
            <th scope="col">класс</th>
            <th scope="col">фио</th>
            <th scope="col">дата рождения</th>
            <th scope="col">пол</th>
            <th scope="col">аддрес</th>
            <th scope="col">отец</th>
            <th scope="col">мать</th>
            <th scope="col">доп. информация</th>
        </tr>
    </thead>
<tbody>
<?php
if(isset($_GET['d'])){
    $d_id=$_GET['d'];}

    $sql="SELECT `students`.`fio`, `students`.`datebirth`, `students`.`sex`, `students`.`addres`, `students`.`dadfio`, `students`.`momfio`, `students`.`dopinfo`,
        `classes`.`letter`, `classes`.`yearosn`
        FROM `students` JOIN `classes` ON `students`.`classid` = `classes`.`id`
        WHERE `classes`.`id` = ".$d_id."";
    $result=mysqli_query($Link, $sql);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $class=$row['letter']; $year=$row['yearosn']; $year = 2025-$year;
            $fio=$row['fio'];
            $age=$row['datebirth'];
            $sex=$row['sex'];
            $address=$row['addres'];
            $dadfio=$row['dadfio'];
            $momfio=$row['momfio'];
            $dopinfo=$row['dopinfo'];
        echo'<tr>
        <td scope="row">'.$year.''.$class.'</td>
        <td>'.$fio.'</td>
        <td>'.$age.'</td>
        <td>'.$sex.'</td>
        <td>'.$address.'</td>
        <td>'.$dadfio.'</td>
        <td>'.$momfio.'</td>
        <td>'.$dopinfo.'</td>';
        }}
    ?>
    </tbody>
        </table>
        </button>
        </div>
        </body>
        </html>