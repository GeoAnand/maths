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
function fetchCounters($pdo)
{
    // Fetch the cid, cheading, and cvalue from the "counter" table where type is "faculty"
    $query = "SELECT cid, cheading, cvalue FROM counter WHERE type = 'faculty'";
    $stmt = $pdo->query($query);

    // Store the fetched results in an array
    $counters = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $counters;
}

// Fetch the counter values
$counters = fetchCounters($pdo);

// Initialize the $selectedCounter array
$selectedCounter = array('cid' => '', 'cheading' => '', 'cvalue' => '');

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the updated cheading and cvalue from the form submission
    $updatedCHeading = $_POST['cheading'];
    $updatedCValue = $_POST['cvalue'];
    $cid = $_POST['cid'];

    // Update the "counter" table with the new values
    $updateQuery = "UPDATE counter SET cheading = :cheading, cvalue = :cvalue WHERE cid = :cid";
    $updateStmt = $pdo->prepare($updateQuery);
    $updateStmt->bindParam(':cheading', $updatedCHeading);
    $updateStmt->bindParam(':cvalue', $updatedCValue);
    $updateStmt->bindParam(':cid', $cid);
    $updateStmt->execute();
}

// Check if a specific counter is selected
if (!empty($_GET['cid'])) {
    $cid = $_GET['cid'];

    // Fetch the cid, cheading, and cvalue from the "counter" table based on the selected cid
    $query = "SELECT cid, cheading, cvalue FROM counter WHERE cid = :cid";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':cid', $cid);
    $stmt->execute();

    // Store the fetched results in the $selectedCounter array
    $selectedCounter = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!-- Rest of the HTML code -->

<div class="right_col" role="main">
    <div class="page-title">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2 style="font-size: 2.2rem;">Counter</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="col-md-6">
                    <form method="POST" action="" autocomplete="off">
                        <div class="form-group">
                            <label for="cid">Select CID:</label>
                            <select class="form-control" id="cid" name="cid" onchange="location = 'counter.php?cid=' + this.value;">
                                <option value="">Select Counter</option>
                                <?php foreach ($counters as $counter) : ?>
                                    <option value="<?php echo $counter['cid']; ?>" <?php if ($selectedCounter['cid'] == $counter['cid']) echo 'selected'; ?>>Counter <?php echo $counter['cid']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cvalue">Counter Value</label>
                            <input type="text" class="form-control" id="cvalue" name="cvalue" value="<?php echo $selectedCounter['cvalue']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="cheading">Counter Heading</label>
                            <input type="text" class="form-control" id="cheading" name="cheading" value="<?php echo $selectedCounter['cheading']; ?>">
                        </div>



                        <div class="form-group" style="padding-top: 35px;margin-top: 100px;">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" style="margin-bottom:38px;">
                                <button type="submit" class="btn btn-success">Submit</button>
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