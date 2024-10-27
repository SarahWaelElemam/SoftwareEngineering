<?php 
include_once "includes/dbh.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check which form was submitted
    if (isset($_POST["formType"]) && $_POST["formType"] == "signup") {
        // Capture form data for sign-up
        $Fname = htmlspecialchars(trim($_POST["FName"]));
        $Lname = htmlspecialchars(trim($_POST["LName"]));
        $Email = strtolower(trim($_POST["Email"])); // Convert email to lowercase
        $Password = $_POST["Password"]; // Password will be saved as integer
        $ConfirmPassword = $_POST["ConfirmPassword"]; // FIXED: Now correctly using ConfirmPassword
        $Government = htmlspecialchars(trim($_POST["Government"]));

        // Check if all fields are filled
        if (!empty($Fname) && !empty($Lname) && !empty($Email) && !empty($Password) && !empty($ConfirmPassword) && !empty($Government)) {
            // Check if passwords match
            if ($Password !== $ConfirmPassword) {
                echo "<script>alert('Passwords do not match!');</script>";
            } elseif (!is_numeric($Password)) {
                echo "<script>alert('Password must be numeric!');</script>"; // Ensure password is numeric
            } else {
                // Check if email already exists
                $checkEmail = $conn->prepare("SELECT Email FROM users WHERE Email = ?");
                $checkEmail->bind_param("s", $Email);
                $checkEmail->execute();
                $result = $checkEmail->get_result();
                
                if ($result->num_rows > 0) {
                    echo "<script>alert('Email already exists!');</script>";
                } else {
                    // Insert into database, casting password as integer
                    $stmt = $conn->prepare("INSERT INTO users (FirstName, LastName, Email, Password, Government) VALUES (?, ?, ?, ?, ?)");
                    if ($stmt) {
                        $stmt->bind_param("sssis", $Fname, $Lname, $Email, $Password, $Government);

                        if ($stmt->execute()) {
                            $_SESSION["ID"] = $conn->insert_id;
                            $_SESSION["FName"] = $Fname;
                            $_SESSION["LName"] = $Lname;
                            $_SESSION["Email"] = $Email;
                            $_SESSION["Government"] = $Government;
                            
                            header("Location: index.php");
                            exit();
                        } else {
                            echo "<script>alert('Error saving to the database: " . $stmt->error . "');</script>";
                        }
                        $stmt->close();
                    } else {
                        echo "<script>alert('Prepared statement failed: " . $conn->error . "');</script>";
                    }
                }
                $checkEmail->close();
            }
        } else {
            echo "<script>alert('Please fill in all fields!');</script>";
        }
    } elseif (isset($_POST["formType"]) && $_POST["formType"] == "login") {
        // Capture form data for login
        $Email = strtolower(trim($_POST["Email"])); // Convert email to lowercase
        $Password = $_POST["Password"]; // Password will be compared as integer
    
        // Ensure both fields are filled
        if (!empty($Email) && !empty($Password)) {
            // Ensure password is numeric
            if (!is_numeric($Password)) {
                echo "<script>alert('Password must be numeric!');</script>";
            } else {
                // Find user by email
                $stmt = $conn->prepare("SELECT * FROM users WHERE Email = ?");
                if ($stmt) {
                    $stmt->bind_param("s", $Email);
                    $stmt->execute();
                    $result = $stmt->get_result();
    
                    if ($row = $result->fetch_assoc()) {
                        // Compare the numeric password directly
                        if ((int)$Password === (int)$row['Password']) {
                            // Set session variables
                            $_SESSION["ID"] = $row["ID"];
                            $_SESSION["FName"] = $row["FirstName"];
                            $_SESSION["LName"] = $row["LastName"];
                            $_SESSION["Email"] = $row["Email"];
                            $_SESSION["Government"] = $row["Government"];
    
                            header("Location: index.php");
                            exit();
                        } else {
                            echo "<script>alert('Invalid Email or Password');</script>";
                        }
                    } else {
                        echo "<script>alert('Invalid Email or Password');</script>";
                    }
    
                    $stmt->close();
                } else {
                    echo "<script>alert('Prepared statement failed: " . $conn->error . "');</script>";
                }
            }
        } else {
            echo "<script>alert('Please fill in both email and password!');</script>";
        }
    }
}
?>
  <?php include 'NavBar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TixCarte Login/Signup</title>
    <link rel="stylesheet" href="NavBar.css">
    <link rel="stylesheet" href="Login_Signup.css">
    <link rel="stylesheet" href="Footer.css">
