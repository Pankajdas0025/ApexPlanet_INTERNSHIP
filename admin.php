<?php
include 'src/db.php';
include 'src/config.php';
session_start();

if (!isset($_SESSION['email']))
    {
    echo "<script>alert('Plesase Login ');</script>";
    header("Location:register");
    exit();
    }

$user_email = $_SESSION['email'] ?? '';
$result = $conn->query("SELECT * FROM users WHERE EMAIL='$user_email'");
$row = $result->fetch_assoc();
$Name = $row['USER_NAME'] ?? 'Admin';
$Blogger_id = $row['ID'] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin - Dashboard</title>

<!-- favicon ============================================================================================-->
<link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">


<style>
    @import url('style/root.css');
body {
    font-family: 'Poppins', sans-serif;
    background: #f3f5f9;
    margin: 0;
    padding: 10px;
}

.Rightside {
    max-width: 100%;
    min-height: 100vh;
    height: auto;
    margin:0;
    padding: 10px;
    background: linear-gradient(45deg,#6366f1,#f43f5e);
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    margin-bottom: 20px;
}

.userlog {
    color: #ffffffff;
    font-size: 15px;
}

.userlog img {
    width: 50px;
    border-radius: 50%;
    vertical-align: middle;
    margin-right: 10px;
    border: 2px dotted white;
}

.userlog a {
    margin-left: 10px;
    color: #ffffff;
    text-decoration: none;
    transition: 0.3s;
    border: none;
    outline: none;
}

.userlog a:hover {
    color: #0056b3;
}

.search input {
    padding: 6px 10px;
    width: 200px;
    margin-left: 5px;
    border: 1px solid #ccc;
}

.search button {
    padding: 6px 12px;
    border: none;
    background:#6366f1;
    color: #fff;
    border-radius: 4px;
    cursor: pointer;
}

.search button:hover {
    background: #0056b3;
}

.Post a {
    display: inline-block;
    margin: 15px 0;
    font-size: 20px;
    padding: 8px 12px;
    background: #ffffffff;
    color: #110a0aff;
    text-decoration: none;
    transition: 0.3s;
}

.Post a:hover {
    background:#6366f1;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
    background: #fff;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

table th, table td {
    padding: 12px 15px;
    text-align: left;
    height: auto;
}

table th {
    background:#6366f1;
    color: #fff;
}

table tr:nth-child(even) {
    background: #f9f9f9;
}

textarea {
    width: 100%;
    border: none;
    resize: none;
    background: transparent;
    font-family: inherit;
}

button.a1, button.a2, button.a3 {
    border: none;
    padding: 6px 10px;
    margin-right: 4px;
    border-radius: 6px;
    cursor: pointer;
    color: #fff;
}

.a1 { background: #8f9fa2ff; } /* view */
.a2 { background: #ffc107; } /* edit */
.a3 { background: #dc3545; } /* delete */

.a1:hover { background: #138496; }
.a2:hover { background: #e0a800; }
.a3:hover { background: #c82333; }

@media (max-width: 700px){
        body {  padding: 1px 2.5px; }

.Rightside
{
    width: 100%;
    margin: 0;

}
.header
{
flex-direction: column;
align-items: flex-start;
gap: 10px;
}
    .search input { width: 100%; margin-bottom: 20px; }
    table th, table td { font-size: 10px; padding: 8px 4px; }

button.a1, button.a2, button.a3 {

    padding: 6px 10px;
    margin: 2.5px;
    border-radius: 0px;
    cursor: pointer;
    color: #fff;
}

}

</style>
</head>

<body>
<?php include 'components/header.php'; ?>
<div class="Rightside">
    <div class="header">
        <div class="userlog">
            <img src="Images/Admin.png" alt="Admin">
            <strong><?= $Name ?></strong>
            BLOGGER2025/<?= $Blogger_id ?>
                        <a href="logout" onclick="return confirm('Are you sure to Logout?')">
                <span class="glyphicon glyphicon-log-out"></span> Log out
            </a>
              <a href="home">
                <span class="glyphicon glyphicon-home"></span> Home
            </a>
        </div>

        <div class="search">
            <form method="GET" action="">
                <input type="text" name="search" placeholder="Enter keywords...">
                <button type="submit"><span class="glyphicon glyphicon-search"></span> Search</button>
            </form>
        </div>
    </div>

    <h2 class="Post">
        <a href="create?id=<?= $Blogger_id ?>">
            <span class="glyphicon glyphicon-plus-sign"></span> CREATE POST
        </a>
    </h2>

    <table>
        <tr>
            <th width='20%'>Title</th>
            <th>Content</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
  <!-- post table row ==============================================================================================--->

<?php

if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
    $search = $conn->real_escape_string($_GET['search']);
    $query = "SELECT * FROM posts WHERE user_id='$Blogger_id' AND (title LIKE '%$search%' OR content LIKE '%$search%'  OR created_at LIKE '%$search%')";
    $result = $conn->query($query);
     if ($result->num_rows > 0) {


        while ($row = $result->fetch_assoc())

        {
           echo "<tr>


                <td class='ttittle'>{$row['title']}</td>
                <td><textarea readonly>{$row['content']}</textarea></td>
                <td>{$row['created_at']}</td>
                 <td>
                    <button class='a1'><a href='view?id={$row['id']}><i class='fa-solid fa-eye'></i></a></button>
                    <button class='a2'><a href='update?id={$row['id']}'><i class='fa-solid fa-pen-to-square'></i></a></button>
                    <button class='a3'><a href='delete?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'><i class='fa-solid fa-trash'></i></a></button>

                </td>

              </tr>";


            }

    } else
    {


      echo "<script>
            alert('No data found!');
            window.location.href = 'admin';
          </script>";

    }
}

else
{
  $result = $conn->query("SELECT * FROM posts  WHERE user_id='$Blogger_id'");
    while ($row = $result->fetch_assoc())
     {
        echo "<tr>

                <td class='ttittle'>{$row['title']}</td>
                <td><textarea readonly>{$row['content']}</textarea></td>
                <td>{$row['created_at']}</td>
                 <td>
                    <button class='a1'><a href='view?id={$row['id']}'><i class='fa-solid fa-eye'></i></a></button>
                    <button class='a2'><a href='update?id={$row['id']}'><i class='fa-solid fa-pen-to-square'></i></a></button>
                    <button class='a3'><a href='delete?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'><i class='fa-solid fa-trash'></i></a></button>

                </td>

              </tr>";
    }
  }
    ?>
    </table>
</div>
<?php include 'components/footer.php'; ?>
</body>
</html>
