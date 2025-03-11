<?php
    require_once 'bd.php';

    if(isset($_POST['submit'])){
        $r_id=$_POST['r_id'];
        if($r_id!=""){
        header("location:studentsF.php? d=".$r_id." ");}
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
    $sql="SELECT `students`.`fio`, `students`.`datebirth`, `students`.`sex`, `students`.`addres`, `students`.`dadfio`, `students`.`momfio`, `students`.`dopinfo`,
        `classes`.`letter`, `classes`.`yearosn`
        FROM `students` JOIN `classes` ON `students`.`classid` = `classes`.`id`";
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