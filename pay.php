<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="pay.css" />
    <title>Movie Seat Booking</title>
</head>
<body>
    <?php include"NavBar.php"?>
    <div class="checkout">
    <div class="selectTicket">
    <div class="container" id="container1">
        <div class="screen"></div>
        <?php
        $rows = 12;
        $seats = 24;
        for ($i = 1; $i <= $rows; $i++) {
            echo '<div class="row">';
            for ($j = 1; $j <= $seats; $j++) {
                // Add the data-tooltip only for the first 4 rows
                $tooltip = $i <= 4 ? "Platinum Seat: 100LE" : "Gold Seat: 75LE";
                
                echo '<div class="seat" data-tooltip="'.$tooltip.'"></div>';
            }
            echo '</div>';
        }
        ?>
    </div>

    <!-- Container 2 -->
    <div class="container" id="container2">
        <div class="screen"></div>
        <div class="allrows">
            <?php
            $rows = 7;
            $seats = 20;
            for ($i = 1; $i <= $rows; $i++) {
                echo '<div class="row">';
                for ($j = 1; $j <= $seats; $j++) {
                  $tooltip = "Silver Seat: 50LE" ;
                
                  echo '<div class="seat" data-tooltip="'.$tooltip.'"></div>';
                }
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <!-- Buttons to Toggle Containers -->
    <div class="button-container">
        <button class="btn active" id="show1" onclick="SHOW1()">1</button>
        <button class="btn" id="show2" onclick="SHOW2()">2</button>
    </div>
    </div>
    <div class="info">
    <img src="memopng.png" alt="Memo">
    <div class="details">
        <p class="name">MEMO-7 NOV 2024</p>
        <p class="date">Nov 07 | 09:00pm</p>
    </div>
    <div class="containerr">
  <div class="steps">
    <div class="circle-wrapper">
      <div class="circle active">1</div><span>Select Ticket</span>
    </div>
    <div class="progress-bar"><span class="indicator"></span></div>
    <div class="circle-wrapper">
      <div class="circle">2</div><span>Review and Checkout</span>
    </div>
    <div class="progress-bar"><span class="indicator"></span></div>
    <div class="circle-wrapper">
      <div class="circle">3</div><span>Send Ticket</span>
    </div>
  </div>
  <div class="buttons">
    <button id="prev" disabled>Previous</button>
    <button id="next">Next</button>
  </div>
</div>

    </div>
    </div>
    <script src="pay.js"></script>
    <script src="progress.js"></script>
</body>
</html>
