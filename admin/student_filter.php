<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard</title>-->
    <!-- <link rel="stylesheet" href="admin.css"> -->
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>

  <style>
    /* Googlefont Poppins CDN Link */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }
    .sidebar{
      position: fixed;
      height: 100%;
      width: 240px;
      background: #0A2558;
      transition: all 0.5s ease;
    }
    .sidebar.active{
      width: 60px;
    }
    .sidebar .logo-details{
      height: 80px;
      display: flex;
      align-items: center;
    }
    .sidebar .logo-details i{
      font-size: 28px;
      font-weight: 500;
      color: #fff;
      min-width: 60px;
      text-align: center
    }
    .sidebar .logo-details .logo_name{
      color: #fff;
      font-size: 24px;
      font-weight: 500;
    }
    .sidebar .nav-links{
      margin-top: 10px;
    }
    .sidebar .nav-links li{
      position: relative;
      list-style: none;
      height: 50px;
    }
    .sidebar .nav-links li a{
      height: 100%;
      width: 100%;
      display: flex;
      align-items: center;
      text-decoration: none;
      transition: all 0.4s ease;
    }
    .sidebar .nav-links li a.active{
      background: #081D45;
    }
    .sidebar .nav-links li a:hover{
      background: #081D45;
    }
    .sidebar .nav-links li i{
      min-width: 60px;
      text-align: center;
      font-size: 18px;
      color: #fff;
    }
    .sidebar .nav-links li a .links_name{
      color: #fff;
      font-size: 15px;
      font-weight: 400;
      white-space: nowrap;
    }
    .sidebar .nav-links .log_out{
      position: absolute;
      bottom: 0;
      width: 100%;
    }
    .home-section{
      position: relative;
      background: #f5f5f5;
      min-height: 100vh;
      width: calc(100% - 240px);
      left: 240px;
      transition: all 0.5s ease;
    }
    .sidebar.active ~ .home-section{
      width: calc(100% - 60px);
      left: 60px;
    }
    .home-section nav{
      display: flex;
      justify-content: space-between;
      height: 80px;
      background: #fff;
      display: flex;
      align-items: center;
      position: fixed;
      width: calc(100% - 240px);
      left: 240px;
      z-index: 100;
      padding: 0 20px;
      box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
      transition: all 0.5s ease;
    }
    .sidebar.active ~ .home-section nav{
      left: 60px;
      width: calc(100% - 60px);
    }
    .home-section nav .sidebar-button{
      display: flex;
      align-items: center;
      font-size: 24px;
      font-weight: 500;
    }
    nav .sidebar-button i{
      font-size: 35px;
      margin-right: 10px;
    }
    .home-section nav .search-box{
      position: relative;
      height: 50px;
      max-width: 550px;
      width: 100%;
      margin: 0 20px;
    }
    nav .search-box input{
      height: 100%;
      width: 100%;
      outline: none;
      background: #F5F6FA;
      border: 2px solid #EFEEF1;
      border-radius: 6px;
      font-size: 18px;
      padding: 0 15px;
    }
    nav .search-box .bx-search{
      position: absolute;
      height: 40px;
      width: 40px;
      background: #2697FF;
      right: 5px;
      top: 50%;
      transform: translateY(-50%);
      border-radius: 4px;
      line-height: 40px;
      text-align: center;
      color: #fff;
      font-size: 22px;
      transition: all 0.4 ease;
    }
    .home-section nav .profile-details{
      display: flex;
      align-items: center;
      background: #F5F6FA;
      border: 2px solid #EFEEF1;
      border-radius: 6px;
      height: 50px;
      min-width: 190px;
      padding: 0 15px 0 2px;
    }
    nav .profile-details img{
      height: 40px;
      width: 40px;
      border-radius: 6px;
      object-fit: cover;
    }
    nav .profile-details .admin_name{
      font-size: 15px;
      font-weight: 500;
      color: #333;
      margin: 0 10px;
      white-space: nowrap;
    }
    nav .profile-details i{
      font-size: 25px;
      color: #333;
    }
    .home-section .home-content{
      position: relative;
      padding-top: 104px;
    }
    .home-content .overview-boxes{
      display: flex;
      align-items: center;
      /* justify-content:start; */
      /* margin-right: 10; */
      flex-wrap: wrap;
      padding: 0 20px;
      margin-bottom: 26px;
    }
    .overview-boxes .box{
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 3%;
      /* width: calc(100% / 4 - 15px); */
      background: #fff;
      padding: 15px 14px;
      border-radius: 12px;
      box-shadow: 0 5px 10px rgba(0,0,0,0.1);
    }
    .overview-boxes .box-topic{
      font-size: 20px;
      font-weight: 500;
    }
    .home-content .box .number{
      display: inline-block;
      font-size: 35px;
      margin-top: -6px;
      font-weight: 500;
    }
    .home-content .box .indicator{
      display: flex;
      align-items: center;
    }
    .home-content .box .indicator i{
      height: 20px;
      width: 20px;
      background: #8FDACB;
      line-height: 20px;
      text-align: center;
      border-radius: 50%;
      color: #fff;
      font-size: 20px;
      margin-right: 5px;
    }
    .box .indicator i.down{
      background: #e87d88;
    }
    .home-content .box .indicator .text{
      font-size: 12px;
    }
    .home-content .box .cart{
      display: inline-block;
      font-size: 32px;
      height: 50px;
      width: 50px;
      background: #cce5ff;
      line-height: 50px;
      text-align: center;
      color: #66b0ff;
      border-radius: 12px;
      margin: -15px 0 0 6px;
    }
    .home-content .box .cart.two{
      color: #2BD47D;
      background: #C0F2D8;
    }
    .home-content .box .cart.three{
      color: #ffc233;
      background: #ffe8b3;
    }
    .home-content .box .cart.four{
      color: #e05260;
      background: #f7d4d7;
    }
    .home-content .total-order{
      font-size: 20px;
      font-weight: 500;
    }
    .home-content .sales-boxes{
      display: flex;
      justify-content: space-between;
      /* padding: 0 20px; */
    }

    /* left box */
    .home-content .sales-boxes .recent-sales{
      width: 100%;
      background: #fff;
      padding: 20px 30px;
      margin: 0 20px;
      border-radius: 12px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }
    .home-content .sales-boxes .sales-details{
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .sales-boxes .box .title{
      font-size: 24px;
      font-weight: 500;
      /* margin-bottom: 10px; */
    }
    .sales-boxes .sales-details li.topic{
      font-size: 20px;
      font-weight: 500;
    }
    .sales-boxes .sales-details li{
      list-style: none;
      margin: 8px 0;
    }
    .sales-boxes .sales-details li a{
      font-size: 18px;
      color: #333;
      font-size: 400;
      text-decoration: none;
    }
    .sales-boxes .box .button{
      width: 100%;
      display: flex;
      justify-content: flex-end;
    }
    .sales-boxes .box .button a{
      color: #fff;
      background: #0A2558;
      padding: 4px 12px;
      font-size: 15px;
      font-weight: 400;
      border-radius: 4px;
      text-decoration: none;
      transition: all 0.3s ease;
    }
    .sales-boxes .box .button a:hover{
      background:  #0d3073;
    }

    /* Right box */
    .home-content .sales-boxes .top-sales{
      width: 35%;
      background: #fff;
      padding: 20px 30px;
      margin: 0 20px 0 0;
      border-radius: 12px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }
    .sales-boxes .top-sales li{
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin: 10px 0;
    }
    .sales-boxes .top-sales li a img{
      height: 40px;
      width: 40px;
      object-fit: cover;
      border-radius: 12px;
      margin-right: 10px;
      background: #333;
    }


    /* Responsive Media Query */
    @media (max-width: 1240px) {
      .sidebar{
        width: 60px;
      }
      .sidebar.active{
        width: 220px;
      }
      .home-section{
        width: calc(100% - 60px);
        left: 60px;
      }
      .sidebar.active ~ .home-section{
        /* width: calc(100% - 220px); */
        overflow: hidden;
        left: 220px;
      }
      .home-section nav{
        width: calc(100% - 60px);
        left: 60px;
      }
      .sidebar.active ~ .home-section nav{
        width: calc(100% - 220px);
        left: 220px;
      }
    }
    @media (max-width: 1150px) {
      .home-content .sales-boxes{
        flex-direction: column;
      }
      .home-content .sales-boxes .box{
        width: 100%;
        overflow-x: scroll;
        margin-bottom: 30px;
      }
      .home-content .sales-boxes .top-sales{
        margin: 0;
      }
    }
    @media (max-width: 1000px) {
      .overview-boxes .box{
        width: calc(100% / 2 - 15px);
        margin-bottom: 15px;
      }
    }
    @media (max-width: 700px) {
      nav .sidebar-button .dashboard,
      nav .profile-details .admin_name,
      nav .profile-details i{
        display: none;
      }
      .home-section nav .profile-details{
        height: 50px;
        min-width: 40px;
      }
      .home-content .sales-boxes .sales-details{
        width: 560px;
      }
    }
    @media (max-width: 550px) {
      .overview-boxes .box{
        width: 100%;
        margin-bottom: 15px;
      }
      .sidebar.active ~ .home-section nav .profile-details{
        display: none;
      }
    }
      @media (max-width: 400px) {
      .sidebar{
        width: 0;
      }
      .sidebar.active{
        width: 60px;
      }
      .home-section{
        width: 100%;
        left: 0;
      }
      .sidebar.active ~ .home-section{
        left: 60px;
        width: calc(100% - 60px);
      }
      .home-section nav{
        width: 100%;
        left: 0;
      }
      .sidebar.active ~ .home-section nav{
        left: 60px;
        width: calc(100% - 60px);
      }
    }

  </style>
   
<body>

<?php
  require_once('db.php');
  
  $query = "select * from student_data";
  $result = mysqli_query($con,$query);
  // When form submitted, insert values into the database.

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
          <a href="/student_dropout_analysis/admin/student_filter.php" class="active">
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
          <a href="/student_dropout_analysis/admin/add_data.php" >
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
        <span class="dashboard">Search Blood</span>
      </div>
      
      <div class="profile-details">
        <img src="https://i.ibb.co/QJbfhSv/review-1.png" alt="">
        <span class="admin_name"><?php echo $_SESSION['username']; ?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>


    <div class="home-content">
    <div class="sales-boxes">
      <div class="recent-sales box">
        <table class="table table-bordered text-center">
          <tr class="bg-dark text-white">
            <td>Student Name</td>
            <td>Age</td>
            <td>Gender</td>
            <td>Caste</td>
            <td>School</td>
            <td>Area</td>
            <td>City</td>
            <td>Edit</td>
            <td>Delete</td>
          </tr>
          <tr>
              <?php
                while ($row = mysqli_fetch_assoc($result)) 
                {
                  
              ?>

              <td><?php echo $row['name']; ?> </td>
              <td><?php echo $row['age']; ?> </td>
              <td><?php echo $row['gender']; ?> </td>
              <td><?php echo $row['caste']; ?> </td>
              <td><?php echo $row['school']; ?> </td>
              <td><?php echo $row['area']; ?> </td>
              <td><?php echo $row['city']; ?> </td>
              
              <td><a href="update-form.php?edit=<?php echo $row['id'];?>"><button class="btn btn-success">Edit</button></a></td>
              <td><a href="delete.php?delete=<?php echo $row['id'];?>" onclick="return confirm('Are you sure want to delete this record?')"><button class="btn btn-danger" >Delete</button></a></td>
          </tr>

              <?php 
                }    
              ?>

        </table>
      </div>
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

