<?php include "NavBar.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Events.css">
    <title>Events</title>
    
</head>
<body>
<div class="filter">
        <h3>Event Filter</h3>
        <div class="filter-box">
            <input type="text" id="startDate" placeholder="Start Date" onclick="openCalendar(startDateBox)">
            <input type="text" id="endDate" placeholder="End Date" onclick="openCalendar(endDateBox)">
            <input type="button" id="filterbtn" value="Filter">
        </div>
        
    </div>

    <!-- Calendar Modal -->
    <div class="overlay" id="overlay"></div>
    <div class="calendar-modal" id="calendarModal">
        <h3>Select Date</h3>
        <div id="calendar-header">
            <button id="prevMonth">&lt;</button>
            <span id="currentMonthYear"></span>
            <button id="nextMonth">&gt;</button>
        </div>
        <div id="calendar"></div>
        <button id="closeModal">Close</button>
    </div>
<!--<div class="ticket">
  <div class="side front">
    <img src="https://www.marinabaysands.com/content/dam/singapore/marinabaysands/master/main/home/entertainment/captain-marvel/OPENWORLD_TT_final_18_1920x1234.jpg">
    <div class="info bottom">
      <h1>CAPTAIN MARVEL</h1>
      <span class="title address">AMC Loweis Theater</span>
      <dl>
        <dt>Tickets</dt>
        <dd>2</dd>
        <dt>Date</dt>
        <dd>8 Mar</dd>
        <dt>Time</dt>
        <dd>18:15</dd>
      </dl>
      <span class="floating price">$24.50</span>
    </div>
  </div>
  <div class="side back">
    <div class="top">
      <div class="span">
        <h2>Movie</h2>
        <span>Captain Marvel</span>
      </div>
      <div class="span">
        <h2>Theater</h2>
        <span>AMC Loweis, 86th Street</span>
      </div>
      <div class="span span8">
        <h2>Date</h2>
        <span>8 March,2019</span>
      </div>
      <div class="span span4">
        <h2>Time</h2>
        <span>18:15</span>
      </div>
      <div class="span span8">
        <h2>Tickets</h2>
        <span>2</span>
      </div>
      <div class="span span4">
        <h2>Price</h2>
        <span class="strong">$24.50</span>
      </div>
    </div>
    
    <div class="payment bottom">
      <h1>PAYMENT DETAILS</h1>
      <span class="floating"></span>
      <div class="row card-num">
        <input type="text" placeholder="0000" maxlength="4">
        <input type="text" placeholder="0000" maxlength="4">
        <input type="text" placeholder="0000" maxlength="4">
        <input type="text" placeholder="0000" maxlength="4">
      </div>
      <div class="row">
        <div class="span span4">
          <input type="text" placeholder="MM/YY" maxlength="4">
        </div>
        <div class="span span4">
          <input type="text" placeholder="CVV" maxlength="4"></div>
        <div class="span span4">
          <input type="text" placeholder="ZIP" maxlength="4"></div>
      </div>
    </div>
  </div>
</div>-->
<script src="Events.js"></script>
</body>
</html>
