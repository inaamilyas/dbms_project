<?php
include ("dbconnection.php"); //DB Connection
if($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['query'] == 1){
    $BookID = $_POST['BookID'];
    $MemberID = $_POST['MemberID'];
    $StaffID = $_POST['StaffID'];
    $IssueDate = $_POST['IssueDate'];
    $ReturnDate = $_POST['ReturnDate'];
    $Fine = $_POST['Fine'];
    $sql = "INSERT INTO BookIssues(BookID, MemberID, StaffID, IssueDate, ReturnDate, Fine) 
    values('$BookID', '$MemberID', '$StaffID', '$IssueDate', '$ReturnDate', '$Fine')"; //Query
    $res = sqlsrv_query($conn, $sql); //Execute query
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Issues | Library Management System</title>
    <link rel="stylesheet" href="tablesStyle.css">
</head>

<body>
    <div class="container">
        <div class="top">
            <a href="../index.php" class="home-btn">Back to Home</a>
            <h1 class="headingTop">Welcome to Book Issues Page</h1>
        </div>
        <section id="insert">
            <form action="BookIssues.php?query=1" method="post">
                <p>Insert Data Into Book Issues Table</p>
                <input type="number" name="BookID" id="BookID" placeholder="Enter Book ID here" required>
                <input type="number" name="MemberID" id="MemberID" placeholder="Enter Member ID here" required>
                <input type="number" name="StaffID" id="StaffID" placeholder="Enter Staff ID here" required>
                <h6 class="label">Enter Issue Date</h6>
                <input type="date" name="IssueDate" id="IssueDate" placeholder="Issue Date" required>
                <h6 class="label">Enter Return Date</h6>
                <input type="date" name="ReturnDate" id="ReturnDate" placeholder="Return Date" required>
                <input type="number" name="Fine" id="Fine" placeholder="Enter Fine" required>
                <button type="submit">Insert Data</button>
            </form>
        </section>
        <hr>

        <section id="queries" class="section">
            <form action="BookIssues.php?query=2" method="post">
                <p>Queries on Book Issues</p>
                <input type="text" name="userQuery" id="userQuery" required value="SELECT * FROM BookIssues">
                <button type="submit">Execute</button>
            </form>
        </section>
        <hr>

        <section id="Records">
            <p>Records in Book Issues</p>
            <table>
                <thead>
                    <tr>
                        <th>Book ID</th>
                        <th>Member ID</th>
                        <th>Staff ID</th>
                        <th>Issue Date</th>
                        <th>Return Date</th>
                        <th>Fine</th>
                    </tr>
                </thead>

                <tbody>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['query'] == 2){
    $userQuery = $_POST['userQuery'];
    $sql = "$userQuery";
}
else{
    $sql = "SELECT * FROM BookIssues";
}
// Fetching Records from database
$result = sqlsrv_query($conn, $sql);
while ($row = sqlsrv_fetch_array($result)) {
echo "<tr>
        <td>" . $row['BookID'] . "</td>
        <td>" . $row['MemberID'] . "</td>
        <td>" . $row['StaffID'] . "</td>
        <td>" . $row['IssueDate'] . "</td>
        <td>" . $row['ReturnDate'] . "</td>
        <td>" . $row['Fine'] . "</td>
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