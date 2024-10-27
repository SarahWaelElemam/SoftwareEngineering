// user.js

document.addEventListener("DOMContentLoaded", function () {
    const editBtn = document.getElementById("edit-btn");
    const confirmBtn = document.getElementById("confirm-btn");
    const deleteBtn = document.getElementById("delete-btn");
    const confirmDeleteBtn = document.getElementById("confirm-delete");
    const cancelDeleteBtn = document.getElementById("cancel-delete");
    const editForm = document.getElementById("edit-form");
    const confirmationDialog = document.getElementById("confirmation-dialog");
    const overlay = document.getElementById("overlay");

    // Show the edit form and populate current values
    editBtn.addEventListener("click", function () {
        editForm.style.display = "block";

        // Get current values
        document.getElementById("edit-name").value = document.getElementById("profile-name").innerText;
        document.getElementById("edit-phone").value = document.getElementById("profile-phone").innerText;
        document.getElementById("edit-gender").value = document.getElementById("profile-gender").innerText;
        document.getElementById("edit-location").value = document.getElementById("profile-location").innerText;
        document.getElementById("edit-email").value = document.getElementById("profile-email").innerText;
    });

    // Confirm the edits and update profile details
    confirmBtn.addEventListener("click", function () {
        document.getElementById("profile-name").innerText = document.getElementById("edit-name").value;
        document.getElementById("profile-phone").innerText = document.getElementById("edit-phone").value;
        document.getElementById("profile-gender").innerText = document.getElementById("edit-gender").value;
        document.getElementById("profile-location").innerText = document.getElementById("edit-location").value;
        document.getElementById("profile-email").innerText = document.getElementById("edit-email").value;

        // Hide the edit form after confirming
        editForm.style.display = "none";
    });

    // Show the confirmation dialog for deleting the account
    deleteBtn.addEventListener("click", function () {
        confirmationDialog.style.display = "block";
        overlay.style.display = "block";
    });

    // Handle confirmation of account deletion
    confirmDeleteBtn.addEventListener("click", function () {
        // Redirect to the homepage (replace 'home.php' with your actual homepage file)
        window.location.href = 'home.php';
    });

    // Handle cancellation of account deletion
    cancelDeleteBtn.addEventListener("click", function () {
        confirmationDialog.style.display = "none";
        overlay.style.display = "none";
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const editBtn = document.getElementById("edit-btn");
    const confirmBtn = document.getElementById("confirm-btn");
    const editModal = document.getElementById("edit-modal");
    const closeModal = document.getElementById("close-modal");

    // Show the edit modal and populate current values
    editBtn.addEventListener("click", function () {
        editModal.style.display = "block";

        // Populate current values
        document.getElementById("edit-name").value = document.getElementById("profile-name").innerText;
        document.getElementById("edit-phone").value = document.getElementById("profile-phone").innerText;
        document.getElementById("edit-gender").value = document.getElementById("profile-gender").innerText;
        document.getElementById("edit-location").value = document.getElementById("profile-location").innerText;
        document.getElementById("edit-email").value = document.getElementById("profile-email").innerText;
    });

    // Confirm edits, update profile, and close modal
    confirmBtn.addEventListener("click", function () {
        document.getElementById("profile-name").innerText = document.getElementById("edit-name").value;
        document.getElementById("profile-phone").innerText = document.getElementById("edit-phone").value;
        document.getElementById("profile-gender").innerText = document.getElementById("edit-gender").value;
        document.getElementById("profile-location").innerText = document.getElementById("edit-location").value;
        document.getElementById("profile-email").innerText = document.getElementById("edit-email").value;

        // Close modal after confirming
        editModal.style.display = "none";
    });

    // Close modal on "X" button click
    closeModal.addEventListener("click", function () {
        editModal.style.display = "none";
    });

    // Close modal if user clicks outside of modal content
    window.addEventListener("click", function (event) {
        if (event.target === editModal) {
            editModal.style.display = "none";
        }
    });
});
