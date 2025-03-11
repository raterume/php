<?php
require_once 'bd.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
if(isset($_GET['name'])){
    $user=$_GET['name'];}

    $sql="DELETE FROM `books` WHERE `id_book` = $id;";
    $result=mysqli_query($Link,$sql);
        if($result){
            header('location:books.php? name='.$user.'');
        }else{
            die(mysqli_error($Link));
        }
}
?>