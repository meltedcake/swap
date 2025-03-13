<?php
session_start();
include_once "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['Consult ID'])) {
        $consultID = $_POST['Consult ID'];

        $stmt = $conn->prepare("DELETE FROM consult WHERE `Consult ID` = ?");
        $stmt->bind_param("s", $consultID);
        $stmt->execute();

        // for alert mesasge
        $_SESSION['alert_message'] = "deleted";
        $_SESSION['alert_type'] = "danger";

        $stmt->close();
    }
}

header('Location: consultation.php');
exit();

