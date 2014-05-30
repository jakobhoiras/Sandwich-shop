<?php

session_start();

class sandwich {

    public $sw;
    public $count;
    public $toppings;
    public $dressinger;
    public $ekstra;

}

$_SESSION['Cart'];

//creates a new empty cart array if none exists
if (!isset($_SESSION['Cart'])) {
    $_SESSION['Cart'] = new ArrayObject();
}
?>



