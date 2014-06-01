<?php
$db_username = "fjp124";
$db_password = "FaxeKondi1";
$db = "oci:dbname=//localhost:1521/dbwc";
$user = $_REQUEST['username'];
$password = $_REQUEST['password'];
$sql = "select password from as_users where username = '" . $user . "'";

require('SandwichClass.php');

session_start();


if (isset($_POST['AddToBasket'])) {
    $sandwich = new sandwich();
    $sandwich->sw = $_REQUEST['DropSw'];
    $sandwich->count = $_REQUEST['DropCount'];
    $sandwich->brød = $_REQUEST['names4'];
    $sandwich->toppings = array();
    $sandwich->dressinger = array();
    $sandwich->ekstra = array();
    
    $names = $_POST['names'];
    $names2 = $_POST['names2'];
    $names3 = $_POST['names3'];

    if ($names[0] != NULL) {
        foreach ($names as $names => $value) {
            array_push($sandwich->toppings, $value);
        }
    }

    if ($names2[0] != NULL) {
        foreach ($names2 as $names2 => $value) {
            array_push($sandwich->dressinger, $value);
        }
    }

    if ($names3[0] != NULL) {
        foreach ($names3 as $names3 => $value) {
            array_push($sandwich->ekstra, $value);
        }
    }

    if ($sandwich->sw != NULL) {
        $_SESSION['Cart']->offsetSet(NULL, $sandwich);
    }
}

