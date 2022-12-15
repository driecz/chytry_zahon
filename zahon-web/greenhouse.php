<?php
include_once 'header.php';
include_once 'includes/dbh.inc.php';

if (!isset($_SESSION['userid'])) {
    header("location: ./index.php");
    exit();
}
?>
<head>
    <link rel="stylesheet" href="styles/style.css">
</head>

<div class='my-container'>
    <div class='my-row'>
        <div class='card-extended'>
            <div class='data'>
<?php
$sql = "SELECT * FROM measuring ORDER BY time DESC LIMIT 1";

if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo "<h2 class='title-value'>Teplota:<h2>";
            echo "<p class='data-value'>" . $row['temperature'] . "</p>";
            echo "<h2 class='title-value'>Vlhkost:<h2>";
            echo "<p class='data-value'>" . $row['humidity'] . "</p>";
            echo "<h2 class='title-value'>Poslední měření:<h2>";
            echo "<p class='data-value'>" . date('d.m.Y / H:i:s',strtotime($row['time'])) . "</p>";
        }
        mysqli_free_result($result);
    } else {
        echo "No rows in database.";
    }
} else {
    echo "ERROR: $sql. " . mysqli_error($conn);
}

?>
            </div>
        </div>
        <a href='index.php' class='card-a'>
        <div class='card card-greenhouse'>
            <div class='title'>
                <h1 class='title-text'>ZPĚT</h1>
            </div>
        </div>
        <a/>
    </div>
</div>
