<?php
include("dbconnection.php"); //DB Connection
// $query = $_GET['query'];
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['query'] == 1) {
    $MemberName = $_POST['MemberName'];
    $MembershipDate = $_POST['MembershipDate'];
    $Address = $_POST['Address'];
    $Phone = $_POST['Phone'];
    $sql = "INSERT INTO LibraryMembers(MemberName, MembershipDate, Address, Phone) 
    values('$MemberName', '$MembershipDate', '$Address', '$Phone')"; //Query
    $res = sqlsrv_query($conn, $sql); //Execute query
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Members | Library Management System</title>
    <link rel="stylesheet" href="tablesStyle.css">
</head>

<body>
    <div class="container">
        <div class="top">
            <a href="../index.php" class="home-btn">Back to Home</a>
            <h1 class="headingTop">Welcome to Library Members Page</h1>
        </div>
        <section id="insert">
            <form action="LibraryMembers.php?query=1" method="post">
                <p>Insert Data Into Library Members Table</p>
                <input type="text" name="MemberName" id="MemberName" placeholder="Enter Member Name here" required>
                <h6 class="label">Enter Membership Date</h6>
                <input type="date" name="MembershipDate" id="MembershipDate" placeholder="Enter Membership Date here" required>
                <input type="text" name="Address" id="Address" placeholder="Enter Address" required>
                <input type="number" name="Phone" id="Phone" placeholder="Enter your Phone Number" required>
                <!-- <input type="text" name="" id="" placeholder="" required> -->
                <button type="submit">Insert Data</button>
            </form>
        </section>
        <hr>

        <section id="queries" class="section">
            <form action="LibraryMembers.php?query=2" method="post">
                <p>Queries on Library Members Table</p>
                <input type="text" name="userQuery" id="userQuery" required value="SELECT * FROM LibraryMembers">
                <button type="submit">Execute</button>
            </form>
        </section>
        <hr>

        <section id="Records">
            <table>
                <thead>
                    <tr>
                        <th>Member Name</th>
                        <th>Membership Date</th>
                        <th>Address</th>
                        <th>Number</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- <tr>
                        <td>Asad Ali</td>
                        <td>21/2/22</td>
                        <td>Kotli</td>
                        <td>65576575</td>
                    </tr> -->
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['query'] == 2) {
                        $userQuery = $_POST['userQuery'];
                        $sql = "$userQuery";
                    } else {
                        $sql = "SELECT * FROM LibraryMembers";
                    }
                    // Fetching Records from database
                    $result = sqlsrv_query($conn, $sql);
                    while ($row = sqlsrv_fetch_array($result)) {
                        // echo $row['MembershipDate'];
                        echo "<tr>
        <td>" . $row['MemberName'] . "</td>
        <td>" . $row['MembershipDate'] . "</td>
        <td>" . $row['Address'] . "</td>
        <td>" . $row['Phone'] . "</td>
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