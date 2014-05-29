<?php
session_start();

class sandwich {

    public $sw1;
    public $sw2;
    public $dropdown;

}

$_SESSION['Cart'];
$_SESSION['indexnumber'];
if (!isset($_SESSION['indexnumber'])) {
    $_SESSION['indexnumber'] = 0;
}
if (!isset($_SESSION['Cart'])) {
    $_SESSION['Cart'] = new ArrayObject();
}
?>

<html>
    <head>
        <title>Sandwich Shoppen</title>
    </head>
    <body>
        <form method="post">
            <select name="drop" style="background-color: #F5F6CE;">
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
            Sandwich:<input name="name"><br>
            Topping:<input name="name2">
            <!-- Submitknapper. Submit1 accepterer vores input og laver en ny sandwich ud fra disse input.
            Submit2 ødelægger vores session og refresher siden.-->
            <button type="submit" name="Submit1">Submit</button>
            <button type="submit" name="Submit2" onmouseover=""> Log ud</button>
            <?php
            if (isset($_POST['Submit2'])) {
                session_destroy();
                ?><meta http-equiv="refresh" content="0"><?php
            }
            if (isset($_POST['Submit1'])) {
                $sandwich = new sandwich();
                $sandwich->sw1 = $_REQUEST['name'];
                $sandwich->sw2 = $_REQUEST['name2'];
                $sandwich->dropdown = $_REQUEST['drop'];


                $_SESSION['Cart']->offsetSet($_SESSION['indexnumber'], $sandwich);
                if (isset($_SESSION['Cart'])) {
                    echo "<br>";
                    echo("Du har bestilt:<br>");
                    foreach ($_SESSION['Cart'] as $thing) {
                        echo ("<br>" . $thing->dropdown . ' <input type="checkbox" name="names[]" value="' . $_SESSION['indexnumber'] . '">');
                    }
                }
                $_SESSION['indexnumber']+= 1;
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
     $sql_update .= "name='" . $value . "' OR ";
}
//The name=anonymus is just to end the preceding loop correctly. 
//There will never be a person with that name though
$submit_query = $conn->query($sql_update."name='Anonymous'");
}
            -->
        </form>
    </body>
</html>