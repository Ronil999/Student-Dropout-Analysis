<?php

include('update.php');
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Edit in Database</title>

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
<!--====form section start====-->

<div class="user-detail">

    <div class="form-title">
    <h2>Edit Record</h2>
    
    
    </div>
 
    <p style="color:red">
    
<?php if(!empty($msg)){echo $msg; }?>
</p>
    <form method="post" action="">
            <label>Student Name : </label>       
            <input name="name" required value="<?php echo isset($editData) ? $editData['name'] : '' ?>" style="padding: 12px 20px;  box-sizing: border-box; margin-left:1.4%">
            <br> <br>

            <label>Age : </label>
            <input name="age" required value="<?php echo isset($editData) ? $editData['age'] : '' ?>" style="padding: 12px 20px; box-sizing: border-box; margin-left:5.6%">
            <br> <br>

            <label>Gender : </label>
            <input name="gender" required value="<?php echo isset($editData) ? $editData['gender'] : '' ?>" style="padding: 12px 20px; box-sizing: border-box; margin-left:4.3%">
            <br> <br>

            <label>Caste : </label>
            <input name="caste" required value="<?php echo isset($editData) ? $editData['caste'] : '' ?>" style="padding: 12px 20px; box-sizing: border-box; margin-left:5%">
            <br> <br>

            <label>School Name : </label>
            <input name="school" required value="<?php echo isset($editData) ? $editData['school'] : '' ?>" style="padding: 12px 20px; box-sizing: border-box; margin-left:1.7%">
            <br> <br>

            <label>Area : </label>
            <input name="area" required value="<?php echo isset($editData) ? $editData['area'] : '' ?>" style="padding: 12px 20px; box-sizing: border-box; margin-left:5.4%">
            <br> <br>
        
            <label>City : </label>
            <input name="city" required value="<?php echo isset($editData) ? $editData['city'] : '' ?>" style="padding: 12px 20px; box-sizing: border-box; margin-left:5.7%">
            <br> <br>

            <label>Description : </label>
            <input name="desc" required value="<?php echo isset($editData) ? $editData['desc'] : '' ?>" style="padding: 12px 20px; box-sizing: border-box; margin-left:2.5%">
            <br> <br>

            <button type="submit" name="update" class="button">Submit</button>
    </form>
        </div>
</div>



</body>
</html>