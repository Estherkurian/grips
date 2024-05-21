<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Individual Customer Transfer</title>
    <link rel="stylesheet" type="text/css" href="page.css">
    <style>
      ul {
        position : absolute;
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 200px;
        height:450px;
        background-color: #11005c;
      }
      .submit-button {
        background-color:  #040029;
        border: none;
        color: white;
        padding: 12px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 10px;
        transition: background-color 0.3s ease;
      }
      .submit-button:hover {
        background-color: #3393ca;
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
    <button class="back" onclick = "window.location.href='transfer.php';">Back</button>
    <ul>
      <li><a href="index.html">Home</a></li>
      <li><a href="view.php">View Customers</a></li>
      <li><a class="active" href="transfer.php">Transfer Money</a></li>
    </ul>
      <div class="main">
        <br><u style="font-weight: 400; font-size: 35px;">Details for Transfer </u><br><br>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "grips") or die("Could not connect: " . mysqli_error($conn));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          if (isset($_POST['account_number']) && isset($_POST['amount'])) {
            $account_number = mysqli_real_escape_string($conn, $_POST['account_number']);
            $amount = mysqli_real_escape_string($conn, $_POST['amount']);
            // Update the database with the new amount
            $update_query = "UPDATE customer SET Current_Balance = Current_Balance + $amount WHERE Account_number = '$account_number'";
            if (mysqli_query($conn, $update_query)) {
              // Insert the transfer record
              $insert_query = "INSERT INTO transfers (account_number, amount) VALUES ('$account_number', '$amount')";
              if (mysqli_query($conn, $insert_query)) {
                echo "<p align='center'>Amount transfered successfully.</p>";
                echo "<br><br>";
              } else {
                echo "<p>Error recording transfer: " . mysqli_error($conn) . "</p>";
              }
            } else {
              echo "<p>Error updating amount: " . mysqli_error($conn) . "</p>";
            }
          }
        } else {
          if (isset($_GET['name'])) {
            $name = urldecode($_GET['name']);
            $name = mysqli_real_escape_string($conn, $name);
            $result = mysqli_query($conn, "SELECT * FROM customer WHERE Account_number='$name'");
            if ($row = mysqli_fetch_assoc($result)) {
              echo "<form method='POST' action=''>";
              echo "<p><strong>Name: </strong>" . $row['Name'] . "</p>";
              echo "<p><strong>Email: </strong>" . $row['Email'] . "</p>";
              echo "<p><strong>Account Number: </strong>" . $row['Account_number'] . "</p>";
              echo "<input type='hidden' name='account_number' value='" . $row['Account_number'] . "'>";
              echo "<p><strong>Enter amount to transfer: </strong><input type='number' style='background-color: transparent' name='amount'></p>";
              echo "<button class='submit-button' type='submit'>Transfer Amount</button>";
              echo "</form>";
            } else {
              echo "<p>No customer found with the Account Number: " . htmlspecialchars($name) . "</p>";
            }
          } else {
            echo "<p>No customer name provided.</p>";
          }
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
