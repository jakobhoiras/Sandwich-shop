<?php
$db_username = "fjp124";
$db_password = "FaxeKondi1";
$db = "oci:dbname=//localhost:1521/dbwc";
$user = $_REQUEST['username'];
$password = $_REQUEST['password'];
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
                Sandwich Shoppen</font></div>
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
            <div id = "menu" style = "background-color:#04B431; width:100%; float:left; text-align: center">
                <center>
                    <a href = "sandwichshoppen.php">
                        <button onmouseover = "" style = "width:200; background-color: #029727; border: 1px solid #444; cursor: pointer; border-top-left-radius: 50px;"><font size = "6" color = "#FFFFFF">Forside</font></button>
                    </a>
                    <a href = "sandwichshoppen_menu.php">
                        <button onmouseover = "" style = "width:200; background-color: #029727; cursor: pointer; border: 1px solid #444;"><font size = "6" color = "#FFFFFF">Menu</font></button>
                    </a>
                    <button style = "width:350; background-color: #029727; border: 1px solid #444; border-top-right-radius: 50px;"><font size = "6">Kontakt Information</font></button>
                </center>
            </div>

            <table style = "font-size:20px;" align = "center">
                <th align = "center" colspan = "2">Kontakt Information</th>
                <tr><td align = "center" colspan = "2">Valby Langgade 36</td></tr>
                <tr><td align = "center" colspan = "2">Bestil gerne i god tid p&#229 f&#248lgende nr.:</td></tr>
                <tr><td align = "center" colspan = "2">20780252</td></tr>
            </table><center>
                <img src = "http://www.audion.com/system/public/categories/125/images/bread-sandwich.jpg">
            </center>
            <table style = "font-size:20px;" align = "center">
                <tr><td align = "right">Mandag-Fredag: </td><td align = "right">10.30-15.00</td></tr>
                <tr><td align = "right">L&#248rdag:  </td><td align="right">11.00-14.30</td></tr>
                <tr><td align = "right">S&#248ndag:  </td><td align="right">Lukket</td></tr>
            </table>

            <div id = "footer" style = "background-color:#04B431;clear:both;text-align:center;">
                Valby Langgade 36 TLF: 20 78 02 52</div>

        </div>
    </body>
</html>