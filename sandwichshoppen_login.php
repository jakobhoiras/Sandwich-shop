<?php
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
    <?php
    if ($user != "" and $password != "") {
        try {
            $conn->beginTransaction();
            $stmt = $conn->query("insert into users values('$pid', '$pid2')");
            $conn->commit();
            echo "Du er nu oprettet som bruger :)";
        } catch (Exception $ex) {
            echo $ex->getMessage();
            $conn->rollback();
        }
    }
    ?>
    <body>
        <div id="container">

            <div id="header" style="background-color:#04B431; height: 100px; line-height:2; width:60%; float:left; text-align: right;">
                <font style="color:#FFFFFF; font-size: 50;">
                Sandwich Shoppen
                </font>
            </div>
            <div style="background-color:#04B431; height: 100px; line-height:2; width:40%; float:right; text-align: right;">
                Brugernavn:<input><br>
                Adgangskode:<input type="password"><br>
                <button style="width: 100px; background-color: #029727; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px;">Log ind</button>
                <a href="sandwichshoppen_login.php">
                    <button onmouseover="" style="width: 100px; background-color: #029727; cursor: pointer; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px;">
                        Ny bruger?</button>
                </a>
            </div>
            <div id="menu" style="background-color:#04B431; width:100%; float:left; text-align:center">
                <center>
                    <a href="sandwichshoppen.php">
                        <button onmouseover="" style="width:400; background-color: #029727; cursor: pointer; border: 1px solid #444; border-top-left-radius: 50px;"><font size="6" color="#FFFFFF">Forside</font></button>
                    </a>
                    <a href="sandwichshoppen_menu.php">
                        <button onmouseover="" style="width:400; background-color: #029727; cursor: pointer; border: 1px solid #444;"><font size="6" color="#FFFFFF">Menu</font></button>
                    </a>
                    <a href="sandwichshoppen_kontakt.php">
                        <button onmouseover="" style="width:400; background-color: #029727; cursor: pointer; border: 1px solid #444; border-top-right-radius: 50px;"><font size="6" color="FFFFFF">Kontakt Information</font></button> 
                    </a>
                </center>
            </div>
            <div align="center">
                <img style="height: 400"src="http://abovethelaw.com/wp-content/uploads/2013/11/uncle-sam-we-want-you.jpg">
                <h1>Oprettelse af ny bruger</h1>
                Brugernavn:<input type="text" name="username"><br>
                Adgangskode:<input type="password" name="password"><br>
                Bekr&#230ft adgangskode:<input type="password"><br>
                <input type="submit" value="Opret" style="background-color: #F5F6CE; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px;">
                <a href=sandwichshoppen.php>
                    <button onmouseover="" style="cursor: pointer; background-color: #F5F6CE; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px;">
                        Allerede oprettet?</button>
                </a>
                <button>
                    
                </button>
            </div>
        </div>

        <div id="footer" style="background-color:#04B431; clear:both; text-align:center;">
            Valby Langgade 36 TLF: 20 78 02 52</div>
    </div>

</body>
</html>