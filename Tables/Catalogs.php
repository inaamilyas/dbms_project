<?php
include("dbconnection.php"); //DB Connection
// $query = $_GET['query'];
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['query'] == 1) {
    $CategoryName = $_POST['CategoryName'];
    $sql = "INSERT INTO Catalogs(CategoryName) 
    values('$CategoryName')"; //Query
    $res = sqlsrv_query($conn, $sql); //Execute query
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogs | Library Management System</title>
    <link rel="stylesheet" href="tablesStyle.css">
</head>

<body>
    <div class="container">
        <div class="top">
            <a href="../index.php" class="home-btn">Back to Home</a>
            <h1 class="headingTop">Welcome to Book Catalogs Page</h1>
        </div>

        <section id="insert">
            <form action="Catalogs.php?query=1" method="post">
                <p>Insert Data Into Catalogs Table</p>
                <input type="text" name="CategoryName" id="CategoryName" placeholder="Enter Category Name here" required>
                <button type="submit">Insert Data</button>
            </form>
        </section>
        <hr>

        <section id="queries" class="section">
            <form action="Catalogs.php?query=2" method="post">
                <p>Queries on Catalogs</p>
                <input type="text" name="query" id="query" required value="SELECT * FROM Catalogs">
                <button type="submit">Execute</button>
            </form>
        </section>
        <hr>

        <section id="Records">
            <table>
                <thead>
                    <tr>
                        <th>CategoryID</th>
                        <th>Category Name</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['query'] == 2) {
                        $userQuery = $_POST['userQuery'];
                        $sql = "$userQuery";
                    } else {
                        $sql = "SELECT * FROM Catalogs";
                    }
                    // Fetching Records from database
                    $result = sqlsrv_query($conn, $sql);
                    while ($row = sqlsrv_fetch_array($result)) {
                        echo "<tr>
        <td>" . $row['CategoryID'] . "</td>
        <td>" . $row['CategoryName'] . "</td>
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