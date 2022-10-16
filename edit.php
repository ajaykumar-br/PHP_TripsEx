<?php
    include('database.php');

    $id = $_GET['id'];
    $qry = "SELECT * FROM `employeedetails` WHERE `id` = '$id'";
    $rows = mysqli_fetch_assoc(mysqli_query($conn, $qry));


    $data = file_get_contents("php://input");
    echo $data;
    $mydata = json_decode($data, true);
    
    $ckm = $mydata->ckm;
    $outtime = $mydata->outtime;
    $tth = $mydata->tth;
    $ttk = $mydata->ttk;


    if(!empty($ckm) && !empty($outtime) && !empty($tth) && !empty($ttk)){
        $qry = "UPDATE `employeedetails` 
        SET outtime='$outtime', ckm='$ckm', tth='$tth', ttk='$ttk'
        WHERE id='$id';";
        if($conn->query($qry) == TRUE){
            echo "Edit performed";
        }else{
            echo "Unable to edit";
        }
    }
    else{
        echo "Problem Occured";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trips|EditDetails</title>
</head>
<body>
    <div class="conatiner-fluid">
        <nav class="navbar">
            <a class="navbar-brand" href="#">
            <img src="./images/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            Bootstrap
            </a>
            <a href="view.php">
                <button type="button" class="btn btn-danger">View Trips</button>
            </a>
        </nav>
    </div>
    <div class="container-fluid">
    <form class="form" method="post">
        <div class="user-details">
            <input type="hidden" id="id" value="<?php echo $rows['id']; ?>">
            <div class="input-box">
                <label>Employee Name</label>
                <input type="text" name="ename" value="<?php echo $rows['ename']; ?>">
            </div>
            <div class="input-box">
                <label>Date</label>
                <?php 
                $b = strtotime($rows['mtime']);
                $dat = date("Y-m-d h:m:s",$b);
                 ?>
                <input type="datetime-local" id="meeting-time" name="mtime" max="2024-06-14T00:00" value="<?php echo $dat ?>">
            </div>
            <div class="input-box">
                <label>Vendor Name</label>
                <input type="text" name="vname" value="<?php echo $rows['vname']; ?>">
            </div>
            <br><br><hr>
            <h4>Timing Details</h4>
            <div class="input-box">
                <label>In time</label>
                <?php 
                $b = strtotime($rows['intime']);
                $dat = date("Y-m-d h:m:s",$b);
                 ?>
                <input type="datetime-local" name="intime" value="<?php echo $dat; ?>">
            </div>
            <div class="input-box">
                <label>Opening km</label>
                <input type="number" name="okm" id = "okm" value="<?php echo $rows['okm']; ?>">
            </div>
            <div class="input-box">
                <label>Out time</label>
                <input type="datetime-local" name="outtime">
            </div>
            <div class="input-box">
                <label>Closing km</label>
                <input type="number" name="ckm" id="ckm">
            </div>
            <div class="input-box">
                <label>Total Trip Hr</label>
                <input type="number" name="tth" id="tth">
            </div>
            <div class="input-box">
                <label>Total Trip Km</label>
                <input type="number" name="ttk" id="ttk">
            </div>
        </div>
            <br>
            <button type="submit" id="button" class="btn btn-primary" name="edit">
                Edit
            </button>
        </div>
    </form>
    </div>

    <script src="script.js"></script>
</body>
</html>