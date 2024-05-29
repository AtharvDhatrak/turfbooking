<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Database connection details
    include "dbconnect.php";
    session_start();
    // Create connection
    

    // Check if a file was selected
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

        // Get the file data
        $image = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];

        // Read the file content
        $imgContent = addslashes(file_get_contents($image));

        // Update image data in the database for the specific username
        $username = $_SESSION['name'];
        $updateQuery = "UPDATE loginform SET image = '$imgContent' WHERE username = '$username'";
        
        if ($conn->query($updateQuery) === TRUE) {
            echo "Image uploaded successfully!";
            session_abort();
            header ("location:userinfo.php");
        } else {
            echo "Error updating image: " . $conn->error;
        }
    } else {
        echo "Please select an image.";
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <!-- Link to your Bootstrap CSS and JS files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
       
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="file"] {
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: orange;
        }

        input::file-selector-button {
            border:none;
            background-color: white;
            box-shadow:3px 3px 3px black;
            text:'Select';
            }
    </style>
</head>
<body>

    <div class="container">

        <form action="addimage.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="image" class="form-label">Select Image:</label>
                <input type="file" class="form-control" name="image" id="image" accept="image/*" required>
            </div>

            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Upload Image" onclick="buttonswap()">
                <input type="submit" class="btn btn-primary" value="Cancel" onclick="buttonswap()">

            </div>
        </form>
    </div>
    <script>
    

        document.addEventListener('click' , buttonswap);

        </script>
</body>
</html>

