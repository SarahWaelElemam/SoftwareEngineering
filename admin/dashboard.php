<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <script
      src="https://kit.fontawesome.com/19a37f6564.js"
      crossorigin="anonymous"
    ></script>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <h2>Admin.</h2>
        </div>
        <ul>
            <li><a href="#" class="active" data-page="dashboard">Dashboard</a></li>
            <li><a href="#" data-page="chat">Chat</a></li>
            <li><a href="#" data-page="calendar">Calendar</a></li>
            <li><a href="#" data-page="events">Events</a></li>
            <li><a href="#" data-page="users">User Management</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div id="dashboard-page" class="page">
            <header>
                <h1>Dashboard</h1>
            </header>
            <div class="dashboard-stats">
                <div class="stat-box">
                    <h3>83457</h3>
                    <p>Total Tickets</p>
                </div>
                <div class="stat-box">
                    <h3>21457</h3>
                    <p>Pending Tickets</p>
                </div>
                <div class="stat-box">
                    <h3>31457</h3>
                    <p>Closed Tickets</p>
                </div>
            </div>
        </div>

        <div id="chat-page" class="page hidden">
            <header>
                <h1>Chat</h1>
            </header>
            <p>This is the chat page content.</p>
        </div>

        <div id="calendar-page" class="page hidden">
            <header>
                <h1>Calendar</h1>
            </header>
            <p>This is the calendar page content.</p>
        </div>

      


<!-- Event Management Page -->
<div id="events-page" class="page hidden">
    <header>
        <h1>Event Management</h1>
    </header>

  <!-- Add Event Modal -->
<div id="addEventModal" class="modal-overlay">
    <div class="modal-content">
        <span class="modal-close" onclick="closeModal('addEventModal')">&times;</span>
        <h2>Add New Event</h2>
        <form id="eventForm" onsubmit="return handleAddEvent(event)">

            <!-- Event Details Section -->
            <h3>Event Details</h3>
            <div class="input-group">
                <label for="eventName">Event Name:</label>
                <input type="text" id="eventName" name="eventName" required>
                <div class="error-message" id="eventNameError"></div>
            </div>
            <div class="input-group">
                <label for="eventDescription">Description:</label>
                <textarea id="eventDescription" name="eventDescription"></textarea>
                <div class="error-message" id="eventDescriptionError"></div>
            </div>
            <div class="input-group">
                <label>Type of Event:</label>
                <label><input type="radio" name="eventType" value="theatre" required> Theatre</label>
                <label><input type="radio" name="eventType" value="concert"> Concert</label>
                <label><input type="radio" name="eventType" value="exhibition"> Exhibition</label>
                <div class="error-message" id="eventTypeError"></div>
            </div>
          <!-- Event Image Upload -->
            <div class="input-group">
                <label for="eventImage">Event Image:</label>
                <input type="file" id="eventImage" name="eventImage" accept="image/*">
                <div class="error-message" id="eventImageError"></div>
            </div>

            <!-- Location Section -->
            <h3>Location</h3>
            <div class="input-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" required>
                <div class="error-message" id="locationError"></div>
            </div>
            <div class="input-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address">
                <div class="error-message" id="addressError"></div>
            </div>
            <div class="input-group">
                <label for="venue">Venue:</label>
                <input type="text" id="venue" name="venue">
                <div class="error-message" id="venueError"></div>
            </div>

            <!-- Date and Time Section -->
            <h3>Date and Time</h3>
            <div class="input-group">
                <label for="startDate">Start Date:</label>
                <input type="datetime-local" id="startDate" name="startDate" required>
                <div class="error-message" id="startDateError"></div>
            </div>
            <div class="input-group">
                <label for="endDate">End Date (optional):</label>
                <input type="datetime-local" id="endDate" name="endDate">
                <div class="error-message" id="endDateError"></div>
            </div>

         <!-- Event Access and Ticket Section -->
         <h3>Access & Tickets</h3>
            <div id="ticketPriceContainer">
            <h4>Ticket Prices</h4>
    <button type="button" onclick="addTicketRow()">Add Ticket Type</button>
    <div id="ticketRows"></div> 
                
            </div>

            <!-- Organizer Section -->
            <h3>Organizer Details</h3>
            <div class="input-group">
                <label for="createdBy">Organizer:</label>
                <input type="text" id="createdBy" name="createdBy" required>
                <div class="error-message" id="createdByError"></div>
            </div>
            <div class="input-group">
                <label for="organizerName">Organizer Name:</label>
                <input type="text" id="organizerName" name="organizerName">
                <div class="error-message" id="organizerNameError"></div>
            </div>
          <!-- Organizer Logo Upload -->
