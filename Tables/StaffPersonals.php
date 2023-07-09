<?php
include("dbconnection.php"); //DB Connection
// $query = $_GET['query'];
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['query'] == 1) {
    $StaffName = $_POST['StaffName'];
    $Address = $_POST['Address'];
    $Phone = $_POST['Phone'];
    $Appointment = $_POST['Appointment'];
    // echo $Appointment;
    $sql = "INSERT INTO StaffPersonals ( StaffName, Address, Phone, Appointment)
    values ('$StaffName', '$Address', '$Phone', '$Appointment')"; //Query
    $res = sqlsrv_query($conn, $sql); //Execute query
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Personals | Library Management System</title>
    <link rel="stylesheet" href="tablesStyle.css">
</head>

<body>
    <div class="container">
        <div class="top">
            <a href="../index.php" class="home-btn">Back to Home</a>
            <h1 class="headingTop">Welcome to Staff Personals Page</h1>
        </div>
        <section id="insert">
            <form action="StaffPersonals.php?query=1" method="post">
                <p>Insert Data Into Staff Personals Table</p>
                <input type="text" name="StaffName" id="StaffName" placeholder="Enter Staff Name here" required>
                <input type="text" name="Address" id="Address" placeholder="Enter Address here" required>
                <input type="number" name="Phone" id="Phone" placeholder="Enter your Phone Number" required>
                <h6 class="label">Enter Appointment Date</h6>
                <input type="date" name="Appointment" id="Appointment" placeholder="Appointment Date" required>
                <!-- <input type="text" name="" id="" placeholder="" required> -->
                <button type="submit">Insert Data</button>
            </form>
        </section>
        <hr>

        <section id="queries" class="section">
            <form action="StaffPersonals.php?query=2" method="post">
                <p>Queries on Staff Personls</p>
                <input type="text" name="userQuery" id="userQuery" required value="SELECT * FROM StaffPersonals">
                <button type="submit">Execute</button>
            </form>
        </section>
        <hr>


        <section id="Records">
            <table>
                <thead>
                    <tr>
                        <th>Staff Name</th>
                        <th>Number</th>
                        <th>Address</th>
                        <th>Appointment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['query'] == 2) {
                        $userQuery = $_POST['userQuery'];
                        $sql = "$userQuery";
                    } else {
                        $sql = "SELECT * FROM StaffPersonals";
                    }
                    // Fetching Records from database
                    $result = sqlsrv_query($conn, $sql);
                    while ($row = sqlsrv_fetch_array($result)) {
                        // $Appointment = new DateTime($row['Appointment']);
                        // echo $row['Appointment'];
                        echo "<tr>
        <td>" . $row['StaffName'] . "</td>
        <td>" . $row['Phone'] . "</td>
        <td>" . $row['Address'] . "</td>";
                        echo    "<td>" . $row['Appointment'] . "</td>
    </tr>";
                    }

                    ?>
                </tbody>

            </table>
        </section>
    </div>

    <?php
        include("footer.php")
    ?>
</body>

</html>