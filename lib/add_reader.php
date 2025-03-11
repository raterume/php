<?php
require_once 'bd.php';
    if(isset($_GET['name'])){
        $user=$_GET['name'];}
        echo '<button class="btn btn-primary" style=" margin:8px; padding: 10px; color: #fff; background-color: #6b9d5c;"><a href="readers.php? name='.$user.'" class="text-light">назад</a></button>';

        if(isset($_POST['submit'])){
            $r_id=$_POST['name'];
            $b_id=$_POST['add'];
            $ph=$_POST['phon'];

        

        
            $sql= "INSERT INTO `readers`( `fio`, `addres`, `phone`) VALUES ('".$r_id."','".$b_id."','".$ph."')";
            $result= mysqli_query($Link, $sql);
            if ($result) {
                header('location:readers.php? name='.$user.'');
            }else{
                die(mysqli_error($Link));
            }
        }
        ?>
        
        <html>
            <head>
                <Link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        </head>
        <body><center>
            <form method="POST" style="margin: 30px; width: 300px">
            
            <p>ФИО:
            <input name="name" type="text" class="form-control" placeholder="ФИО эксперта" autocomplete="off" value=" "><br></p>
            <p>аддрес:
            <input name="add" type="text" class="form-control" placeholder="ФИО эксперта" autocomplete="off" value=" "><br></p>
            <p>телефон:
            <input name="phon" type="text" class="form-control" placeholder="ФИО эксперта" autocomplete="off" value=" "><br></p>
            <p><button type="submit" class="btn btn-primary" name="submit" style=" margin:8px; padding:10px; color: #fff; background-color: #6b9d5c;">Добавить</button></p>
                
        </form>
        </body>
        </html>