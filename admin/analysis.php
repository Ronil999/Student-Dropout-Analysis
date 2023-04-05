<?php
require('db.php');
include("auth_session.php");

// Query to retrieve age data from database
$query = "SELECT age, caste, school, gender, city FROM student_data";

$result = mysqli_query($con, $query);

// Initialize an array to store age and count data
$age_data = array();
$caste_data = array();
$school_data = array();
$gender_data = array();
$city_data = array();

while ($row = mysqli_fetch_assoc($result)) {
  $age_data[] = $row['age'];
  $caste_data[] = $row['caste'];
  $school_data[] = $row['school'];
  $gender_data[] = $row['gender'];
  $city_data[] = $row['city'];
}

// Generate dynamic pie chart using Google Charts API
?>
<html>
  <head>
  
    <!--<title> Responsiive Admin Dashboard</title>-->
    <link rel="stylesheet" href="admin.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <style>
      .l{
        /* height:auto; */
        /* width:500px;
        border : 2px solid black; */
      }
      .r{
        /* margin-left:120%; */
        /* display : right ; */
        /* height:auto; */
        /* width:500px;
        border : 2px solid black; */
      }
    </style>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawAgeChart);

    function drawAgeChart() {
        var data = google.visualization.arrayToDataTable([
            ['Age', 'Count'],
            ['< 20', <?php echo count(array_filter($age_data, function($age){return $age<20;})); ?>],
            ['20-30', <?php echo count(array_filter($age_data, function($age){return $age>=20 && $age<=30;})); ?>],
            ['> 30', <?php echo count(array_filter($age_data, function($age){return $age>30;})); ?>]
        ]);

        var options = {
            title: 'Age Distribution',
            pieHole: 0.4
        };

        var chart = new google.visualization.PieChart(document.getElementById('age_chart'));
        chart.draw(data, options);
    }

    google.charts.setOnLoadCallback(drawCasteChart);

    function drawCasteChart() {
        var data = google.visualization.arrayToDataTable([
            ['Caste', 'Count'],
            <?php
            $caste_counts = array_count_values($caste_data);
            foreach ($caste_counts as $caste => $count) {
                echo "['" . $caste . "', " . $count . "],";
            }
            ?>
        ]);

        var options = {
            title: 'Caste Distribution',
            pieHole: 0.4
        };

        var chart = new google.visualization.PieChart(document.getElementById('caste_chart'));
        chart.draw(data, options);
    }

    google.charts.setOnLoadCallback(drawschoolChart);

    function drawschoolChart() {
        var data = google.visualization.arrayToDataTable([
            ['school', 'Count'],
            <?php
            $school_counts = array_count_values($school_data);
            foreach ($school_counts as $school => $count) {
                echo "['" . $school . "', " . $count . "],";
            }
            ?>
        ]);

        var options = {
            title: 'school Distribution',
            pieHole: 0.4
        };

        var chart = new google.visualization.PieChart(document.getElementById('school_chart'));
        chart.draw(data, options);
    }


    google.charts.setOnLoadCallback(drawcityChart);

    function drawcityChart() {
        var data = google.visualization.arrayToDataTable([
            ['city', 'Count'],
            <?php
            $city_counts = array_count_values($city_data);
            foreach ($city_counts as $city => $count) {
                echo "['" . $city . "', " . $count . "],";
            }
            ?>
        ]);

        var options = {
            title: 'city Distribution',
            pieHole: 0.4
        };

        var chart = new google.visualization.PieChart(document.getElementById('city_chart'));
        chart.draw(data, options);
    }

    google.charts.setOnLoadCallback(drawGenderChart);

    function drawGenderChart() {
        var data = google.visualization.arrayToDataTable([
            ['gender', 'Count'],
            <?php
            $gender_counts = array_count_values($gender_data);
            foreach ($gender_counts as $gender => $count) {
                echo "['" . $gender . "', " . $count . "],";
            }
            ?>
        ]);

        var options = {
            title: 'gender Distribution',
            pieHole: 0.4
        };

        var chart = new google.visualization.PieChart(document.getElementById('gender_chart'));
        chart.draw(data, options);
    }
    </script>


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
          <a href="/student_dropout_analysis/admin/analysis.php" class="active">
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
      
      <div class="profile-details">
        <img src="https://i.ibb.co/QJbfhSv/review-1.png" alt="">
        <span class="admin_name"><?php echo $_SESSION['username']; ?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    <div class="home-content">
    <!-- <div id="age_chart" style="width: 400px; height: auto;"></div>
    <div id="caste_chart" style="width: 400px; height: autopx;"></div>
    <div id="school_chart" style="width: 400px; height: autopx;"></div>
    <div id="city_chart" style="width: 400px; height: autopx;"></div>
    <div id="gender_chart" style="width: 400px; height: autopx;"></div> -->
    <div class="l">
      <div id="age_chart" style="width: 400px; height: auto;"></div>
      <div id="caste_chart" style="width: 400px; height: auto;"></div>
      <div id="school_chart" style="width: 400px; height: auto;"></div>
    <div>
    <div class="r">
      <div id="city_chart" style="width: 400px; height: autopx;"></div>
      <div id="gender_chart" style="width: 400px; height: auto;"></div>
    <div>
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

<?php
// Close database conection
mysqli_close($con);
?>
