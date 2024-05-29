
<html>
    <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.css">
        <style>
            * {
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
                }

                body { font-family: sans-serif; }

                .gallery {
                background: transparent !important;
                }

                .js-flickity{
                    background: transparent !important;

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

                @media(max-width=768px){
                    .galley-cell{
                        width:40%;
                        height:200px;

                    }
                    .gallery-cell img{
                    width:100%;
                    height:100%;
                    object-fit:cover;

                }
                }
        </style>
    </head>
    <body>

        <section>  
                        

                        <div>
                        <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true }'>
                    <?php
                    include 'dbconnect.php';
                    $res = mysqli_query($conn, "SELECT * FROM turfinfo");

                    while ($row = mysqli_fetch_assoc($res)) {
                        if (!empty($row['image'])) {
                    ?>
                            <div class="gallery-cell"><img src='<?php echo $row['image']; ?>' alt=""></div>
                    <?php
                        } else {
                    ?>
                            <p>No image available</p>
                    <?php
                        }
                    ;
                    } // Close the while loop
                    ?>
                </div>

                        
                    </body>
                    <script src="log.js"></script>
    </section>
    </body>
</html>