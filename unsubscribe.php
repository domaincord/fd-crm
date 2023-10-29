<?php

if (!file_exists("fd-crm-20231028.csv")) {
    $f = fopen("fd-crm-20231028.csv", "w");
    $data = [
        "EMail" => "EMail",
        "Name" => "Name",
        "Birthday" => "Birthday"
    ];
    fputcsv($f, $data);
    fclose($f);
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $lines = file("fd-crm-20231028.csv", FILE_IGNORE_NEW_LINES);
        foreach ($lines as $key => $line) {
            if (strpos($line, $email) !== false) {
                unset($lines[$key]);
            }
        }
        file_put_contents("fd-crm-20231028.csv", implode("\n", $lines));
        echo "You have been unsubscribed from our newsletter. Redirecting to homepage in 3 seconds...";
    }
    
    header("refresh:3;url=index.php");
}

?>