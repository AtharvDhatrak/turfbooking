<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            background-color: black !important;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;
            background-color: white;
        }

        .title {
            color: grey;
            font-size: 18px;
        }

        button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: black;
            background-color: orange;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        a {
            text-decoration: none;
            font-size: 22px;
            color: black;
        }

        button:hover, a:hover {
            opacity: 0.7;
        }

        #formsection {
            color: black;
        }

        .imagevisible {
            display: flex;
        }

        .imageinvisible {
            display: none;
        }

        section {
            margin-bottom: 50px;
        }
    </style>
</head>
<body>
<?php
session_start();

// Check if the session is not started
if (!isset($_SESSION['name'])) {
    echo "<p style='color: white; text-align: center;'>Please login first</p>";
    // You can optionally provide a login link or redirect the user to the login page
    // echo "<p style='color: white; text-align: center;'><a href='login.php'>Login</a></p>";
    exit(); // Exit the script if the session is not started
}
?>
<section id='navsec'>
    <?php include 'nav.php' ?>
</section>
<section>
    <div class="card">
        <?php
        include "dbconnect.php";
        $username = $_SESSION['name'];
        $getImageQuery = "SELECT image FROM loginform WHERE username = '$username'";
        $result = $conn->query($getImageQuery);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $imageSrc = "data:image/jpeg;base64," . base64_encode($row['image']);
            ?>
            <a onclick="changevisible()">
                <img src="<?php echo $imageSrc; ?>" alt="image not provided" style="width:100%">
            </a>

            <h1><?php echo $username; ?></h1>
            <?php
        } elseif ($result->num_rows == 0) {
            $imageSrc = "images/profile.png";
            echo '<p style="color: white; text-align: center;">Default image used</p>';
            // Redirect to userinfo.php or provide appropriate handling
            header("location:userinfo.php");
            exit();
        }
        ?>
        <?php
        $emailQuery = "SELECT email FROM loginform WHERE username = '$username'";
        $result2 = $conn->query($emailQuery);

        if ($result2) {
            if ($result2->num_rows > 0) {
                $row2 = $result2->fetch_assoc();
                $email = $row2['email'];
                ?>
                <p><?php echo $email; ?></p>
                <p><button>View Saved Turfs</button></p>

                <section>
                    <div id="formsection" class='imageinvisible'>
                        <?php include 'addimage.php' ?>
                    </div>
                </section>
                <?php
            } else {
                echo "<p style='color: white; text-align: center;'>No email found for the user.</p>";
            }
        } else {
            echo "<p style='color: white; text-align: center;'>Error in the query: " . $conn->error . "</p>";
        }
        ?>
    </div>

    <?php
    $conn->close();
    ?>
</section>
<script>
    function changevisible() {
        var get = document.getElementById("formsection");
        get.classList.remove("imageinvisible");
        get.classList.add("imagevisible");
    }

    function buttonswap() {
        var get = document.getElementById("formsection");
        get.classList.remove("imagevisible");
        get.classList.add("imageinvisible");
    }

    function goBack() {
        window.history.back();
    }
</script>
<script src="log.js"></script>

</body>
</html>
