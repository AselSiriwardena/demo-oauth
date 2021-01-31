<?php
$file_name='../users/'.$_POST['email'].'.json';
error_reporting(0);
ini_set('display_errors', 0);
$image = $_POST['image'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

 if (empty($name)) {
    echo "empty_name";
} else if (empty($email)) {
    echo "empty_email";
} else if (file_get_contents($file_name)) {
    echo 'exists_email';
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "proper_email";
} else if (empty($password)) {
    echo "empty_password";
} else if (empty($confPassword)) {
    echo "empty_confPassword";
} else if (!($password === $confPassword)) {
    echo "mismatch";
} else {

    $user_data = array(
        'name' => $name,
        'imageSrc' => $image,
        'email' => $email,
        'password' => $password
    );
    $writeArray = json_encode($user_data);
    if (file_put_contents($file_name, $writeArray)) {
        echo 'success';
    } else {
        echo 'error';
    }
}
?>
