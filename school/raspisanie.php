<?php
    require_once 'bd.php';
    if(isset($_POST['submit'])){
        $r_id=$_POST['r_id'];
        if($r_id!=""){
        header("location:raspisanieF.php? d=".$r_id." ");}
        else{echo' ';}
    }
?>
<html>
    <head>
        <Link rel="stylesheet" href="style.css">
</head>
<body>
<div style="margin-left: 210px; margin-bottom:20px;">
        <a href="main.php" class="butt"><button class="btn btn-primary" style=" width: 140px; height: 60px;">назад</button></a>
        <form method="POST" style="margin: 8px; margin-left:550px; width: 300px">  
            класс  
        <input name="r_id" style="width: 150px;" type="text" list="dolj">
                            <datalist id="dolj">
                                <?php
                            $sql0="SELECT `id`, `letter`, `yearst` FROM `classes`";
                            $result=mysqli_query($Link, $sql0);
                            if($result){
                                while($row=mysqli_fetch_assoc($result)){
                                    $id=$row['id']; 
                                    $letter=$row['letter'];
                                    $year=$row['yearst'];
                            echo'<option value='.$id.'>'.$year.''.$letter.'</option>';}}?>
                            </datalist>
        <button type="submit" class="btn btn-primary" name="submit" style="width: 140px; height: 60px;">найти</button>
        </form></div>




        <div id='dynamic' class="container">
        
<?php
    
    $sql="SELECT `id`, `letter`, `yearst` FROM `classes`";
    $result=mysqli_query($Link, $sql);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['id']; 
            $letter=$row['letter'];
            $year=$row['yearst'];
        echo'<table class= "table table-border" style="margin: 20px;">
                <thead><tr>
                        <th width="7%" scope="col">'.$year.''.$letter.'</th>
                        <th width="15%" scope="col">пн</th>
                        <th width="15%" scope="col">вт</th>
                        <th width="15%" scope="col">ср</th>
                        <th width="15%" scope="col">чт</th>
                        <th width="15%" scope="col">пт</th>
                        <th width="15%" scope="col">сб</th>
                    </tr></thead><tbody>';



                    $sql5="SELECT `day`, `dater` FROM `raspisanie` GROUP by `day` ORDER BY `raspisanie`.`dater` ASC";
                $resD=mysqli_query($Link, $sql5);
                if($resD){
                    echo'<tr>
                        <td scope="row"> </td>';
                    while($row=mysqli_fetch_assoc($resD)){
                        $d=$row['dater'];
                        echo'<td>'.$d.'</td>';}}
    
                $sql3="SELECT `raspisanie`.`dater`, `subjects`.`subname` 
                FROM `raspisanie` 
                JOIN `subjects` ON `raspisanie`.`subj` = `subjects`.`id` 
                WHERE `class`=".$id." AND `raspisanie`.`timenach`='8:30'";
                $res3=mysqli_query($Link, $sql3);
                if($res3){
                    echo'<tr>
                        <td scope="row">8:30-10:00</td>';
                    while($row=mysqli_fetch_assoc($res3)){
                        $subj=$row['subname'];
                        echo'<td>'.$subj.'</td>';}}
                $sql2="SELECT `raspisanie`.`dater`, `subjects`.`subname` 
                FROM `raspisanie` 
                JOIN `subjects` ON `raspisanie`.`subj` = `subjects`.`id` 
                WHERE `class`=".$id." AND `raspisanie`.`timenach`='10:10'";
                $res3=mysqli_query($Link, $sql2);
                if($res3){
                    echo'<tr>
                        <td scope="row">10:10-11:40</td>';
                    while($row=mysqli_fetch_assoc($res3)){
                        $subj=$row['subname'];
                        echo'<td>'.$subj.'</td>';}}
            $sql4="SELECT `raspisanie`.`dater`, `subjects`.`subname` 
                FROM `raspisanie` 
                JOIN `subjects` ON `raspisanie`.`subj` = `subjects`.`id` 
                WHERE `class`=".$id." AND `raspisanie`.`timenach`='12:10'";
                $res3=mysqli_query($Link, $sql4);
                if($res3){
                    echo'<tr>
                        <td scope="row">12:10-13:40</td>';
                    while($row=mysqli_fetch_assoc($res3)){
                        $subj=$row['subname'];
                        echo'<td>'.$subj.'</td>';}}
            }}

    ?>
    </tbody>
        </table>
        </button>
        </div>
        </body>
        </html>