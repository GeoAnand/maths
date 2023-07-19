<?php

$hostname = "localhost";
$username = "mathsnew_root";
$password = "Maths@321";
$database = "mathsnew_phyadmin";

// Create a connection
$connection = mysqli_connect($hostname, $username, $password, $database);

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

$loggedInUserId = "87";

function fetchHcontentFromDatabase($connection, $loggedInUserId) {
    $query = "SELECT hcontent FROM hodcontent WHERE id = '87' AND id = '$loggedInUserId'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['hcontent'];
    } else {
        return ""; // Set a default value or handle the case when no record is found
    }
}

function updateHcontentInDatabase($connection, $loggedInUserId, $newHcontent) {
    $query = "UPDATE hodcontent SET hcontent = '$newHcontent' WHERE id = '87' AND id = '$loggedInUserId'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Successful update
        echo "";
    } else {
        // Error occurred
        echo "" . mysqli_error($connection);
    }
}

// Step 2: Retrieve the logged-in user's ID
// Replace this with the actual logged-in user's ID

// Step 3: Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the hcontent field is set in $_POST
    if (isset($_POST['hcontent'])) {
        // Retrieve the updated faculty content from the form
        $updatedFacultyContent = $_POST['hcontent'];

        // Call the updateHcontentInDatabase function to update the hcontent in the database
        updateHcontentInDatabase($connection, $loggedInUserId, $updatedFacultyContent);
    } else {
        // Handle the case when hcontent field is not set
        // Assign a default value or display an error message
        echo "";
    }
}

// Fetch the current faculty content from the database using the fetchHcontentFromDatabase function
$hcontent = fetchHcontentFromDatabase($connection, $loggedInUserId);

// Close the database connection
mysqli_close($connection);
?>



<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "phyadmin";

// Create a connection
$connection = mysqli_connect($hostname, $username, $password, $database);

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

$loggedInUserId = "87";

function fetchImgFromDatabase($connection, $loggedInUserId) {
    $query = "SELECT himg FROM hodcontent WHERE type = 'faculty' AND id = '$loggedInUserId'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['himg'];
    } else {
        return ""; // Set a default value or handle the case when no record is found
    }
}

function updateImgInDatabase($connection, $loggedInUserId, $newImageName) {
    $query = "UPDATE hodcontent SET himg = '$newImageName' WHERE type = 'faculty' AND id = '$loggedInUserId'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Successful update
        echo "";
    } else {
        // Error occurred
        echo " " . mysqli_error($connection);
    }
}

// Step 2: Retrieve the logged-in user's ID
// Replace this with the actual logged-in user's ID

// Step 3: Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the himg field is set in $_FILES and if there are no file upload errors
    if (isset($_FILES['himg']) && $_FILES['himg']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['himg']['tmp_name'];

        // Generate a unique filename for the uploaded image
        $newImageName = $_FILES['himg']['name'];

        // Specify the full path to save the image
        $imagePath = 'eeimg/' . $newImageName;

        // Move the uploaded image to the desired directory
        if (move_uploaded_file($imageTmpPath, $imagePath)) {
            // Call the updateImgInDatabase function to update the image in the database
            updateImgInDatabase($connection, $loggedInUserId, $newImageName);
        } else {
            // Handle the case when there are file upload errors
            echo "Error uploading image.";
        }
    } else {
        // Handle the case when himg field is not set or there are file upload errors
        echo "";
    }
}

// Fetch the current image from the database using the fetchImgFromDatabase function
$himg = fetchImgFromDatabase($connection, $loggedInUserId);

// Close the database connection
mysqli_close($connection);
?>