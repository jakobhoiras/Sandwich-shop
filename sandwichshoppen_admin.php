<?php
$db_username = "lhn100";
$db_password = "trademe";
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
        <div id="header" style="background-color:#04B431; height: 100px; line-height:2; width:73%; float:left; text-align: center;">
                <font style="color:#FFFFFF; font-size: 50; text-align: center;">
                Sandwich Shoppen
                </font>
            </div>
            <div style="background-color:#04B431; height: 100px; line-height:2; width:27%; float:right;">
                <center>Brugernavn:<input><br>
                    Adgangskode:<input type="password"><br>
                    <button>Log ind</button>
                    <button>
                        <a href="sandwichshoppen_login.php" style="text-decoration: none; color: #000000;">
                            Ny bruger?</a>
                    </button></center>
            </div><hr>
            <div id="menu" style="background-color:#04B431; width:100%; float:left; text-align:center">
                <h3 style="color: black;">
                    <a href="sandwichshoppen.php" style="text-decoration: none; color: #FFFFFF;">Forside </a>
                    <a href="sandwichshoppen_menu.php" style="text-decoration: none; color: #FFFFFF;">Menu </a>
                    <a href="sandwichshoppen_kontakt.php"  style="text-decoration: none; color: #FFFFFF;">Kontakt Information</a></h3>
            </div>
            <form method="post" action="">
                        <button type="submit" name="Submit2" onmouseover="" style="background-color: #04B431; width: 100px; height: 50px; font-size: 20px; cursor: pointer; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px;"> Lukket</button>
                        <?php
                        if (isset($_POST['Submit2'])) {
                            session_destroy();
                try {
                    $conn->beginTransaction();
                    
                    $sql3 = "UPDATE IsItOpen SET Status = 'lukket'";
                    $conn->exec($sql3);
                    $conn->commit();
                } catch (Exception $e) {
                    echo 'Caught exception: ', $e->getMessage(), "\n";
                    $conn->rollBack();
                }
                echo "Added " . $personn . "to project ID " . $piid;
            
            
                            ?><meta http-equiv="refresh" content="0"><?php
                        }
                        ?>
                    </form>
        <?php
        $lukket = "SELECT * FROM IsItOpen";
        $conn->exec($lukket);
        if ($lukket === 'lukket') {
            echo "Lukket";
        }
        ?>
            <form method="post" action="">
                        <button type="submit" name="Submit3" onmouseover="" style="background-color: #04B431; width: 100px; height: 50px; font-size: 20px; cursor: pointer; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px;"> aabent</button>
                        <?php
                        if (isset($_POST['Submit3'])) {
                            session_destroy();
                try {
                    $conn->beginTransaction();
                    
                    $sql4 = "UPDATE IsItOpen SET Status = 'aabent'";
                    $conn->exec($sql4);
                    $conn->commit();
                    
                } catch (Exception $e) {
                    echo 'Caught exception: ', $e->getMessage(), "\n";
                    $conn->rollBack();
                }
                echo "Added " . $personn . "to project ID " . $piid;
            
            
                            ?><meta http-equiv="refresh" content="0"><?php
                        } 
                        ?>
                    </form>
    <?php
        $sql42 = "SELECT Status FROM IsItOpen WHERE ROWNUM = 1";
        $query = $conn->query($sql42);
        if ($query === 'aabent'){
            echo 'aabent';
        }
        else {
            echo 'lukket';
        }
        ?>        
    </body>
</html>