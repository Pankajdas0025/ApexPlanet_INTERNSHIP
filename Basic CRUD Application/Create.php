<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
.div{
    height: 420px;
    width: 400px;
    margin: auto 35%;
    background-image:url(Images/B.jpg);
    color: white;
    font-size: 30px;
    
}h2{
    background-color: red;
    height: 55px;
    width: 100%;
    text-align: center;
    align-items: center;
    align-content: center;
    font-family: Arial, Helvetica, sans-serif;
}input
{
    width: 70%;
    height: 30px;
    margin:5px 25px ;
}textarea
{
     width: 80%;
    height: 30px;
    margin: 25px 25px ;
}button
{
    height: 30px;
    width: 60px;
    background-color: green;
    margin:0 35px ;
    color: white;
    text-decoration: none;
}
</style>
  
</head>
<body>
<div class="div">
    <?php
$a =$_GET['id'];

  ?>
<h2>Create Post</h2>
<form method="POST">
    Title:  <input type="text" name="title" required><br><br>
    Content:  <textarea name="content" required></textarea><br><br>
    <button type="submit">Save</button>  <button type="submit"><a style="text-decoration: none; color:white;" href="Chome.php">Back</a></button>
</form>
</div>
</body>
</html>

<?php
$conn=new mysqli("localhost","root","","blog");
if($conn->connect_error)
{
    echo " Not connect succesfully ! ";

}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];


    $stmt = $conn->prepare("INSERT INTO posts (title, content , user_id) VALUES (?, ?,?)");
    $stmt->bind_param("ssi", $title, $content,$a);
    $stmt->execute();

    header("Location: Chome.php");
}
?>