</head>
<body>
    <section class="forms-section">
        <h1 class="section-title">Welcome To TixCarte</h1>
        <div class="forms">
            <div class="form-wrapper is-active">
                <button type="button" class="switcher switcher-login">
                    Login
                    <span class="underline"></span>
                </button>
                <form class="form form-login" method="POST">
                    <fieldset>
                        <legend>Please, enter your email and password for login.</legend>
                        <div class="input-block">
                            <label for="login-email">E-mail</label>
                            <input id="login-email" type="email" name="Email" required>
                        </div>
                        <div class="input-block">
                            <label for="login-password">Password</label>
                            <input id="login-password" type="password" name="Password" required>
                        </div>
                    </fieldset>
                    <input type="hidden" name="formType" value="login">
                    <button type="submit" class="btn-login">Login</button>
                </form>
            </div>
            
            <div class="form-wrapper">
    <button type="button" class="switcher switcher-signup">
        Sign Up
        <span class="underline"></span>
    </button>
    <div class="form-container">
    <form class="form form-signup" method="POST">
        <fieldset>
            <legend>Please, enter your details to sign up.</legend>
            <div class="input-block">
                <label for="signup-FName">First Name</label>
                <input id="signup-FName" type="text" name="FName" required>
            </div>
            <div class="input-block">
                <label for="signup-LName">Last Name</label>
                <input id="signup-LName" type="text" name="LName" required>
            </div>
            <div class="input-block">
                <label for="signup-email">E-mail</label>
                <input id="signup-email" type="email" name="Email" required>
            </div>
            <div class="input-block">
                <label for="signup-password">Password</label>
                <input id="signup-password" type="password" name="Password" required>
            </div>
            <div class="input-block">
                <label for="signup-password-confirm">Confirm Password</label>
                <input id="signup-password-confirm" type="password" name="ConfirmPassword" required>
            </div>
            <div class="input-block">
                <label for="signup-number">Phone Number</label>
                <input id="signup-number" type="PhoneNumber" name="PhoneNumber" required>
            </div>
            <div class="input-block">
                <label for="signup-government">Choose Government</label>
                <select id="signup-government" name="Government" required>
                    <option value="" disabled selected>Select your Government</option>
                                <option value="Cairo">Cairo</option>
                                <option value="Alexandria">Alexandria</option>
                                <option value="Giza">Giza</option>
                                <option value="Qalyubia">Qalyubia</option>
                                <option value="Sharqia">Sharqia</option>
                                <option value="Dakahlia">Dakahlia</option>
                                <option value="Beheira">Beheira</option>
                                <option value="Minya">Minya</option>
                                <option value="Faiyum">Faiyum</option>
                                <option value="Assiut">Assiut</option>
                                <option value="Sohag">Sohag</option>
                                <option value="Beni Suef">Beni Suef</option>
                                <option value="Qena">Qena</option>
                                <option value="Aswan">Aswan</option>
                                <option value="Luxor">Luxor</option>
                                <option value="Red Sea">Red Sea</option>
                                <option value="Matruh">Matruh</option>
                                <option value="New Valley">New Valley</option>
                                <option value="North Sinai">North Sinai</option>
                                <option value="South Sinai">South Sinai</option>
                                <option value="Damietta">Damietta</option>
                                <option value="Monufia">Monufia</option>
                                <option value="Kafr El Sheikh">Kafr El Sheikh</option>
                                <option value="Gharbia">Gharbia</option>
                                <option value="Ismailia">Ismailia</option>
                                <option value="Suez">Suez</option>
                                <option value="Port Said">Port Said</option>
                            </select>
                            </div>
            <div class="input-block">
                <label for="signup-dob">Date of Birth</label>
                <input id="signup-dob" type="date" name="DOB" required>
            </div>
            <div class="input-block">
                <label for="signup-gender">Gender</label>
                <select id="signup-gender" name="Gender" required>
                    <option value="" disabled selected>Select your Gender</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                </select>
            </div>
        </fieldset>
        <input type="hidden" name="formType" value="signup">
        <button type="submit" class="btn-signup">Continue</button>
    </form>
</div>
</div>
        </div>
        
    </section>
    <?php include 'Footer.php'; ?>
<script src="Login_Signup.js"></script>
</body>
</html>