<div class="input-group">
    <label for="organizerLogo">Organizer Logo:</label>
    <input type="file" id="organizerLogo" name="organizerLogo" accept="image/*">
    <div class="error-message" id="organizerLogoError"></div>
</div>

            <!-- Event Status and Recurrence Section -->
            <h3>Status & Recurrence</h3>
            <div class="input-group">
                <label for="eventStatus">Event Status:</label>
                <select id="eventStatus" name="eventStatus">
                    <option value="upcoming">Upcoming</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="completed">Completed</option>
                </select>
                <div class="error-message" id="eventStatusError"></div>
            </div>

            <!-- Venue Facilities Section -->
            <h3>Venue Facilities</h3>
            <div class="input-group">
                <label>Facilities Available:</label>
                <label><input type="checkbox" name="venueFacilities" value="Bathrooms"> Bathrooms</label>
                <label><input type="checkbox" name="venueFacilities" value="Food Services"> Food Services</label>
                <label><input type="checkbox" name="venueFacilities" value="Parking"> Parking</label>
                <label><input type="checkbox" name="venueFacilities" value="Security"> Security</label>
                <div class="error-message" id="venueFacilitiesError"></div>
            </div>
            <div class="input-group">
                <label for="venueProfileLink">Venue Profile Link:</label>
                <input type="text" id="venueProfileLink" name="venueProfileLink">
                <div class="error-message" id="venueProfileLinkError"></div>
            </div>
            <div class="input-group">
                <label for="venueMapLink">Google Maps Link:</label>
                <input type="text" id="venueMapLink" name="venueMapLink">
                <div class="error-message" id="venueMapLinkError"></div>
            </div>
           <!-- Venue Image Upload -->
            <div class="input-group">
                <label for="venueImage">Venue Image:</label>
                <input type="file" id="venueImage" name="venueImage" accept="image/*">
                <div class="error-message" id="venueImageError"></div>
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>
</div>

<!-- Edit Event Modal -->
<div id="editEventModal" class="modal-overlay">
    <div class="modal-content">
        <span class="modal-close" onclick="closeModal('editEventModal')">&times;</span>
        <h2>Edit Event</h2>
        <form id="editEventForm" onsubmit="return handleEditEvent(event)">
            
            <!-- Event Details Section -->
            <h3>Event Details</h3>
            <div class="input-group">
                <label for="editEventName">Event Name:</label>
                <input type="text" id="editEventName" name="eventName" required>
                <div class="error-message" id="editEventNameError"></div>
            </div>
            <div class="input-group">
                <label for="editEventDescription">Description:</label>
                <textarea id="editEventDescription" name="eventDescription"></textarea>
                <div class="error-message" id="editEventDescriptionError"></div>
            </div>
            <div class="input-group">
                <label>Type of Event:</label>
                <label><input type="radio" name="editEventType" value="theatre" required> Theatre</label>
                <label><input type="radio" name="editEventType" value="concert"> Concert</label>
                <label><input type="radio" name="editEventType" value="exhibition"> Exhibition</label>
                <div class="error-message" id="editEventTypeError"></div>
            </div>
            <div class="input-group">
                <label for="editEventImage">Image URL:</label>
                <input type="text" id="editEventImage" name="eventImage">
                <div class="error-message" id="editEventImageError"></div>
            </div>

            <!-- Location Section -->
            <h3>Location</h3>
            <div class="input-group">
                <label for="editLocation">Location:</label>
                <input type="text" id="editLocation" name="location" required>
                <div class="error-message" id="editLocationError"></div>
            </div>
            <div class="input-group">
                <label for="editAddress">Address:</label>
                <input type="text" id="editAddress" name="address">
                <div class="error-message" id="editAddressError"></div>
            </div>
            <div class="input-group">
                <label for="editVenue">Venue:</label>
                <input type="text" id="editVenue" name="venue">
                <div class="error-message" id="editVenueError"></div>
            </div>

            <!-- Date and Time Section -->
            <h3>Date and Time</h3>
            <div class="input-group">
                <label for="editStartDate">Start Date:</label>
                <input type="datetime-local" id="editStartDate" name="startDate" required>
                <div class="error-message" id="editStartDateError"></div>
            </div>
            <div class="input-group">
                <label for="editEndDate">End Date (optional):</label>
                <input type="datetime-local" id="editEndDate" name="endDate">
                <div class="error-message" id="editEndDateError"></div>
            </div>

            <!-- Ticket Section -->
            <h3>Access & Tickets</h3>
            <div id="editTicketPriceContainer">
                <h4>Ticket Prices</h4>
                <button type="button" onclick="addEditTicketRow()">Add Ticket Type</button>
                <div id="editTicketRows"></div>
            </div>

            <!-- Organizer Section -->
            <h3>Organizer Details</h3>
            <div class="input-group">
                <label for="editCreatedBy">Organizer:</label>
                <input type="text" id="editCreatedBy" name="createdBy" required>
                <div class="error-message" id="editCreatedByError"></div>
            </div>
            <div class="input-group">
                <label for="editOrganizerName">Organizer Name:</label>
                <input type="text" id="editOrganizerName" name="organizerName">
                <div class="error-message" id="editOrganizerNameError"></div>
            </div>
            <div class="input-group">
                <label for="editOrganizerLogo">Organizer Logo URL:</label>
                <input type="text" id="editOrganizerLogo" name="organizerLogo">
                <div class="error-message" id="editOrganizerLogoError"></div>
            </div>

            <!-- Status and Recurrence Section -->
            <h3>Status & Recurrence</h3>
            <div class="input-group">
                <label for="editEventStatus">Event Status:</label>
                <select id="editEventStatus" name="eventStatus">
                    <option value="upcoming">Upcoming</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="completed">Completed</option>
                </select>
                <div class="error-message" id="editEventStatusError"></div>
            </div>

            <!-- Submit Button -->
            <button type="submit">Save Changes</button>
        </form>
    </div>
