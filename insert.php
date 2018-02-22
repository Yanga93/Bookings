<?php
require 'header.php';
?>
<body>
  <div class="container">
    <header class="header clearfix">
    <h2 class="text-muted">Create Booking</h2>
    </header>
    <?php if(!empty($message)): ?>
      <div class="alert alert-success">
        <?= $message; ?>
      </div>
    <?php endif; ?>
    <form action="form-action.php" method="GET" name="clientForm">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control"  id="fname" placeholder="Enter name" name="fname" required>
      </div>
      <div class="form-group">
        <label for="checkin">Check-In:</label>
        <input type="datetime-local" class="form-control"  id="checkIn" placeholder="Select checkin datetime-local" name="checkin" required>
      </div>
      <div class="form-group">
        <label for="checkout">Check-Out:</label>
        <input type="datetime-local" class="form-control" id="checkOut" placeholder="Select checkout datetime-local" name="checkout" required>
      </div>
      <button type="submit" class="btn btn-success">Create Booking</button>
    </form>
  </div><br>
  <?php require 'footer.php'; ?>
