// Get references to elements
const container1 = document.getElementById('container1');
const container2 = document.getElementById('container2');
const seats = document.querySelectorAll(".row .seat:not(.sold)");
const btn1 = document.getElementById('show1');
const btn2 = document.getElementById('show2');

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

// Function to handle seat click event
function toggleSeatSelection(event) {
    const seat = event.target;

    // Check if the clicked element is a seat and not sold
    if (seat.classList.contains("seat") && !seat.classList.contains("sold")) {
        seat.classList.toggle("selected");
    }
}

// Attach click event to all seats
seats.forEach(seat => {
    seat.addEventListener('click', toggleSeatSelection);
});

// Set default view on page load
window.onload = function() {
    console.log('Page loaded, setting default view');
    setDefaultView();
};