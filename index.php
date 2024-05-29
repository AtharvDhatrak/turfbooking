
<html>
<head>
    <style>
        body {
            font-family: Sans-serif;
            background-color: black;
            margin: 0;
        }

        .flex1 {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            margin-top: auto;
            align-items: center;
            justify-content: flex-end;
        }

        .log,
        .signup,
        .search {
            display: flex;
            padding: 15px;
            width: 100%; /* Adjust the width for smaller screens */
            max-width: 200px; /* Set a maximum width for larger screens */
            height: 50px;
        }

        .log button,
        .signup button,
        .search button {
            width: 100%;
            border-radius: 8px;
            border: 2px solid white;
            background-color: black;
            color: white;
            font-weight: bold;
        }

        a {
            text-decoration: none;
        }

        @media (max-width: 768px) {
            body {
                width: 80%;
            }

            .log,
            .signup,
            .search {
                max-width: none; /* Remove the maximum width for smaller screens */
            }
        }
    </style>
</head>

<body>
    <div class="flex1">
        <h1 style="color:white;">Field Fiesta</h1>
        <a href="login.php" class='log'>  
            <button> Login</button>
        </a>

        <a href="signup.php" class='signup'>   
            <button>Create an account</button>
        </a> 
       
        <a href="Welcome.php" class='search' >  
            <button style="background-color:orange; color:black;">Search now</button>
        </a>
    </div>
</body>
</html>
