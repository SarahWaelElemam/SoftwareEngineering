<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="User.css" />
    <script src="user.js" defer></script> <!-- Link to the user.js file -->
    <title>Movie Seat Booking</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: linear-gradient(to bottom, #FFFACD, #FFFFE0);
        }

        /* Style for the confirmation dialog */
        #confirmation-dialog {
            display: none; /* Hidden by default */
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            border: 2px solid #FFD43B;
            padding: 20px;
            z-index: 1000; /* Ensures it's above other content */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        #overlay {
            display: none; /* Hidden by default */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999; /* Behind the dialog */
        }

        .dialog-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php include "NavBar.php"?>
    <section>
        <div class="profile py-4">
            <div class="container">
                <div class="row">
                    <div class="card shadow-sm">
                        <div class="card-header bg-transparent text-center">
                            <div class="profile-content">
                                <div id="avatar-display" class="avatar-container">
                                    <!-- Avatar image or content here -->
                                </div>
                            </div>
                            <div class="profile-details">
                                <h3 id="profile-name">Hana Mohamed</h3>
                                <p id="profile-membersince">Member since 2024</p>
                                <div class="table table-bordered">
                                    <p>
                                        <i class="fa-regular fa-calendar" style="color: #FFD43B;"></i>
                                        <span id="profile-join-date">10 May 2023</span>
                                    </p>
                                    <p>
                                        <i class="fa-solid fa-phone" style="color: #FFD43B;"></i>
                                        <span id="profile-phone">+20 123 456 7890</span>
                                    </p>
                                    <p>
                                        <i class="fa-regular fa-user" style="color: #FFD43B;"></i>
                                        <span id="profile-gender">Female</span>
                                    </p>
                                    <p>
                                        <i class="fa-solid fa-location-dot" style="color: #FFD43B;"></i>
                                        <span id="profile-location">Cairo, Egypt</span>
                                    </p>
                                    <p>
                                        <i class="fa-regular fa-envelope" style="color: #FFD43B;"></i>
                                        <span id="profile-email">hana2200912@miuegypt.edu.eg</span>
                                    </p>
                                </div>
                            </div>
                            <div style="height: 1em"></div>
                        </div>
                        <div class="buttons">
                            <button type="button" class="btn" id="edit-btn">Edit Profile</button>
                            <button type="button" class="btn" id="delete-btn">Delete Account</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Profile Form (initially hidden) -->
        <div id="edit-form" style="display: none;">
            <h3>Edit Profile</h3>
            <input type="text" id="edit-name" placeholder="Name" />
            <input type="text" id="edit-phone" placeholder="Phone" />
            <input type="text" id="edit-gender" placeholder="Gender" />
            <input type="text" id="edit-location" placeholder="Location" />
            <input type="email" id="edit-email" placeholder="Email" />
            <button type="button" id="confirm-btn">Confirm</button>
        </div>

        <!-- Confirmation Dialog for Deleting Account -->
        <div id="overlay"></div>
        <div id="confirmation-dialog">
            <p>Do you want to permenantly delete your account?</p>
            <div class="dialog-buttons">
                <button id="confirm-delete">Yes</button>
                <button id="cancel-delete">No</button>
            </div>
        </div>
    </section>
</body>
</html>
