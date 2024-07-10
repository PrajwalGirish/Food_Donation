<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" 
    integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="home.css">
    <title>Food Donation Webpage</title>
</head>
<body>
    <div class="nevbar" id="nevbar">
        <div class="logo">
            <a id="logo"><h1><span>Food</span> Donation Website</h1></a>
        </div>
        <div class="menu" id="menu">
            <ul>
                <li><a id="home" href="index.php">Home</a></li>
                
                
                <li><a href="#contact">Contact</a></li>
                

                <li><a href="logout.php">Logout</a></li>
             
            </ul>
        </div>
        <div class="menuicon">
            <i id="menuicon" onclick="togglemenu()" class="fas fa-chevron-circle-down"> <span>MENU</span></i>
        </div>
    </div>

    <div class="cover">

        <div class="information">
            <h1>-</h1>
            <h3>Raising Hope</h3>
            <h2>To help brighten a child's</h2>
            <h1> <span>FUTURE</span> </h1>
            
            <h1>-</h1>
            <a href="#explore"><button>EXPLORE</button></a>
            <a href="food.html"><button>AVAILABLE FOOD</button></a>
        </div>

    </div>

    <div class="explore" id="explore"></div>

    <div class="about">
        <div class="imgcontanner">
            <div class="aboutimg"></div>
        </div>
        <div class="aboutcontent">
            <h5>_</h5>
            <h1>Why Donate?</h1>
            <p>This pandemic has forced over 6 Million* children to drop off from school. Your contribution can help them reshape their lives by providing for their education.</p>
            <p>We help them get access to learning materials, internist connectivity, laptops, and smartphones to keep the learning alive!</p>
         
            <br>
            <br>
            <h5>_</h5>

        </div>
    </div>

    

    
    <!---------------------------- contact ------------------- -->
    
    <div class="contact" id="contact">
        <h1>CONTACT US</h1>
        <br>
        
            
            <div class="messageform">
                <div class="form">
                    <form action="" method="POST">
                        
                        <style>
                            ::placeholder {color: rgba(255, 255, 255, 0.7);}
                        </style>
    
                        <input type="text" name="name" placeholder="NAME" required>
                        <input type="email" name="email" placeholder="EMAIL" required>
                        <input type="text" name="subject" placeholder="SUBJECT" required>
                        <textarea type="message" name="message" id="inputbox"  cols="30" rows="5" placeholder="MESSAGE" required></textarea>
                        <button type="submit">SEND MESSAGE</button>
    
                    </form>
                </div>
            </div>

        </div>          
    </div>

   



    <!-- <div class="topspace"></div> -->
    <footer>
        <p>&copy 2023 <a href="http://aboutayush.c1.biz/" target="black"><strong> Food Donation Website</strong></a> | <a href="https://thesparksfoundationsingapore.org/" target="blank"></a></p>
    </footer>
    <!-- scripts  -->
    <script>
        // drop down menu script
        var menu = document.getElementById("menu");
        menu.style.maxHeight = "0px";
        function togglemenu() {
            if (menu.style.maxHeight == "0px") {
                menu.style.maxHeight = "390px";
            }
            else {
                menu.style.maxHeight = "0px";
            }
        }
    </script>

</body>
</html>