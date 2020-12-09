<?php
require 'connection.php';
if(isset($_POST['reader']))
{
    $query="insert into login(name,email,phone,password,role) values('".$_POST['name']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['password']."','reader')";
    $result=  mysqli_query($con, $query);
    if($result)
    {
       ?>
<script>
alert('successfully registered');
windows.location.href="login1.php";
</script>
<?php
    }
 else {
        echo 'something went wrong';    
    }
}
else{
     $query="insert into login(name,email,phone,password,role) values('".$_POST['name']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['password']."','admin')";
    $result=  mysqli_query($con, $query);
    if($result)
    {
       ?>
<script>
alert('Admin successfully added');
window  .location.href="login1.php";
</script>
<?php
    }
 else {
        echo 'something went wrong';    
    }
}
?>