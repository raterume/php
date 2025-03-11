<?php
require_once 'bd.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
if(isset($_GET['name'])){
    $user=$_GET['name'];}

    $sql="DELETE FROM `stat` WHERE `id_stat` = $id;";
    $result=mysqli_query($Link,$sql);
        if($result){
            header('location:stat.php? name='.$user.'');
        }else{
            die(mysqli_error($Link));
        }
}
?>