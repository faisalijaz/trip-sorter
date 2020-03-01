<?php

// Composer autoload
require_once __DIR__ . '/vendor/autoload.php';

use src\TripSorter;

// ## Read data From file
include_once('boarding-cards.php');
$trip = new TripSorter($boardingCollection);

// Sort them
$trip->sort();

// Display
$trip->tripString();
