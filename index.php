<?php
    if(isset($_POST['submit'])){
        include('database.php');
        $ename = $_POST['ename'];
        $mtime = $_POST['mtime'];
        $vname = $_POST['vname'];
        $intime = $_POST['intime'];
        $okm = $_POST['okm'];

        $qry = "INSERT INTO employeedetails " . "(ename, mtime, vname, intime, okm)" . " VALUES "
         . "('$ename', '$mtime', '$vname', '$intime', '$okm')";
        
         $run = mysqli_query($conn, $qry);
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
    <title>Trips</title>
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
    <form class="form" action="index.php" method="post">
        <div class="user-details">
            <div class="input-box">
                <label>Employee Name</label>
                <input type="text" name="ename" id="ename">
            </div>
            <div class="input-box">
                <label>Date</label>
                <input type="datetime-local" id="mtime" name="mtime" value="2018-06-12T19:30" max="2024-06-14T00:00">
            </div>
            <div class="input-box">
                <label>Vendor Name</label>
                <input type="text" name="vname" id="vname">
            </div>
            <br><br><hr>
            <h4>Timing Details</h4>
            <div class="input-box">
                <label>In time</label>
                <input type="datetime-local" name="intime" id="intime">
            </div>
            <div class="input-box">
                <label>Opening km</label>
                <input type="number" name="okm" id="okm">
            </div>
            <div class="input-box">
                <label>Out time</label>
                <input type="datetime-local" name="outtime" id="" disabled>
            </div>
            <div class="input-box">
                <label>Closing km</label>
                <input type="number" name="ckm" id="" disabled>
            </div>
            <div class="input-box">
                <label>Total Trip Hr</label>
                <input type="number" name="tth" disabled>
            </div>
            <div class="input-box">
                <label>Total Trip Km</label>
                <input type="number" name="ttk" disabled>
            </div>
        </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit">
                Submit
            </button>
        </div>
    </form>
    </div>
</body>
</html>