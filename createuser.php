<?php

function passwordsMatch($password, $confirmPassword) {
    if ($password !== $confirmPassword) {
        echo '<script>alert("Passwords do not match. Please try again.");</script>';
        echo '<script>window.location.href = "createaccount.html";</script>';
        exit;
    }
}

function emailExists($email, $conn) {
    $stmt = $conn->prepare("SELECT * FROM user_information WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo '<script>alert("Email already exists. Please use a different email address.");</script>';
        echo '<script>window.location.href = "createaccount.html";</script>';
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $Password = "";
    $database = "Jaiden_SMC";


    // Create a connection to the database
    $conn = new mysqli($servername, $username, $Password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $firstname = $_POST["firstname"];
    $surname = $_POST["surname"]; 
    $email= $_POST["email"];	
    $password = $_POST["password"];
    $confirmpassword=$_POST["confirmpassword"];

    // Check if passwords match
    passwordsMatch($_POST["password"], $_POST["confirmpassword"]);

    //check if email exists in database
    emailExists($_POST["email"], $conn);

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO user_information (firstname, surname, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $firstname, $surname, $email, $password);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo '<script>alert("Account created successfully.");</script>';
        echo '<script>window.location.href = "login.html";</script>';
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
