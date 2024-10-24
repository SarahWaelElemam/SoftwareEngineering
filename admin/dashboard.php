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

    <!-- Event Modal -->
    <div id="addEventModal" class="modal-overlay">
        <div class="modal-content">
            <span class="modal-close">&times;</span>
            <h2>Add New Event</h2>
            <form id="eventForm" onsubmit="return handleAddEvent(event)">
                <div class="input-group">
                    <input type="text" id="eventName" name="eventName" placeholder="Event Name" required>
                    <div class="error-message" id="eventNameError"></div>
                </div>
                <div class="input-group">
                    <input type="date" id="eventDate" name="eventDate" placeholder="Event Date" required>
                    <div class="error-message" id="eventDateError"></div>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <!-- Edit Event Modal -->
    <div id="editEventModal" class="modal-overlay">
        <div class="modal-content">
            <span class="modal-close">&times;</span>
            <h2>Edit Event</h2>
            <form id="editEventForm" onsubmit="return handleEditEvent(event)">
                <input type="hidden" id="editEventId">
                <div class="input-group">
                    <input type="text" id="editEventName" name="eventName" placeholder="Event Name" required>
                    <div class="error-message" id="editEventNameError"></div>
                </div>
                <div class="input-group">
                    <input type="date" id="editEventDate" name="eventDate" placeholder="Event Date" required>
                    <div class="error-message" id="editEventDateError"></div>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <!-- Events Table -->
    <h2>Events List</h2>
    <table class="common-table-style events-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Event Name</th>
                <th>Date</th>
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

// Initialize events array with sample data
let events = [
    { id: 1, eventName: 'Conference 2024', eventDate: '2024-12-01' },
    { id: 2, eventName: 'Workshop', eventDate: '2024-11-15' }
];

// Function to render events table
function renderEvents() {
    const tbody = document.getElementById('eventsTableBody');
    tbody.innerHTML = '';
    
    events.forEach(event => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${event.id}</td>
            <td>${event.eventName}</td>
            <td>${event.eventDate}</td>
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

// Function to handle adding new event
function handleAddEvent(event) {
    event.preventDefault();
    
    const eventName = document.getElementById('eventName').value;
    const eventDate = document.getElementById('eventDate').value;

    if (validateEventForm()) {
        const newEvent = {
            id: events.length + 1,
            eventName,
            eventDate
        };

        events.push(newEvent);
        renderEvents();
        closeModal('addEventModal');
        document.getElementById('eventForm').reset();
    }
    return false;
}

// Function to handle editing event
function handleEditEvent(event) {
    event.preventDefault();
    
    const eventId = parseInt(document.getElementById('editEventId').value);
    const eventName = document.getElementById('editEventName').value;
    const eventDate = document.getElementById('editEventDate').value;

    if (validateEditEventForm()) {
        const eventIndex = events.findIndex(event => event.id === eventId);
        if (eventIndex !== -1) {
            events[eventIndex] = { ...events[eventIndex], eventName, eventDate };
            renderEvents();
            closeModal('editEventModal');
        }
    }
    return false;
}

// Function to delete event
function deleteEvent(id) {
    if (confirm('Are you sure you want to delete this event?')) {
        events = events.filter(event => event.id !== id);
        renderEvents();
    }
}

// Modal management for events
document.getElementById('addEventBtn').addEventListener('click', () => {
    document.getElementById('eventForm').reset();
    openModal('addEventModal');
});

function openEditEventModal(id) {
    const event = events.find(event => event.id === id);
    if (event) {
        document.getElementById('editEventId').value = event.id;
        document.getElementById('editEventName').value = event.eventName;
        document.getElementById('editEventDate').value = event.eventDate;
        openModal('editEventModal');
    }
}

// Form validation for events
function validateEventForm() {
    const eventName = document.getElementById('eventName');
    const eventDate = document.getElementById('eventDate');
    const eventNameError = document.getElementById('eventNameError');
    const eventDateError = document.getElementById('eventDateError');
    
    resetInputStyles();

    let isValid = true;

    if (eventName.value.length < 3) {
        setError(eventName, eventNameError, 'Event name must be at least 3 characters long.');
        isValid = false;
    }

    if (!eventDate.value) {
        setError(eventDate, eventDateError, 'Please select a valid date.');
        isValid = false;
    }

    return isValid;
}

// Similar validation function for editing events
function validateEditEventForm() {
    const editEventName = document.getElementById('editEventName');
    const editEventDate = document.getElementById('editEventDate');
    const editEventNameError = document.getElementById('editEventNameError');
    const editEventDateError = document.getElementById('editEventDateError');
    
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

    return isValid;
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
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('active');
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
    resetInputStyles();

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
function resetInputStyles() {
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