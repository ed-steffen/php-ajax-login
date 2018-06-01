<?php
    include 'db.inc.php';

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $txt = "INSERT into tbl_accounts (firstname, lastname, username, password) ".
            "VALUES (?,?,?,?)";

    if ($stmt = prepare($txt)) {
        $stmt->bind_param("ssss", $firstname, $lastname, $username, $password);

        $stmt->execute();

        $stmt->close();

        if($result) {
            echo "sim";
        } else {
            echo "não";
        }

    }




 