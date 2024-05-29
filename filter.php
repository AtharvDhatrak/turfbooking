<html>
<head>
<script src="https://kit.fontawesome.com/32d93a9699.js" crossorigin="anonymous"></script>
    <style>
        body,html{
            display: flex;
            justify-content: center;
            background-color: black;
        }

        .main{
            justify-content: center;
            align-self: center;
            background-color: black;
            flex-direction: row;
        }

        .row1{
            display: flex;
            
        }
        .row2{
            display: flex;
        }
        .row2 img,
        .row1 img{
            width: 150px; /* Increase width for images */
            height: 150px; /* Increase height for images */
            border: 15px solid grey;
            color: white;
            margin: 10px; /* Add margin for spacing */
            border-radius:15px;
            
        }
        .stars{
            margin-top:15x;
            display:flex;
            align-content:center;
            justify-content:center;
        }
        .stars i{
            margin:20px;
            color:white;
            font-size:30px;
            
        }
        .stars i:hover{
            color:white;
            color:orange;
            flex-wrap:wrap;
            overflow:hidden;

            
        }

        .button {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top:10px;
    
}

.button button {
    width: 50%;
    /* border-radius:15px; */
    background-color:grey;
    /* color:black; */
    height:40px;
    font-weight:bold;
}
.button2{
    display: flex;
    align-items: center;
    justify-content: center;
    margin:50px;
}
.button2 button{
    width: 50%;
    border-radius:15px;
    background-color:orange;
    color:black;
    height:40px;
    font-weight:bold;
}

    </style>
</head>
<body>
    <div class="main">
        <div class="row1">
            <i ><img src="images\football.png" alt="Football"></i>
            <i ><img src="images\basketball.png" alt="Basketball"></i>
        </div>
        <div class="row2">
            <i><img src="images\bats.png" alt="Cricket"></i>
            <i><img src="images\badminton.png" alt="Badminton"></i>
        </div>
        <div class="stars"> 
        <i class="fa-regular fa-star"></i>
        <i class="fa-regular fa-star"></i>
        <i class="fa-regular fa-star"></i>
        <i class="fa-regular fa-star"></i>
        <i class="fa-regular fa-star"></i>
        </div>
        <div class="button"> 
        <button>Pricing</button>
        </div>

        <div class="button2"> 
        <button>Done</button>
        </div>

    </div>
</body>
</html>
