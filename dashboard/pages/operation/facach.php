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
function fetchFacultys($pdo)
{
    // Fetch the cid, cheading, and cvalue from the "counter" table where type is "faculty"
    $query = "SELECT aid,facname,facdesig,fcontent,fimg FROM achievement WHERE type = 'faculty'";
    $stmt = $pdo->query($query);

    // Store the fetched results in an array
    $facultys = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $facultys;
}
// Fetch the counter values
$facultys = fetchFacultys($pdo);

// Initialize the $selectedCounter array
$selectedFaculty = array('aid' => '', 'facname' => '', 'fcontent' => '', 'facdesig' => '', 'fimg' => '');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the updated nhead, ncontent, nlink, and nimg from the form submission
    $updatedFacname = $_POST['facname'];
    $updatedFcontent = $_POST['fcontent'];
    $updatedFacdesig = $_POST['facdesig'];
    $aid = $_POST['aid'];

    // Check if the user wants to delete the image
    $deleteImage = isset($_POST['delete_image']);

    // Check if the user uploaded a new image file
    if ($_FILES['fimg']['size'] > 0) {
        $fileName = $_FILES['fimg']['name'];
        $uploadedImagePath = $fileName; // Replace with the actual code to handle image upload and save the file
        $updatedFimg = $uploadedImagePath;

        // Update the "news" table with the new image path
        $updateImageQuery = "UPDATE achievement SET fimg = :fimg WHERE aid = :aid";
        $updateImageStmt = $pdo->prepare($updateImageQuery);
        $updateImageStmt->bindParam(':fimg', $updatedFimg);
        $updateImageStmt->bindParam(':aid', $aid);
        $updateImageStmt->execute();
    } elseif ($deleteImage) {
        // Update the "news" table to remove the image path
        $updateImageQuery = "UPDATE achievement SET fimg = NULL WHERE aid = :aid";
        $updateImageStmt = $pdo->prepare($updateImageQuery);
        $updateImageStmt->bindParam(':aid', $aid);
        $updateImageStmt->execute();
    }

    // Update the other fields in the "news" table
    $updateQuery = "UPDATE achievement SET facname = :facname, fcontent = :fcontent, facdesig = :facdesig WHERE aid = :aid";
    $updateStmt = $pdo->prepare($updateQuery);
    $updateStmt->bindParam(':facname', $updatedFacname);
    $updateStmt->bindParam(':facdesig', $updatedFacdesig);
    $updateStmt->bindParam(':fcontent', $updatedFcontent);
    $updateStmt->bindParam(':aid', $aid);
    $updateStmt->execute();
}


// Check if a specific counter is selected
if (!empty($_GET['aid'])) {
    $aid = $_GET['aid'];

    // Fetch the cid, cheading, and cvalue from the "counter" table based on the selected cid
    $query = "SELECT aid,facname,fcontent,facdesig,fimg FROM achievement WHERE aid = :aid";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':aid', $aid);
    $stmt->execute();

    // Store the fetched results in the $selectedCounter array
    $selectedFaculty = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!-- Rest of the HTML code -->

<div class="right_col" role="main">
    <div class="page-title">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2 style="font-size: 2.2rem;">Faculty Achievement</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="col-md-12">
                    <form method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="stuid">Select Faculty ID:</label>
                                <select class="form-control col-md-7 col-xs-12" id="aid" name="aid" onchange="location = 'facach.php?aid=' + this.value;">
                                    <option value="">Select Faculty </option>
                                    <?php foreach ($facultys as $faculty) : ?>
                                        <option value="<?php echo $faculty['aid']; ?>" <?php if ($selectedFaculty['aid'] == $faculty['aid']) echo 'selected'; ?>>Faculty <?php echo $faculty['aid']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="facname" style="padding-top: 4px;">Faculty name</label>
                                <input type="text" class="form-control col-md-7 col-xs-12" id="facname" name="facname" value="<?php echo $selectedFaculty['facname']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="facdesig" style="padding-top: 4px;">Faculty designation</label>
                                <input type="text" class="form-control col-md-7 col-xs-12" id="facdesig" name="facdesig" value="<?php echo $selectedFaculty['facdesig']; ?>">
                            </div>

                            <div class="form-group" >
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="fcontent" style="padding-top: 4px;">Faculty Content</label>
                                <textarea class="form-control col-md-7 col-xs-12" id="fcontent" name="fcontent" rows="4" style="resize: both;min-width: 100px; max-width: 500px; min-height: 100px;max-height: 300px; overflow: auto;width:450px;height:150px;"><?php echo $selectedFaculty['fcontent']; ?></textarea>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="fimg">Faculty Image</label>
                                <input class="form-control col-md-7 col-xs-12" type="text" class="form-control" id="fimg" name="fimg" value="<?php echo $selectedFaculty['fimg']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="delete_image">Delete Image</label>
                                <div class="col-md-7 col-sm-8 col-xs-12">
                                    <input type="checkbox" id="delete_image" name="delete_image">
                                    <label for="delete_image">Remove image</label>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="fimg"></label>
                                <input type="file" id="fimg" name="fimg" accept="image/*" style="margin-left: 10px;">
                                <?php if (!empty($selectedFaculty['fimg'])) : ?>
                                    <img src="http://localhost/maths-new/img/<?php echo $selectedFaculty['fimg']; ?>" alt="Faculty Image" style="margin-top: 20px;width: 200px;height:200px;">
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
<script>
    function updateHiddenInput() {
        var textareaValue = document.getElementById('fcontent').value;
        document.getElementById('fcontent').value = textareaValue;
    }
</script>
<?php
include("../../footer.php");
?>