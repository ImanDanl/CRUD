<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
  <title>Broken Equipment Report</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h1>Broken Equipment Report</h1>
  <p>Use the form below to report any broken equipment in the hostel:</p>
  <form method="post" action="create.php">
    <label for="equipment">Equipment:</label><br>
    <input type="text" id="equipment" name="equipment"><br>
    <label for="location">Location:</label><br>
    <input type="text" id="location" name="location"><br><br>
    <input type="submit" value="Submit Report">
  </form> 
  <h2>Reported Broken Equipment</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Equipment</th>
      <th>Location</th>
      <th>Action</th>
    </tr>
    <?php
      // Connect to the database
      $conn = mysqli_connect('localhost', 'root', '', 'dataiman');
      // Check connection
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }
      // Retrieve data from the database
      $sql = "SELECT * FROM equipment";
      $result = mysqli_query($conn, $sql);
      // Output data
      if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
              echo "<tr><td>" . $row["id"]. "</td><td>" . $row["equipment"]. "</td><td>" . $row["location"]. "</td><td><a href='update.php?id=".$row["id"]."'>Edit</a> | <a href='delete.php?id=".$row["id"]."'>Delete</a></td></tr>";
          }
      } else {
          echo "<tr><td colspan='4'>No reported broken equipment</td></tr>";
      }
      // Close connection
      mysqli_close($conn);
    ?>
  </table>
</body>
</html>

