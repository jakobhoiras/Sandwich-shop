<?php

require('SandwichClass.php');
session_start();




if (isset($_POST['submit3'])) {
$names = $_POST['names'];
foreach ($names as $names => $value) {
            $_SESSION['Cart'][$value] = NULL;
   
}
}

?>

<html>
    <head>
        <title>Sandwich Shoppen</title>
    </head>
    <body>
        <form method="post">
           
            <!-- Submitknapper. Submit1 accepterer vores input og laver en ny sandwich ud fra disse input.
            Submit2 ødelægger vores session og refresher siden.-->
           
            <button type="submit" name="Submit2" onmouseover=""> Log ud</button>
            <button type="submit" name="submit3">remove</button>
            <?php
            if (isset($_POST['Submit2'])) {
                session_destroy();
                ?><meta http-equiv="refresh" content="0"><?php
            }
           
                if (isset($_SESSION['Cart'])) {
                    echo "<br>";
                    echo("Du har bestilt:<br>");
                    $index = 0;
                    foreach ($_SESSION['Cart'] as $thing) {
                        if ($thing != NULL) {
                            echo ("<br>Sandwich:");
                            echo ("<br>Antal:" . $thing->count . "");
                        echo ("<br>" . $thing->sw . ' <input type="checkbox" name="names[]" value="' . $index . '">');
                       
                        
                        
                        if ($thing->toppings != NULL) {
                            echo ("<br>Toppings:" );
                        }
                        if ($thing->toppings != NULL) {
                        foreach ($thing->toppings as $topping) {
                            echo ("<br>" . $topping . "" );
                        }
                        }
                        if ($thing->dressinger != NULL) {
                            echo ("<br>Dressinger:" );
                        }
                        if ($thing->dressinger != NULL) {
                            foreach ($thing->dressinger as $dressing) {
                            echo ("<br>" . $dressing . "" );
                        }
                        }
                         if ($thing->ekstra != NULL) {
                            echo ("<br>Dressinger:" );
                        }
                        if ($thing->ekstra != NULL) {
                            foreach ($thing->ekstra as $ekstra) {
                            echo ("<br>" . $ekstra . "" );
                        }
                        }
                        
                        }
                        $index += 1;
                    }
                }
                
            
            ?>
            <!--
            if (isset($_POST['remove'])) {
$names = $_POST['names'];
$sql_update = "UPDATE AS_PEOPLE SET PID = NULL " .
"WHERE ";
//This foreach loop creates all the WHERE conditions, by concanating the -
//checked names
foreach ($names as $names => $value) {
            unset($_SESSION['Cart'][$value]);
}
//The name=anonymus is just to end the preceding loop correctly. 
//There will never be a person with that name though
$submit_query = $conn->query($sql_update."name='Anonymous'");
}
            -->
        </form>
    </body>
</html>