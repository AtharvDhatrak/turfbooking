<?php
 
// if (!isset($_SESSION['name']))
// {
//     header("location:login.php");

// }
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST['submit'])){
include 'dbconnect.php';

// Check if the form fields are set before accessing them
$username = mysqli_real_escape_string($conn,$_POST['email']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$confirmpassword = mysqli_real_escape_string($conn,$_POST['confirmpassword']);
$name= mysqli_real_escape_string($conn,$_POST['username']);

$sql= "select * from loginform where email='$username' or username='$name'";
$res=mysqli_query($conn, $sql);
$usercount=mysqli_num_rows($res);


if($usercount==0){
    if ($password == $confirmpassword) {
        $hashpassword=password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO `loginform`(`email`, `username`, `password`) VALUES ('$username', '$name','$hashpassword')";

        $result = mysqli_query($conn, $sql);
        $entrycount=mysqli_num_rows($res);

        if($result){
            echo'<script> alert("Signup Successfull");
            window.location.href="login.php";

        </script>';

        }
    }
    else{
        echo'<script> alert("passwords do no match");
        window.location.href="signup.php";

        </script>';

    }
}

else{
    echo'<script> alert("Email or Username already used");
    window.location.href="login.php";

    </script>';
}


}
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
        <form action="signup.php" method="post">
        <div class="brand">Fiels Fiesta</div>


            <label>Email</label>
            <input type="text" name="email">

            <label>Username</label>
            <input type="text" name="username">

            <label>Password</label>
            <input type="password" name="password">

            <label>Confirm Password</label>
            <input type="password" name="confirmpassword">
            
            <input type="submit" value="Sign Up" name="submit">
        </form>
    </body>
</html>
