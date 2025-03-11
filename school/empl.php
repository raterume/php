<?php
    require_once 'bd.php';

    if(isset($_POST['submit'])){
        $r_id=$_POST['r_id'];
        if($r_id!=""){
        header("location:emplF.php? d=".$r_id." ");}
        else{echo' ';}
    }


?>
<html>
    <head>
        <Link rel="stylesheet" href="style.css">
</head>

<div style="margin-left: 210px; margin-bottom:20px;">
        <a href="main.php" class="butt"><button class="btn btn-primary" style=" height: 60px; width: 140px;">назад</button></a>
        
        <form method="POST" style="margin: 8px; margin-left:500px; width: 300px">   
            должность 
        <input name="r_id" style="width: 150px;" type="text" list="dolj">
                            <datalist id="dolj">
                                <?php
                            $sql1="SELECT `id`, `name` FROM `doljnost`";
                            $result=mysqli_query($Link, $sql1);
                            if($result){
                                while($row=mysqli_fetch_assoc($result)){
                                    $id=$row['id'];
                                    $bl=$row['name'];
                            echo'<option value='.$id.'>'.$bl.'</option>';}}?>
                            </datalist>
        <button type="submit" class="btn btn-primary" name="submit" style="width: 140px; height: 60px;">найти</button>
        </form></div>



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
    $sql="SELECT `empl`.`id`, `empl`.`fio`, `empl`.`age`, `empl`.`sex`, `empl`.`address`, `empl`.`phone`, `empl`.`pasport`, `empl`.`dolj`, `doljnost`.`name`
        FROM `empl` 
        JOIN `doljnost` ON `empl`.`dolj` = `doljnost`.`id`";
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