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
  <title>𝗕𝗹𝗼𝗴𝗦𝗰𝗿𝗶𝗽𝘁/Admin</title>


  <!-- cdn JQUARY -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!--style cdn -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>  <!-- cdn bootstrap -->
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">  <!-- cdn fontstyle  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>  <!-- cdn animation  -->
  <!-- CSs link -->
<link rel="stylesheet" href="Style/Chome.css" type="text/css">

 
 

</head>
<body>
  <div class="Rightside">
  <div class="header">
<div class="userlog"><img src="Images/user.png">
   
     <?php
session_start();
$user_email=$_SESSION['email'];
$result = $conn->query("SELECT * FROM users WHERE EMAIL='$user_email'");
$row = $result->fetch_assoc();
$Name=$row['USER_NAME'];
$Blogger_id=$row['ID'];
echo $Name;
echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; USER ID: "."BLOGGER2025/".$Blogger_id;
 ?>
 <br>
  <a  href="index.php" style="text-decoration:none; color:azure; padding-left:40px;outline:none; border:none;" onclick="return confirm('Are you sure ! to signout')"> <span class="glyphicon glyphicon-log-out"></span> Log out </a>
  </div>
    <div class="search">
    <form method="GET" action="Chome.php">
    <input type="text" name="search" placeholder="Enter keywords...">
    <button type="submit" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-search"></span>Search</button>
</form>
  </div>
 </div>
   <h2 class="Post"><a href="Create.php?id=<?php echo $Blogger_id ?>"> <span class="glyphicon glyphicon-plus-sign"> </span> CREATE POST</a></h2>
    <table>

      <tr>
        <!-- <th>ID</th> -->
        <th>Tittle</th>
        <th>Content</th>
        <th>Created At</th>
        <th>Action</th>
      </tr>

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
                    <button class='a1'><a href='view.php?id={$row['id']}' class='glyphicon glyphicon-eye-open'></a></button>
                    <button class='a2'><a href='Update.php?id={$row['id']}' class='glyphicon glyphicon-edit'></a></button>
                    <button class='a3'><a href='delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")' class='glyphicon glyphicon-trash'></a></button>
                    
                </td>
                
              </tr>";


            }
       
    } else 
    {
     
      
      echo "<script>
            alert('No data found !');
            window.location.href = 'Chome.php';
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
                    <button class='a1'><a href='view.php?id={$row['id']}' class='glyphicon glyphicon-eye-open'></a></button>
                    <button class='a2'><a href='Update.php?id={$row['id']}' class='glyphicon glyphicon-edit'></a></button>
                    <button class='a3'><a href='delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'  class='glyphicon glyphicon-trash'></a></button>

                </td>
                
              </tr>";
    }
  }
    ?>
    
    </table>
  </div>
</body>
</html>

