<?php
include 'src/db.php';
include 'src/config.php';
session_start();
$_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <style>
 /* Welcome (Splash) Screen */

    #welcome {
      top: 0;
      left: 0;
      position:absolute;
      width: 100%;
      height: 100vh;
      background: linear-gradient(270deg, var(--primary-color),white , var(--secondary-color));
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2em;
      font-weight: bold;
      z-index: 9999;
      animation: fadeOut 1s ease forwards;
      animation-delay: 3s; /* 3s tak welcome dikhe */
    }
    @keyframes fadeOut {
      to {
        opacity: 0;
        visibility: hidden;
      }
    }
    /* Home Content */
    #home {
      display: none;
      animation: fadeIn 1s ease forwards;
    }
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
</style>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Home</title>
<meta name="theme-color" content="#ffffff">
<meta name="application-name" content="BlogScript"/>
<meta name="description" content="BlogScript is a simple blogging platform where you can read, write, and share creative blogs. Explore ideas, stories, and knowledge shared by creators."/>
<meta name="keywords" content="BlogScript, blogging platform, write blogs, share stories, creative blogs, read blogs, online writing, blog community, BlogScript creator"/>
<meta name="author" content="BlogScript"/>
<link rel="manifest" href="src/manifest.json">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://blogscriptapp.free.nf/home/">
<meta property="og:title" content="BlogScript - a simple blogging platform to read, write & share blogs">
<meta property="og:description"  content="BlogScript is a simple blogging platform where you can read, write, and share creative blogs. Explore ideas, stories, and knowledge shared by creators."/>
<meta property="og:image" content="https://blogscriptapp.free.nf/Images/og.png">

<!-- Twitter Card for Social Media -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://blogscriptapp.free.nf/home/">
<meta property="twitter:title" content="BlogScript - Read, Write & Share Blogs">
<meta property="twitter:description" content="BlogScript is a creative blogging platform where you can read stories, write blogs, and share your ideas with the world. Join our community of creators today!">
<meta property="twitter:image" content="https://blogscriptapp.free.nf/home/Images/og.png">
<!-- Instagram Card for Social Media -->
<meta property="instagram:card" content="summary_large_image">
<meta property="instagram:url" content="https://blogscriptapp.free.nf/home/">
<meta property="instagram:title" content="BlogScript - Read, Write & Share Blogs">
<meta property="instagram:description" content="BlogScript is a creative blogging platform where you can read stories, write blogs, and share your ideas with the world. Join our community of creators today!">
<meta property="instagram:image" content="https://blogscriptapp.free.nf/home/Images/og.png">
<!-- Robots -->
<meta name="robots" content="index, follow">
<!-- Canonical URL -->
<link rel="canonical" href="https://blogscriptapp.free.nf/home/">
<!-- Sitemap -->
<link rel="sitemap" type="application/xml" title="Sitemap" href="src/sitemap.xml">
 <!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
<link rel="manifest" href="favicon_io/site.webmanifest">
<!-- Bootstrap CSS (first) -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<!-- Fonts & Animations -->
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<!-- Custom CSS (last) -->
<link rel="stylesheet" href="style/style.css" type="text/css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "name": "Blogscript",
  "url": "https://blogscript.example.com/",
  "logo": "https://blogscript.example.com/images/logo.png",
  "description": "Blogscript is an educational platform that provides BCA notes, blogs, assignments, and project ideas to help students learn and grow.",
  "publisher": {
    "@type": "Organization",
    "name": "Blogscript",
    "logo": {
      "@type": "ImageObject",
      "url": "https://blogscript.example.com/images/logo.png"
    }
  },
  "sameAs": [
    "https://www.facebook.com/blogscript",
    "https://www.instagram.com/blogscript",
    "https://www.linkedin.com/company/blogscript",
    "https://twitter.com/blogscript"
  ],
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://blogscript.example.com/search?q={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>

</head>

<body>
<div id="welcome"><img src="Images/android-chrome-512x512.png" alt="Logo" height="300" width="300"> <br></div>
<main id="home">
<header>
<div class="navbar"><div class="website_name">BlogScript</div></div>
</header>

    <section class="hero">
      <h1>Welcome to BlogScript</h1>
      <p>Here you can read and write your scripted blogs.</p>
      <p>To create a blog, please log in and use the admin panel to publish from your space.</p>
      <a href="register" class="btn btn-primary btn-lg" data-toggle="tooltip" data-placement="left" title="Become a Creator.." onclick="return confirm('Please read all terms & service before becoming a BlogScript Creator')">
        <span class="glyphicon glyphicon-log-in"></span> Login
      </a>
      <br>
      <br>
       <a href="admin" class="btn btn-primary btn-lg">
        <span class="glyphicon glyphicon-cog"></span> Dashbord
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
                        <button id='span' onclick=\"copyLink('post/view?id=$id')\">
                          <span class='glyphicon glyphicon-share-alt'></span>
                        </button>
                      </h2><br>
                      <textarea id='post_content' readonly>$content</textarea>
                      <div class='post_footer'>
                        <a href='view?id=$id'>Read More..</a>
                        <a>$created</a>
                      </div>
                    </div>
                  ";
              }
          } else {
              echo "<p>No blogs matched your search. Try different keywords.</p>";
          }
      } else {

        $result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC LIMIT 5");

while ($row = $result->fetch_assoc()) {

    $title = safe_output($row['title']);
    $content = safe_output($row['content']);
    $created = safe_output($row['created_at']);
    $id = $row['id'];

    echo "
      <div class='post_box'>
        <h2 id='post_tittle'>
          $title
          <button id='span' onclick=\"copyLink('post/view?id=$id')\">
            <span class='glyphicon glyphicon-share-alt'></span>
          </button>
        </h2><br>
        <textarea id='post_content' readonly>$content</textarea>
        <div class='post_footer'>
          <a href='view?id=$id'>Read More..</a>
          <a>$created</a>
        </div>
      </div>
    ";
}


      }
      ?>
    </section>



  <footer>
    <div>
      <a href="https://drive.google.com/file/d/17XUmVf4YEe-3BXceomfECZifhSNRhILa/view?usp=drive_link">Privacy & Policy</a> |
      <a href="https://drive.google.com/file/d/1gC6tuELq2-wC4WE1MEIopsIGkldPnTDh/view?usp=drive_link">Terms & Services</a> |
      <a href="https://wa.me/919155726625?text=Hey%2C%20can%20you%20Please%20share%20the%20details%20about%20𝗕𝗹𝗼𝗴𝗦𝗰𝗿𝗶𝗽𝘁">Contact us</a>
    </div>
    <p>&copy; 2025 ≛⃝𝗕𝗹𝗼𝗴𝗦𝗰𝗿𝗶𝗽𝘁 All rights reserved.</p>
  </footer>

    </main>
  <script>
    function copyLink(relativePath) {
      const baseURL = window.location.origin + "/" + relativePath;
      navigator.clipboard.writeText(baseURL).then(() => {
        alert("Copied blog link to clipboard!");
      }).catch(() => {
        alert("Failed to copy!");
      });
    }




    // Jab window load ho tab timer start karo
    window.addEventListener("load", () => {
      setTimeout(() => {
        document.getElementById("welcome").style.display = "none";
        document.getElementById("home").style.display = "block";
      }, 3000); // 3s delay + 1s fade animation
    });
  </script>
</body>
</html>
