<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if(isset($_SESSION['role']))
        {
            if($_SESSION['role']=='admin')
            {
                ?>
        <form action="register.php" method="post"/>
        <p><input type="text" name="name" value="" placeholder="enter name"/></p>
 <p><input type="mail" name="email" value="" placeholder="enter mail"/></p>  
     <p><input type="text" name="phone" value="" placeholder="enter phone numeb"/></p>
       <p><input type="text" name="password" value="" placeholder="enter password"/></p>
        <p><input type="text" name="confrim" value="" placeholder="confrim password"/></p>
         <p><input type="submit" name="admin" value="add admin"/></p>
    </form>
                    <?php
            }
              if($_SESSION['role']=='reader')
              {
                  ?>
        <form action="register.php" method="post"/>
        <p><input type="text" name="name" value="" placeholder="enter name"/></p>
 <p><input type="mail" name="email" value="" placeholder="enter mail"/></p>  
     <p><input type="text" name="phone" value="" placeholder="enter phone numeb"/></p>
       <p><input type="text" name="password" value="" placeholder="enter password"/></p>
        <p><input type="text" name="confrim" value="" placeholder="confrim password"/></p>
         <p><input type="submit" name="reader" value="register"/></p>
    </form>
        <?php
              }
        }
        else{
        ?>
        <form action="register.php" method="post"/>
        <p><input type="text" name="name" value="" placeholder="enter name"/></p>
 <p><input type="mail" name="email" value="" placeholder="enter mail"/></p>  
     <p><input type="text" name="phone" value="" placeholder="enter phone numeb"/></p>
       <p><input type="text" name="password" value="" placeholder="enter password"/></p>
        <p><input type="text" name="confrim" value="" placeholder="confrim password"/></p>
         <p><input type="submit" name="reader" value="register"/></p>
    </form>
        <?php
        }
        ?>
    </body>
</html>
