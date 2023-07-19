<?php 

date_default_timezone_set('Asia/Kolkata');
/* date_default_timezone_set('Asia/Riyadh'); */
// session_set_cookie_params(86400);
// ini_set('session.gc_maxlifetime', 86400);

if (isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
  $protocol = 'https://';
}
else {
  $protocol = 'https://';
}

define('TBL',"");
define('DB',"if0_34548773_phyadmin");
class Dbcon extends mysqli 
{
    protected $servername = "sql204.infinityfree.com";
    // protected $username = "physics";
    // protected $password = "Physics123db!@#";
    // protected $username = "root";
    // protected $password = "";
    // protected $dbname = "phyadmin";
    // protected $dbname = "mathsnew";
     protected $username = " if0_34548773";
    protected $password = "SYelCll8uU6nl";
    protected $dbname = "if0_34548773_phyadmin";

    function __construct()
    {
        parent::__construct($this->servername, $this->username, $this->password, $this->dbname);
        if (mysqli_connect_error()) 
        {
            die('Connect Error (' . mysqli_connect_errno() . ')'. mysqli_connect_error());
        }
    }
}

$conn = new Dbcon;


// $home_path='https://physics.iitm.ac.in/dashboard/';
// $home_path1='https://physics.iitm.ac.in';
$home_path='http://maths-new.c1.is/dashboard/';
$home_path1='http://localhost/maths-new/';

$download_path='/dashboard/download/';

$downloadpath='/dashboard/download/';

//$conn = new Dbcon;

?>
