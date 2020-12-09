<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="styles/styles.css">
        <script src="https://kit.fontawesome.com/b1a6e9234b.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <style>
        h2{
            color: white;
          
            width: 100%;
            line-height: 450px;
            height: 70%;
            position: absolute;
            background: rgb(.8,0,0);
            opacity: 0.8;
        }
        .blog{
            margin-top: 5%;
        
        }
        input[type='text']{
            width: 30%;
            border:none;
            border-bottom: 2px solid;
            border-radius: 10px;
            font-size: 40px;
            outline: none;
            font-family: sans-serif;
            text-align: center;
        }
        
        
        label{
            margin-left: 10%;
        }
        a{
            text-decoration: none;
            list-style: none;
        }
    </style>
    <body>
        
        <div class="cover">
            <center><h2>ADD POST</h2></center>
        <img src="https://www.rd.com/wp-content/uploads/2019/11/shutterstock_509582812-e1574100998595.jpg" class="img-fluid"  alt="Responsive image" style="height: 70%;width: 100%"> 
        </div>
        <nav>
                    <ul>
                        <li class="toggle items"><button onclick="mytoggle()"><span class="bars"></span>
                        </button></li>
                        <li class="active activated" id="home"><a href="index.php" style="text-decoration:none">Home</a></li>
                        <li class="activated" id="contact"><a href="contact.html" style="text-decoration:none">Contact Us</a></li>
                        <li class="activated" id="about"><a href="about.php" style="text-decoration:none">About Us</a></li>
                       
                        <li class="login activated" id="login"><a  href="
                                <?php 
                                    if(isset($_SESSION['login_val']))
                                    {
                                        if($_SESSION['role']=='reader')
                                        {
                                        echo "logout.php";
                                        }
                                        else{
                                            echo 'signup.php';
                                        }
                                    }
                                    else{
                                        echo "signup.php";
                                    }
                                ?>" style="text-decoration:none">
                                <?php
                                        if(isset($_SESSION['login_val']))
                                        {
                                            if($_SESSION['role']=='reader')
                                            {
                                            echo "Logout";
                                            }
                                            else{
                                                echo 'Add Admin';
                                            }
                                        }
                                        else
                                        {
                                            echo "Login";
                                        }
                                ?>
                            </a>
                        </li>
                    </ul>
                </nav>
        <?php
        if(isset($_POST['edit']))
        {
            ?>
         <center>
        <div class="blog">
            <form action="add.php" method="post">
                <input type="text" name="bid" value="<?php echo $_POST['bid'] ?>"/>
                <p> <input type="text" name="title" value="<?php echo $_POST['title'] ?>" placeholder="Title"/></p>
        <p style="margin-left: -10%; margin-top: 2%"><label><span style="color: red">By</span>:<input type="text" value="<?php echo $_SESSION['login_val']; ?>" name="name" style="border:none;font-size: 15px"/></label>
            <label><?php echo $_POST['date'] ?></label>
        </p>
        <p><div class="input-group mb-3">

    
 
</div></p>
<hr style="width: 70%;background: #cccccc;margin-top: 5%;">
        <p> <div class="form-group">
            <h3 style="margin-top:5%">Blog</h3>
            <textarea name="description"  class="form-control" id="message-text" style="width: 50%;height: 100%;margin-top: 1%;">
                <?php echo $_POST['description'] ?>
            </textarea>
          </div></p>
          <p><button type="submit" name="edit" class="btn btn-primary" style="height: 50px">Update</button></p>
            </form>
        </div>
    </center>
        <?php
        }
 else {
     ?>
     <center>
        <div class="blog">
            <form action="add.php" method="post" enctype="multipart/form-data">
                <p> <input type="text" name="title" value="" placeholder="Title"/></p>
                <p style="margin-left: -14%; margin-top: 2%"><label><span style="color: red;margin-left: -10px">By</span>:<input type="text" value="<?php echo $_SESSION['login_val']; ?>" name="name" style="border:none;font-size: 15px"/></label>
            <label><?php echo date("d-m-y"); ?></label>
        </p>
        <p><div class="input-group mb-3">

      <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" >
    <label class="custom-file-label" for="inputGroupFile01"  style="width:30%;margin-left: 35%">Choose a cover image</label>
 
</div></p>
<hr style="width: 70%;background: #cccccc;margin-top: 5%;">
        <p> <div class="form-group">
            <h3 style="margin-top:5%">Write your Blog</h3>
            <textarea name="description" class="form-control" id="message-text" style="width: 50%;height: 100%;margin-top: 1%;"></textarea>
          </div></p>
          <p><button type="submit" name="post" class="btn btn-primary" style="height: 50px">Post</button></p>
            </form>
        </div>
    </center>
    <?php
 }
        ?>
   
    </body>
</html>
