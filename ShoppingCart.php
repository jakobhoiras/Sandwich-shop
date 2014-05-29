<?php
session_start();

class sandwich {

    public $sw1;
    public $sw2;

}
$_SESSION['Cart'];

$sandwich = new sandwich();
$sandwich->sw1 = $_REQUEST['name'];
$sandwich->sw2 = $_REQUEST['name2'];

if(!isset($_SESSION['Cart'])){
    $arrayobj = new ArrayObject(new sandwich());
    $_SESSION['Cart'] = $arrayobj;
}
?>

<html>
    <head>
        <title>Sandwich Shoppen</title>
    </head>
    <body>
        <form method="post">
            Sandwich:<input name="name"><br>
            Topping:<input name="name2">
            <button type="submit">Submit</button>
            <?php
            $_SESSION['Cart']->offsetSet(null, $sandwich);
            if (isset($_SESSION['Cart'])) {
                echo "<br>";
                echo("Du har bestilt:<br>");
                foreach ($_SESSION['Cart'] as $thing) {
                    echo($thing->sw1);
                    echo(", " . $thing->sw2);
                    echo "<br>";
                }
            }
            ?>
        </form>
    </body>
</html>