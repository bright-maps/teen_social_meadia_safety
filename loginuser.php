<?php
session_start(); // Start the session

//login attempt variables
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}
if (!isset($_SESSION['last_failed_attempt'])) {
    $_SESSION['last_failed_attempt'] = 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Jaiden_SMC";

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_POST["email"];
    $password = $_POST["password"];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("SELECT * FROM user_information WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the email exists in the database
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if ($password === $row["password"]) {
            // Password is correct, redirect to the home page with a success message
            $_SESSION["email"] = $email;
            header("Location: index.php?login_success=true");
            exit();
        } 
        else {
            //if Password is incorrect
            $_SESSION['login_attempts']++;
            $_SESSION['last_failed_attempt'] = time();
            $remaining_attempts = 3 - $_SESSION['login_attempts'];
            if ($remaining_attempts > 0) {
                // Redirect to the login page with an error message and remaining attempts
                header("Location: login.html?error=incorrect_password&attempts=$remaining_attempts");
                exit();
            } else {
                // Lock login for 10 minutes
                $_SESSION['login_locked_until'] = time() + 600; // Lock for 10 minutes (600 seconds)
                header("Location: login.html?error=login_locked");
                exit();
            }
        }
    } else {
        // Email does not exist, redirect to the login page with an error message
        header("Location: login.html?error=account_not_found");
        exit();
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}

if (isset($_SESSION['login_locked_until']) && $_SESSION['login_locked_until'] > time()) {
    // Redirect to the login page with a message about login being locked
    header("Location: login.html?error=login_locked");
    exit();
}
?>
