<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);

array_shift($argv);

if (empty($argv)) {
    die("ERROR: no arguments\n");
}

$lineElements = trim(implode(',', $argv), ',');

if (!preg_match('/^[0-9,]+$/', $lineElements)) {
    die("ERROR: allow only numbers and commas\n");
}

$elements = explode(",", $lineElements);


if (count($elements) == 1) {
    die("PROGRESSION: YES. with 1 element\n");
}


$isProgression = true;
$prevElement = array_shift($elements);
$diffStep = $elements[0] - $prevElement;

foreach ($elements as $element) {
    if ($element - $prevElement != $diffStep) {
        $isProgression = false;
        break;
    }

    $prevElement = $element;
}

if ($isProgression) {
    echo "PROGRESSION: YES\n";
}
else {
    echo "PROGRESSION: NO\n";
}

