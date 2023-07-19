<?php
require_once("establishdb.php"); 
$dbConnection = establishDatabaseConnection();

$loggedInUserId = $_SESSION['uid'];

$about1 = fetchAbout1FromDatabase($dbConnection, $loggedInUserId);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $newAbout1 = $_POST["about1"];
  updateAbout1InDatabase($dbConnection, $loggedInUserId, $newAbout1);
  $about1 = $newAbout1;
}

?>

<!-- Rest of the code -->

<?php
closeDatabaseConnection($dbConnection);

function fetchAbout1FromDatabase($dbConnection, $loggedInUserId) {
  
  try {
    $query = "SELECT about1 
              FROM facultynew
              WHERE id = :loggedInUserId";
    $stmt = $dbConnection->prepare($query);
    $stmt->bindValue(':loggedInUserId', $loggedInUserId);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['about1'];
  } catch (PDOException $e) {
    // Handle the exception or display an error message
    echo "Error fetching about1 from the database: " . $e->getMessage();
    die();
  }
}

function updateAbout1InDatabase($dbConnection, $loggedInUserId, $newAbout1) {
  
  try {
    $query = "UPDATE facultynew 
              SET about1 = :newAbout1 
              WHERE id = :loggedInUserId";
    $stmt = $dbConnection->prepare($query);
    $stmt->bindValue(':newAbout1', $newAbout1);
    $stmt->bindValue(':loggedInUserId', $loggedInUserId);
    $stmt->execute();
  } catch (PDOException $e) {
    // Handle the exception or display an error message
    echo "Error updating about1 in the database: " . $e->getMessage();
    die();
  }
}

?>
