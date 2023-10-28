<?php

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    $lines = file("crm.csv", FILE_IGNORE_NEW_LINES);
    foreach ($lines as $key => $line) {
        if (strpos($line, $email) !== false) {
            unset($lines[$key]);
        }
    }
    file_put_contents("crm.csv", implode("\n", $lines));
    echo "You have been unsubscribed from our newsletter";

}

?>