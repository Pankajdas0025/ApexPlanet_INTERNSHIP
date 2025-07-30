 <?php
include 'db.php';
$id = $_GET['id'];
$result = $conn->query(" SELECT * FROM posts WHERE id='$id' ");
$post = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>𝗕𝗹𝗼𝗴𝗦𝗰𝗿𝗶𝗽𝘁/Admin/Update</title>
     <!--favicon ------------------------------------------------------------------------------>
<link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
<link rel="manifest" href="favicon_io/site.webmanifest">
     <!--style cdn -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


  <!-- CSs link -->
   <link rel="stylesheet" href="Style/Update.css" type="text/css">
   
</head>
<body>
       



    <div class="Main"> 
    <header>_____________EDIT BLOG___________</header>   
     <div class="Textarea">

        <form method="POST">
<h2><input type="text" name="title" maxlength="40" id="secureInput" placeholder="Enter your blog Tittle Here ...." value="<?= $post['title'] ?>" required></h2>
<textarea name="content" required> <?= $post['content'] ?></textarea>
<br>
<br>
<br>
 <h2 id="footer">
        <a href="Chome.php" class="btn btn-primary btn-lg">
          <span class="glyphicon glyphicon-circle-arrow-left"></span> Back
        </a> 

        <button type="submit" class="btn btn-primary btn-lg">
  <span class="glyphicon glyphicon-send"></span> Update
</button>
       
    </h2>
        </form>
    
    
    </div>

    </div>

<?php

 if ($_SERVER['REQUEST_METHOD']=='POST') 
{
    $title = $_POST['title'];
    $content = $_POST['content'];
    $stmt = $conn->prepare("UPDATE posts SET title=?, content=? WHERE id=?");
    $stmt->bind_param("ssi", $title, $content, $id);
    $stmt->execute();
    echo "<script>alert('Post updated successfully!'); window.location.href = 'Admin.php';</script>";
    exit();

   
}
?>


</body>
</html>

