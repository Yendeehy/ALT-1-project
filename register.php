<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // In a real-world scenario, you would validate and store the registration data in a database.
    // Here, I'm using a simple text file for demonstration purposes.
    $users = file_get_contents('users.txt');
    $users = json_decode($users, true);

    if (!isset($users[$username])) {
        $users[$username] = ['password' => $password];
        file_put_contents('users.txt', json_encode($users));

        echo 'Registration successful. You can now <a href="login.html">login</a>.';
    } else {
        echo 'Username already exists. Please choose a different one.';
    }
}
?>