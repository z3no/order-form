<?php

// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);

// We are going to use session variables so we need to enable sessions
session_start();

// Use this function when you need to need an overview of these variables
function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

// TODO: provide some products (you may overwrite the example)
$products = [
    ['name' => 'Crispy Chicken Skin', 'price' => 3.5],
    ['name' => 'Bacon Mac & Cheese', 'price' => 3.9],
    ['name' => 'Martino Sandwich', 'price' => 3.9],
    ['name' => 'Doritos Nacho Cheese', 'price' => 3.5],
    ['name' => 'Dürüm with Garlic Sauce', 'price' => 3.5],
    ['name' => 'Chavroux & Bugles Nacho Cheese', 'price' => 3.5],
    ['name' => 'Spanish Melon with Jamon Ibérico', 'price' => 4.5],
    ['name' => 'Chocolate Strawberry', 'price' => 3.9],
    ['name' => 'Seasalt Caramel Popcorn', 'price' => 3.5],
    ['name' => 'Maple Bacon Donuts', 'price' => 3.9]
];

$totalValue = 0;

function validate()
{
    // TODO: This function will send a list of invalid fields back
    return [];
}

function handleForm()
{
    // TODO: form related tasks (step 1)

    // Validation (step 2)
    $invalidFields = validate();
    if (!empty($invalidFields)) {
        // TODO: handle errors
    } else {
        // TODO: handle successful submission
    }
}

// TODO: replace this if by an actual check
$formSubmitted = false;
if ($formSubmitted) {
    handleForm();
}

require 'form-view.php';