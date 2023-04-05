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


     <style>
html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}
</style>

   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <span class="logo_name" style="margin-left: 10%;">SDA Admin</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="/student_dropout_analysis/admin/admin.php">
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
          <a href="/student_dropout_analysis/admin/add_data.php">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Add Data</span>
          </a>
        </li>
        <li>
          <a href="/student_dropout_analysis/admin/team.php" class="active">
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
      
      <div class="profile-details">
        <img src="https://i.ibb.co/QJbfhSv/review-1.png" alt="">
        <span class="admin_name"><?php echo $_SESSION['username']; ?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    <div class="home-content">
    <div class="row">
  <div class="column">
    <div class="card">
      <img src="/student_dropout_analysis/image/ronil.jpeg" alt="ronil" style="width:100%">
      <div class="container">
        <h2>Ronil Lakhani</h2>
        <p class="title">Full Stack Devloper</p>
        <p>Student at CHARUSAT</p>
        <p>21IT071@charusat.edu.in</p>
        <p><button class="button">Contact</button></p>
        <br>
      </div>
    </div>
  </div>

  
  
  <div class="column">
    <div class="card">
      <img src="/student_dropout_analysis/image/saral.jpeg" alt="saral" style="width:100%">
      <div class="container">
        <h2>Saral</h2>
        <p class="title">Fronted Devloper</p>
        <p>Student at CHARUSAT</p>
        <p>21IT020@charusat.edu.in</p>
        <p><button class="button">Contact</button></p>
        <br>
      </div>
    </div>
  </div>


  <div class="column">
    <div class="card">
      <img src="/student_dropout_analysis/image/ayush.jpeg" alt="ayush" style="width:100%">
      <div class="container">
        <h2>Aayush Parmar</h2>
        <p class="title">Fronted Devloper</p>
        <p>Student at CHARUSAT</p>
        <p>21IT001@charusat.edu.in</p>
        <p><button class="button">Contact</button></p>
        <br>
      </div>
    </div>
  </div>
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