if (isset($_POST['AddToBasket2'])) {
    $salat = new salat();
    $salat->kød = $_REQUEST['topping'];
    $salat->tæl = $_REQUEST['Antal'];
    $salat->grøntsager = array();

    $navn = $_POST['topping2'];

    if ($navn[0] != NULL) {
        foreach ($navn as $navn => $value) {
            array_push($salat->grøntsager, $value);
        }
    }
    if ($salat->kød != NULL) {
        $_SESSION['Cart']->offsetSet(NULL, $salat);
    }
}


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
                    <div id="menu" style="background-color:#04B431; width:100%; float:left; text-align: center">
                        <center>
                            <a href="sandwichshoppen.php">
                                <button onmouseover="" style="width:200; background-color: #029727; border: 1px solid #444; cursor: pointer; border-top-left-radius: 50px;"><font size="6" color="#FFFFFF">Forside</font></button>
                            </a>
                            <button style="width:200; background-color: #029727; border: 1px solid #444;"><font size="6">Menu</font></button>
                            <a href="sandwichshoppen_kontakt.php">
                                <button onmouseover="" style="width:350; background-color: #029727; border: 1px solid #444; cursor: pointer; border-top-right-radius: 50px;"><font size="6" color="#FFFFFF">Kontakt Information</font></button>
                            </a>
                        </center>
                    </div>
                    <div id="sandwich_billed" style="width: 50%; float:left; height:450;">
                        <img style=" float:right; width:450; height:370;" src="http://www.audion.com/system/public/categories/125/images/bread-sandwich.jpg">
                    </div>
                    <form method="post">
                        <div id="sandwich" style="width:50%; float: right; height:450;">
                            <h2>Sandwiches</h2>
                            V&#230lg mellem disse forskellige sandwiches:<br>

                            <select name="DropSw" style="background-color: #FFFFFF;">
                                <option></option>
                                <option value="Roastbeef med cornichons">Roastbeef med cornichons</option>
                                <option value="Roastbeef med emmenthaler">Roastbeef med emmenthaler</option>
                                <option value="Skinke med ost og sennep">Skinke med ost og sennep</option>
                                <option value="Kylling med ost">Kylling med ost</option>
                                <option value="R&#248get laks">R&#248get laks</option>
                                <option value="Pastrami med cornichons">Pastrami med cornichons</option>
                                <option value="Kylling med bacon">Kylling med bacon</option>
                                <option value="Kalkun med emmenthaler">Kalkun med emmenthaler</option>
                                <option value="Hjemmelavet tunsalat">Hjemmelavet tunsalat</option>
                                <option value="&#198ggesalat med bacon">&#198ggesalat med bacon</option>
                                <option value="Chorizo">Chorizo</option>
                                <option value="Emmenthaler med oliven">Emmenthaler med oliven</option>
                                <option value="Brie med peberfrugt">Brie med peberfrugt</option>
                                <option value="Vegetar m/u humus">Vegetar m/u humus</option>
                                <option value="Humus, kylling og bacon">Humus, kylling og bacon</option>
                            </select>

                            45,-<br>V&#230lg antal:<br>
                            <select name="DropCount" style="background-color: #FFFFFF;">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                            <button type="submit" name ="AddToBasket" onmouseover="" style="cursor: pointer; background-color: #FFFFFF; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px;">Tilf&#248j til kurv</button>
                            <button type="button" onclick="location.href = 'sandwichshoppen_cart.php'" onmouseover="" style="cursor: pointer; background-color: #FFFFFF; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px;">G&#229 til kurv</button><br>
                            <table align="left">
                                <tr><th colspan="3">Br&#248d</th></tr>
                                <tr><td>Lyst</td><td align="left"><input type="radio" name="names4" value="Lyst">Groft</td><td align="right"><input type="radio" name="names4" value="Groft"></td></tr>
                                <tr><th colspan="3">Tilbeh&#248r:</th></tr>
                                <tr><td>Salat</td>
                                    <td align="left"><input type="checkbox" name="names[]" value="Salat">Agurk</td><td align="right"><input type="checkbox" name="names[]" value="Agurk"></td></tr>
                                <tr><td>Tomat</td>
                                    <td align="left"><input type="checkbox" name="names[]" value="Tomat">Oliven</td><td align="right"><input type="checkbox" name="names[]" value="Oliven"></td></tr>
                                <tr><td>Majs</td>
                                    <td align="left"><input type="checkbox" name="names[]" value="Majs">Guler&#248d</td><td align="right"><input type="checkbox" name="names[]" value="Guler&#248d"></td></tr>
                                <tr><td>Syltede agurk</td>
                                    <td align="left"><input type="checkbox" name="names[]" value="Syltede Agurk">R&#248dl&#248g</td><td align="right"><input type="checkbox" name="names[]" value="R&#248dl&#248g"></td></tr>

                                <tr><th colspan="3">Dressinger</th></tr>
                                <tr><td>Creme Fraiche</td>
                                    <td align="left"><input type="checkbox" name="names2[]" value="Creme Fraiche">Karry</td><td align="right"><input type="checkbox" name="names2[]" value="Karry"></td></tr>

                                <tr><th colspan="3">Ekstra tilbeh&#248r</th></tr>
                                <tr><td>Bacon</td>
                                    <td align="left"><input type="checkbox" name="names3[]" value="Bacon">Bacon</td><td align="right"><input type="checkbox" name="names3[]" value="Bacon"></td></tr>
                            </table>
                        </div>
                        <div style="width: 100%;"><hr></div>
                        <div id="salat_billed" style="width: 50%; float:left; height:400;">
                            <img style="float:right; width:450; height:350; margin-right: 20px;" src="http://multimedia.pol.dk/archive/00446/Salat_446129a.jpg">
                        </div>
                        <div id="salat" style=" width:50%; float:right; height:400;">
                            <table>
                                <tr><th colspan="10" style="text-align: center; font-size: 50">Salater</th><tr>
                                <tr><th colspan="10" style="text-align:center;">K&#248d:</th></tr>
                                <td>Kylling</td><td><input type="radio" name="topping" value="Kylling"></td>
                                <td>Laks</td><td><input type="radio" name="topping" value="Laks"></td>
                                <td>Kalkun</td><td><input type="radio" name="topping" value="Kalkun"></td>
                                <td>Tun</td><td><input type="radio" name="topping" value="Tun"></td>
                                <td>Vegetar</td><td><input type="radio" name="topping" value="Vegetar"></td>
                                <tr><th colspan="10" style="text-align: center;">Gr&#248ntsager</th></tr>
                                <tr><td>Agurk</td><td><input type="checkbox" name="topping2[]" value="Agurk"></td>
                                    <td>Tomat</td><td><input type="checkbox" name="topping2[]" value="Tomat"></td>
                                    <td>Bacon</td><td><input type="checkbox" name="topping2[]" value="Bacon"></td>
                                    <td>Majs</td><td><input type="checkbox" name="topping2[]" value="Majs"></td>
                                    <td>Guler&#248d</td><td><input type="checkbox" name="topping2[]" value="Guler&#248d"></td>

                            </table>
                            38,-<br>V&#230lg antal:<br>
                            <select name="Antal" style="background-color: #FFFFFF;">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                            </select>
                            <button type="submit" name="AddToBasket2" onmouseover="" style="cursor: pointer; background-color: #FFFFFF; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px;">Tilf&#248j til kurv</button>
                            <button type="button" onclick="location.href = 'sandwichshoppen_cart.php'" onmouseover="" style="cursor: pointer; background-color: #FFFFFF; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px;">G&#229 til kurv</button><br>
                        </div><div style="width: 100%;"><hr></div>
                        <div id="drikkevarer_billed" style="width: 50%; float:left; height:400;">
                            <img style="float:right; width:450; height:350; margin-right: 20px;" src="http://cache2.allpostersimages.com/p/LRG/15/1563/2GADD00Z/plakater/iskold-coca-cola.jpg">               
                        </div>
                        <div id="drikkevarer" style="width:50%; float:left;">
                            <h2>Drikkevarer</h2>
                            Udvalget varierer, se i k&#248leskabet
                        </div>

                        <div id="footer" style="background-color:#04B431;clear:both;text-align:center;">

                            Valby Langgade 36 TLF: 20 78 02 52</div>
                    </form>        
            </div>

    </body>
</html>