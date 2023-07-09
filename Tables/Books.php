<?php
include("dbconnection.php"); //DB Connection
// $query = $_GET['query'];
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['query'] == 1) {
    $BookName = $_POST['BookName'];
    $AuthorID = $_POST['AuthorID'];
    $CategoryID = $_POST['CategoryID'];
    $Pages = $_POST['Pages'];
    $PurchasePrice = $_POST['PurchasePrice'];
    $sql = "INSERT INTO Books(BookName, AuthorID, CategoryID, Pages, PurchasePrice) 
    values('$BookName', '$AuthorID', '$CategoryID', '$Pages', '$PurchasePrice')"; //Query
    $res = sqlsrv_query($conn, $sql); //Execute query
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Data | Library Management System</title>
    <link rel="stylesheet" href="tablesStyle.css">
</head>

<body>
    <div class="container">
        <div class="top">
            <a href="../index.php"  class="home-btn">Back to Home</a>
            <h1 class="headingTop">Welcome to Books Data Page</h1>
        </div>
        <section id="insert">
            <form action="Books.php?query=1" method="post">
                <p>Insert Data Into Books Table</p>
                <input type="text" name="BookName" id="BookName" placeholder="Enter Book Name here" required>
                <input type="number" name="AuthorID" id="AuthorID" placeholder="Enter AuthorID here" required>
                <input type="number" name="CategoryID" id="CategoryID" placeholder="Enter CategoryID" required>
                <input type="number" name="Pages" id="Pages" placeholder="Enter number of Pages" required>
                <input type="number" name="PurchasePrice" id="PurchasePrice" placeholder="Enter number of Purchase Price" required>
                <!-- <input type="text" name="" id="" placeholder="" required> -->
                <button type="submit">Insert Data</button>
            </form>
        </section>
        <hr>

        <section id="queries" class="section">
            <form action="Books.php?query=2" method="post">
                <p>Queries on Books Table</p>
                <input type="text" name="userQuery" id="userQuery" required value="SELECT * FROM Books">
                <button type="submit">Execute</button>
            </form>
        </section>
        <hr>

        <section id="Records">
            <p>Still to Complete</p>
            <table>
                <thead>
                    <tr>
                        <th>Book Name</th>
                        <th>Author ID</th>
                        <th>Category ID</th>
                        <th>Pages</th>
                        <th>Purchase Price</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['query'] == 2) {
                        $userQuery = $_POST['userQuery'];
                        $sql = "$userQuery";
                    } else {
                        $sql = "SELECT * FROM Books";
                    }
                    // Fetching Records from database
                    $result = sqlsrv_query($conn, $sql);
                    while ($row = sqlsrv_fetch_array($result)) {
                        echo "<tr>
        <td>" . $row['BookName'] . "</td>
        <td>" . $row['AuthorID'] . "</td>
        <td>" . $row['CategoryID'] . "</td>
        <td>" . $row['Pages'] . "</td>
        <td>" . $row['PurchasePrice'] . "</td>
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