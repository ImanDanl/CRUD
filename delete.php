<!-- delete.php -->
<?php
  // Connect to the database
  $conn = mysqli_connect('localhost', 'root', '', 'dataiman');
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  // Read data from the database
  $id = mysqli_real_escape_string($conn, $_GET['id']);
  // Delete data from the database
  $sql = "DELETE FROM equipment WHERE id=$id";
  if (mysqli_query($conn, $sql)) {
      // Redirect to index.php
      header("Location: index.php");
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  // Close connection
  mysqli_close($conn);
?>