</div>

    <!-- Events Table -->
    <h2>Events List</h2>
    <table class="common-table-style events-table">
        <thead>
            <tr>
                <<th>ID</th>
            <th>Event Name</th>
            <th>Date</th>
            <th>Location</th>
            <th>Event Type</th>
            <th>Organizer</th>
            
            <th>Status</th>
                <th><button class="buttonadd" id="addEventBtn">Add Event</button></th>
            </tr>
        </thead>
        <tbody id="eventsTableBody">
        </tbody>
    </table>
</div>

        <!-- User Management Page -->
        <div id="users-page" class="page hidden">
            <header>
                <h1>User Management</h1>
            </header>

            <!-- User Modal -->
            <div id="adduserModal" class="modal-overlay">
            <div class="modal-content">
                <span class="modal-close">&times;</span>
                <h2>Add New User</h2>
                <form id="userForm" onsubmit="return handleAddUser(event)">
                    <div class="input-group">
                        <input type="text" id="username" name="username" placeholder="Username" required>
                        <div class="error-message" id="usernameError"></div>
                    </div>
                    <div class="input-group">
                        <input type="email" id="email" name="email" placeholder="Email" required>
                        <div class="error-message" id="emailError"></div>
                    </div>
                    <div class="input-group">
                        <input type="password" id="password" name="password" placeholder="Password" required>
                        <div class="error-message" id="passwordError"></div>
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>

<!-- Edit User Modal -->
<div id="editUserModal" class="modal-overlay">
            <div class="modal-content">
                <span class="modal-close">&times;</span>
                <h2>Edit User</h2>
                <form id="editUserForm" onsubmit="return handleEditUser(event)">
                    <input type="hidden" id="editUserId">
                    <div class="input-group">
                        <input type="text" id="editUsername" name="username" placeholder="Username" required>
                        <div class="error-message" id="editUsernameError"></div>
                    </div>
                    <div class="input-group">
                        <input type="email" id="editEmail" name="email" placeholder="Email" required>
                        <div class="error-message" id="editEmailError"></div>
                    </div>
                    <div class="input-group">
                        <input type="password" id="editPassword" name="password" placeholder="Password" required>
                        <div class="error-message" id="editPasswordError"></div>
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>

            <!-- Users Table -->
            <h2>Users List</h2>
             <table class="common-table-style users-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                   
                    <th> <button class="buttonadd" id="addUserBtn">Add User</button></th>
                </tr>
            </thead>
            <tbody id="usersTableBody">
            </tbody>
        </table>
    </div>
    </div>

    <script>

