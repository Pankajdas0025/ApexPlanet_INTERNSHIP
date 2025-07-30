
<?php
include 'db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM posts WHERE id=$id");
$post = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>𝗕𝗹𝗼𝗴𝗦𝗰𝗿𝗶𝗽𝘁/Blog/view</title>
     <!--favicon ------------------------------------------------------------------------------>
<link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
<link rel="manifest" href="favicon_io/site.webmanifest">
    
  <!-- cdn JQUARY -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!--style cdn -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>  <!-- cdn bootstrap -->
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">  <!-- cdn fontstyle  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>  <!-- cdn animation  -->
  <!-- CSs link -->
   <link rel="stylesheet" href="Style/View.css" type="text/css">
   
</head>
<body>
    <div class="Main"> 
    <header>_____________Ｂｌｏｇ___________ </header>   
     <div class="Textarea">
        <h2><?= $post['title'] ?><button id="span"  onclick="copyLink() " ><span class="glyphicon glyphicon-share-alt"></span></button>  </h2>
        <br>
        <br>
        <!-- <button id="span"><span class="glyphicon glyphicon-thumbs-up">10</span></button> -->
     <?= $post['content'] ?>
    <h2 id="footer">
        <!-- <a href="Admin.php" class="btn btn-primary btn-lg">
          <span class="glyphicon glyphicon-circle-arrow-left"></span> Left
        </a> -->
        
         <button id="span2"><span class="glyphicon glyphicon-user"><?= "  BLOGGER2025/".$post['user_id'] ?></span></button>
         <span id="span2" class="glyphicon glyphicon-calendar"><?=$post['created_at'] ?></span> </h2>
    </div>

    </div>

    <script>
        function copyLink()    
{
  const link = window.location.href; // Current page link
  navigator.clipboard.writeText(link).then(() => {
   window.alert("Copy to clipboard !")
  }).catch(err => {
    window.alert("Failed to Copy !")
  });
}
    </script>
</body>
</html>

