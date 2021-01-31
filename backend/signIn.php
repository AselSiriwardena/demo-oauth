<?php
$file_name = '../data/users/' . $_POST['email'] . '.json';
error_reporting(0);
ini_set('display_errors', 0);
$email = $_POST['email'];
$password = $_POST['password'];

if(empty($email)){
    echo "empty_email";
}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "proper_email";
}
else if(empty($password)){
    echo "empty_password";
}
else if (file_get_contents($file_name)) {
    $user_data = json_decode(file_get_contents($file_name), true);
    if ($user_data['password'] == $password) {
        echo 'success';
    } else {
        echo 'passwrong';
    }
}
else {
    echo 'notfound';
}
?>