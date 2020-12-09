<?php
require 'connection.php';

if(isset($_POST['edit']))
{
    session_start();
    $query="update blog set title='".$_POST['title']."',description='".$_POST['description']."' where bid='".$_POST['bid']."'";
    $result=  mysqli_query($con, $query);
    if($result)
    {
       ?>
<script>
alert("Blog edited successfully");
window.location.href="blog.php";
</script>
<?php
    }
 else {
        echo 'something went wrong';    
    }
}
else{
$target=$_FILES['image']['name'];
session_start();
$image=$_FILES['image']['name'];
$query="insert into blog(author,image,title,description,date) values('".$_POST['name']."','$image','".$_POST['title']."','".$_POST['description']."',CURRENT_DATE)";
$result=  mysqli_query($con, $query);
if(move_uploaded_file($_FILES['image']['tmp_name'], "image/".$target))
{
    ?>
<script>
alert('Post Uploaded Successfully');
window.location.href="add_post.php";
</script>
<?php
}
}

?>