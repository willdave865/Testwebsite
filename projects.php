<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/personalPage.css">
    <title>Projects</title>
</head>
    <?php
        include 'header.html';
    ?>
<body>
<h1 class="text-centre">My Projects</h1>
<div class="container">
    <div class="row">
        <table class="text-centre" style="align-content: center">
            <tr>
                <th>Project Name</th>
                <th>Description</th>
                <th>Programming Languages</th>
                <th>Type</th>
                <th>Date</th>
                <th>Link</th>
            </tr>
            <?php
            if (!$config = parse_ini_file('../dbinfo.ini.php')) {
                echo "Error: Database info ini cannot be read";
            }
            $connectionInfo = array("UID" => $config["username"], "pwd" => $config["password"], "Database" => $config["dbname"], "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
            $serverName = "tcp:jtavernorprojects.database.windows.net,1433";
            $conn = sqlsrv_connect($serverName, $connectionInfo);
            if (!$conn) {
                echo "Connection could not be established.<br />";
                die(print_r(sqlsrv_errors(), true));
            }
            $sql = "SELECT * FROM proj ORDER BY Year ASC";
            $stmt = sqlsrv_query($conn, $sql);
            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>".$row['Name']."</td>";
                echo "<td>".$row['Description']."</td>";
                echo "<td>".$row['Language']."</td>";
                echo "<td>".$row['Type']."</td>";
                echo "<td>".$row['Year']."</td>";
                if ($row['Type'] == "University Project") {
                    echo "<td>Not publicly available enquire for details</td>";
                } else if ($row['Link']) {
                    echo "<td><a href='".$row['Link']."'>Available</a></td>";
                } else {
                    echo "<td>Unavailable</td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </div>
    <div class="row">
        <p>You can find my GitHub page <a href="https://github.com/jtavernor">here</a> though some projects listed here date too far back to be on GitHub.</p>
        <p>University projects aren't able to be publicly available as it would enable plagiarism, I can provide screenshots or access to these for valid reasons such as to potential employers.</p>
        <p>If any links don't work please contact me and I will give you access to the page.</p>
    </div>
</div>
</body>
</html>