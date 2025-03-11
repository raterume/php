<?php
    require_once 'bd.php';
?>
<html>
    <head>
        <Link rel="stylesheet" href="style.css">
</head>
<body>
<div style="margin-left: 210px; margin-bottom:20px;">
        <a href="classes.php" class="butt"><button class="btn btn-primary" style=" width: 140px; height: 60px;">назад</button></a>
        </div>

    <div class="container">
        <table class= "table table-border" style="margin: 20px;">
    <thead>
        <tr>
            <th scope="col">класс</th>
            <th scope="col">куратор</th>
            <th scope="col">кол-во учеников</th>
            <th scope="col">вид</th>
            <th scope="col">описание</th>
            <th scope="col">год основания</th>
        </tr>
    </thead>
<tbody>
<?php
        $d_id=" "; $y_id=" ";
        if(isset($_GET['d'])){
            $d_id=$_GET['d'];
            $y_id=$_GET['y'];
            $d=" ";$y=" ";$n=" ";
            if($d_id != " "){$d=" WHERE `classes`.`vid` =".$d_id." ";} 
            if($y_id != ""){$y=" WHERE `classes`.`yearosn` ='".$y_id."' ";}
            if($d_id != " " && $y_id != ""){$n="AND"; $y=" `classes`.`yearosn` ='".$y_id."' ";}
        }
        

    $sql="SELECT  `classes`.`stcol`, `classes`.`letter`, `classes`.`yearst`, `classes`.`yearosn`,
            `empl`.`fio`, `vidu`.`vname`, `vidu`.`descript`
            FROM `classes` 
            JOIN empl on `classes`.`teach` = `empl`.`id`
            JOIN vidu on `classes`.`vid` = `vidu`.`id` 
            ".$d." ".$n." ".$y."";

    $result=mysqli_query($Link, $sql);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $class=$row['letter']; 
            $year=$row['yearst'];
            $fio=$row['fio'];
            $colvo=$row['stcol'];
            $vid=$row['vname'];
            $desc=$row['descript'];
            $osn=$row['yearosn'];
        echo'<tr>
        <td scope="row">'.$year.''.$class.'</td>
        <td>'.$fio.'</td>
        <td>'.$colvo.'</td>
        <td>'.$vid.'</td>
        <td>'.$desc.'</td>
        <td>'.$osn.'</td>';
        }}
    ?>
    </tbody>
        </table>
        </button>
        </div>
        </body>
        </html>