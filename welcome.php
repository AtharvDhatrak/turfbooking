
<html>
    <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.css">
    <script src="https://kit.fontawesome.com/32d93a9699.js" crossorigin="anonymous"></script>
        <style>
                    
                    
                * {
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
                }

                body { font-family: sans-serif; 
                background-color:black;}

                .gallery {
                background: transparent;
                }

                

                .gallery-cell {
                width: 30%;
                height: 400px;
                margin-right: 10px;
                background: transparent;
                /* counter-increment: gallery-cell; */
                    border-radius:20px;
                    justify-content:center;
                    align-items:center;
                    overflow:hidden;
                    margin:20px;

                }

                .gallery-cell img{
                    width:100%;
                    height:100%;
                    object-fit:cover;

                }
                /* cell number */
                .gallery-cell:before {
                display: block;
                text-align: center;
                /* content: counter(gallery-cell); */
                line-height: 200px;
                font-size: 80px;
                color: white;
                background:transparent;
                }
                
                .image {
                        width: 100%;
                        height: 90%; /* Adjusted to 70% to allow space for the name */
                        overflow:hidden;
                    }

                    .image img{
                        overflow:hidden;
                        object-fit:cover;

                    }

                    .name {
                        color:white;
                        background-color: black;
                        width: 100%;
                        height: 10%; /* Adjusted to 30% */
                        border:2px solid white;
                        border-radius:0px 0px 20px 20px;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        font-family:bold;

                    }
                

                    form{
                        display:flex;
                        justify-content:center;
                        align-items:center;
                        margin:10px;
                        /* margin-left:auto; */
                    }
                    input {
                        align-self:center;
                        background-color:black;
                        border:3px solid white;
                        border-radius:10px;
                        width:80%;
                        height:40px;
                    }
                    button{
                        background-color:orange;
                        height:40px;
                        border-radius:10px;
                        margin:5px;
                        color:white;
                        width:8%;
                        overflow:hidden;
                        /* margin-bottom:50px; */
                        border:3px solid white;

                    }
                    button i{
                        color:black;
                        font-size:20px;

                    }

                    input::placeholder{
                        color:white;
                        /* font-family:bold; */
                    }

                    form a{
                        color:white;
                        font-size:30px;
                        margin-left:auto;
                        align-self:center;
                        /* margin-bottom:50px; */

                    }

                    section{
                        margin:60px;
                    }

                    .text{
                        color:white;
                        font-weight:bold;
                        display:flex;
                        margin-left:50px;
                    }
                    #search{
                        margin-bottom:50px;
                    }
                    
                    @media(max-width:768px){
                    
                        
                        .gallery-cell {
                            width: 40%; /* Adjust the width for smaller screens */
                            height: 150px; /* Adjust the height for smaller screens */
                            border-radius:0px 0px 20px 20px;

                        }
                        
                       
                
                    input {
                        width: 60%; /* Take up the full width on smaller screens */
                    }

                    button {
                        width: 10%; /* Take up the full width on smaller screens */
                        color:transparent;
                    }

                    button i{
                        align-self:center;;
                    }

                    form a{
                        margin-left:none;
                    }

                
                
                    }        
                    
        </style>
    </head>
    <body>
    <?php include 'nav.php' ?>

        <section>  
                <div class="seach">
                    <form action="search.php" method="post">
                        <input type="search" placeholder="Search for turfs and location"></input>
                        <button type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
                        <a href="filter.php" class="fa-solid fa-filter"></a>
                        <a href ="addturf.php" class="fa-solid fa-plus"></a>
                    </form>
                </div>

        <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true }'>


                    <?php
                    include 'dbconnect.php';
                    $res = mysqli_query($conn, "SELECT * FROM turfinfo");

                    while ($row = mysqli_fetch_assoc($res)) {
                        if (!empty($row['image'])) {
                    ?>
                            <div class="gallery-cell">
                            <div class="image">
                             <a href="viewturf.php"><img src='<?php echo $row['image']; ?>' alt=""> </a>
                             </div>

                             <div class="name">
                                <?php echo $row['name'] ;?>
                        
                             </div>
                            </div>
                    <?php
                        } else {
                    ?>
                            <p>No image available</p>
                    <?php
                        }
                    
                    } // Close the while loop
                    ?>
        </section>  
        
        
        <div class="text">Top rated</div>
        <section>  
        <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true }'>
                    <?php
                    include 'dbconnect.php';
                    $res = mysqli_query($conn, "SELECT * FROM turfinfo");

                    while ($row = mysqli_fetch_assoc($res)) {
                        if (!empty($row['image'])) {
                    ?>
                            <div class="gallery-cell">
                            <div class="image">
                             <a href="viewturf.php"><img src='<?php echo $row['image']; ?>' alt=""> </a>
                             </div>

                             <div class="name">
                                <?php echo $row['name'] ;?>
                        
                             </div>
                            </div>
                    <?php
                        } else {
                    ?>
                            <p>No image available</p>
                    <?php
                        }
                    
                    } // Close the while loop
                    ?>
        </section> 


        <div class="text">Recently visited</div>

        <section>  
        <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true }'>
                    <?php
                    include 'dbconnect.php';
                    $res = mysqli_query($conn, "SELECT * FROM turfinfo");

                    while ($row = mysqli_fetch_assoc($res)) {
                        if (!empty($row['image'])) {
                    ?>
                            <div class="gallery-cell">
                            <div class="image">
                             <a href="viewturf.php"><img src='<?php echo $row['image']; ?>' alt=""> </a>
                             </div>

                             <div class="name">
                                <?php echo $row['name'] ;?>
                        
                             </div>
                            </div>
                    <?php
                        } else {
                    ?>
                            <p>No image available</p>
                    <?php
                        }
                    
                    } // Close the while loop
                    ?>            
                
    <script src="log.js"></script>

    </body>
</html>