const events = [
    {
        id: 1,
        eventName: "Tech Conference 2024",
        eventDescription: "A conference for tech enthusiasts to share knowledge and network.",
        startDate: "2024-05-15T10:00:00Z",
        eventType: "Conference",
        location: "Convention Center, Cityville",
        venue: "City Convention Center",
        eventImage: new Blob(), // Placeholder for an actual image file
        organizer: {
            name: "Tech Innovations Inc.",
            logo: new Blob(), // Placeholder for an actual logo file
        },
        ticketPrice: 100,
        eventStatus: "Upcoming",
        attendees: [],
        venueDetails: {
            facilities: ["WiFi", "Catering", "Parking"],
            links: {
                venueProfile: "http://venueprofile.com",
                maps: "http://mapslink.com"
            },
            venueImage: "../images/Venue.png" // Placeholder for an actual venue image file
        }
    },
    {
        id: 2,
        eventName: "Art Exhibition 2024",
        eventDescription: "An exhibition showcasing contemporary art from local artists.",
        startDate: "2024-06-20T18:00:00Z",
        eventType: "Exhibition",
        location: "Gallery XYZ, Art District",
        venue: "Gallery XYZ",
        eventImage: new Blob(), // Placeholder for an actual image file
        organizer: {
            name: "Art Community",
            logo: new Blob(), // Placeholder for an actual logo file
        },
        ticketPrice: 20,
        eventStatus: "Upcoming",
        attendees: [],
        venueDetails: {
            facilities: ["Restrooms", "Café", "Gift Shop"],
            links: {
                venueProfile: "http://galleryxyz.com",
                maps: "http://gallerymap.com"
            },
            venueImage: new Blob() // Placeholder for an actual venue image file
        }
    },
    {
        id: 3,
        eventName: "Music Festival 2024",
        eventDescription: "Join us for a weekend of music, food, and fun!",
        startDate: "2024-07-10T12:00:00Z",
        eventType: "Festival",
        location: "Open Grounds, Music City",
        venue: "Music Festival Grounds",
        eventImage: new Blob(), // Placeholder for an actual image file
        organizer: {
            name: "Live Music Events",
            logo: new Blob(), // Placeholder for an actual logo file
        },
        ticketPrice: 150,
        eventStatus: "Upcoming",
        attendees: [],
        venueDetails: {
            facilities: ["Food Trucks", "Restrooms", "First Aid"],
            links: {
                venueProfile: "http://musicfestival.com",
                maps: "http://musicfestivalmap.com"
            },
            venueImage: new Blob() // Placeholder for an actual venue image file
        }
    }
];

// Function to render events table with all attributes 
function renderEvents() {
    const tbody = document.getElementById('eventsTableBody');
    tbody.innerHTML = '';

    events.forEach(event => {
        const tr = document.createElement('tr');
        


        tr.innerHTML = `
            <td>${event.id}</td>
            <td>${event.eventName}</td>
            <td>${new Date(event.startDate).toLocaleString()}</td> <!-- Formatting the date -->
            <td>${event.location}</td>
            <td>${event.eventType}</td>
            <td>${event.organizer.name}</td>
            <td>${event.eventStatus}</td>
            <td>
                <img src="${event.eventImage}" alt="${event.eventName} image" class="event-image" />
            </td>
            <td>
                <img src="${event.venueImage}" alt="${event.venueDetails.venueName} image" class="venue-image" />
            </td>
            <td class="action-icons">
                <button class="edit-btn" onclick="openEditEventModal(${event.id})">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="delete-icon" onclick="deleteEvent(${event.id})">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
        `;
        tbody.appendChild(tr);
    });
}

function handleAddEvent(event) {
    event.preventDefault();
    console.log("here in add event");
    
    if (!validateEventForm()) return;
    console.log("here after validation event");

    // Check if elements exist before accessing their values
    const eventNameElement = document.getElementById('eventName');
    const eventDescriptionElement = document.getElementById('eventDescription');
    const startDateElement = document.getElementById('startDate');
    const locationElement = document.getElementById('location');
    const venueElement = document.getElementById('venue');
    const organizerNameElement = document.getElementById('organizerName');
    const eventImageElement = document.getElementById('eventImage');
    const organizerLogoElement = document.getElementById('organizerLogo');
    const venueImageElement = document.getElementById('venueImage');
    const eventStatusElement = document.getElementById('eventStatus');
    
    // Check for null elements and log errors
    if (!eventNameElement || !eventDescriptionElement || !startDateElement || 
        !locationElement || !venueElement || !organizerNameElement || 
        !eventImageElement || !organizerLogoElement || 
        !venueImageElement || !eventStatusElement) {
        
        console.error("One or more elements are null, please check your IDs");
        
        if (!eventNameElement) console.error("eventName is null");
        if (!eventDescriptionElement) console.error("eventDescription is null");
        if (!startDateElement) console.error("startDate is null");
        if (!locationElement) console.error("location is null");
        if (!venueElement) console.error("venue is null");
        if (!organizerNameElement) console.error("organizerName is null");
        if (!eventImageElement) console.error("eventImage is null");
        if (!organizerLogoElement) console.error("organizerLogo is null");
        if (!venueImageElement) console.error("venueImage is null");
        if (!eventStatusElement) console.error("eventStatus is null");

        return;
    }

    const newEvent = {
        id: events.length + 1,
        eventName: eventNameElement.value,
        eventDescription: eventDescriptionElement.value,
        startDate: startDateElement.value,
        eventType: document.querySelector('input[name="eventType"]:checked').value,
        location: locationElement.value,
        venue: venueElement.value,
        eventImage: eventImageElement.files[0],
        organizer: {
            name: organizerNameElement.value,
            logo: organizerLogoElement.files[0],
        },
        ticketPrice: gatherTicketPrices(),
        eventStatus: eventStatusElement.value,
        attendees: [],
        venueDetails: {
            facilities: Array.from(document.querySelectorAll('input[name="venueFacilities"]:checked')).map(cb => cb.value),
            links: {
                venueProfile: document.getElementById('venueProfileLink').value, // Corrected ID here
                maps: document.getElementById('venueMapLink').value // Corrected ID here
            },
            venueImage: venueImageElement.files[0]
        }
    };

    events.push(newEvent);
    renderEvents();
    closeModal('addEventModal');
    document.getElementById('eventForm').reset();
}

