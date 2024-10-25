// Get references to elements
const container1 = document.getElementById('container1');
const container2 = document.getElementById('container2');
const seats = document.querySelectorAll(".row .seat:not(.sold)");
const btn1 = document.getElementById('show1');
const btn2 = document.getElementById('show2');
const modal = document.getElementById('seatModal');
const seatInfo = document.getElementById('seatInfo');
const seatPrice = document.getElementById('seatPrice');
const confirmBtn = document.getElementById('confirmBtn');
const cancelBtn = document.getElementById('cancelBtn');
const nextBtn = document.getElementById('next');
const prevBtn = document.getElementById('prev');
const stepsCircles = document.querySelectorAll('.circle');
let selectedSeat = null;  // To store the seat that was clicked

// Ensure confirmedSeats and totalCost are properly updated
let confirmedSeats = []; // This should be updated with selected seats
let totalCost = 0; // This should be updated with the actual cost based on selected seats

const step2Content = () => `
  <div class="review-checkout">
    <h3>Review and Checkout</h3>
    <p>Seats: ${confirmedSeats.length > 0 ? confirmedSeats.join(", ") : "No seats selected"}</p>
    <p>Total: ${totalCost > 0 ? totalCost + ' LE' : 'Free'}</p>
    <div class="payment-methods">
      <h3>Payment Method</h3>
      <label>
        <input type="radio" name="payment" value="credit-card" checked> Credit Card
      </label><br>
      <label>
        <input type="radio" name="payment" value="valu"> Valu
      </label>
    </div>
    <h3>Ticket Delivery</h3>
    <label>
      <input type="radio" name="delivery" value="email" checked> Email Tickets
    </label>
  </div>
`;

function showStep2() {
    // Hide seat selection UI
    document.querySelector('.selectTicket').style.display = 'none';
    
    // Display payment methods and ticket delivery option
    const infoDiv = document.querySelector('.info');
    
    // Clear existing content in infoDiv (if necessary)
    infoDiv.innerHTML = '';
    
    // Ensure that the seats and total cost are updated before rendering
    if (confirmedSeats.length > 0 && totalCost > 0) {
      infoDiv.innerHTML = step2Content();
    } else {
      // This is a fallback in case the values are not populated correctly
      console.warn("No seats selected or total cost not calculated.");
      infoDiv.innerHTML = `<p>Please select your seats and confirm total cost.</p>`;
    }

    // Update progress step to step 2
    stepsCircles[0].classList.remove('active');
    stepsCircles[1].classList.add('active');
    
    // Disable Next button for final step and enable Previous button
    nextBtn.disabled = true;
    prevBtn.disabled = false;
}

// Event listener for Next button to progress to step 2
nextBtn.addEventListener('click', showStep2);

// Example of updating confirmedSeats and totalCost
// These lines should be run after seat selection is made







// Function to set default view (Container 1 visible)
function setDefaultView() {
    container1.style.display = 'block'; // Show container 1 by default
    container2.style.display = 'none';  // Hide container 2 by default
}

// Function to toggle to Container 1
function SHOW1() {
    console.log('Showing container 1');
    container1.style.display = 'block';
    container2.style.display = 'none';
    btn1.classList.add('active');
    btn2.classList.remove('active');
}

// Function to toggle to Container 2
function SHOW2() {
    console.log('Showing container 2');
    container1.style.display = 'none';
    container2.style.display = 'block';
    btn2.classList.add('active');
    btn1.classList.remove('active');
}

function openSeatModal(seat, rowIndex, seatIndex) {
    selectedSeat = seat;  // Store the clicked seat

    // Get seat details from the seat's data attributes
    const seatTooltip = seat.getAttribute('data-tooltip');

    // Get the row index using the data-row attribute
    const rowNum = seat.parentElement.getAttribute('data-row');

    // Update modal content with seat row, seat number, and price
    seatInfo.textContent = `Row ${rowNum}, Seat ${seatIndex + 1}`;
    seatPrice.textContent = seatTooltip;

    // Show the modal
    modal.style.display = 'block';
}



// Function to close the modal
function closeSeatModal() {
    modal.style.display = 'none';
}

// Function to confirm seat selection
function confirmSeat() {
    // Extract seat details
    const seatText = seatInfo.textContent;
    const seatCostText = seatPrice.textContent;
    
    // Extract the seat price (assuming it always ends with LE)
    const seatCost = parseInt(seatCostText.match(/\d+/)[0]);

    // Add seat to confirmed seats array
    confirmedSeats.push(seatText);

    // Update total cost
    totalCost += seatCost;

    // Update the display of confirmed seats and total cost
    const confirmedSeatsDisplay = document.querySelector('.circle-wrapper span'); // Selector for showing seat info
    confirmedSeatsDisplay.textContent = `Seats: ${confirmedSeats.join(", ")}, Total: ${totalCost} LE`;

    // Mark the seat as selected and disable further selection
    selectedSeat.classList.add('selected');
    selectedSeat.classList.add('sold');

    // Close the modal
    closeSeatModal();
}

// Attach click event to seats to open the modal
seats.forEach((seat, index) => {
    seat.addEventListener('click', (event) => {
        if (!seat.classList.contains("sold")) {
            const rowIndex = seat.parentElement.rowIndex;
            const seatIndex = Array.from(seat.parentElement.children).indexOf(seat);
            openSeatModal(seat, rowIndex, seatIndex);
        }
    });
});

// Attach events to modal buttons
confirmBtn.addEventListener('click', confirmSeat);
cancelBtn.addEventListener('click', closeSeatModal);

// Close modal if user clicks outside of it
window.onclick = function(event) {
    if (event.target == modal) {
        closeSeatModal();
    }
};

// Set default view on page load
window.onload = function() {
    console.log('Page loaded, setting default view');
    setDefaultView();
};

