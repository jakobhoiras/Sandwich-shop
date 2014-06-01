<?php
require('SandwichClass.php');
session_start();

if (isset($_POST['submit3'])) {
    $names = $_POST['names'];
    if ($names[0] != NULL) {
        foreach ($names as $names => $value) {
            $_SESSION['Cart'][$value] = NULL;
        }
    }
}

if (isset($_SESSION['Cart'])) {
    $besked = "";
    foreach ($_SESSION['Cart'] as $thing) {
        if ($thing != NULL) {
            if ($thing->id == 1) {
                $Esw = "Sandwich:" . "\r\n" . $thing->sw . "\r\n" .
                        "Antal: " . $thing->count . "\r\n";
                if ($thing->toppings != NULL) {
                    if ($thing->toppings != NULL) {
                        $top = "";
                        foreach ($thing->toppings as $topping) {
                            $top = $top . $topping . "\r\n";
                        }
                        $top = "Tilbehør:" . "\r\n" . $top;
                    }
                    if ($thing->dressinger != NULL) {
                        $dres = "";
                        if ($thing->dressinger != NULL) {
                            foreach ($thing->dressinger as $dressing) {
                                $dres = $dres . $dressing . "\r\n";
                            }
                            $dres = "Dressinger:" . "\r\n" . $dres;
                        }
                        if ($thing->ekstra != NULL) {
                            $eks = "";
                        }
                        if ($thing->ekstra != NULL) {
                            foreach ($thing->ekstra as $ekstra) {
                                $eks = $eks . $ekstra . "\r\n";
                            }
                            $eks = "Ekstra:" . "\r\n" . $eks;
                        }
                    }
                }
                $besked = $besked . $Esw . $top . $dres . $eks;
            } else {
                $Esw = "Salat:" . "\r\n" . $thing->kød . "\r\n" .
                        "Antal: " . $thing->tæl . "\r\n";
                if ($thing->grøntsager != NULL) {
                    if ($thing->grøntsager != NULL) {
                        $top = "";
                        foreach ($thing->grøntsager as $grøntsager) {
                            $top = $top . $grøntsager . "\r\n";
                        }
                        $top = "Grøntsager:" . "\r\n" . $top;
                    }
                }
                $besked = $besked . $Esw . $top;
            }
        }
    }
}

if (isset($_POST['Submit1'])) {

    $to = 'Dickow_93@hotmail.com';
    $subject = 'Sandwichshop bestilling';
    $message = $besked;
    $headers = 'From: Sandwichshoppen' . "\r\n" .
            'Reply-To: Dickow_93@hotmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);
}
?>

<html>
    <head>
        <title>Sandwich Shoppen</title>
    </head>
    <body>
        <div id="container" style="width:100%">
            <div id="header" style="background-color:#04B431; height: 120px; line-height:2; width:100%; float:left; text-align: center;">
                <font style="color:#FFFFFF; font-size: 50px;">
                Sandwich Shoppen
                </font>
            </div>
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
            <form method="post">
                <center>
                    <button type="submit" name="Submit2" style="width: 200px; background-color: #029727; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px;">Log ud</button>
                    <button type="submit" name="submit3" style="width: 200px; background-color: #029727; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px;">Fjern Sandwich</button>
                    <button type="submit" name="submit1" style="width: 200px; background-color: #029727; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px;">Bestil</button>
                    <?php
                    if (isset($_POST['Submit2'])) {
                        session_destroy();
                        ?><meta http-equiv="refresh" content="0"><?php
                    }

                    if (isset($_SESSION['Cart'])) {
                        ?>
                        <br>
                        <p style="font-size: 30px"> Du har bestilt f&#248lgende:</p>
                        <?php
                        $index = 0;
                        foreach ($_SESSION['Cart'] as $thing) {
                            if ($thing != NULL) {
                                if ($thing->id == 1) {
                                    ?><center>
                                        <div style="border: 1px solid #444; width: 40%; text-align:center;">
                                            <b style="font-size: 25px;">Sandwich:</b><br>
                                            <?php
                                            echo ($thing->sw . ' <input type="checkbox" name="names[]" value="' . $index . '">');
                                            echo ("<br><b>Br&#248d:</b> " . $thing->brød);
                                            if ($thing->toppings != NULL) {
                                                echo ("<br><b>Tilbeh&#248r:</b>" );
                                            }
                                            if ($thing->toppings != NULL) {
                                                foreach ($thing->toppings as $topping) {
                                                    echo ("<br>" . $topping);
                                                }
                                            }
                                            if ($thing->dressinger != NULL) {
                                                echo ("<br><b>Dressinger:</b>" );
                                            }
                                            if ($thing->dressinger != NULL) {
                                                foreach ($thing->dressinger as $dressing) {
                                                    echo ("<br>" . $dressing . "" );
                                                }
                                            }
                                            if ($thing->ekstra != NULL) {
                                                echo ("<br><b>Ekstra tilbeh&#248r:</b>" );
                                            }
                                            if ($thing->ekstra != NULL) {
                                                foreach ($thing->ekstra as $ekstra) {
                                                    echo ("<br>" . $ekstra . "" );
                                                }
                                            }
                                            ?>
                                            <p><b>Antal: </b><?php echo($thing->count);
                            ?>
                                            </p>
                                    </center>
                                    <?php
                                    $index += 1;
                                } else {
                                    ?><center>
                                        <div style = "border: 1px solid #444; width: 40%; text-align:center;">
                                            <b style = "font-size: 25px;">Salat:</b><br>
                                            <?php
                                            echo ($thing->kød . ' <input type="checkbox" name="names[]" value="' . $index . '">');
                                            if ($thing->grøntsager != NULL) {
                                                echo ("<br><b>Tilbeh&#248r:</b>" );
                                            }
                                            if ($thing->grøntsager != NULL) {
                                                foreach ($thing->grøntsager as $topping) {
                                                    echo ("<br>" . $topping);
                                                }
                                            }
                                            ?>
                                            <p><b>Antal: </b><?php echo($thing->tæl);
                            ?>
                                            </p>
                                    </center>
                                    <?php
                                    $index += 1;
                                }
                            } else {
                                $index += 1;
                            }
                            ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </center>
            </form>
    </body>
</html>