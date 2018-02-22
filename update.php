<?php
require 'db.php';
require 'header.php';
$id = $_GET['id'];

//execute the SQL query and return records
$selectAll = "SELECT * FROM bookings WHERE id=$id";
$result = mysqli_query($conn, $selectAll);

$row = mysqli_fetch_array($result);

function fixDatetime($dataTime)
{
    $newFormat = str_replace(' ', "T", $dataTime);
    $formattedDatetime = substr($newFormat, 0, -3);

    return $formattedDatetime;
}
$formattedDatetimeCheckin = fixDatetime($row['checkin']);
$formattedDatetimeCheckout = fixDatetime($row['checkout']);

if (isset($_GET['fname'])  && isset($_GET['checkin']) && isset($_GET['checkout'])) {
    $id = $_GET['id'];
    $fname = $_GET['fname'];
    $checkin = $_GET['checkin'];
    $checkout = $_GET['checkout'];

    $stmt = $conn->prepare("UPDATE bookings SET name = ?, checkin = ?, checkout = ? WHERE id=?");
    $stmt->bind_param("sssi", $fname, $checkin, $checkout, $id);

    /* execute prepared statement */
    $stmt->execute();

  printf("%d New record updated successfully.\n", $stmt->affected_rows);

    /* close statement and connection */
    $stmt->close();
    $conn->close();
}

?>


<body>
  <div class="container">
    <header class="header clearfix">
      <nav>
        <ul class="nav nav-pills float-right">
          <li class="nav-item">
            <a href="insert.php" id="homeBtn" class="btn btn-info" style="margin-right:2em">Create New Booking</a>
          </li>
        </ul
      </nav>
    <h2 class="text-muted">Update the bookings</h2>
    </header>
    <form action="update.php" method="GET" name="clientForm">
      <div class="form-group">
        <!-- <label for="name">ID:</label> -->
        <input type="hidden" class="form-control" value="<?=$id ?>" id="id"  name="id">
      </div>
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" value="<?=$row['name']?>" id="fname" placeholder="Enter name" name="fname" required>
      </div>
      <div class="form-group">
        <label for="checkin">Check-In:</label>
        <input type="datetime-local" class="form-control" value=<?=$formattedDatetimeCheckin?> id="checkIn" placeholder="Update checkin datetime" name="checkin" required>
      </div>
      <div class="form-group">
        <label for="checkout">Check-Out:</label>
        <input type="datetime-local" class="form-control"  value="<?=$formattedDatetimeCheckout?>" id="checkOut" placeholder="Update checkout datetime" name="checkout" required>
      </div>
      <button type="submit" class="btn btn-success">Update Bookings</button>
    </form>
  </div><br>
<?php require 'footer.php' ?>
