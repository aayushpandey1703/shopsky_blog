<?php
    //session start
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['id_no']))
    {
        echo "<script> window.location.href = 'testing.php'; </script>";
    }
    $no_id = $_SESSION['id_no'];
$query="select*from blog where bid='".$_SESSION['id_no']."'";
$result=  mysqli_query($con, $query);
$row=  mysqli_fetch_assoc($result);
    if(isset($_SESSION['last_login_timestamp']))
    {
        $sessiontimeval = $_SESSION['last_login_timestamp'];
        if(time()-$sessiontimeval>30)
        {
            header('location:logout.php');
            die();
        }
    }

    //connection to database
 require 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BLOG | Page</title>
        <link rel="stylesheet" href="styles/styles.css">
        <script src="https://kit.fontawesome.com/b1a6e9234b.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        
    <!-- Navigation Section -->
    <nav>
        <ul>
            <li class="toggle items"><button id="button_toggle" onclick="mytoggle()"><span class="bars"></span>
                </button></li>
                <li class="active" id="home"><a href="index.php">Home</a></li>
            <li class="" id="contact"><a href="contact.html">Contact Us</a></li>
            <li class="" id="about"><a href="about.php">About Us</a></li>
              <?php
                        if(isset($_SESSION['role']))
                        {
                            if($_SESSION['role']=='admin')
                            {
                                ?>
                        <li class="activated" id="about"><a href="add_post.php">Add Post</a></li>
                        <?php
                            }
                        }
                        ?>
            <li class="login" id="login"><a href="
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
                                ?>">
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
            </a></li>
        </ul>
    </nav>
    <section class="all_blogs blog_section" style="margin: 5em 0 0;">
            <div class="total-div-container">
                <!-- Content Section -->
                <div class="content">
                    <h1><?= $row['title'] ?></h1>
                 
                    <img src="image/<?php echo $row['image'] ?>" width="100%" height="100%">
                    <h2><?php echo $row['author'] ?>, <?php echo substr($row['date'],0,4) ?></h2>
                    <p id="content_scroll"> 
                        <?php echo $row['description'] ?>
                    </p>
                </div>
                <!-- Like and Comment Section -->
                <div>
                    <button class="btn <?= $row['bid'] ?>" id="like-button"><i class="fas fa-thumbs-up" id="btn"></i></button><span id="value_like"><?= $row['likes'] ?> Likes</span>
                    <button class="btn">
                    <i class="fas fa-comments btn" id="btn"></i>
                    </button>
                    <span id="value_like"><?= $row['likes'] ?> coments</span>
                    <?php 
                    if(isset($_SESSION['role']))
                    {
                        if($_SESSION['role']=='admin')
                        {
                            ?>
                     <form action="add_post.php" method="post"/>
                      <button type="submit" name="edit" class="btn">
                          <input type="hidden" name="bid" value="<?php echo $_SESSION['id_no'] ?>"/>
                            <input type="hidden" name="title" value="<?php echo $row['title'] ?>"/>
                              <input type="hidden" name="description" value="<?php echo $row['description'] ?>"/>
                                <input type="hidden" name="author" value="<?php echo $row['author'] ?>"/>
                              <input type="hidden" name="date" value="<?php echo $row['date'] ?>"/>
                    <i class="fas fa-edit btn" id="btn"></i>
                    
                    </button>
                </form>
                    <?php
                        }
                    }
                    ?>
                   
                       <?php 
                    if(isset($_SESSION['role']))
                    {
                        if($_SESSION['role']=='admin')
                        {
                            ?>
                    <form action="delete.php" method="post"/>
                      <button type="submit" name="delete" class="btn">
                          <input type="hidden" name="bid" value="<?php echo $_SESSION['id_no'] ?>"/>
                         
                    <i class="fas fa-trash-alt btn" id="btn"></i>
                    
                    </button>
                </form>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div>
                    <h3>WRITTEN BY</h3>
                    <h2> - <?= $row['author'] ?></h2>
                </div>
            </div>
    </section>
    <!-- Footer Section -->
   
    <footer>
            <div class="footer-container">
                <div class="footer-nav">
                    <!-- Media Section -->
                    <div class="social-media">
                        <h3>Social-Media</h3>
                        <ul>
                            <li><a href="" target="blank">
                                <i class="fab fa-twitter"></i>
                                <span>Twitter</span>
                            </a></li>
                            <li><a href="" target="blank">
                                <i class="fab fa-facebook-f"></i><span>  Facebook</span>
                            </a></li>
                            <li><a href="" target="blank">
                                <i class="fab fa-instagram"></i><span> Instagram</span>
                            </a></li>
                            <li><a href="" target="blank">
                                <i class="fab fa-linkedin-in"></i><span> Linkedin</span>
                            </a></li>
                        </ul>
                    </div>
                    <!-- Navigation Section -->
                    <div class="footer-navigation">
                        <h3>Navigation</h3>
                        <ul>
                            <li><a href="testing.php">Home</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                            <li><a href="about.php">About Us</a></li>
                        </ul>
                    </div>
                    <!-- Contact Section -->
                    <div class="contact_me">
                        <h3>Contact</h3>
                        <ul>
                            <li><a href="">
                                <i class="fas fa-phone-alt"></i>
                                <span> 9999999999</span>
                            </a></li>
                            <li><a href="">
                                <i class="far fa-envelope"></i>
                                <span> xyz@gmail.com</span>
                            </a></li>
                        </ul>
                    </div>
                </div>
                <!-- Copyrights Section -->
                <div class="copyright">
                    Copyright © 2020 All rights reserved
                </div>
            </div>
    </footer>
    <script>
        $(document).ready(function(){
            $("nav ul li button").on('click',function(){
                    //alert("Button clicked");
                    if($("#home").hasClass("activated") && $("#contact").hasClass("activated") && $("#about").hasClass("activated") && $("#login").hasClass("activated"))
                    {
                        $("#home").removeClass("activated");
                        $("#contact").removeClass("activated");
                        $("#about").removeClass("activated");
                        $("#login").removeClass("activated");
                    }
                    else {
                        $("#home").addClass("activated");
                        $("#contact").addClass("activated");
                        $("#about").addClass("activated");
                        $("#login").addClass("activated");
                    }
            });
            $("#like-button").on('click',function(){
                /*var clsId = $(this).attr("class");
                var classArr = clsId.split(/\s+/);
                //alert(classArr[1]);
                $.ajax({
                    url : "like.php",
                    type : "POST",
                    data : { classid : classArr[1] },
                    success : function(data){
                        $("#value_like").html(data);
                    }
                });*/
                <?php
                    if(isset($_SESSION['login_val']))
                    {
                        //echo "<script>alert('Value cm');</script>";
                        echo "like_inc();";
                    }
                    else
                    {
                        echo "redirect_page();";
                    }
                ?>
            });
        });
        function like_inc(){
            var clsId = $("#like-button").attr("class");
            var classArr = clsId.split(/\s+/);
            $.ajax({
                    url : "like.php",
                    type : "POST",
                    data : { classid : classArr[1] },
                    success : function(data){
                        $("#value_like").html(data);
                    }
                });
        }
        function redirect_page(){
            window.location.href = "signup.php";
        }
    </script>
    <script type="text/javascript" src="js/index.js"></script>
    </body>
</html>