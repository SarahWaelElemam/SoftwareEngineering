// Get references to elements
const creditCardRadio = document.querySelector('input[value="card"]');
const walletRadio = document.querySelector('input[value="wallet"]');
const creditCardDiv = document.querySelector('.creditcard');
const valueDiv = document.querySelector('.value');
const cardNumberInput = document.getElementById('cardNumber');
const cardNumberError = document.getElementById('cardNumberError');

// Set initial state
function setInitialPaymentState() {
    creditCardDiv.style.display = 'block';
    valueDiv.style.display = 'none';
    creditCardRadio.checked = true;
}

// Handle payment method change
function handlePaymentMethodChange(event) {
    if (event.target.value === 'card') {
        creditCardDiv.style.display = 'block';
        valueDiv.style.display = 'none';
    } else if (event.target.value === 'wallet') {
        creditCardDiv.style.display = 'none';
        valueDiv.style.display = 'block';
    }
}
function validateCardNumber(event) {
    const cardNumberInput = document.getElementById('cardnumber'); // Change 'cardNumber' to 'cardnumber'
    const cardNumberError = document.getElementById('cardNumberError');
    
    // Prevent the default form submission
    event.preventDefault();

    // Remove any existing error message
    cardNumberError.style.display = 'none';

    // Check if the card number is exactly 12 characters long
    if (cardNumberInput.value.length !== 12) {
        cardNumberError.style.display = 'block'; // Show error message
        return false; // Prevent further actions
    }

    // If valid, you can proceed with form submission or further processing
    alert("Card number is valid. Proceeding with payment...");
    // Here you can submit the form or perform other actions
    document.getElementById('paymentForm').submit(); // Submit the form
    return true; // Allow form submission
}
document.querySelectorAll('input[name="paymentMethod"]').forEach(radio => {
    radio.addEventListener('change', handlePaymentMethodChange);
});

// Initialize on page load
window.addEventListener('load', setInitialPaymentState);