// Function to handle editing an event with all attributes
function handleEditEvent(event) {
    event.preventDefault();

    const eventId = parseInt(document.getElementById('editEventId').value);
    const eventName = document.getElementById('editEventName').value;
    const eventDescription = document.getElementById('editEventDescription').value;
    const eventDate = document.getElementById('editEventDate').value;
    const eventType = document.getElementById('editEventType').value;
    const location = document.getElementById('editLocation').value;
    const venue = document.getElementById('editVenue').value;
    const organizer = document.getElementById('editOrganizer').value;
    const ticketPrices = gatherEditTicketPrices();  // Collect ticket prices for edit form

    if (validateEditEventForm()) {
        const eventIndex = events.findIndex(event => event.id === eventId);
        if (eventIndex !== -1) {
            events[eventIndex] = {
                ...events[eventIndex],
                eventName,
                eventDescription,
                startDate: eventDate,
                eventType,
                location,
                venue,
                organizer: { name: organizer },
                ticketPrice: ticketPrices,
               
                venueDetails: {
                    facilities: document.getElementById('editFacilities').value.split(','),
                    links: {
                        venueProfile: document.getElementById('editVenueProfile').value,
                        maps: document.getElementById('editMapsLink').value
                    }
                }
            };
            renderEvents();
            closeModal('editEventModal');
        }
    }
    return false;
}

// Adds a row by making an inactive row active and fills it
function addTicketRow() {
    const ticketRows = document.getElementById("ticketRows");
    const row = document.createElement("div");
    row.classList.add("ticket-row");

    row.innerHTML = `
        <input type="text" placeholder="Ticket Type (e.g., VIP)" class="ticket-type" required />
        <input type="number" placeholder="Ticket Price" class="ticket-price" min="0" required />
        <button type="button" class="remove-ticket" onclick="removeTicketRow(this)">Remove</button>
    `;
    ticketRows.appendChild(row);
}

// Remove ticket row
function removeTicketRow(button) {
    const row = button.parentNode;
    row.remove();
}
// Gathers ticket prices and types from dynamic input fields
function gatherTicketPrices() {
    const ticketFields = document.querySelectorAll('#ticketPriceContainer .ticket-field');
    const tickets = [];
    
    ticketFields.forEach(field => {
        const type = field.querySelector('.ticket-type').value;
        const price = parseFloat(field.querySelector('.ticket-price').value);

        // Ensure both type and price are provided
        if (type && !isNaN(price)) {
            tickets.push({ type, price, currency: 'EGP' }); // Assuming EGP as currency
        }
    });
    return tickets;
}

// Modal management for adding and editing events
document.getElementById('addEventBtn').addEventListener('click', () => {
    document.getElementById('eventForm').reset();
    openModal('addEventModal');
});



function isValidURL(url) {
    const pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
        '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.?)+[a-z]{2,}|'+ // domain name
        '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
        '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
        '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
        '(\\#[-a-z\\d_]*)?$','i');
    return !!pattern.test(url);
}

