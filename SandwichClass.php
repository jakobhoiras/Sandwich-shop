<?php

session_start();

class sandwich {

    public $sw;
    public $count;
    public $toppings;
    public $dressinger;
    public $ekstra;
    public $brød;
    public $id = 1;

}

class salat{
    public $kød;
    public $grøntsager;
    public $tæl;
    public $id = 2;
}

$_SESSION['Cart'];

//creates a new empty cart array if none exists
if (!isset($_SESSION['Cart'])) {
    $_SESSION['Cart'] = new ArrayObject();
}
?>



