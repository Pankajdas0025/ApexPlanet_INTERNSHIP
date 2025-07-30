<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>𝗕𝗹𝗼𝗴𝗦𝗰𝗿𝗶𝗽𝘁/Home</title>

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
  <link rel="stylesheet" href="Style.css" type="text/css">
  

</head>
<body >
  <header>
    <div class="navbar">
        <!-- website_name -->
      <div class="website_name">≛⃝𝗕𝗹𝗼𝗴𝗦𝗰𝗿𝗶𝗽𝘁</div>
  </header>

  <main>
    <section class="hero">
      <h1>Welcome to the BlogScript</h1>
    
      <p>Here you can read and write your scripted blogs  </p>
      <P>To create a blog, Please login and use the admin panel to publish from your space</P> 
    <a href="Authetication.php" class="btn btn-primary btn-lg" onclick="return confirm('Please , Read all terms & service before becoming a BlogScript Creator')"><span class="glyphicon glyphicon-triangle-right"></span>Login</a>
      <br>

    </section>

    <!------post section -------------------------------------------------------------->
    <section class="posts content" id="mainContent">
      <h2>All Blogs</h2>
 
    <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="text" name="search" placeholder="Enter keywords..." style="font-size:16px; font-family:'Poppins', sans-serif;">
    <button type="submit" class="btn btn-info btn-lg">
    <span class="glyphicon glyphicon-search"></span>Search</button>
    </form>


    <br>
    <br>

<?php
include 'db.php';

if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
    $search = $conn->real_escape_string($_GET['search']);
    $query = "SELECT * FROM posts WHERE title LIKE '%$search%' OR content LIKE '%$search%'  OR created_at LIKE '%$search%'";
    $result = $conn->query($query);
     if ($result->num_rows!=0) {
      
  
        while ($row = $result->fetch_assoc())

        {  
           echo "<div class='post_box'>
        <h2 id='post_tittle'>{$row['title']}<button id='span'  onclick=\"copyLink('view.php?id={$row['id']}')\"><span class='glyphicon glyphicon-share-alt'></span></button> </h2><br>
        <textarea id='post_content' readonly>{$row['content']}</textarea>
<div class='post_footer'><a  href='view.php?id={$row['id']}'>Read More.. </a> <a>{$row['created_at']}</a></div>
      </div>";


        }
       
    } else 
    {
     
      
      echo "<script>
            alert('No data found !');
            window.location.href = 'index.php';
          </script>";
      
    }
}

else
{
  $result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
    while ($row = $result->fetch_assoc())
     {
        echo "
        <div class='post_box'>
        <h2 id='post_tittle'>{$row['title']}<button id='span'  onclick='copyLink()'><span class='glyphicon glyphicon-share-alt'></span></button> </h2><br>
        <textarea id='post_content' readonly>{$row['content']}</textarea>
<div class='post_footer'><a  href='view.php?id={$row['id']}'>Read More.. </a> <a>{$row['created_at']}</a></div>
      </div>";
    }
  }
    ?>
       
    </section>
  </main>


  <footer>
    <p><a href="https://drive.google.com/file/d/17XUmVf4YEe-3BXceomfECZifhSNRhILa/view?usp=drive_link">Privacy & Policy | </a> <a href="https://drive.google.com/file/d/1gC6tuELq2-wC4WE1MEIopsIGkldPnTDh/view?usp=drive_link">Terms & Services</a><a href="https://wa.me/919155726625?text=Hey%2C%20can%20you%20Please%20share%20the%20details%20about%20𝗕𝗹𝗼𝗴𝗦𝗰𝗿𝗶𝗽𝘁"> | Contact us</a>
    <p>&copy; 2025 >≛⃝𝗕𝗹𝗼𝗴𝗦𝗰𝗿𝗶𝗽𝘁 All rights reserved.</p>
  </footer>
 <script>

  
  function copyLink(relativePath) {
    const baseURL = window.location.origin + "/MYPHP/CRUD/" + relativePath;
    navigator.clipboard.writeText(baseURL).then(() => {
      alert("Copied blog link to clipboard!");
    }).catch(() => {
      alert("Failed to copy!");
    });
  }
</script>
</body>
</html>
