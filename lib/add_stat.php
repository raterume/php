<?php
require_once 'bd.php';
    if(isset($_GET['name'])){
        $user=$_GET['name'];}
        echo '<button class="btn btn-primary" style=" margin:8px; padding: 10px; color: #fff; background-color: #6b9d5c;"><a href="stat.php? name='.$user.'" class="text-light">назад</a></button>';

        if(isset($_POST['submit'])){
            $r_id=$_POST['r_id'];
            $b_id=$_POST['b_id'];
            $date_giv=$_POST['date_giv'];
            $date_ret=$_POST['date_ret'];

            $res1=mysqli_query($Link, "SELECT COUNT(*) as cc from `stat` ");
            if($res1){
                while($row=mysqli_fetch_assoc($res1)){
                $id_stat=$row['cc']; }
                $id_stat = $id_stat + 1001;
            }

        
            $sql= "INSERT INTO `stat`(`id_stat`, `id_chitb`, `id_book`, `data_giv`, `pl_data_ret`, `real_date_ret`) VALUES ('".$id_stat."','".$r_id."','".$b_id."','".$date_giv."','".$date_ret."','0000-00-00')";
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
            <p><input name="r_id" style="width: 300px" type="text" list="options">
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
            <p><input name="b_id" style="width: 300px" type="text" list="options2">
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
                <input name="date_giv" type="date" class="form-control"  autocomplete="off" value=" "><br></p>
            <p>дата возврата:
                <input name="date_ret" type="date" class="form-control"  autocomplete="off" value=" "><br></p>



            <p><button type="submit" class="btn btn-primary" name="submit" style=" margin:8px; padding:10px; color: #fff; background-color: #6b9d5c;">Добавить</button></p>
                
        </form>
        </body>
        </html>