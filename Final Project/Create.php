
<?php
$a = $_GET['id'];
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>𝗕𝗹𝗼𝗴𝗦𝗰𝗿𝗶𝗽𝘁/Admin/Create</title>
     <!--style cdn -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


  <!-- CSs link -->
   <link rel="stylesheet" href="Style/Create.css" type="text/css">
  
</head>
<body>
    <div class="Main"> 
    <header>_____________CREATE BLOG___________</header>   
     <div class="Textarea">
        <form method="POST">
<h2><input type="text" name="title" maxlength="40" id="secureInput" placeholder="Enter your blog Title Here ...." required></h2>
<textarea name="content" required></textarea>
<br>
<br>
<br>
 <h2 id="footer">
        <a href="Admin.php" class="btn btn-primary btn-lg">
          <span class="glyphicon glyphicon-circle-arrow-left"></span> Back
        </a> 
        <a  class="btn btn-primary btn-lg">
          <span class="glyphicon glyphicon-send"></span><input type="submit" value="Publish">
        </a>
    </h2>
        </form>
    
    
    </div>

    </div>
    
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];


    $stmt = $conn->prepare("INSERT INTO posts (title, content , user_id) VALUES (?, ?,?)");
    $stmt->bind_param("ssi", $title, $content,$a);
    $stmt->execute();
    echo "<script>alert('Post created successfully!'); window.location.href = 'Admin.php';</script>";
    exit();
}
?>
    <script>
const input = document.getElementById("secureInput");

input.addEventListener("copy", (e) => e.preventDefault());
input.addEventListener("paste", (e) => e.preventDefault());
input.addEventListener("cut", (e) => e.preventDefault());
</script>

</body>
</html>

