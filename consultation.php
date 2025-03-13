<?php
session_start();
include_once "config.php";

$db = $conn;
$tableName = "consult";
$columns = ['Consult ID', 'Full Name', 'Contact Number or Email', 'Consult Subject', 'Consult Request', 'Booked Date', 'Date of Request', 'Status'];
$fetchData = fetch_data($db, $tableName, $columns);

// fetch table data from database
function fetch_data($db, $tableName, $columns)
{
    if (empty($db)) {
        $msg = "Database connection error..";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Columns must be defined in an indexed array";
    } elseif (empty($tableName)) {
        $msg = "Consult table is empty";
    } else {

        $consult = implode(", ", array_map(function ($column) {
            return "`$column`";
        }, $columns));

        $query = "SELECT " . $consult . " FROM $tableName" . " ORDER BY `Consult ID` DESC";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                $msg = $row;
            } else {
                $msg = "No Data Found";
            }
        } else {
            $msg = mysqli_error($db);
        }
    }
    return $msg;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- links -->
    <link rel="stylesheet" href="css/consultation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>Consultations</title>
</head>

<body>
    <!-- login button -->
    <div class="header">
        <h1>TP AMC</h1>
        <button class="login-btn">
            <i class="fa fa-user"></i> ManagerName
        </button>
    </div>

    <!-- navigation bar at top of screen-->
    <nav class="navbar justify-content-center">
        <a class="nav px-5" href="home_hr.php"> <img src="img/home.jpg" alt="Home"></a>
        <ul class="nav">
            <a class="nav-link px-5" href="">View Employee Records</a>
            <a class="nav-link px-5" href="#">Accept/Deny Leave</a>
            <a class="nav-link px-5" href="#">View Consultations</a>
        </ul>
    </nav>


    <!-- alert message after approving/denying/deleting consult -->
    <?php
    if (isset($_SESSION['alert_message']) && isset($_SESSION['alert_type'])) {
        $alertType = $_SESSION['alert_type'];
        $alertMessage = $_SESSION['alert_message'];

        echo "
    <div class=\"alert alert-$alertType alert-dismissible\">
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        <strong>Update:</strong> Consult has been $alertMessage!
    </div>";

        // clear session variable
        unset($_SESSION['alert_message']);
        unset($_SESSION['alert_type']);
    }
    ?>

    <!-- consult navigation tabs-->
    <div class="container mt-3">
        <br>
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#approved">APPROVED</a></li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#pending">PENDING</a></li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#denied">DENIED</a></li>
        </ul>

        <!-- approved -->
        <div class="tab-content">
            <div id="approved" class="container tab-pane active">
                <br>
                <p>Consultations approved.</p>
                <div class="container">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered" aria-label>
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Consult Subject</th>
                                        <th>Date of Request</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (is_array($fetchData)) {
                                        $sn = 1;
                                        foreach ($fetchData as $data) {
                                            if ($data['Status'] === 'APPROVED') {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $data['Full Name'] ?? ''; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data['Consult Subject'] ?? ''; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data['Date of Request'] ?? ''; ?>
                                                    </td>

                                                    <!-- more details button -->
                                                    <td><button type="button" class="btn btn-primary" 
                                                    data-bs-toggle="modal" data-bs-target="#expandModal_
                                                    <?php echo $data['Consult ID']; ?>"> More Details </button></td>

                                                    <!-- modal popup for more details button -->
                                                    <div class="modal fade" id="expandModal_
                                                    <?php echo $data['Consult ID']; ?>"tabindex="-1" 
                                                    aria-labelledby="expandModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                        Modal title</h1>
                                                                    <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p><strong>Consult ID: </strong>
                                                                        <?php echo $data['Consult ID']; ?>
                                                                    </p>
                                                                    <p><strong>Full Name: </strong>
                                                                        <?php echo $data['Full Name']; ?>
                                                                    </p>
                                                                    <p><strong>Contact Number or Email: </strong>
                                                                        <?php echo $data['Contact Number or Email']; ?>
                                                                    </p>
                                                                    <p><strong>Consult Subject: </strong>
                                                                        <?php echo $data['Consult Subject']; ?>
                                                                    </p>
                                                                    <p><strong>Consult Request: </strong>
                                                                        <?php echo $data['Consult Request']; ?>
                                                                    </p>
                                                                    <p><strong>Booked Date: </strong>
                                                                        <?php echo $data['Booked Date']; ?>
                                                                    </p>
                                                                    <p><strong>Date of Request: </strong>
                                                                        <?php echo $data['Date of Request']; ?>
                                                                    </p>
                                                                    <p><strong>Status: </strong>
                                                                        <?php echo $data['Status']; ?>
                                                                    </p>

                                                                    <!-- delete button in modal popup -->
                                                                    <form action="deleteConsult.php" method="post">
                                                                        <input type="hidden" name="Consult ID"
                                                                            value="<?php echo $data['Consult ID']; ?>">
                                                                        <p class="delete-link"><button type="submit"
                                                                                name="submitDelete">Delete</button></p>
                                                                    </form>
                                                                </div>

                                                                <!-- close button in modal popup -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </tr>
                                                <?php
                                                $sn++;
                                            }
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="8">
                                                <?php echo $fetchData; ?>
                                            </td>
                                        <tr>
                                            <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <!-- pending -->
            <div id="pending" class="container tab-pane fade">
                <br>
                <p>Consultations pending approval or denial.</p>
                <div class="table-responsive">
                    <form method="post" action="updateStatus.php">
                        <table class="table table-bordered" aria-label>
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Consult Subject</th>
                                    <th>Date of Request</th>
                                    <th>Details</th>
                                    <th>Approve</th>
                                    <th>Deny</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (is_array($fetchData)) {
                                    $sn = 1;
                                    foreach ($fetchData as $data) {
                                        if ($data['Status'] === 'PENDING') {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $data['Full Name'] ?? ''; ?>
                                                </td>
                                                <td>
                                                    <?php echo $data['Consult Subject'] ?? ''; ?>
                                                </td>
                                                <td>
                                                    <?php echo $data['Date of Request'] ?? ''; ?>
                                                </td>

                                                <!-- more details button -->
                                                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#expandModal_
                                                        <?php echo $data['Consult ID']; ?>"> More Details </button></td>

                                                <!-- modal popup for more details button -->
                                                <div class="modal fade" id="expandModal_
                                                <?php echo $data['Consult ID']; ?>"
                                                    tabindex="-1" aria-labelledby="expandModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" 
                                                                id="exampleModalLabel">Modal title</h1>
                                                                <button type="button" class="btn-close" 
                                                                data-bs-dismiss="modal"aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p><strong>Consult ID: </strong>
                                                                    <?php echo $data['Consult ID']; ?>
                                                                </p>
                                                                <p><strong>Full Name: </strong>
                                                                    <?php echo $data['Full Name']; ?>
                                                                </p>
                                                                <p><strong>Contact Number or Email: </strong>
                                                                    <?php echo $data['Contact Number or Email']; ?>
                                                                </p>
                                                                <p><strong>Consult Subject: </strong>
                                                                    <?php echo $data['Consult Subject']; ?>
                                                                </p>
                                                                <p><strong>Consult Request: </strong>
                                                                    <?php echo $data['Consult Request']; ?>
                                                                </p>
                                                                <p><strong>Booked Date: </strong>
                                                                    <?php echo $data['Booked Date']; ?>
                                                                </p>
                                                                <p><strong>Date of Request: </strong>
                                                                    <?php echo $data['Date of Request']; ?>
                                                                </p>
                                                                <p><strong>Status: </strong>
                                                                    <?php echo $data['Status']; ?>
                                                                </p>

                                                                <!-- delete button in modal popup -->
                                                                <form action="deleteConsult.php" method="post">
                                                                    <input type="hidden" name="Consult ID"
                                                                        value="<?php echo $data['Consult ID']; ?>">
                                                                    <p class="delete-link"><button type="submit"
                                                                            name="submitDelete">Delete</button></p>
                                                                </form>
                                                            </div>

                                                            <!-- close button in modal popup -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- button to approve consult request -->
                                                <td>
                                                    <button type="submit" name="approve" value="
                                                    <?php echo $data['Consult ID']; ?>"
                                                        class="btn btn-success">Approve</button>
                                                </td>

                                                <!-- button to deny consult request -->
                                                <td>
                                                    <button type="submit" name="deny" value="
                                                    <?php echo $data['Consult ID']; ?>"
                                                        class="btn btn-danger">Deny</button>
                                                </td>

                                            </tr>
                                            <?php
                                            $sn++;
                                        }
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="8">
                                            <?php echo $fetchData; ?>
                                        </td>
                                    <tr>
                                        <?php
                                }
                                ?>
                            </tbody>
                        </table>
                </div>
            </div>


            <!-- denied -->
            <div id="denied" class="container tab-pane fade">
                <br>
                <p>Consultations denied.</p>
                <div class="table-responsive">
                    <table class="table table-bordered" aria-label>
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Consult Subject</th>
                                <th>Date of Request</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (is_array($fetchData)) {
                                $sn = 1;
                                foreach ($fetchData as $data) {
                                    if ($data['Status'] === 'DENIED') {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $data['Full Name'] ?? ''; ?>
                                            </td>
                                            <td>
                                                <?php echo $data['Consult Subject'] ?? ''; ?>
                                            </td>
                                            <td>
                                                <?php echo $data['Date of Request'] ?? ''; ?>
                                            </td>

                                            <!-- more details button -->
                                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#expandModal_
                                                    <?php echo $data['Consult ID']; ?>"> More Details </button></td>

                                            <!-- modal popup for more details button -->
                                            <div class="modal fade" id="expandModal_<?php echo $data['Consult ID']; ?>"
                                                tabindex="-1" aria-labelledby="expandModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                Modal title</h1>
                                                            <button type="button" class="btn-close" 
                                                            data-bs-dismiss="modal"aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><strong>Consult ID: </strong>
                                                                <?php echo $data['Consult ID']; ?>
                                                            </p>
                                                            <p><strong>Full Name: </strong>
                                                                <?php echo $data['Full Name']; ?>
                                                            </p>
                                                            <p><strong>Contact Number or Email: </strong>
                                                                <?php echo $data['Contact Number or Email']; ?>
                                                            </p>
                                                            <p><strong>Consult Subject: </strong>
                                                                <?php echo $data['Consult Subject']; ?>
                                                            </p>
                                                            <p><strong>Consult Request: </strong>
                                                                <?php echo $data['Consult Request']; ?>
                                                            </p>
                                                            <p><strong>Booked Date: </strong>
                                                                <?php echo $data['Booked Date']; ?>
                                                            </p>
                                                            <p><strong>Date of Request: </strong>
                                                                <?php echo $data['Date of Request']; ?>
                                                            </p>
                                                            <p><strong>Status: </strong>
                                                                <?php echo $data['Status']; ?>
                                                            </p>

                                                            <!-- delete button in modal popup -->
                                                            <form action="deleteConsult.php" method="post">
                                                                <input type="hidden" name="Consult ID"
                                                                    value="<?php echo $data['Consult ID']; ?>">
                                                                <p class="delete-link">
                                                                    <button type="submit" name="submitDelete">
                                                                        Delete</button>
                                                                </p>
                                                            </form>
                                                        </div>

                                                        <!-- close button in modal popup -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                        <?php
                                        $sn++;
                                    }
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="8">
                                        <?php echo $fetchData; ?>
                                    </td>

                                <tr>
                                    <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>