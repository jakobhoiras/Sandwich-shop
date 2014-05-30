<?php
session_start();
$db_username = "fjp124";
$db_password = "FaxeKondi1";
$db = "oci:dbname=//localhost:1521/dbwc";
$user = $_REQUEST['username'];
$password = $_REQUEST['password'];
$sql = "select password from as_users where username = '" . $user . "'";
$sql42 = "select admin from as_users where username = '{$_SESSION['bruger']}'";

try {
    $conn = new PDO($db, $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
}

function getThatShit() {
    global $conn;
    $stmt = $conn->prepare("select * from IsItOpen");
    $stmt->execute();
    return $stmt->fetchAll();
}
?>
<html>
    <head>
        <title>Sandwich Shoppen</title>
    </head>
    <body>
        <div id="container" style="width:100%">
            <div id="header" style="background-color:#04B431; height: 120px; line-height:2; width:60%; float:left; text-align: right;">
                <font style="color:#FFFFFF; font-size: 50px;">
                Sandwich Shoppen
                </font>
            </div>
            <?php
            if (isset($_SESSION['bruger'])) {
                foreach ($conn->query($sql42) as $row) {
                    $value = $row[0];
                }
                if ($value == 0) {
                    ?>
                    <div style="background-color: #04B431; height: 120px; line-height:2; width:40%; float:right; text-align: right">
                        <form method="post" action="">
                            <button type="submit" name="Submit" onmouseover="" style="background-color: #04B431; width: 100px; height: 50px; font-size: 20px; cursor: pointer; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px;"> Log ud</button>
                            <?php
                            if (isset($_POST['Submit'])) {
                                session_destroy();
                                ?>
                                <meta http-equiv="refresh" content="0">
                                <?php
                            }
                            ?>
                        </form></div>
                    <?php
                } else {
                    ?>
                    <div style="background-color: #04B431; height: 120px; line-height:2; width:40%; float:right; text-align: right">
                        <form method = "post" action = "">
                            <button type = "submit" name = "Submit2" onmouseover = "" style = "background-color: #04B431; width: 100px; height: 50px; font-size: 20px; cursor: pointer; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px;"> Lukket</button>
                            <?php
                            if (isset($_POST['Submit2'])) {
                                try {
                                    $conn->beginTransaction();
                                    $sql3 = "UPDATE IsItOpen SET Status = 'lukket'";
                                    $conn->exec($sql3);
                                    $conn->commit();
                                } catch (Exception $e) {
                                    echo 'Caught exception: ', $e->getMessage(), "\n";
                                    $conn->rollBack();
                                }
                            }
                            ?>
                            <button type = "submit" name = "Submit3" onmouseover = "" style = "background-color: #04B431; width: 100px; height: 50px; font-size: 20px; cursor: pointer; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px;"> &#197ben</button>
                            <?php
                            if (isset($_POST['Submit3'])) {
                                try {
                                    $conn->beginTransaction();
                                    $sql4 = "UPDATE IsItOpen SET Status = 'aabent'";
                                    $conn->exec($sql4);
                                    $conn->commit();
                                } catch (Exception $e) {
                                    echo 'Caught exception: ', $e->getMessage(), "\n";
                                    $conn->rollBack();
                                }
                            }
                            ?>
                        </form></div>
                    <?php
                }
            }
            if (!isset($_SESSION['bruger'])) {
                ?>
                <div style=" background-color: #04B431; height: 120px; line-height:2; width:40%; float:right; text-align: right;">
                    <form method="post">
                        <table align="right">
                            <tr><td>Brugernavn:<td><input name="username"></td></tr>
                            <tr><td>Adgangskode:<td><input type="password" name="password"></td></tr>
                            <tr>
                                <td align="center"><button type="submit" name="Submit1" style="width: 100px; background-color: #029727; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px;">Log ind</button></td>
                                <td align="center">
                                    <button type="button" onclick="location.href = 'sandwichshoppen_login.php'" onmouseover="" style="width: 100px; background-color: #029727; cursor: pointer; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px;">
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
                                                    ?>
                                                    <meta http-equiv="refresh" content="0">
                                                    <?php
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
                    <button style="width:200px; background-color: #029727; border: 1px solid #444; border-top-left-radius: 50px;"><font size="6">Forside</font></button> 
                    <a href="sandwichshoppen_menu.php">
                        <button onmouseover="" style="width:200px; background-color: #029727; border: 1px solid #444; cursor: pointer;"><font size="6" color="#FFFFFF">Menu</font></button>
                    </a>
                    <a href="sandwichshoppen_kontakt.php">
                        <button onmouseover="" style="width:350px; background-color: #029727; border: 1px solid #444; cursor: pointer; border-top-right-radius: 50px;"><font size="6" color="#FFFFFF">Kontakt Information</font></button>
                    </a>
                </center>
            </div>
            <?php
            foreach (getThatShit() as $row) {
                $value = $row[0];
            }
            if ($value == 'lukket') {
                ?>
                <center>
                    <img src="http://applemapsmarketing.com/wp-content/uploads/2012/12/closed-for-business.jpg">
                </center>
                <?php
            } else {
                ?>
                <center>
                    <img src="http://www.ksamft.org/ohanaFiles/file/open_for_business.png">
                </center>
                <?php
            }
            ?>
        </div>

        <div id="footer" style="background-color:#04B431; clear:both; text-align:center;">
            Valby Langgade 36 TLF: 20 78 02 52
        </div>

    </body>
</html>