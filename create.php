<!-- create.php -->
<?php
  // Connect to the database
  $conn = mysqli_connect('localhost', 'root', '', 'dataiman');
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    // Read data from the form
    $equipment = mysqli_real_escape_string($conn, $_POST['equipment']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    // Insert data into the database
    $sql = "INSERT INTO equipment (equipment, location) VALUES ('$equipment', '$location')";
    if (mysqli_query($conn, $sql)) {
        // Redirect to index.php
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    // Close connection
    mysqli_close($conn);
  ?>
  