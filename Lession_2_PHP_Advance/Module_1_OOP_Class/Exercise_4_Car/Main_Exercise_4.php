<?php
include "ElectricCar.php";
include "GasolineCar.php";

$electricCar = new ElectricCar("Poscher", "Black", "10000", "Electic Car");
$electricCar->run();

$gasolineCar = new GasolineCar("Maybach", "Black", "10000", "GasolineCar Car");
$gasolineCar->run();