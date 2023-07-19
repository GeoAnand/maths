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
function fetchEvents($pdo)
{
    // Fetch the cid, cheading, and cvalue from the "counter" table where type is "faculty"
    $query = "SELECT eid,evemon,evedate,evehead,eveaddr,evelink,eveimg FROM event WHERE type = 'faculty'";
    $stmt = $pdo->query($query);

    // Store the fetched results in an array
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $events;
}
// Fetch the counter values
$events = fetchEvents($pdo);

// Initialize the $selectedCounter array
$selectedEvent = array('eid' => '', 'evemon' => '', 'evedate' => '', 'evehead' => '', 'eveaddr' => '', 'evelink' => '', 'eveimg' => '');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the updated nhead, ncontent, nlink, and nimg from the form submission
    $updatedEvemon = $_POST['evemon'];
    $updatedEvedate = $_POST['evedate'];
    $updatedEvehead = $_POST['evehead'];
    $updatedEveaddr = $_POST['eveaddr'];
    $updatedEvelink = $_POST['evelink'];
    $eid = $_POST['eid'];

    // Check if the user wants to delete the image
    $deleteImage = isset($_POST['delete_image']);

    // Check if the user uploaded a new image file
    if ($_FILES['eveimg']['size'] > 0) {
        $fileName = $_FILES['eveimg']['name'];
        $uploadedImagePath = $fileName; // Replace with the actual code to handle image upload and save the file
        $updatedEveimg = $uploadedImagePath;

        // Update the "news" table with the new image path
        $updateImageQuery = "UPDATE event SET eveimg = :eveimg WHERE eid = :eid";
        $updateImageStmt = $pdo->prepare($updateImageQuery);
        $updateImageStmt->bindParam(':eveimg', $updatedEveimg);
        $updateImageStmt->bindParam(':eid', $eid);
        $updateImageStmt->execute();
    } elseif ($deleteImage) {
        // Update the "news" table to remove the image path
        $updateImageQuery = "UPDATE event SET eveimg = NULL WHERE eid = :eid";
        $updateImageStmt = $pdo->prepare($updateImageQuery);
        $updateImageStmt->bindParam(':eid', $eid);
        $updateImageStmt->execute();
    }

    // Update the other fields in the "news" table
    $updateQuery = "UPDATE event SET evemon = :evemon, evedate = :evedate, evehead = :evehead, eveaddr = :eveaddr, evelink = :evelink WHERE eid = :eid";
    $updateStmt = $pdo->prepare($updateQuery);
    $updateStmt->bindParam(':evemon', $updatedEvemon);
    $updateStmt->bindParam(':evedate', $updatedEvedate);
    $updateStmt->bindParam(':eveaddr', $updatedEveaddr);
    $updateStmt->bindParam(':evehead', $updatedEvehead);
    $updateStmt->bindParam(':evelink', $updatedEvelink);
    $updateStmt->bindParam(':eid', $eid);
    $updateStmt->execute();
}


// Check if a specific counter is selected
if (!empty($_GET['eid'])) {
    $eid = $_GET['eid'];

    // Fetch the cid, cheading, and cvalue from the "counter" table based on the selected cid
    $query = "SELECT eid,evemon,evedate,evehead,eveaddr,evelink,eveimg FROM event WHERE eid = :eid";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':eid', $eid);
    $stmt->execute();

    // Store the fetched results in the $selectedCounter array
    $selectedEvent = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!-- Rest of the HTML code -->

<div class="right_col" role="main">
    <div class="page-title">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2 style="font-size: 2.2rem;">Events</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="col-md-12">
                    <form method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="eid">Select EID:</label>
                                <select class="form-control col-md-7 col-xs-12" id="eid" name="eid" onchange="location = 'events.php?eid=' + this.value;">
                                    <option value="">Select Event</option>
                                    <?php foreach ($events as $event) : ?>
                                        <option value="<?php echo $event['eid']; ?>" <?php if ($selectedEvent['eid'] == $event['eid']) echo 'selected'; ?>>Event <?php echo $event['eid']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="evemon" style="padding-top: 4px;">Event Month</label>
                                <input type="text" class="form-control col-md-7 col-xs-12" id="evemon" name="evemon" value="<?php echo $selectedEvent['evemon']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="evedate" style="padding-top: 4px;">Event Date</label>
                                <input type="text" class="form-control col-md-7 col-xs-12" id="evedate" name="evedate" value="<?php echo $selectedEvent['evedate']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="evehead" style="padding-top: 4px;">Event heading</label>
                                <input type="text" class="form-control col-md-7 col-xs-12" id="evehead" name="evehead" value="<?php echo $selectedEvent['evehead']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="eveaddr" style="padding-top: 4px;">Event Address</label>
                                <input type="text" class="form-control col-md-7 col-xs-12" id="eveaddr" name="eveaddr" value="<?php echo isset($selectedEvent['eveaddr']) ? $selectedEvent['eveaddr'] : ''; ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="evelink" style="padding-top: 4px;">Event Link</label>
                                <input type="text" class="form-control col-md-7 col-xs-12" id="evelink" name="evelink" value="<?php echo isset($selectedEvent['evelink']) ? $selectedEvent['evelink'] : ''; ?>">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="eveimg">Event Image</label>
                                <input class="form-control col-md-7 col-xs-12" type="text" class="form-control" id="eveimg" name="eveimg" value="<?php echo $selectedEvent['eveimg']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="delete_image">Delete Image</label>
                                <div class="col-md-7 col-sm-8 col-xs-12">
                                    <input type="checkbox" id="delete_image" name="delete_image">
                                    <label for="delete_image">Remove image</label>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="eveimg"></label>
                                <input type="file" id="eveimg" name="eveimg" accept="image/*" style="margin-left: 10px;">
                                <?php if (!empty($selectedEvent['eveimg'])) : ?>
                                    <img src="http://localhost/maths-new/img/<?php echo $selectedEvent['eveimg']; ?>" alt="Event Image" style="margin-top: 20px;">
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