function validateEventForm() { 
    // Get form elements
    const eventName = document.getElementById('eventName');
    const eventDescription = document.getElementById('eventDescription');
    const startDate = document.getElementById('startDate');
    const endDate = document.getElementById('endDate');
    const location = document.getElementById('location');
    const address = document.getElementById('address');
    const eventType = document.querySelector('input[name="eventType"]:checked');
    const createdBy = document.getElementById('createdBy');
    const organizerName = document.getElementById('organizerName');
    const eventImage = document.getElementById('eventImage');
    const eventStatus = document.getElementById('eventStatus');
    const organizerLogo = document.getElementById('organizerLogo');
    const venueProfileLink = document.getElementById('venueProfileLink');
    const venueMapLink = document.getElementById('venueMapLink');
    const venueImage = document.getElementById('venueImage');

    // Error Elements
    const errors = {
        eventName: 'Event name must be at least 3 characters long.',
        eventDescription: 'Event description must be at least 10 characters long.',
        startDate: 'Please select a valid start date and time.',
        endDate: 'End date must be later than start date.',
        location: 'Location must be specified.',
        address: 'Address must be at least 5 characters long.',
        eventType: 'Please select an event type.',
        createdBy: 'Organizer must be specified.',
        organizerName: 'Organizer name must be at least 3 characters long.',
        eventImage: 'Please upload an event image.',
        eventStatus: 'Please select an event status.',
        organizerLogo: 'Please upload an organizer logo.',
        venueProfileLink: 'Please enter a valid URL for the venue profile.',
        venueMapLink: 'Please enter a valid URL for the venue map.',
        venueImage: 'Please upload a venue image.',
    };

    resetInputStylesEvent();

    let isValid = true;

    if (eventName.value.length < 3) {
        setError(eventName, document.getElementById('eventNameError'), errors.eventName);
        isValid = false;
    }
    if (eventDescription.value.length < 10) {
        setError(eventDescription, document.getElementById('eventDescriptionError'), errors.eventDescription);
        isValid = false;
    }
    if (!startDate.value) {
        setError(startDate, document.getElementById('startDateError'), errors.startDate);
        isValid = false;
    } else if (endDate.value && new Date(startDate.value) > new Date(endDate.value)) {
        setError(endDate, document.getElementById('endDateError'), errors.endDate);
        isValid = false;
    }
    if (!eventType) {
        setError(document.getElementById('eventTypeError'), document.getElementById('eventTypeError'), errors.eventType);
        isValid = false;
    }
    if (location.value.length < 3) {
        setError(location, document.getElementById('locationError'), errors.location);
        isValid = false;
    }
    if (address.value.length < 5) {
        setError(address, document.getElementById('addressError'), errors.address);
        isValid = false;
    }
    if (createdBy.value.length < 3) {
        setError(createdBy, document.getElementById('createdByError'), errors.createdBy);
        isValid = false;
    }
    if (organizerName.value && organizerName.value.length < 3) {
        setError(organizerName, document.getElementById('organizerNameError'), errors.organizerName);
        isValid = false;
    }
    if (!eventImage.files.length) {
        setError(eventImage, document.getElementById('eventImageError'), errors.eventImage);
        isValid = false;
    }
    if (!organizerLogo.files.length) {
        setError(organizerLogo, document.getElementById('organizerLogoError'), errors.organizerLogo);
        isValid = false;
    }
    if (!venueProfileLink.value) {
        setError(venueProfileLink, document.getElementById('venueProfileLinkError'), errors.venueProfileLink);
        isValid = false;
    }
    if (!venueMapLink.value) {
        setError(venueMapLink, document.getElementById('venueMapLinkError'), errors.venueMapLink);
        isValid = false;
    }
    if (!venueImage.files.length) {
        setError(venueImage, document.getElementById('venueImageError'), errors.venueImage);
        isValid = false;
    }
    if (!eventStatus.value) {
        setError(eventStatus, document.getElementById('eventStatusError'), errors.eventStatus);
        isValid = false;
    }

    return isValid;
}



