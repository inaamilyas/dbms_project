<?php
include("dbconnection.php"); //DB Connection
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['query'] == 1) {
    $AuthorName = $_POST['AuthorName'];
    $Country = $_POST['Country'];
    $LifeStatus = $_POST['LifeStatus'];
    $sql = "INSERT INTO Authors(AuthorName, Country, LifeStatus) values ('$AuthorName', '$Country', '$LifeStatus')"; //Query
    $res = sqlsrv_query($conn, $sql); //Execute query
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authors | Library Management System</title>
    <link rel="stylesheet" href="tablesStyle.css">
</head>

<body>
    <div class="container">
        <div class="top">
            <a href="../index.php" class="home-btn">Back to Home</a>
            <h1 class="headingTop">Welcome to Authors Page</h1>
        </div>

        <section id="insert">
            <form action="Authors.php?query=1" method="post">
                <p>Insert Data Into Authors Table</p>
                <input type="text" name="AuthorName" id="AuthorName" placeholder="Enter Author Name here" required>
                <input type="text" name="Country" id="Country" placeholder="Enter Country here" required>
                <input type="text" name="LifeStatus" id="LifeStatus" placeholder="Enter Author Life Status" required>
                <button type="submit">Insert Data</button>
            </form>
        </section>
        <hr>

        <section id="queries" class="section">
            <form action="Authors.php?query=2" method="post">
                <p>Queries on Authors</p>
                <input type="text" name="userQuery" id="userQuery" required value="SELECT * FROM Authors">
                <button type="submit">Execute</button>
            </form>
        </section>
        <hr>

        <section id="Records">
            <p>Records in Authors</p>
            <table>
                <thead>
                    <tr>
                        <th>Author Name</th>
                        <th>Country</th>
                        <th>Life Status</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['query'] == 2) {
                        $userQuery = $_POST['userQuery'];
                        $sql = "$userQuery";
                    } else {
                        $sql = "SELECT * FROM Authors";
                    }
                    // Fetching Records from database
                    $result = sqlsrv_query($conn, $sql);
                    while ($row = sqlsrv_fetch_array($result)) {
                        echo "<tr>
        <td>" . $row['AuthorName'] . "</td>
        <td>" . $row['Country'] . "</td>
        <td>" . $row['LifeStatus'] . "</td>
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