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
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $bday = isset($_POST['birthday']) ? $_POST['birthday'] : "";
    $file = fopen("fd-crm-20231028.csv", "r");

    if (!preg_match("/^[a-zA-Z0-9\s]+$/", $name)) {
        $name = preg_replace("/\W+/", "", $name);
    }

    if (strlen($name) > 16) {
        $name = substr($name, 0, 16);
    }

    if (strlen($bday) >= 10 && preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}/", $bday)) {
        $bday = substr($bday, 0, 10);
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address";
        fclose($file);
        exit();
    }

    while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
        if ($column[0] == $email) {
            echo "You are already subscribed to our newsletter. Redirecting to homepage in 3 seconds...";
            header("refresh:3;url=index.php");
            fclose($file);
            exit();
        }
    }

    $f = fopen("fd-crm-20231028.csv", "a");

    fputs($f, "\n");

    $data = [
        "EMail" => $email,
        "Name" => $name,
        "Birthday" => $bday
    ];

    fputcsv($f, $data);
    fclose($f);

    echo "You have been subscribed to our newsletter. Redirecting to homepage in 3 seconds...";
    header("refresh:3;url=index.php");
}

?>