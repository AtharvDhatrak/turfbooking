
<?php
include 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    // $ratings = mysqli_real_escape_string($conn, $_POST['ratings']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $equipment = mysqli_real_escape_string($conn, $_POST['yesNoOption']);
    $contactname = mysqli_real_escape_string($conn, $_POST['contactname']);
    $contactno= mysqli_real_escape_string($conn, $_POST['contactno']);

    $jsonCheckboxOptions = json_encode(isset($_POST['checkboxOptions']) ? $_POST['checkboxOptions'] : array());
    $selectedOptions = isset($_POST['checkboxOptions']) ? $_POST['checkboxOptions'] : array();
    $jsonSelectedOptions = json_encode($selectedOptions);

    $correct = 0;
    $productavailable = 0;

    // Insert product data without image
    $sql2 = "SELECT * FROM turfinfo WHERE name = '$name' AND price = $price AND location = '$location' AND contactno = '$contactno'";
    $res2 = mysqli_query($conn, $sql2);
    $row = mysqli_fetch_array($res2);
    $num = mysqli_num_rows($res2);

    if ($num > 0) {
        echo '<script>alert("Turf already Present ");</script>';
        $correct=0;
    } else {
        $sql = "INSERT INTO turfinfo (name, price, location,  equipment, sports, contactname,contactno) 
                VALUES ('$name', '$price', '$location',  '$equipment', '$jsonSelectedOptions','$contactname','$contactno')";
        if ($conn->query($sql) === TRUE) {
            echo "Data added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Check for image upload
    if ($productavailable == 0) {
        if (isset($_FILES['image'])) {
            $imageFile = $_FILES['image'];

            if ($imageFile['error'] === 0) {
                $filename = $imageFile['name'];
                $filesize = $imageFile['size'];
                $tmpname = $imageFile['tmp_name'];
                $validImageExtensions = ['jpg', 'jpeg', 'png'];
                $imageExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

                if (in_array($imageExtension, $validImageExtensions) && $filesize <= 1000000) {
                    $newImageName = uniqid() . '.' . $imageExtension;
                    $targetPath = 'turfimages/' . $newImageName;

                    // Move the uploaded file to the server
                    if (move_uploaded_file($tmpname, $targetPath)) {
                        // Update the image path in the database for the specific turf
                        $sql = "UPDATE turfinfo SET image = '$targetPath' WHERE name = '$name'";
                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            $correct = 0;
                        } else {
                            echo '<script>alert("Failed to update image path in the database");</script>';
                        }
                    } else {
                        echo '<script>alert("Failed to move uploaded file to the server");</script>';
                    }
                } else {
                    echo '<script>alert("Invalid file format or file size exceeds 1 MB");</script>';
                }
            } else {
                echo '<script>alert("Error in file upload: ' . $imageFile['error'] . '");</script>';
            }
        }
    }

    if ($correct == 1) {
        echo '<script>alert("Data added successfully");</script>';
    }
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data Form</title>
    <style>
        /* styles.css */

body {
    font-family: Sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

form {
    overflow:auto;
    width: 600px;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form label {
    display: block;
    margin-bottom: 8px;
}

input, select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #4caf50;
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

label[for="yesNoOption"],
        label[for="checkboxOptions"],
        label[for="ratings"] {
            margin-top:15px;
            margin-bottom: 15px;
        }

/* Responsive styling */
@media (max-width: 768px) {
    form {
        width: 80%;
    }
}

    </style>
</head>
<body>

    <form action="addturf.php" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="price">Price/hr:</label>
        <input type="number" id="price" name="price" required>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" placeholder="Type location here" required>

        <label for="contactname">Contact Name:</label>
    <input type="text" id="contactname" name="contactname" required>

    <label for="contactno">Contact Number:</label>
    <input type="text" id="contactno" name="contactno" placeholder="Provide only the 10 digits" required>

        <label for="yesNoOption">Equipment Available:</label>
        <select id="yesNoOption" name="yesNoOption">
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>

        <lable>Sports Playable </lable>
        <label for="cricket">Cricket</label>
            <input type="checkbox" id="cricket" name="checkboxOptions[]" value="Cricket">

            <label for="basketball">Basketball</label>
            <input type="checkbox" id="basketball" name="checkboxOptions[]" value="Basketball">

            <label for="football">Football</label>
            <input type="checkbox" id="football" name="checkboxOptions[]" value="Football">

            <label for="tennis">Tennis</label>
            <input type="checkbox" id="tennis" name="checkboxOptions[]" value="Tennis">

        <!-- <label for="ratings">Ratings:</label>
        <select id="ratings" name="ratings" required>
            <option value="1">1 star</option>
            <option value="2">2 stars</option>
            <option value="3">3 stars</option>
            <option value="4">4 stars</option>
            <option value="5">5 stars</option>
        </select> -->

        <label for="image">Select Image:</label>
        <input type="file" name="image" accept="image/*" required>

        <input type="submit" value="Submit">
    
    
    </form>

</body>
</html>
