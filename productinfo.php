<?php
include 'dbconnect.php';

$res = mysqli_query($conn, "SELECT * FROM turfinfo");

while ($row = mysqli_fetch_assoc($res)) {
    // Open the "main" div inside the loop
    echo '<div class="main">';

    // Open the "card" div inside the loop
    echo '<div class="card">';

    // Check if the image path is not empty
    if (!empty($row['image'])) {
        // Display the image
        echo '<img src="' . $row['image'] . '" alt="' . $row['name'] . '">';
    } else {
        // Display a default image or a message
        echo '<p>No image available</p>';
    }

    // Display other information
    echo '<h2>' . $row['name'] . '</h2>';
    echo '<h2>' . $row['price'] . '</h2>';
    echo '<h4>' . $row['Contactname'] . '</h4>';
    echo '<h4>' . $row['contactno'] . '</h4>';

    // Close the "card" div inside the loop
    echo '</div>';

    // Close the "main" div inside the loop
    echo '</div>';
}

// Close the while loop
?>
