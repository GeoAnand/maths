<?php

include("../../header.php");

$db_host = 'localhost';
$db_name = 'mathsnew_phyadmin';
                  $db_username = 'mathsnew_root';
                  $db_password = 'Maths@321';


// Create a PDO instance
try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Function to fetch the counter values from the "counter" table
function fetchStudents($pdo)
{
    // Fetch the cid, cheading, and cvalue from the "counter" table where type is "faculty"
    $query = "SELECT stuid,snameid,scontent,simg FROM stuach WHERE usertype = 'faculty'";
    $stmt = $pdo->query($query);

    // Store the fetched results in an array
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $students;
}
// Fetch the counter values
$students = fetchStudents($pdo);

// Initialize the $selectedCounter array
$selectedStudent = array('stuid' => '', 'snameid' => '', 'scontent' => '', 'simg' => '');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the updated nhead, ncontent, nlink, and nimg from the form submission
    $updatedSnameid = $_POST['snameid'];
    $updatedScontent = $_POST['scontent'];
    $stuid = $_POST['stuid'];

    // Check if the user wants to delete the image
    $deleteImage = isset($_POST['delete_image']);

    // Check if the user uploaded a new image file
    if ($_FILES['simg']['size'] > 0) {
        $fileName = $_FILES['simg']['name'];
        $uploadedImagePath = $fileName; // Replace with the actual code to handle image upload and save the file
        $updatedSimg = $uploadedImagePath;

        // Update the "news" table with the new image path
        $updateImageQuery = "UPDATE stuach SET simg = :simg WHERE stuid = :stuid";
        $updateImageStmt = $pdo->prepare($updateImageQuery);
        $updateImageStmt->bindParam(':simg', $updatedSimg);
        $updateImageStmt->bindParam(':stuid', $stuid);
        $updateImageStmt->execute();
    } elseif ($deleteImage) {
        // Update the "news" table to remove the image path
        $updateImageQuery = "UPDATE stuach SET simg = NULL WHERE stuid = :stuid";
        $updateImageStmt = $pdo->prepare($updateImageQuery);
        $updateImageStmt->bindParam(':stuid', $stuid);
        $updateImageStmt->execute();
    }

    // Update the other fields in the "news" table
    $updateQuery = "UPDATE stuach SET snameid = :snameid, scontent = :scontent WHERE stuid = :stuid";
    $updateStmt = $pdo->prepare($updateQuery);
    $updateStmt->bindParam(':snameid', $updatedSnameid);
    $updateStmt->bindParam(':scontent', $updatedScontent);
    $updateStmt->bindParam(':stuid', $stuid);
    $updateStmt->execute();
}


// Check if a specific counter is selected
if (!empty($_GET['stuid'])) {
    $stuid = $_GET['stuid'];

    // Fetch the cid, cheading, and cvalue from the "counter" table based on the selected cid
    $query = "SELECT stuid, snameid, scontent,simg FROM stuach WHERE stuid = :stuid";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':stuid', $stuid);
    $stmt->execute();

    // Store the fetched results in the $selectedCounter array
    $selectedStudent = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!-- Rest of the HTML code -->

<div class="right_col" role="main">
    <div class="page-title">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel" >
                <div class="x_title">
                    <h2 style="font-size: 2.2rem;">Student Achievement</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="col-md-12">
                    <form method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                        <div class="col-md-6">
                            <div class="form-group" >
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="stuid">Select Student ID:</label>
                                <select class="form-control col-md-7 col-xs-12" id="stuid" name="stuid" onchange="location = 'stuach.php?stuid=' + this.value;">
                                    <option value="">Select Student </option>
                                    <?php foreach ($students as $student) : ?>
                                        <option value="<?php echo $student['stuid']; ?>" <?php if ($selectedStudent['stuid'] == $student['stuid']) echo 'selected'; ?>>Student <?php echo $student['stuid']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="snameid" style="padding-top: 4px;">Student name and id</label>
                                <input type="text" class="form-control col-md-7 col-xs-12" id="snameid" name="snameid" value="<?php echo $selectedStudent['snameid']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="scontent" style="padding-top: 4px;">Student Content</label>
                                <textarea class="form-control col-md-7 col-xs-12" id="scontent" name="scontent" rows="4" style="resize: both;min-width: 100px; max-width: 500px; min-height: 100px;max-height: 300px; overflow: auto;width:450px;height:150px;"><?php echo $selectedStudent['scontent']; ?></textarea>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group" style="padding-bottom: 40px;">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="simg">Student Image</label>
                                <input class="form-control col-md-7 col-xs-12" type="text" class="form-control" id="simg" name="simg" value="<?php echo $selectedStudent['simg']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="delete_image">Delete Image</label>
                                <div class="col-md-7 col-sm-8 col-xs-12">
                                    <input type="checkbox" id="delete_image" name="delete_image">
                                    <label for="delete_image">Remove image</label>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="simg"></label>
                                <input type="file" id="simg" name="simg" accept="image/*">
                                <?php if (!empty($selectedStudent['simg'])) : ?>
                                    <img src="http://localhost/maths-new/img/<?php echo $selectedStudent['simg']; ?>" alt="Student Image" style="margin-top: 20px;width: 200px;height:200px;">
                                <?php endif; ?>
                            </div>



                            <div class="form-group" style="padding-top: 35px;margin-top: 40px;">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" style="margin-bottom:38px;">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<?php
include("../../footer.php");
?>