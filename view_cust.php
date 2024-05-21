<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Individual Customer View</title>
    <link rel="stylesheet" type="text/css" href="page.css">
    <style>
      ul {
        position : absolute;
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 200px;
        height:574px;
        background-color: #11005c;
      }

    </style>
</head>
<body>
    <header class="header">
      <div class="aligned">
      <img src="./pics/logo.jpg" alt="logo" width="108px" height="95px" ></div>
      <span><center>BASIC BANKING SYSTEM
      <h2>“Easy money transfers”</h2></center></span>
      
    </header>
    <button class="back" onclick = "window.location.href='view.php';">Back</button>
    <ul>
      <li><a href="index.html">Home</a></li>
      <li><a class="active" href="view.php">View Customers</a></li>
      <li><a href="transfer.php">Transfer Money</a></li>
    </ul>
      <div class="main">
        <br><u style="font-weight: 400; font-size: 35px;">Customer Details </u><br><br>
        <?php
          $conn=mysqli_connect("localhost","root","","grips") or die ("Could not connect : ".mysqli_error($conn));

          // Check if 'name' parameter is set in the URL
          if (isset($_GET['name'])) {
            // Get the customer name from the URL and decode it
            $name = urldecode($_GET['name']);
            
            // Escape the name to prevent SQL injection
            $name = mysqli_real_escape_string($conn, $name);

            // Query to get customer details by name
            $result=mysqli_query($conn,"SELECT * FROM customer where Name='$name'");

            // Check if a customer is found
            if ($row = mysqli_fetch_assoc($result)) {
                echo "<p><strong>Name : </strong> " . $row['Name'] . "</p>";
                echo "<p><strong>Email : </strong> " . $row['Email'] . "</p>";
                echo "<p><strong>Account Number : </strong> " . $row['Account_number'] . "</p>";
                echo "<p><strong>Current Balance : </strong> " . $row['Current_Balance'] . "</p>";
                // Add other fields as necessary
            } else {
                echo "<p>No customer found with the name: " . htmlspecialchars($name) . "</p>";
            }
          } else {
            echo "<p>No customer name provided.</p>";
          }

          mysqli_close($conn);
      ?>
      <br><br>
      </div>
      
      <footer class="footer"><br>
        <div class="map">
          <img src="./pics/map.jpg" alt="logo" usemap="#map" width="350px" height="250px" >
          <map name="map">
            <area shape="rect" coords="34,44,170,250" alt="Computer" href="https://goo.gl/maps/7Ajw1pYAY7mR3rZ48">
          </map>
        </div>
        <h2><u>Contact us</u></h2><br><br>
        <div class="flex">
          <div>
          <u><b>Address</b></u><br><br>
          ABC bank,<br>
          XYZ Branch,<br>
          Bangalore, Karnataka-560000<br><br></div>
      
          <div>
          <u><b>Phone Number</b></u><br><br>
          +91 12345 23756<br>
          +91 37465 23545<br><br></div>
      
          <div>
          <b><u>Email</u></b><br><br>
          abcbank2024@gmail.com</div>
        </div>
      </footer>
    
    </body>
</html>
