<?php
// Include the necessary files and establish the database connection
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
    $query = "SELECT upid,ucontent,uimg,udate FROM upcoming WHERE type = 'faculty'";
    $stmt = $pdo->query($query);

    // Store the fetched results in an array
    $upcomings = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $upcomings;
}
// Fetch the counter values
$upcomings = fetchStudents($pdo);

// Initialize the $selectedCounter array
$selectedUpcoming = array('upid' => '', 'udate' => '', 'ucontent' => '', 'uimg' => '');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the updated nhead, ncontent, nlink, and nimg from the form submission
    $updatedUdate = $_POST['udate'];
    $updatedUcontent = $_POST['ucontent'];
    $upid = $_POST['upid'];

    // Check if the user wants to delete the image
    $deleteImage = isset($_POST['delete_image']);

    // Check if the user uploaded a new image file
    if ($_FILES['uimg']['size'] > 0) {
        $fileName = $_FILES['uimg']['name'];
        $uploadedImagePath = $fileName; // Replace with the actual code to handle image upload and save the file
        $updatedUimg = $uploadedImagePath;

        // Update the "news" table with the new image path
        $updateImageQuery = "UPDATE upcoming SET uimg = :uimg WHERE upid = :upid";
        $updateImageStmt = $pdo->prepare($updateImageQuery);
        $updateImageStmt->bindParam(':uimg', $updatedUimg);
        $updateImageStmt->bindParam(':upid', $upid);
        $updateImageStmt->execute();
    } elseif ($deleteImage) {
        // Update the "news" table to remove the image path
        $updateImageQuery = "UPDATE upcoming SET uimg = NULL WHERE upid = :upid";
        $updateImageStmt = $pdo->prepare($updateImageQuery);
        $updateImageStmt->bindParam(':upid', $upid);
        $updateImageStmt->execute();
    }

    // Update the other fields in the "news" table
    $updateQuery = "UPDATE upcoming SET udate = :udate, ucontent = :ucontent WHERE upid = :upid";
    $updateStmt = $pdo->prepare($updateQuery);
    $updateStmt->bindParam(':udate', $updatedUdate);
    $updateStmt->bindParam(':ucontent', $updatedUcontent);
    $updateStmt->bindParam(':upid', $upid);
    $updateStmt->execute();
}


// Check if a specific counter is selected
if (!empty($_GET['upid'])) {
    $upid = $_GET['upid'];

    // Fetch the cid, cheading, and cvalue from the "counter" table based on the selected cid
    $query = "SELECT upid, udate, ucontent,uimg FROM upcoming WHERE upid = :upid";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':upid', $upid);
    $stmt->execute();

    // Store the fetched results in the $selectedCounter array
    $selectedUpcoming = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!-- Rest of the HTML code -->

<div class="right_col" role="main">
    <div class="page-title">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2 style="font-size: 2.2rem;">Upcoming news/events</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="col-md-12">
                    <form method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                        <div class="col-md-6">
                            <div class="form-group" style="padding-bottom: 40px;">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="upid">Select upcoming ID:</label>
                                <select class="form-control col-md-7 col-xs-12" id="upid" name="upid" onchange="location = 'upcoming.php?upid=' + this.value;">
                                    <option value="">Select upcoming news/events  </option>
                                    <?php foreach ($upcomings as $upcoming) : ?>
                                        <option value="<?php echo $upcoming['upid']; ?>" <?php if ($selectedUpcoming['upid'] == $upcoming['upid']) echo 'selected'; ?>>upcoming news/event <?php echo $upcoming['upid']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group" >
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="udate">Date</label>
                                <input type="text" class="form-control col-md-7 col-xs-12" id="udate" name="udate" value="<?php echo $selectedUpcoming['udate']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="ucontent">Content</label>
                                <textarea class="form-control col-md-7 col-xs-12" id="ucontent" name="ucontent" rows="4" style="resize: both;min-width: 100px; max-width: 500px; min-height: 100px;max-height: 300px; overflow: auto;width:450px;height:150px;"><?php echo $selectedUpcoming['ucontent']; ?></textarea>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group" >
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="uimg">Image</label>
                                <input class="form-control col-md-7 col-xs-12" type="text" class="form-control" id="uimg" name="uimg" value="<?php echo $selectedUpcoming['uimg']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="delete_image">Delete Image</label>
                                <div class="col-md-7 col-sm-8 col-xs-12">
                                    <input type="checkbox" id="delete_image" name="delete_image">
                                    <label for="delete_image">Remove image</label>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="uimg"></label>
                                <input type="file" id="uimg" name="uimg" accept="image/*" style="margin-left: 10px;">
                                <?php if (!empty($selectedUpcoming['uimg'])) : ?>
                                    <img src="http://localhost/eemvc/eeimg/<?php echo $selectedUpcoming['uimg']; ?>" alt="upcoming Image" style="margin-top: 20px;width: 200px;height:200px;">
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