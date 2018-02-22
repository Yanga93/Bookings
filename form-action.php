<?php

require 'db.php';
header("Location: retrieve.php");

if (isset($_GET['fname'])  && isset($_GET['checkin']) && isset($_GET['checkout'])) {
    $fname = $_GET['fname'];
    $checkin = $_GET['checkin'];
    $checkout = $_GET['checkout'];

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO bookings (name, checkin, checkout) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $fname, $checkin, $checkout);


    /* execute prepared statement */
    $stmt->execute();


  //  printf("%d New record created successfully.\n", $stmt->affected_rows);


    /* close statement and connection */
    $stmt->close();
    $conn->close();
}
