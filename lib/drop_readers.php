<?php
require_once 'bd.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
if(isset($_GET['name'])){
    $user=$_GET['name'];}

    $sql="DELETE FROM `readers` WHERE `id_chitb` = $id;";
    $result=mysqli_query($Link,$sql);
        if($result){
            header('location:readers.php? name='.$user.'');
        }else{
            die(mysqli_error($Link));
        }
}
?>