<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="User.css" />
    <script src="User.js" defer></script> <!-- Link to the user.js file -->
    <title>Movie Seat Booking</title>
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
                                <div class="namee">
                                <h3 id="profile-name">Hana Mohamed</h3>
                                <p id="profile-membersince">Member since 2024</p>
                                </div>
                                <div class="table table-bordered">
                                    <p>
                                        <i class="fa-regular fa-calendar" style="color: #ffab03;"></i>
                                        <span id="profile-join-date">10 May 2023</span>
                                    </p>
                                    <p>
                                        <i class="fa-solid fa-phone" style="color: #ffab03;"></i>
                                        <span id="profile-phone">+20 123 456 7890</span>
                                    </p>
                                    <p>
                                        <i class="fa-regular fa-user" style="color: #ffab03;"></i>
                                        <span id="profile-gender">Female</span>
                                    </p>
                                    <p>
                                        <i class="fa-solid fa-location-dot" style="color: #ffab03;"></i>
                                        <span id="profile-location">Cairo, Egypt</span>
                                    </p>
                                    <p>
                                        <i class="fa-regular fa-envelope" style="color: #ffab03;"></i>
                                        <span id="profile-email">hana2200912@gmail.com</span>
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

                        <div class="purchase-history">
    <h3>Purchase History</h3>
    <table class="purchase-history-table">
        <thead>
            <tr>
                <th>Ticket Number</th>
                <th>Event Name</th>
                <th>Location</th>
                <th>Price</th>
                <th>Date</th>
                <th>Actions</th> 
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>123456</td>
                <td>Concert A</td>
                <td>Cairo Stadium</td>
                <td>$50</td>
                <td>15 Oct 2024</td>
                <td>
                    <button type="button" class="btn reorder-btn" onclick="location.href='events.php'">Reorder</button>
                    <button type="button" class="btn contact-btn" onclick="location.href='support.php'">Contact for Help</button>
                    <button type="button" class="btn refund-btn" onclick="location.href='support.php'">Refund</button>

                </td>
            </tr>
            <tr>
                <td>789012</td>
                <td>Festival B</td>
                <td>Giza Arena</td>
                <td>$75</td>
                <td>20 Oct 2024</td>
                <td>
                    <button type="button" class="btn reorder-btn" onclick="location.href='events.php'">Reorder</button>
                    <button type="button" class="btn contact-btn" onclick="location.href='support.php'">Contact for Help</button>
                    <button type="button" class="btn refund-btn" onclick="location.href='support.php'">Refund</button>

                </td>
            </tr>
        </tbody>
    </table>
</div>


       <!-- Edit Profile Modal -->
<div id="edit-modal" class="modal">
    <div class="modal-content">
        <span class="close-btn" id="close-modal">&times;</span>
        <h3>Edit Profile</h3>
        <div class="table table-bordered">
            <p>
                <i class="fa-regular fa-calendar" style="color: #ffab03;"></i>
                <input type="text" id="edit-name" placeholder="Name" />
            </p>
            <p>
                <i class="fa-solid fa-phone" style="color: #ffab03;"></i>
                <input type="text" id="edit-phone" placeholder="Phone" />
            </p>
            <p>
                <i class="fa-regular fa-user" style="color: #ffab03;"></i>
                <input type="text" id="edit-gender" placeholder="Gender" />
            </p>
            <p>
                <i class="fa-solid fa-location-dot" style="color: #ffab03;"></i>
                <input type="text" id="edit-location" placeholder="Location" />
            </p>
            <p>
                <i class="fa-regular fa-envelope" style="color: #ffab03;"></i>
                <input type="email" id="edit-email" placeholder="Email" />
            </p>
        </div>
        <button type="button" id="confirm-btn">Confirm</button>
    </div>
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