function openEditEventModal(id) {
    const event = events.find(event => event.id === id);
    if (event) {
        document.getElementById('editEventId').value = event.id;
        document.getElementById('editEventName').value = event.eventName;
        document.getElementById('editEventDescription').value = event.eventDescription;
        document.getElementById('editEventDate').value = event.startDate;
        document.getElementById('editEventType').value = event.eventType;
        document.getElementById('editLocation').value = event.location;
        document.getElementById('editVenue').value = event.venue;
        document.getElementById('editOrganizer').value = event.organizer.name;
       
        document.getElementById('editFacilities').value = event.venueDetails.facilities.join(',');
        document.getElementById('editVenueProfile').value = event.venueDetails.links.venueProfile;
        document.getElementById('editMapsLink').value = event.venueDetails.links.maps;

        // Populate ticket price fields
        event.ticketPrice.forEach(ticket => {
            document.getElementById(`edit${ticket.type}Price`).value = ticket.price;
        });

        openModal('editEventModal');
    }
}
// Similar validation function for editing events
function validateEditEventForm() {
    const editEventName = document.getElementById('editEventName');
    const editEventDate = document.getElementById('editEventDate');
    const editEventDescription = document.getElementById('editEventDescription');
    const ticketPrices = gatherEditTicketPrices();
    const editEventNameError = document.getElementById('editEventNameError');
    const editEventDateError = document.getElementById('editEventDateError');
    const editEventDescriptionError = document.getElementById('editEventDescriptionError');
    
    resetEditFormInputStyles();

    let isValid = true;

    if (editEventName.value.length < 3) {
        setEditFormError(editEventName, editEventNameError, 'Event name must be at least 3 characters long.');
        isValid = false;
    }

    if (!editEventDate.value) {
        setEditFormError(editEventDate, editEventDateError, 'Please select a valid date.');
        isValid = false;
    }

    if (editEventDescription.value.length < 10) {
        setEditFormError(editEventDescription, editEventDescriptionError, 'Event description must be at least 10 characters long.');
        isValid = false;
    }

    if (ticketPrices.some(ticket => isNaN(ticket.price) || ticket.price <= 0)) {
        alert('Please provide valid ticket prices.');
        isValid = false;
    }

    return isValid;
}

function resetInputStylesEvent() {
    const inputs = document.querySelectorAll('#eventForm input');
    const errorMessages = document.querySelectorAll('.error-message');

    inputs.forEach(input => {
        input.classList.remove('input-error'); // Remove error class
    });

    errorMessages.forEach(msg => {
        msg.style.display = 'none'; // Hide error messages
    });
}


  // Initialize users array with some sample data
  let users = [
            { id: 1, username: 'john_doe', email: 'john@example.com', password: 'password123' },
            { id: 2, username: 'jane_doe', email: 'jane@example.com', password: 'password456' }
        ];

        // Function to render users table
        function renderUsers() {
            const tbody = document.getElementById('usersTableBody');
            tbody.innerHTML = '';
            
            users.forEach(user => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${user.id}</td>
                    <td>${user.username}</td>
                    <td>${user.email}</td>
                    <td class="action-icons">
                        <button class="edit-btn" onclick="openEditModal(${user.id})">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="delete-icon" onclick="deleteUser(${user.id})">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }


        
        // Function to handle adding new user
        function handleAddUser(event) {
            event.preventDefault();
            
            const username = document.getElementById('username').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            if (validateUserForm()) {
                const newUser = {
                    id: users.length + 1,
                    username,
                    email,
                    password
                };

                users.push(newUser);
                renderUsers();
                closeModal('adduserModal');
                document.getElementById('userForm').reset();
            }
            return false;
        }




        // Setup modal events
        function setupModals() {
            const modals = ['adduserModal', 'editUserModal','addEventModal','editEventModal'];
            
            modals.forEach(modalId => {
                const modal = document.getElementById(modalId);
                const closeBtn = modal.querySelector('.modal-close');
                
                // Close button click
                closeBtn.addEventListener('click', () => closeModal(modalId));
                
                // Click outside modal
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) closeModal(modalId);
                });
            });

            // Add user button
            document.getElementById('addUserBtn').addEventListener('click', () => {
                document.getElementById('userForm').reset();
                openModal('adduserModal');
            });

        }
        // Initialize the page
        document.addEventListener('DOMContentLoaded', () => {
            renderUsers();
            renderEvents();
            setupModals();
        });

    // Function to open edit modal
    function openEditModal(id) {
            const user = users.find(user => user.id === id);
            if (user) {
                document.getElementById('editUserId').value = user.id;
                document.getElementById('editUsername').value = user.username;
                document.getElementById('editEmail').value = user.email;
                document.getElementById('editPassword').value = user.password;
                openModal('editUserModal');
            }
        }


   // Modal management functions
function openModal(modalId) {
    document.getElementById(modalId).classList.add('active');
    document.body.classList.add('no-scroll'); // Disable background scrolling
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.remove('active');
    document.body.classList.remove('no-scroll'); // Enable background scrolling
}


 // Function to handle editing user
        function handleEditUser(event) {
            event.preventDefault();
            
            const userId = parseInt(document.getElementById('editUserId').value);
            const username = document.getElementById('editUsername').value;
            const email = document.getElementById('editEmail').value;
            const password = document.getElementById('editPassword').value;

            if (validateEditUserForm()) {
                const userIndex = users.findIndex(user => user.id === userId);
                if (userIndex !== -1) {
                    users[userIndex] = { ...users[userIndex], username, email, password };
                    renderUsers();
                    closeModal('editUserModal');
                }
            }
            return false;
        }

        // Function to delete user
        function deleteUser(id) {
            if (confirm('Are you sure you want to delete this user?')) {
                users = users.filter(user => user.id !== id);
                renderUsers();
            }
        }


