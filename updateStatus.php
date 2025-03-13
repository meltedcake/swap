<?php
session_start();
include_once "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $consultId = $_POST['approve'] ?? $_POST['deny'] ?? null;
    if ($_POST['approve']) {
        $status = 'APPROVED';
    } elseif ($_POST['deny']) {
        $status = 'DENIED';
    } else {
        $status = null;
    }

    if ($consultId && $status) {
        $sql = "UPDATE consult SET `Status` = ? WHERE `Consult ID` = ?";

        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("si", $status, $consultId);
            $stmt->execute();

            $_SESSION['alert_message'] = $status;
            $_SESSION['alert_type'] = $status == 'APPROVED' ? 'success' : 'danger';
         
            $stmt->close();
        }
    }
}

header('Location: consultation.php');

