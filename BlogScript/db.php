<?php
$conn = new mysqli("localhost", "root", "", "blog");  //  for localhost 
// $conn = new mysqli("sql200.infinityfree.com ", "if0_39302216", "ofMb9nxqljF", "if0_39302216_blog ")

if ($conn->connect_error) 
 die("Connection failed: " . $conn->connect_error);
}
?>
