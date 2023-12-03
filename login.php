<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // In a real-world scenario, you would validate the login against a database.
    // Here, I'm using a simple text file for demonstration purposes.
    $users = file_get_contents('users.txt');
    $users = json_decode($users, true);

    if (isset($users[$username]) && $users[$username]['password'] === $password) {
        $_SESSION['username'] = $username;
        header('Location: index.html');
        exit();
    } else {
        echo 'Invalid login credentials.';
    }
}
?>