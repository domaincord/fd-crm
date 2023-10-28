<?php

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    $lines = file("fd-crm-20231028.csv", FILE_IGNORE_NEW_LINES);
    foreach ($lines as $key => $line) {
        if (strpos($line, $email) !== false) {
            unset($lines[$key]);
        }
    }
    file_put_contents("fd-crm-20231028.csv", implode("\n", $lines));
    echo "You have been unsubscribed from our newsletter";

}

?>