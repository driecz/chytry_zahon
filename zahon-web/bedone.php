<?php
include_once 'header.php';
include_once 'includes/dbh.inc.php';
?>
<head xmlns="http://www.w3.org/1999/html">
    <link rel="stylesheet" href="styles/style.css">
</head>
<div class='my-container'>
    <div class='my-row'>
        <div class='card-extended'>
            <div class='data'>
                <?php
                $sql = "SELECT * FROM watering WHERE fwpot_number=1 ORDER BY id DESC LIMIT 1";

                if ($result = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<h2 class='title-value'>Poslední zalití:<h2>";
                            echo "<p class='data-value'>" . date('d.m.Y / H:i:s',strtotime($row['last_watering'])) . "</p>";
                            echo "<h2 class='title-value'>Rýmovník<h2>";
                            echo "<p class='data-description'>Rýmovník je poměrně nenáročná bylinka, která má rozšířené použití – od repelentu až po koření v kuchyni. Jíst se dají i celé čerstvé listy, chuť připomíná oregano s ostrou mátovou příchutí. Využívá se v tradiční medicíně zejména jako bylinka protizánětlivá a antibakteriální, a jak už název napovídá, také při dýchacích nebo i kožních obtížích. V tradiční medicíně se k léčbě dýchacích obtíží užívají i další druhy z rodu Plectranthus (např. P. barbatus). Obsahuje taniny, polyfenoly, terpenoidy, flavonoidy a různé organické kyseliny.</p>";
                        }
                        mysqli_free_result($result);
                    } else {
                        echo "No rows in database.";
                    }
                } else {
                    echo "ERROR: $sql. " . mysqli_error($conn);
                }
                ?>
                <form method="post">
                    <button class="button-black" name="submit" type="submit">Zalít</button>
                </form>
            </div>
        </div>
        <a href='beds.php' class='card-a'>
            <div class='card card-bed-one'>
                <div class='title'>
                    <h1 class='title-text'>ZPĚT</h1>
                </div>
            </div>
            </a>
    </div>
</div>
<?php
if (isset($_POST['submit']))
    {
    $sql = "INSERT INTO watering (fwpot_number, last_watering) VALUES (1, null);";
    $stmt = mysqli_stmt_init($conn);

    $resource = fopen("test2.php", 'w');
    fwrite($resource, "-");
    sleep(10);
    unlink("test2.php");

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ./bedone.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ./bedone.php");
    exit();
    }
?>
