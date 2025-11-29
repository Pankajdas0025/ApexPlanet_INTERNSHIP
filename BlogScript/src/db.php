<?php


$conn = new mysqli("localhost", "root", "Pankaj#12345", "blog");  //  for localhost
// $conn = new mysqli("sql313.epizy.com", "epiz_34193527", "u1b2c3d4", "epiz_34193527_blog");  //  for remote server

if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
?>
