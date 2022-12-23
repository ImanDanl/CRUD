<!-- update.php -->
<!DOCTYPE html>
<html>
<head>
  <title>Update Report</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h1>Update Report</h1>
  <?php
    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'dataiman');
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // Read data from the database
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM equipment WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($result);
        $equipment = $row["equipment"];
        $location = $row["location"];
    } else {
        echo "Error: Invalid report ID";
    }
    // Close connection
    mysqli_close($conn);
  ?>
  <form method="post" action="update-submit.php">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="equipment">Equipment:</label><br>
    <input type="text" id="equipment" name="equipment" value="<?php echo $equipment; ?>"><br>
    <label for="location">Location:</label><br>
    <input type="text" id="location" name="location" value="<?php echo $location; ?>"><br><br>
    <input type="submit" value="Update Report">
  </form> 
</body>
</html>
