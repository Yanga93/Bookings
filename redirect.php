<?php
require 'db.php';
header('Location: retrieve.php')

//$id = $_GET['id'];

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
