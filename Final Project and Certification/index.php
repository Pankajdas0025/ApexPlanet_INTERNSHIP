
<?php include 'db.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>𝗕𝗹𝗼𝗴𝗦𝗰𝗿𝗶𝗽𝘁/Home</title>

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
  <link rel="manifest" href="favicon_io/site.webmanifest">

  <!-- jQuery (keep only one) -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

  <!-- Bootstrap & fonts -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

  <!-- Custom CSS -->
  <link rel="stylesheet" href="Style.css" type="text/css">
</head>

<body>
  <header>
    <div class="navbar">
      <div class="website_name">≛⃝𝗕𝗹𝗼𝗴𝗦𝗰𝗿𝗶𝗽𝘁</div>
    </div>
  </header>

  <main>
    <section class="hero">
      <h1>Welcome to BlogScript</h1>
      <p>Here you can read and write your scripted blogs.</p>
      <p>To create a blog, please log in and use the admin panel to publish from your space.</p> 
      <a href="Authetication.php" class="btn btn-primary btn-lg" onclick="return confirm('Please read all terms & service before becoming a BlogScript Creator')">
        <span class="glyphicon glyphicon-triangle-right"></span> Login
      </a>
      <br>
    </section>

    <!-- Post section -->
    <section class="posts content" id="mainContent">
      <h2>All Blogs</h2>

      <!-- Search form -->
      <form method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <input type="text" name="search" placeholder="Enter keywords..." style="font-size:16px; font-family:'Poppins', sans-serif;">
        <button type="submit" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-search"></span> Search
        </button>
      </form>

      <br><br>

      <?php
   
      function safe_output($text) {
      return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
      }

      if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
          $search = $conn->real_escape_string($_GET['search']);
          $query = "SELECT * FROM posts WHERE title LIKE '%$search%' OR content LIKE '%$search%' OR created_at LIKE '%$search%'";
          $result = $conn->query($query);

          if ($result && $result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  $title = safe_output($row['title']);
                  $content = safe_output($row['content']);
                  $created = safe_output($row['created_at']);
                  $id = $row['id'];
                  echo "
                    <div class='post_box'>
                      <h2 id='post_tittle'>
                        $title 
                        <button id='span' onclick=\"copyLink('view.php?id=$id')\">
                          <span class='glyphicon glyphicon-share-alt'></span>
                        </button>
                      </h2><br>
                      <textarea id='post_content' readonly>$content</textarea>
                      <div class='post_footer'>
                        <a href='view.php?id=$id'>Read More..</a> 
                        <a>$created</a>
                      </div>
                    </div>
                  ";
              }
          } else {
              echo "<p>No blogs matched your search. Try different keywords.</p>";
          }
      } else {
          $result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
          while ($row = $result->fetch_assoc()) {
              $title = safe_output($row['title']);
              $content = safe_output($row['content']);
              $created = safe_output($row['created_at']);
              $id = $row['id'];
              echo "
                <div class='post_box'>
                  <h2 id='post_tittle'>
                    $title 
                    <button id='span' onclick=\"copyLink('view.php?id=$id')\">
                      <span class='glyphicon glyphicon-share-alt'></span>
                    </button>
                  </h2><br>
                  <textarea id='post_content' readonly>$content</textarea>
                  <div class='post_footer'>
                    <a href='view.php?id=$id'>Read More..</a> 
                    <a>$created</a>
                  </div>
                </div>
              ";
          }
      }
      ?>
    </section>
  </main>

  <footer>
    <div>
      <a href="https://drive.google.com/file/d/17XUmVf4YEe-3BXceomfECZifhSNRhILa/view?usp=drive_link">Privacy & Policy</a> |
      <a href="https://drive.google.com/file/d/1gC6tuELq2-wC4WE1MEIopsIGkldPnTDh/view?usp=drive_link">Terms & Services</a> |
      <a href="https://wa.me/919155726625?text=Hey%2C%20can%20you%20Please%20share%20the%20details%20about%20𝗕𝗹𝗼𝗴𝗦𝗰𝗿𝗶𝗽𝘁">Contact us</a>
    </div>
    <p>&copy; 2025 ≛⃝𝗕𝗹𝗼𝗴𝗦𝗰𝗿𝗶𝗽𝘁 All rights reserved.</p>
  </footer>

  <script>
    function copyLink(relativePath) {
      const baseURL = window.location.origin + "/" + relativePath;
      navigator.clipboard.writeText(baseURL).then(() => {
        alert("Copied blog link to clipboard!");
      }).catch(() => {
        alert("Failed to copy!");
      });
    }
  </script>
</body>
</html>
