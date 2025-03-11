<?php
require_once 'bd.php';
    if(isset($_GET['name'])){
        $user=$_GET['name'];}
    if(isset($_GET['updateid'])){
        $up_id=$_GET['updateid'];}
        echo '<button class="btn btn-primary" style=" margin:8px; padding: 10px; color: #fff; background-color: #6b9d5c;"><a href="stat.php? name='.$user.'" class="text-light">назад</a></button>';

        $sql1="SELECT * FROM `stat` where id_stat='$up_id'";
        $res1= mysqli_query($Link,$sql1);
        $row = mysqli_fetch_assoc($res1);
            $bl=$row['id_chitb'];
            $book=$row['id_book'];
            $giv=$row['data_giv'];
            $pl=$row['pl_data_ret'];
            $real=$row['real_date_ret'];

        if(isset($_POST['submit'])){
            $r_id=$_POST['r_id'];
            $b_id=$_POST['b_id'];
            $date_giv=$_POST['date_giv'];
            $date_ret=$_POST['date_ret'];
            $real=$_POST['date_rel'];
            $sql= "UPDATE `stat` SET `id_chitb`='".$bl."',`id_book`='".$book."',`data_giv`='".$giv."',`pl_data_ret`='".$pl."',`real_date_ret`='".$real."' WHERE `id_stat`='".$up_id."'";
            $result= mysqli_query($Link, $sql);
            if ($result) {
                header('location:stat.php? name='.$user.'');
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
            
                <p>чит. билет:</p>
            <p><input name="r_id" style="width: 300px" type="text" list="options" value="<?php echo $bl?>">
                            <datalist id="options">
                                <?php
                            $sql="SELECT * FROM `readers`";
                            $result=mysqli_query($Link, $sql);
                            if($result){
                                while($row=mysqli_fetch_assoc($result)){
                                    $id=$row['id_chitb'];
                                    $bl=$row['fio'];
                            echo'<option value='.$id.'>'.$bl.'</option>';}}?>
                            </datalist></p>

            <p>книга:</p>
            <p><input name="b_id" style="width: 300px" type="text" list="options2" value="<?php echo $book?>">
                            <datalist id="options2">
                                <?php
                            $sql2="SELECT * FROM `books`";
                            $result2=mysqli_query($Link, $sql2);
                            if($result2){
                                while($row=mysqli_fetch_assoc($result2)){
                                    $id2=$row['id_book'];
                                    $bl2=$row['book_name'];
                            echo'<option value='.$id2.'>'.$bl2.'</option>';}}?>
                            </datalist></p>
                            

            <p>дата выдачи:
                <input name="date_giv" type="date" class="form-control"  autocomplete="off" value="<?php echo $giv?>"><br></p>
            <p>дата возврата:
                <input name="date_ret" type="date" class="form-control"  autocomplete="off" value="<?php echo $pl?>"><br></p>
            <p>реальная дата возврата:
                <input name="date_rel" type="date" class="form-control"  autocomplete="off" value="<?php echo $real?>"><br></p>



            <p><button type="submit" class="btn btn-primary" name="submit" style=" margin:8px; padding:10px; color: #fff; background-color: #6b9d5c;">изменить</button></p>
                
        </form>
        </body>
        </html>