
document.addEventListener('DOMContentLoaded', function() {
    // Event data array
    const eventData = [
        {
            title: "INTIFADET ILMOND",
            date: "Nov 15",
            time: "07:00pm",
            venue: "Zed Park - El Sheikh Zayed",
            image: "event1.png"
        },
        {
            title: "MEMO",
            date: "Nov 7",
            time: "09:00pm",
            venue: "Grand Nile Tower",
            image: "event2.png"
        },
        {
            title: "Amr Diab & Desiree",
            date: "Nov 08",
            time: "11:00pm",
            venue: "Cairo Gate Compound - Emaar",
            image: "event3.png"
        }
    ];

    let currentIndex = 0;
    const ticket = document.querySelector('.ticket');
    const hotEvents = document.querySelectorAll('.hot-event');

    function updateTicket(index) {
        const data = eventData[index];
        
        // Add slide-out animation
        ticket.classList.add('slide-out');
        
        setTimeout(() => {
            // Update content
            const eventDetails = ticket.querySelector('.event-details');
            eventDetails.querySelector('h2').textContent = data.title;
            eventDetails.querySelectorAll('p')[0].innerHTML = `<strong>Date:</strong> ${data.date}`;
            eventDetails.querySelectorAll('p')[1].innerHTML = `<strong>Time:</strong> ${data.time}`;
            eventDetails.querySelectorAll('p')[2].innerHTML = `<strong>Venue:</strong> ${data.venue}`;
            
            // Update image
            const eventImage = ticket.querySelector('.event-image');
            eventImage.src = data.image;
            
            // Remove slide-out and prepare for slide-in
            ticket.classList.remove('slide-out');
            ticket.classList.add('slide-in');
            
            // Remove slide-in after animation
            setTimeout(() => {
                ticket.classList.remove('slide-in');
            }, 50);
        }, 500);

        // Update hot events highlighting
        updateHotEvents(index);
    }

    function updateHotEvents(activeIndex) {
        hotEvents.forEach((event, index) => {
            // Set background image
            event.style.backgroundImage = `url(${eventData[index].image})`;
            // Update active state
            if (index === activeIndex) {
                event.classList.add('active');
            } else {
                event.classList.remove('active');
            }
        });
    }

    function slideToNextEvent() {
        currentIndex = (currentIndex + 1) % eventData.length;
        updateTicket(currentIndex);
    }

    // Initialize first event and hot events
    updateTicket(0);

    // Add click handlers to hot events
    hotEvents.forEach((event, index) => {
        event.addEventListener('click', () => {
            if (index !== currentIndex) {
                currentIndex = index;
                updateTicket(currentIndex);
            }
        });
    });

    // Start the slideshow
    setInterval(slideToNextEvent, 5000);

    // Add login/signup button functionality
    const loginSignupBtn = document.querySelector('.login-signup-btn');
    if (loginSignupBtn) {
        loginSignupBtn.addEventListener('click', function() {
            window.location.href = 'login_Signup.php'; // or your login page URL
        });
    }

// Add this to your existing DOMContentLoaded event listener
const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');
const upcomingEventsSlider = document.querySelector('.upcoming-events-slider');
let currentUpcomingPage = 0;
const eventsPerPage = 3;
const totalUpcomingEvents = document.querySelectorAll('.upcoming-event').length;
const maxPages = Math.ceil(totalUpcomingEvents / eventsPerPage);

function updateUpcomingEventsVisibility() {
    const events = document.querySelectorAll('.upcoming-event');
    const startIdx = currentUpcomingPage * eventsPerPage;
    
    events.forEach((event, index) => {
        if (index >= startIdx && index < startIdx + eventsPerPage) {
            event.style.display = 'block';
        } else {
            event.style.display = 'none';
        }
    });
}

prevBtn.addEventListener('click', () => {
    if (currentUpcomingPage > 0) {
        currentUpcomingPage--;
        updateUpcomingEventsVisibility();
    }
});

nextBtn.addEventListener('click', () => {
    if (currentUpcomingPage < maxPages - 1) {
        currentUpcomingPage++;
        updateUpcomingEventsVisibility();
    }
});

// Initialize the visibility
updateUpcomingEventsVisibility();
});