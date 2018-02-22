<?php
require 'header.php';
require 'db.php';
?>
<body>
  <?php

        //execute the SQL query and return records
        $result = mysqli_query($conn, "SELECT * FROM bookings ");

?>
    <div class="container">
      <header class="header clearfix">
             <nav>
               <ul class="nav nav-pills float-right">
                 <li class="nav-item">
                   <a href="insert.php" id="homeBtn" class="btn btn-info" style="margin-right:2em">Create New Booking</a>
                 </li>
               </ul
             </nav>
             <h2 class="text-muted">Bookings - Table</h2>
           </header>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Check-In</th>
            <th>Check-Out</th>
          </tr>
        </thead>
        <tbody>

          <?php
      while ($row = mysqli_fetch_array($result)) {
          ?>
                <tr>
                  <td><?=$row['id']?></td>
                  <td><?=$row['name']?></td>
                  <td><?=$row['checkin']?></td>
                  <td><?=$row['checkout']?></td>
                  <td><a href='update.php?id=<?=$row['id']?>' class='btn btn-info'>Edit</a></td>
                  <td><a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?=$row['id']?>" class='btn btn-danger'>Delete</a></td>
                </tr>

<?php
          //echo "Fetched data successfully";
      }
            ?>
        </tbody>
      </table>
       <?php mysqli_close($conn); ?>
    </div>

    <?php require 'footer.php' ?>
