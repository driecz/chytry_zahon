<?php
include_once 'header.php';

if (!isset($_SESSION['userid'])){
    header("location: ./index.php");
    exit();
}
?>
<head>
    <link rel="stylesheet" href="styles/style.css">
</head>
<div class='my-container'>
    <div class='my-row'>
        <a href='bedone.php' class='card-a'>
            <div class='card card-bed-one'>
                <div class='title'>
                    <h1 class='title-text'>ZÁHON 1</h1>
                </div>
            </div>
        </a>
        <a href='bedtwo.php' class='card-a'>
            <div class='card card-bed-two'>
                <div class='title'>
                    <h1 class='title-text'>ZÁHON 2</h1>
                </div>
            </div>
        </a>
        <a href='index.php' class='card-a'>
            <div class='card card-go-back'>
                <div class='title'>
                    <h1 class='title-text'>ZPĚT</h1>
                </div>
            </div>
        </a>
    </div>
</div>

</body>
</html>