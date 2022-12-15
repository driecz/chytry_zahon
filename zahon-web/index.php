<?php
include_once 'header.php';
?>
<head>
    <link rel="stylesheet" href="styles/style.css">
</head>
<?php
    if (isset($_SESSION['userid'])){
        echo " 
          <div class='my-container'>
             <div class='my-row'>
      <a href='beds.php'class='card-a'>
        <div class='card card-one'>
          <div class='title'>
              <h1 class='title-text'>ZÁHONY</h1>
          </div>
        </div>
      </a>
      <a href='greenhouse.php' class='card-a'>
        <div class='card card-two'>
          <div class='title'>
            <h1 class='title-text'>SKLENÍK</h1>
          </div>
        </div>
    </a>
    <a href='includes/logout.inc.php' class='card-a'>
        <div class='card card-logout'>
          <div class='title'>
            <h1 class='title-text'>ODHLÁSIT SE</h1>
          </div>
        </div>
    </a>
    </div>
  </div>
        ";
    } else {
        echo "
            <div class='my-container'>
             <div class='my-row'>
                <a href='login.php'class='card-a'>
                    <div class='card card-login'>
                        <div class='title'>
                            <h1 class='title-text'>PŘIHLÁŠENÍ</h1>
                        </div>
                    </div>
                </a>
                <a href='signup.php' class='card-a'>
                    <div class='card card-signup'>
                        <div class='title'>
                            <h1 class='title-text'>REGISTRACE</h1>
                        </div>
                    </div>
                </a>
             </div>
            </div>
        ";
    }
?>
</body>
</html>
