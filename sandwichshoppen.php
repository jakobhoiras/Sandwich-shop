<?php
if($_SESSION['loggedin'] == true) {
    header("location:google.com");
}
$db_username = "fjp124";
$db_password = "FaxeKondi1";
$db = "oci:dbname=//localhost:1521/dbwc";
$user = $_REQUEST['username'];
$password = $_REQUEST['password'];

try {
    $conn = new PDO($db, $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
}
?>

<html>

    <head>
        <title>Sandwich Shoppen</title>
    </head>
    <body>
        <div id="container" style="width:100%">
            <div id="header" style="background-color:#04B431; height: 120px; line-height:2; width:60%; float:left; text-align: right;">
                <font style="color:#FFFFFF; font-size: 50;">
                Sandwich Shoppen
                </font>
            </div>
            <div style="background-color:#04B431; height: 200px; line-height:2; width:40%; float:right; text-align: right;"><form method="post">
                    <table align="right">
                        <tr><td>Brugernavn:<td><input name="username"></td></tr>
                        <tr><td>Adgangskode:<td><input type="password" name="password"></td></tr>
                        <tr>
                            <td align="center"><button type="submit" name="Submit1" style="width: 100px; background-color: #029727; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px;">Log ind</button></td>
                            <td align="center"><a href="sandwichshoppen_login.php">
                                    <button onmouseover="" style="width: 100px; background-color: #029727; cursor: pointer; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px;">
                                        Ny bruger?</button>
                                </a></td></tr>
                        <tr><td colspan="2" align="center">
                                <?php
                                if (isset($_POST['Submit1'])) {
                                    if ($user != "" and $password != "") {
                                        try {
                                            if ($password == 'Jan') {
                                                echo"Succes";
                                            }
                                        } catch (Exception $ex) {
                                            echo "Fail";
                                            $conn->rollback();
                                        }
                                    } else {
                                        echo"Missing password";
                                    }
                                }
                                ?>
                            </td></tr>
                    </table></form></div>
            <div id="menu" style="background-color:#04B431; width:100%; float:left; text-align:center">
                <center>
                    <button style="width:200; background-color: #029727; border: 1px solid #444; border-top-left-radius: 50px;"><font size="6">Forside</font></button> 
                    <a href="sandwichshoppen_menu.php">
                        <button onmouseover="" style="width:200; background-color: #029727; border: 1px solid #444; cursor: pointer;"><font size="6" color="#FFFFFF">Menu</font></button>
                    </a>
                    <a href="sandwichshoppen_kontakt.php">
                        <button onmouseover="" style="width:350; background-color: #029727; border: 1px solid #444; cursor: pointer; border-top-right-radius: 50px;"><font size="6" color="#FFFFFF">Kontakt Information</font></button>
                    </a>
                </center>
            </div>
            <center>
                <img src="http://www.audion.com/system/public/categories/125/images/bread-sandwich.jpg">
            </center>
        </div>

        <div id="footer" style="background-color:#04B431; clear:both; text-align:center;">
            Valby Langgade 36 TLF: 20 78 02 52</div>
    </div>

</body>
</html>