<?php 


define('TBL',"");
define('DB',"mathadmin");
class Dbcon extends mysqli 
{
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "mathadmin";

    function __construct()
    {
        parent::__construct($this->servername, $this->username, $this->password, $this->dbname);
        if (mysqli_connect_error()) 
        {
            die('Connect Error (' . mysqli_connect_errno() . ')'. mysqli_connect_error());
        }
    }
i}

$conn = new Dbcon;


//$home_path=$protocol.'10.24.8.245/dashboard';
//$home_path1=$protocol.'10.24.8.245';
$home_path='http://10.24.8.245/dashboard';
$home_path1='http://10.24.8.245';
//$home_path='http://jytheme.com/physics2/dashboard';
$download_path='/dashboard/download/';
$download_path1='/dashboard/dropdownload/';
$download_path12='/dashboard/dropdownload1/';
$download_path2='/dropdownload/';

//$conn = new Dbcon;

?>
