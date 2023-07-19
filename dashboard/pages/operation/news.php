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
function fetchNewss($pdo)
{
    // Fetch the cid, cheading, and cvalue from the "counter" table where type is "faculty"
    $query = "SELECT nid,nhead,ncontent,nlink,nimg FROM news WHERE type = 'faculty'";
    $stmt = $pdo->query($query);

    // Store the fetched results in an array
    $newss = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $newss;
}
// Fetch the counter values
$newss = fetchNewss($pdo);

// Initialize the $selectedCounter array
$selectedNews = array('nid' => '', 'nhead' => '', 'ncontent' => '', 'nlink' => '', 'nimg' => '');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the updated nhead, ncontent, nlink, and nimg from the form submission
    $updatedNhead = $_POST['nhead'];
    $updatedNcontent = $_POST['ncontent'];
    $updatedNlink = $_POST['nlink'];
    $nid = $_POST['nid'];

    // Check if the user wants to delete the image
    $deleteImage = isset($_POST['delete_image']);

    // Check if the user uploaded a new image file
    if ($_FILES['nimg']['size'] > 0) {
        $fileName = $_FILES['nimg']['name'];
        $uploadedImagePath = $fileName; // Replace with the actual code to handle image upload and save the file
        $updatedNimg = $uploadedImagePath;

        // Update the "news" table with the new image path
        $updateImageQuery = "UPDATE news SET nimg = :nimg WHERE nid = :nid";
        $updateImageStmt = $pdo->prepare($updateImageQuery);
        $updateImageStmt->bindParam(':nimg', $updatedNimg);
        $updateImageStmt->bindParam(':nid', $nid);
        $updateImageStmt->execute();
    } elseif ($deleteImage) {
        // Update the "news" table to remove the image path
        $updateImageQuery = "UPDATE news SET nimg = NULL WHERE nid = :nid";
        $updateImageStmt = $pdo->prepare($updateImageQuery);
        $updateImageStmt->bindParam(':nid', $nid);
        $updateImageStmt->execute();
    }

    // Update the other fields in the "news" table
    $updateQuery = "UPDATE news SET nhead = :nhead, ncontent = :ncontent, nlink = :nlink WHERE nid = :nid";
    $updateStmt = $pdo->prepare($updateQuery);
    $updateStmt->bindParam(':nhead', $updatedNhead);
    $updateStmt->bindParam(':ncontent', $updatedNcontent);
    $updateStmt->bindParam(':nlink', $updatedNlink);
    $updateStmt->bindParam(':nid', $nid);
    $updateStmt->execute();
}


// Check if a specific counter is selected
if (!empty($_GET['nid'])) {
    $nid = $_GET['nid'];

    // Fetch the cid, cheading, and cvalue from the "counter" table based on the selected cid
    $query = "SELECT nid, nhead, ncontent,nlink,nimg FROM news WHERE nid = :nid";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':nid', $nid);
    $stmt->execute();

    // Store the fetched results in the $selectedCounter array
    $selectedNews = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!-- Rest of the HTML code -->

<div class="right_col" role="main">
    <div class="page-title">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2 style="font-size: 2.2rem;">News</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="col-md-12">
                    <form method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="nid">Select NID:</label>
                                <select class="form-control col-md-7 col-xs-12" id="nid" name="nid" onchange="location = 'news.php?nid=' + this.value;">
                                    <option value="">Select News</option>
                                    <?php foreach ($newss as $news) : ?>
                                        <option value="<?php echo $news['nid']; ?>" <?php if ($selectedNews['nid'] == $news['nid']) echo 'selected'; ?>>News <?php echo $news['nid']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="nhead" style="padding-top: 4px;">News heading</label>
                                <input type="text" class="form-control col-md-7 col-xs-12" id="nhead" name="nhead" value="<?php echo $selectedNews['nhead']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="ncontent" style="padding-top: 4px;">News Content</label>
                                <input type="text" class="form-control col-md-7 col-xs-12" id="ncontent" name="ncontent" value="<?php echo $selectedNews['ncontent']; ?>">
                            </div>

                            <div class="form-group" >
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="nlink" style="padding-top: 4px;">News link</label>
                                <input type="text" class="form-control col-md-7 col-xs-12" id="nlink" name="nlink" value="<?php echo $selectedNews['nlink']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="nimg">News Image</label>
                                <input class="form-control col-md-7 col-xs-12" type="text" class="form-control" id="nimg" name="nimg" value="<?php echo $selectedNews['nimg']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="delete_image">Delete Image</label>
                                <div class="col-md-7 col-sm-8 col-xs-12">
                                    <input type="checkbox" id="delete_image" name="delete_image">
                                    <label for="delete_image">Remove image</label>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="nimg"></label>
                                <input type="file" id="nimg" name="nimg" accept="image/*" style="margin-left: 10px;">
                                <?php if (!empty($selectedNews['nimg'])) : ?>
                                    <img src="http://localhost/maths-new/img/<?php echo $selectedNews['nimg']; ?>" alt="News Image" style="margin-top: 20px;">
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