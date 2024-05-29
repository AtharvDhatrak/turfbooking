<?php
if(isset($_POST['submit'])){
    include "dbconnect.php";
    $username = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    $sql = "SELECT * FROM loginform WHERE email='$username' OR username='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $num = mysqli_num_rows($result);

    if ($num != 0) {
        if (password_verify($password, $row["password"])) {
            session_start();
            $_SESSION['name'] = $row['username'];
            header("location: welcome.php");
            exit();
            // session_abort(); // Add exit to stop further execution
        } else {
            echo '<script>alert("Incorrect Password"); window.location.href="login.php";</script>';
        }
    } else {
        echo '<script>alert("User Not Found"); window.location.href="login.php";</script>';
    }
}
?>

// $error="";
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     include 'dbconnect.php';

//     // Check if the form fields are set before accessing them
//     $username = isset($_POST["email"]) ? $_POST["email"] : "";
//     $password = isset($_POST["password"]) ? $_POST["password"] : "";

//     $sql = "SELECT * FROM loginform where email='$username'AND password='$password'";
//     $result = mysqli_query($conn, $sql);

// }
?>





<html>
    <head>
        <style>
            body {
                font-family: Sans-serif;
                background-color: black;
                font-weight: bold;
                margin: 0; /* Remove default margin to ensure full width and height */
            }

            form {
                width: 100%;
                height: 100%;
                display: flex;
                flex-direction: column;
                margin-top: auto;
                align-items: center;
                justify-content: center;
            }

            form label {
                color: white;
                align-self: center;
                margin-bottom: 5px;
            }

            input {
                padding: 10px;
                margin: 10px;
                background-color: black;
                border: 2px solid white;
                border-radius: 10px;
                color: white;
            }

            input[type="submit"] {
                background-color: orange;
                color: black;
                font-weight: bold;
            }

            .brand{
                font-size:50px;
                display:flex;
                align-items: center;
                justify-content: center;
                color:white;
                align-self:center;
                margin:40px;
            }

            @media (max-width: 768px) {
                body {
                    width: 80%;
                }

                form label {
                    align-self: center;
                }

                input[type="submit"] {
                    width: 100%;
                }
            }
        </style>
    </head>
    <body>

        <form action="login.php" method="post">
        <div class="brand">Fiels Fiesta</div>

            <label>Email/Username</label>
            <input type="text" name="email">

            

            <label>Password</label>
            <input type="password" name="password">

            
            
            <input type="submit" value="Log In" name="submit">
        </form>
    </body>
</html>
