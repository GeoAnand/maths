<?php 

date_default_timezone_set('Asia/Kolkata');
/* date_default_timezone_set('Asia/Riyadh'); */
//session_set_cookie_params(86400);
//ini_set('session.gc_maxlifetime', 86400);

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
    protected $username = " if0_34548773";
//    protected $username = "physics";
    protected $password = " SYelCll8uU6nl";
//    protected $password = "Physics123db!@#";
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

//$home_path=$protocol.'jytheme.com/physics2';

//$home_path='10.24.8.245';
// $home_path1='https://physics.iitm.ac.in';
// $download_path='https://physics.iitm.ac.in/dashboard/download/';
$home_path1='http://maths-new.c1.is/';
$download_path='http://maths-new.c1.is//dashboard/download/';
$download_path1='/dashboard/dropdownload/';
$download_path12='/dashboard/dropdownload1/';
$download_path2='/dropdownload/';

$downloadpath='/dashboard/download/';

//$conn = new Dbcon;

?>
