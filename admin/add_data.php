<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard</title>-->
    <link rel="stylesheet" href="admin.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>

   <style>
      .button {
        /* margin-left: 10%; */
        display: inline-block;
        padding: 15px 25px;
        font-size: 15px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        outline: none;
        color: #fff;
        background-color: #4CAF50;
        border: none;
        border-radius: 15px;
        box-shadow: 0 9px #999;
      }

      .button:hover {background-color: #3e8e41}

      .button:active {
        background-color: #3e8e41;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
      }

   </style>
<body>


  <?php
      require_once('db.php');
  ?>



<div class="sidebar">
    <div class="logo-details">
      <span class="logo_name" style="margin-left: 10%;">SDA Admin</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="/student_dropout_analysis/admin/admin.php" >
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="/student_dropout_analysis/admin/student_filter.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Search</span>
          </a>
        </li>
        
        <li>
          <a href="/student_dropout_analysis/admin/analysis.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Analytics</span>
          </a>
        </li>
        <li>
          <a href="/student_dropout_analysis/admin/add_data.php" class="active">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Add Data</span>
          </a>
        </li>
        <li>
          <a href="/student_dropout_analysis/admin/team.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">Team</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Setting</span>
          </a>
        </li>
        <li class="log_out">
          <a href="/student_dropout_analysis/index.html">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
</div>



  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <!-- <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div> -->
      <div class="profile-details">
        <img src="https://i.ibb.co/QJbfhSv/review-1.png" alt="">
        <span class="admin_name"><?php echo $_SESSION['username']; ?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    <div class="home-content" >
      <form action="" method="post">
        Student Name   : <input name="name" style="padding: 12px 20px;  box-sizing: border-box; margin-left:1%"> <br> <br>

        Age  : <input name="age" style="padding: 12px 20px;  box-sizing: border-box; margin-left:7.5%"> <br> <br>

        Gender            : <input name="gender" style="padding: 12px 20px; box-sizing: border-box; margin-left:5.3%" > <br> <br>
        Caste     : <input name="caste" style="padding: 12px 20px; box-sizing: border-box; margin-left:6.3%"> <br> <br>
        School Name : <input name="school" style="padding: 12px 20px; box-sizing: border-box; margin-left:1.7%"> <br> <br>

        Area   : <input name="area" style="padding: 12px 20px;  box-sizing: border-box; margin-left:7%"> <br> <br>

        city   : <input name="city" style="padding: 12px 20px;  box-sizing: border-box; margin-left:7.6%"> <br> <br>

        Description      : <input name="desc" style="padding: 12px 20px; box-sizing: border-box; margin-left:2.8%"> <br> <br>
        <button name="submit" class="button">Add data</button> <br> <br>

        <?php
        // When form submitted, insert values into the database.
  $insert=false;
  if(isset($_REQUEST['name'])){
      // removes backslashes
      $name = $_POST['name'];
      $age = $_POST['age'];
      $gender = $_POST['gender'];
      $caste = $_POST['caste'];
      $school = $_POST['school'];
      $area = $_POST['area'];
      $city    = $_POST['city'];
      $desc = $_POST['desc'];

      if($name!="" && $city!="" && $age!="" && $gender!="" && $caste!="" && $school!="" && $area!="" && $desc!=""){
          $sql    = "INSERT INTO `student_data`(`name`, `age`, `gender`, `caste`, `school`, `area`, `city`,   `desc`) VALUES ('$name','$age','$gender','$caste','$school','$area','$city','$desc')";
          $result   = mysqli_query($con, $sql);
          if ($result == true) {
                      $insert = true;
          } 
      }
      else {
          echo "<p style='color:red'>Enter Valid input</p>";
      }
      
      
      // else {
      //         echo "ERROR: $sql <br> $con->error";
      //  }
      } 
            if($insert == true)
                echo "<p style='color:green'>Succesfully data inserted</p>"; 
        ?>
    </form>

    </div>
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>