// Function to validate user form inputs
  function validateUserForm() {
    const username = document.getElementById('username');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const usernameError = document.getElementById('usernameError');
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');

    // Clear previous error messages and icons
    resetInputStylesuser();

    let isValid = true; // Flag to track overall form validity

    // Basic validation checks
    if (username.value.length < 3) {
        setError(username, usernameError, 'Username must be at least 3 characters long.');
        isValid = false;
    }

    const emailPattern = /^[^\s@]+@[^\s@]+\.[a-z]{2,3}$/i; // Case insensitive check
    if (!email.value.match(emailPattern)) {
        setError(email, emailError, 'Please enter a valid email address.');
        isValid = false;
    }

    if (password.value.length < 6) {
        setError(password, passwordError, 'Password must be at least 6 characters long.');
        isValid = false;
    }

    // If all checks pass, return true to allow form submission
    return isValid;
}

// Function to display error message and style the input
function setError(input, errorElement, message) {
    errorElement.textContent = message; // Set error message
    errorElement.style.display = 'block'; // Show error message
    input.classList.add('input-error'); // Add error class for styling
}

// Function to reset input styles
function resetInputStylesuser() {
    const inputs = document.querySelectorAll('#userForm input');
    const errorMessages = document.querySelectorAll('.error-message');

    inputs.forEach(input => {
        input.classList.remove('input-error'); // Remove error class
    });

    errorMessages.forEach(msg => {
        msg.style.display = 'none'; // Hide error messages
    });

    
}



function validateEditUserForm() {
        const editUsername = document.getElementById('editUsername');
        const editEmail = document.getElementById('editEmail');
        const editPassword = document.getElementById('editPassword');
        const editUsernameError = document.getElementById('editUsernameError');
        const editEmailError = document.getElementById('editEmailError');
        const editPasswordError = document.getElementById('editPasswordError');

        // Clear previous error messages and icons
        resetEditFormInputStyles();

        let isValid = true; // Flag to track overall form validity

        // Validation for username
        if (editUsername.value.length < 3) {
            setEditFormError(editUsername, editUsernameError, 'Username must be at least 3 characters long.');
            isValid = false;
        }

        // Validation for email
        const emailPattern = /^[^\s@]+@[^\s@]+\.[a-z]{2,3}$/i; // Basic email regex
        if (!editEmail.value.match(emailPattern)) {
            setEditFormError(editEmail, editEmailError, 'Please enter a valid email address.');
            isValid = false;
        }

        // Validation for password
        if (editPassword.value.length < 6) {
            setEditFormError(editPassword, editPasswordError, 'Password must be at least 6 characters long.');
            isValid = false;
        }

        // If all checks pass, return true to allow form submission
        return isValid;
    }

    // Function to display error message and style the input in the edit form
    function setEditFormError(input, errorElement, message) {
        errorElement.textContent = message; // Set error message
        errorElement.style.display = 'block'; // Show error message
        input.classList.add('input-error'); // Add error class for styling
    }

    // Function to reset input styles in the edit form
    function resetEditFormInputStyles() {
        const inputs = document.querySelectorAll('#editUserForm input');
        const errorMessages = document.querySelectorAll('#editUserForm .error-message');

        inputs.forEach(input => {
            input.classList.remove('input-error'); // Remove error class
        });

        errorMessages.forEach(msg => {
            msg.style.display = 'none'; // Hide error messages
        });
    }


            // Sidebar navigation
            const sidebarLinks = document.querySelectorAll('.sidebar ul li a');
        const pages = document.querySelectorAll('.page');

        sidebarLinks.forEach(link => {
            link.addEventListener('click', function (event) {
                event.preventDefault();

                // Remove 'active' class from all links
                sidebarLinks.forEach(link => link.classList.remove('active'));

                // Hide all pages
                pages.forEach(page => page.classList.add('hidden'));

                // Add 'active' class to the clicked link
                this.classList.add('active');

                // Show the corresponding page
                const pageId = this.getAttribute('data-page') + '-page';
                document.getElementById(pageId).classList.remove('hidden');
            });
        });
    </script>
</body>

</html>