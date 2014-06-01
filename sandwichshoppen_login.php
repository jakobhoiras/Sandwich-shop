<?php
$db_username = "fjp124";
$db_password = "FaxeKondi1";
$db = "oci:dbname=//localhost:1521/dbwc";
$user = $_REQUEST['username'];
$user2 = $_REQUEST['username2'];
$phone = $_REQUEST['phone'];
$password = $_REQUEST['password'];
$password2 = $_REQUEST['password2'];
$sql = "select password from as_users where username = '" . $user . "'";
session_start();

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
            <?php
            if (isset($_SESSION['bruger'])) {
                ?>
                <div style="background-color: #04B431; height: 120px; line-height:2; width:40%; float:right; text-align: right">
                    <form method="post" action="">
                        <button type="submit" name="Submit2" onmouseover="" style="background-color: #04B431; width: 100px; height: 50px; font-size: 20px; cursor: pointer; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px;"> Log ud</button>
                        <?php
                        if (isset($_POST['Submit2'])) {
                            session_destroy();
                            ?><meta http-equiv="refresh" content="0"><?php
                        }
                        ?>
                    </form></div>
                <?php
            }
            if (!isset($_SESSION['bruger'])) {
                ?>
                <div style=" background-color: #04B431; height: 120px; line-height:2; width:40%; float:right; text-align: right;">
                    <form method="post">
                        <table align="right">
                            <tr><td>Brugernavn:<td><input name="username"></td></tr>
                            <tr><td>Adgangskode:<td><input type="password" name="password"></td></tr>
                            <tr>
                                <td align="center"><button type="submit" name="Submit1" style="height: 30px; width: 100px; background-color: #029727; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px;">Log ind</button></td>
                                <td align="center">
                                    <button type="button" onclick="location.href = 'sandwichshoppen_login.php'" onmouseover="" style="height: 30px; width: 100px; background-color: #029727; cursor: pointer; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px;">
                                        Ny bruger?</button>
                                </td>
                            </tr>
                            <tr><td colspan="2" align="center">
                                    <?php
                                    if (isset($_POST['Submit1'])) {
                                        if ($user != "" and $password != "") {
                                            try {
                                                foreach ($conn->query($sql) as $row) {
                                                    $value = $row[0];
                                                }
                                                if ($password == $value) {
                                                    $_SESSION['bruger'] = $user;
                                                    ?><meta http-equiv="refresh" content="0"><?php
                                                } else {
                                                    echo "Brugernavn findes ikke, eller password er forkert";
                                                }
                                            } catch (Exception $ex) {
                                                echo "Fail";
                                            }
                                        } else {
                                            echo"Du mangler password eller brugernavn";
                                        }
                                    }
                                }
                                ?>
                            </td></tr>
                    </table></form></div>
            <div id="menu" style="background-color:#04B431; width:100%; float:left; text-align:center">
                <center>
                    <a href="sandwichshoppen.php">
                        <button onmouseover="" style="width:200; background-color: #029727; cursor: pointer; border: 1px solid #444; border-top-left-radius: 50px;"><font size="6" color="#FFFFFF">Forside</font></button>
                    </a>
                    <a href="sandwichshoppen_menu.php">
                        <button onmouseover="" style="width:200; background-color: #029727; cursor: pointer; border: 1px solid #444;"><font size="6" color="#FFFFFF">Menu</font></button>
                    </a>
                    <a href="sandwichshoppen_kontakt.php">
                        <button onmouseover="" style="width:350; background-color: #029727; cursor: pointer; border: 1px solid #444; border-top-right-radius: 50px;"><font size="6" color="FFFFFF">Kontakt Information</font></button> 
                    </a>
                </center>
            </div>
            <div align="center">
                <form>
                    <table>
                        <img style="height: 400"src="http://abovethelaw.com/wp-content/uploads/2013/11/uncle-sam-we-want-you.jpg">
                        <h1>Oprettelse af ny bruger</h1>
                        <tr><td>E-mail adresse:<td><input type="text" name="username"></td></tr>
                        <tr><td>Bekr&#230ft e-mail adresse:<td><input type="text" name="username2"></td></tr>
                        <tr><td>Telefon-nummer:<td><input type="text" name="phone"></td></tr>
                        <tr><td colspan="2" align="center">*Vi bruger dit telefon-nummer, til at kontakte dig</tr>                        
                        <tr><td>Adgangskode:<td><input type="password" name="password"></td></tr>
                        <tr><td>Bekr&#230ft adgangskode:<td><input type="password" name="password2"></td></tr>
                        <tr><td colspan="2" align="center" style="color: red;">
                                <?php
                                if ($password == $password2) {
                                    if ($user == $user2) {
                                        if ($user != "" and $password != "" and $phone != "") {
                                            try {
                                                $conn->beginTransaction();
                                                $stmt = $conn->query("insert into as_users values('$user', '$password', 0, $phone)");
                                                $conn->commit();
                                                echo "Du er nu oprettet som bruger :)";
                                            } catch (Exception $ex) {
                                                if (is_int($phone)) {
                                                    echo "Bruger findes allerede";
                                                    $conn->rollback();
                                                } else {
                                                    echo "Indtast kun tal i telefon-nummer";
                                                    $conn->rollback();
                                                }
                                            }
                                        }
                                    } else {
                                        echo "E-mail matcher ikke";
                                    }
                                } else {
                                    echo "Adgangskode matcher ikke";
                                }
                                ?>
                            </td></tr>
                        <tr>
                            <td align="center" colspan="2"><input type="submit" value="Opret bruger" style="background-color: #F5F6CE; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px;"></td></tr>
                    </table></form>
            </div>
        </div>
        <div id="footer" style="background-color:#04B431; clear:both; text-align:center;">
            Valby Langgade 36 TLF: 20 78 02 52</div>
    </div>

</body>
</html>