<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="https://kit.fontawesome.com/32d93a9699.js" crossorigin="anonymous"></script>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        
        .navbar {
            z-index:2;
            /* height:100px; */
            background-color: green;
            color: #fff;
            position: relative;
            text-align: center;
            border-bottom:1px solid black;
        }


        .navbar-brand {
            z-index:2;

            font-size: 1.5em;
            font-weight: bold;
            color: orange;
            background: black;
            -webkit-background-clip: text;
            color: transparent;
            margin: 0;
        }

        .links {

            z-index:2;

            display: flex;
            align-items:flex-end;
            margin-left:auto;

        }

        .navbar-icons {
            z-index:2;
            /* margin-top:30px; */
            display: flex;
            margin-right: 10px;
            justify-content:center;
            align-items: center;
           

        }
        .navbar-icons a{
           padding:7px;
            
        }
            .navbar-icons a:nth-child(1){
            color:black;
            }
           .navbar-icons a:nth-child(2){
           color:black;}

           .navbar-icons a:nth-child(3){
           color:black;}

           .navbar-icons a:nth-child(4){
           color:black;}

           /* .navbar-icons .links a:nth-child(5){
            display:flex;} */

           .navbar-icons a:nth-child(5){
            display:none;}

            


        

        /* Responsive Styles */
        @media only screen and (max-width: 768px) {
            .links {
                z-index:2;
                display: none;
                flex-direction: column;
                position: absolute;
                top: 70px;
                right: 0;
                background:white;
                text-align: center;
                width:7%;
                gap:10px;
            }
             
            .links a{
                z-index:2;
                width:100%;
                border-left: 1px solid black;   /* Left border */
                border-top: 1px solid black;    /* Top border */
                border-right: none;
                border-bottom:1px solid black;
                border-radius:7px 0px 0px 7px; 

            }
            .links.active {
                z-index:2;
                display: flex;
                align-items:flex-end;
                justify-content:right;
            }

            

            .navbar-icon {
                z-index:2;

                display: flex;
                margin-top: 10px;
                
            }

    

            .navbar-icons a:nth-child(5){
                display:flex;
                    color:black;
                     align-self:flex-end;  
                     margin-left:auto; 
                     font-size: 10px ;
                     justify-content:center;
                    }

                    .navbar-icons .links a:nth-child(5)
                    {
                        margin-left:0;
                    }

                    .navbar-brand{
                        display:flex;
                        align-self:center;
                    }
        

                .navbar-icons a {
                    font-size: 10px; /* Further adjust font size for even smaller screens */
                }

                
                }     

        /* .invisible{
            
        }

        #visible{
            display:flex;
        }
     */
    </style>
</head>
<body>
<header>
    <div class="navbar">
        <!-- <div class="navbar-content"> -->
            <div class="navbar-brand">
                Find Turfs Near You......
            </div>
           
                <div class="navbar-icons">
                    <a class="fa-brands fa-instagram" style='font-size:24px'></a>
                    <a class="fa-brands fa-facebook-f" style='font-size:24px'></a>
                    <a class="fa-brands fa-square-twitter" style='font-size:24px'></a>
                    <a class="fa-brands fa-square-youtube" style='font-size:24px'></a>
                    <a class="fa-solid fa-bars" style='font-size:24px;margin-bottom:7px' onclick="toggleNavbar()"></a>
                    
                    <div class="links">
                    <a href="index.php" class="fa-solid fa-house" style='color:black; font-size:24px'></a>
                    <a href="aboutus.php" class="fa-solid fa-address-card" style='color:black ;font-size:24px'></a>
                    <a href="contactus" class="fa-solid fa-phone"style='color:black ;font-size:24px'></a>
                    
                    <?php if (session_status() == PHP_SESSION_ACTIVE){?>
                    <a href="Userinfo.php" class="fa-solid fa-user-slash" id="invis" style="color:black;font-size:24px;display:none;justify-content:center"></a>
                    
                    <a href="logout.php" class="fa-solid fa-right-from-bracket" id="invi" style='color:black;font-size:24px;display:none'></a>
                    </div>
                </div>
                    <?php }

                    else{ ?>
                        <a href="Userinfo.php" class="fa-solid fa-user" id="invis" style="color:black;font-size:24px;display:none;justify-content:center;pointer-event:none;"></a>
                    
                        <a href="logout.php" class="fa-solid fa-right-from-bracket" id="invi" style='color:black;font-size:24px;display:none;pointer-event:none;'></a>
                    <?php }?>
                <!-- <div class="navbar-links">
                   
                </div>  -->

           
    </div>
    </header>
<script>
    function toggleNavbar(event) {
        var navbarLinks = document.querySelector('.links');
        navbarLinks.classList.toggle('active');
        // event.stopPropagation();

    }

    document.addEventListener('click', function(event) {
        var navbarLinks = document.querySelector('.links');
        var navbarIcon = document.querySelector('.navbar-icon');

        if (!navbarLinks.contains(event.target) && !navbarIcon.contains(event.target)) {
            navbarLinks.classList.remove('active');
        }
    });
</script>


</body>
</html>
