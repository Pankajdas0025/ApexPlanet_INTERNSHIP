<?php
    
$conn=new mysqli("localhost","root","","blog");
if($conn->connect_error)
{
    echo " Not connect succesfully ! ";

}
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- CSs link -->
   <!-- <link rel="stylesheet" href="style.css" type="text/css"> -->
  <!-- cdn animation  -->
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <!-- cdn JQUARY -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
/* //CRUD PAGE  */
.Leftside
{
left: 0;
top: 0;
margin: 0;
position: fixed;
height: 100vh;
width: 300px;
/* background-image: url(B.jpg); */
}

.Rightside
{
top: 0;
margin-left: 300px;
height: auto;
width: 1200px;
position: absolute;
background-image: url(Images/B.jpg);


}.userlog
{
    height: 250px;
    width: 300px;
    background-color: aliceblue;
}.userlog img{
    height: 120px;
    width: 120px;
    margin: 15px 32%;
}.userlog h3{
    text-align: center;
    color:black;
    text-shadow: 1px 1px 1px gray;
    font-family: Arial, Helvetica, sans-serif;
}.icon
{
  text-decoration: none;
   align-items: center;
   align-content: center;
   text-align: center;
    height: 80px;
    background-color: wheat;
    width: 100%;
    margin: 20px 0;
}.icon img{
    position: absolute;
    left: 0;
    margin: -18px 10px;

}.header
{
  height: 80px;
  width: 1200px;
  font-family:sans-serif;
  font-size: 35px;
  align-items: center;
  text-align: center;
  align-content: center;
  position: fixed;
  background-color: aliceblue;
}.Rightside table{
  height:auto;
  width:90%;
  background-color: rgb(255, 255, 255);
  margin: 105px 5%;
  padding: 5px;
  font-size:25px;
border: 2px solid black;
  /* border-collapse: collapse;
  text-align: left; */
  box-shadow:1px 4px 14px black;
  
}.Rightside table th{
  background-color: rgb(96, 215, 219);
  font-size:30px;
  font-family: Arial, Helvetica, sans-serif;
  border-bottom: 4px solid black;
 
}.Rightside table tr{
  border-bottom: 12px solid rgb(255, 255, 255);
  height:60px;
 
 
}.Rightside table tr:nth-child(even) {
      background-color:rgb(145, 143, 143);
    }


.Rightside table button 
{
  height: 30px;
  background-color: rgba(232, 75, 75, 0.817);
  width: 80px;
  margin-left: 15px;
  font-family:Arial, Helvetica, sans-serif;
  font-weight: bold;
  font-size: 18px;
  border-radius: 5px;
  border: none;
  box-shadow: 2px 1px 4px black;
}
</style>
</head>
<body>
  <div class="Leftside">
    <div class="userlog"><img src="Images/UL.png">
    <br>
    <h3>
     <?php
session_start();
 $a=$_SESSION['email'];
$result = $conn->query("SELECT * FROM users WHERE EMAIL='$a'");
$row = $result->fetch_assoc();
$Name=$row['USER_NAME'];
$Id=$row['ID'];
echo $Name;
 
?>
</h3>
    <h3><?php  echo "USER ID: ".$Id; ?></h3>
  </div>

  <a href="Create.php?id=<?php echo $Id ?>">
  <div class="icon"><img src="Images/CREATE.webp" height="60" width="60">CREATE POST</div></a>
   <a href="index.php#" onclick="alert('Are you sure ! to signout')"><div class="icon"><img src="Images/SOut.png" height="60" width="60">SignOut</div></a>
  </div>
  <div class="Rightside">
    <div class="header">CRUD Application</div>
    <table border="3">

      <tr>
        <!-- <th>ID</th> -->
        <th>Tittle</th>
        <th>Content</th>
        <th>Created At</th>
        <th>Action</th>
      </tr>
       <?php
  $result = $conn->query("SELECT * FROM posts  WHERE user_id='$Id'");
    while ($row = $result->fetch_assoc())
     {
        echo "<tr>
               
                <td>{$row['title']}</td>
                <td>{$row['content']}</td>
                <td>{$row['created_at']}</td>
                 <td>
                    <button><a href='Update.php?id={$row['id']}'>Update</a></button>
                    <button><a href='delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a></button>
                </td>
                
              </tr>";
    }
    ?>
    </table>
  </div>
</body>
</html>

