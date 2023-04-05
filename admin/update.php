<?php

include('db.php');
// $sql = "SELECT * FROM `adata` where id=$id";
// $result = mysqli_query($con,$sql);

if(isset($_GET['edit'])){

    $id= $_GET['edit'];
  $editData= edit_data($con, $id);
}

if(isset($_POST['update']) && isset($_GET['edit'])){

  $id= $_GET['edit'];
    update_data($con,$id);
    
    
} 
function edit_data($con, $id)
{
 $query= "SELECT * FROM student_data WHERE id= $id";
 $exec = mysqli_query($con, $query);
//  $row= mysqli_fecth_assoc($exec);
 $row = mysqli_fetch_assoc($exec);
 return $row;
}

// update data query
function update_data($con, $id){

      // $name= $_POST['name'];
      $age = $_POST['age'];
      $gender = $_POST['gender'];
      $caste = $_POST['caste'];
      $school = $_POST['school'];
      $area = $_POST['area'];
      $city = $_POST['city'];
      // $desc = $_POST['desc'];
      

      $query="UPDATE student_data SET 
                age='$age',
                gender='$gender',
                caste='$caste',
                school='$school',
                area='$area',
                city='$city'
                 WHERE id=$id";

      $exec= mysqli_query($con,$query);
  
      if($exec){
         header('location:student_filter.php');
      
      }else{
         $msg= "Error: " . $query . "<br>" . mysqli_error($con);
         echo $msg;  
      }
}

?>