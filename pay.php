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
    echo '<div class="row" data-row="' . $i . '">';  // Add data-row attribute here
    for ($j = 1; $j <= $seats; $j++) {
        $tooltip = $i <= 4 ? "Platinum Seat: 100LE" : "Gold Seat: 75LE";
        echo '<div class="seat" data-tooltip="' . $tooltip . '"></div>';
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
    

    
    <!-- Confirmation Modal -->
<div id="seatModal" class="modal" style="display:none;">
    <div class="modal-content">
        <p id="seatInfo"></p>
        <p id="seatPrice"></p>
        <button id="confirmBtn">Confirm</button>
        <button id="cancelBtn">Cancel</button>
    </div>
</div>
<div class="Payment" style="display:none">
    <div class="payment-header">
        <h2>Payment Details</h2>
    </div>
    
    <div class="payment-summary">
    <h3>Order Summary</h3>
    <p>Movie:<span>Memo</span></p>
    <p>Date: <span>Nov 07 | 09:00pm</span></p>
    <p>Selected Seats: <span id="paymentSeatsDisplay"></span></p>
    <p>Total Amount: <span id="paymentTotalDisplay"></span></p>
</div>

    <form class="payment-form" id="paymentForm">
        <div class="payment-method">
            <label>
                <input type="radio" name="paymentMethod" value="card" checked>
                <i class="fa-brands fa-cc-mastercard"></i>Credit/Debit Card
            </label>
            <label>
                <input type="radio" name="paymentMethod" value="wallet">
                <img src="valU.png">
            </label>
        </div>
    <div class="creditcard">
        <div class="form-group">
            <label>Cardholder Name</label>
            <input type="text" required placeholder="Name on card" style="text-transform: uppercase;">
            
        </div>

        <div class="card-details">
            <div class="form-group">
                <label>Card Number</label>
                <input id="cardNumber" type="text" required placeholder="1234 5678 9012 3456" maxlength="12">
                <span id="cardNumberError" style="color: red; display: none;">Card number must be exactly 12 digits.</span>
            </div>
            <div class="form-group">
                <label>Expiry</label>
                <input type="text" required placeholder="MM/YY">
            </div>
            <div class="form-group">
                <label>CVV</label>
                <input type="text" required placeholder="123">
            </div>
        </div>

        <div class="payment-buttons">
            <button type="button" class="btn-cancel" id="cancelPayment">Cancel</button>
            <button type="submit" class="btn-pay" onclick="validateCardNumber(event)">Pay Now</button>
        </div>
    </div>
    <div class="value">
    <div class="form-group">
            <label>Cardholder Name</label>
            <input type="text" required placeholder="Your Full Name">
    </div>
    <div class="form-group">
            <label>Mobile Number</label>
            <input type="text" required placeholder="Mobile Number">
    </div>
    <div class="TotalPay">
        <p></p>
    </div>
    <div class="payment-buttons">
            <button type="button" class="btn-cancel" id="cancelPayment">Cancel</button>
            <button type="submit" class="btn-pay" onclick="validateCardNumber(event)">Pay Now</button>
        </div>
    </div>

    </form>
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
        <div class="progress-bar active">
            <div class=try>
            <span class="indicator"></span>
            <span id="selectedSeatsDisplay" class="selected-seats-display"></span>
            </div>
        </div>
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
    
    <div id="totalCostDisplay" class="total-cost-display">
        Total: 0 LE
    </div>
</div>
</div>
    </div>
    <script src="paymentCheck.js"></script>
    <script src="pay.js"></script>
    <script src="progress.js"></script>
</body>
</html>