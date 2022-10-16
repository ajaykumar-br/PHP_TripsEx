<!DOCTYPE html>
<html lang="en">

<head>
     <title>Trips|EmployeeDetails</title>
     <meta content="text/html; charset=utf-8" http-equiv=Content-Type>
     <meta name="viewport" content="width=device-width, initial-scale=1, 
          user-scalable=no, maximum-scale=1, minimum-scale=1">

     <link rel="stylesheet" href="https://bootswatch.com/4/pulse/bootstrap.min.css">
     <link href="style.css" rel="stylesheet" />

     <style type="text/css">

          body {
            background-color: #eee;
            padding: 5%;
          }

          #view {
              background-color: #eee;
              padding: 3%;
              width: 100%;
              margin: auto;
              box-shadow: 1px -2px 24px -1px rgba(0,0,0,0.75);
              border-radius: 10px;
          }
     </style>
</head>

<body>
     <div class="container">
          <div class="row">
               <div id="view">
                    <table class="table table-striped">
                         <thead>
                              <tr>
                                   <th scope="col">Employee Id</th>
                                   <th scope="col">Employee Name</th>
                                   <th scope="col">Date</th>
                                   <th scope="col">Vendor Name</th>
                                   <th scope="col">In Time</th>
                                   <th scope="col">Opening Km</th>
                                   <th scope="col">Out Time</th>
                                   <th scope="col">Closing km</th>
                                   <th scope="col">Total Trip Hr</th>
                                   <th scope="col">Total Trip Km</th>
                                   <th scope="col">Edit</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php
                                   include('database.php');
                                   $qry = "SELECT * FROM `employeedetails`";
                                   $rows = mysqli_query($conn, $qry);
                                   foreach($rows as $row){
                                        ?>
                                        <tr>             
                                            <td><?php echo $row['id']?></td>
                                            <td><?php echo $row['ename']?></td>
                                            <td><?php echo $row['mtime']?></td>
                                            <td><?php echo $row['vname']?></td>
                                            <td><?php echo $row['intime']?></td>
                                            <td><?php echo $row['okm']?></td>
                                            <td><?php echo $row['outtime']?></td>
                                            <td><?php echo $row['ckm']?></td>
                                            <td><?php echo $row['tth']?></td>
                                            <td><?php echo $row['ttk']?></td>
                                            <td>
                                                <a href="edit.php?id=<?php echo $row['id']?>">
                                                    <button type="button" class="btn btn-info">Edit</button>
                                                </a>
                                            </td>
                                         </tr>
                                    <?php
                                     }

                                   //   $a = strtotime($row['intime']);
                                     
                                   //   echo ($b-$a)/3600;
                                     
                                   //   echo gettype($date);
                                    ?>

                         </tbody>
                    </table>
               </div>
          </div>
     </div>
</body>
</html>