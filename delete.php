<?php
require 'connection.php';
?>
<script>
   var x=confirm("are you sure?");
    if(x)
    {
        
        <?php
        
$query="delete from blog where bid='".$_POST['bid']."'";
$result=  mysqli_query($con, $query);
if($result)
{
    header('location:index.php');
}
?>
        
    }
    else{
        header("location:blog.php");
    }
</script>
