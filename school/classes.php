<?php
    require_once 'bd.php';
    if(isset($_POST['submit'])){
        $r_id=$_POST['r_id'];
        $y_id=$_POST['y_id'];
        if($r_id!=""){
            if($y_id!=""){
        header("location:classesF.php? d=".$r_id." & y=".$y_id."");}
            else{header("location:classesF.php? d=".$r_id." & y=".$y_id."");}}
        else{if($y_id!=""){
            header("location:classesF.php? d=".$r_id." & y=".$y_id."");}
            else{echo' ';}}}
?>
<html>
    <head>
        <Link rel="stylesheet" href="style.css">
</head>
<body>
<div style="margin-left: 210px; margin-bottom:20px;">
        <a href="main.php" class="butt"><button class="btn btn-primary" style=" width: 140px; height: 60px;">назад</button></a>
        <form method="POST" style="margin: 8px; margin-left:400px; width: 300px">    
            вид
        <input name="r_id" style="width: 150px;" type="text" list="dolj">
                            <datalist id="dolj">
                                <?php
                            $sql1="SELECT `id`, `vname` FROM `vidu`";
                            $result=mysqli_query($Link, $sql1);
                            if($result){
                                while($row=mysqli_fetch_assoc($result)){
                                    $id=$row['id'];
                                    $bl=$row['vname'];
                            echo'<option value='.$id.'>'.$bl.'</option>';}}?>
                            </datalist>
                            год
         <input name="y_id" style="width: 150px;" type="text" list="year">
                            <datalist id="year">
                                <?php
                            $sql1="SELECT DISTINCT `yearosn` FROM `classes`";
                            $result=mysqli_query($Link, $sql1);
                            if($result){
                                while($row=mysqli_fetch_assoc($result)){
                                    $bl=$row['yearosn'];
                            echo'<option value='.$bl.'></option>';}}?>
                            </datalist>
        <button type="submit" class="btn btn-primary" name="submit" style="width: 140px; height: 60px;">найти</button>
        </form></div>

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
        

    $sql="SELECT  `classes`.`stcol`, `classes`.`letter`, `classes`.`yearst`, `classes`.`yearosn`,
            `empl`.`fio`, `vidu`.`vname`, `vidu`.`descript`
            FROM `classes` 
            JOIN empl on `classes`.`teach` = `empl`.`id`
            JOIN vidu on `classes`.`vid` = `vidu`.`id`";

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