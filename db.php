
<?php
$host='localhost';
$name='root';
$ps='';
$db='jewellery';

$conn=new mysqli($host,$name,$ps,$db);
if($conn->connect_error)
{
    die("connection failed:".$conn->connect_error);
}
?>
