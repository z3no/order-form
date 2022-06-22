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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //CHECK IF THE INPUT FIELD IS EMPTY, IF IT'S EMPTY SHOW AN ERROR
    if (empty($_POST["email"])) {
        $emailError =
            '<div class="alert alert-danger" role="alert">
                    E-mail is a required field!
                </div>';
    } else {
        $email = test_input($_POST["email"]);
        //CHECK IF THE EMAIL ADDRESS IS WELL FORMED
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError =
                '<div class="alert alert-danger" role="alert">
                    You gave an invalid email!
                </div>';
        }
    }

    //CHECK IF THE INPUT FIELD IS EMPTY, IF IT'S EMPTY SHOW AN ERROR
    if (empty($_POST["street"])) {
        $streetError =
            '<div class="alert alert-danger" role="alert">
                    Street is a required field!
                </div>';
    } else {
        $street = test_input($_POST["street"]);
        //CHECK IF THE STREET NAME ONLY CONTAINS LETTERS AND WHITESPACE
        if (!preg_match("/^[a-zA-Z-' ]*$/", $street)) {
            $streetError =
                '<div class="alert alert-danger" role="alert">
                    Only use letters and whitespace!
                </div>';
        }
    }

    //CHECK IF THE INPUT FIELD IS EMPTY, IF IT'S EMPTY SHOW AN ERROR
    if (empty($_POST["streetnumber"])) {
        $numberError =
            '<div class="alert alert-danger" role="alert">
                    Street number is a required field!
            </div>';
    } else {
        $streetnumber = test_input($_POST["streetnumber"]);
    }

    //CHECK IF THE INPUT FIELD IS EMPTY, IF IT'S EMPTY SHOW AN ERROR
    if (empty($_POST["city"])) {
        $cityError =
            '<div class="alert alert-danger" role="alert">
                    City is a required field!
            </div>';
    } else {
        $city = test_input($_POST["city"]);
        //CHECK IF THE CITY'S NAME ONLY CONTAINS LETTERS AND WHITESPACE
        if (!preg_match("/^[a-zA-Z-' ]*$/", $city)) {
            $cityError =
                '<div class="alert alert-danger" role="alert">
                    Only use letters and whitespace!
                </div>';
        }
    }

    //CHECK IF THE INPUT FIELD IS EMPTY, IF IT'S EMPTY SHOW AN ERROR
    if (empty($_POST["zipcode"])) {
        $zipError =
            '<div class="alert alert-danger" role="alert">
                    Zip Code is a required field!
                </div>';
    } else {
        $zipCode = test_input($_POST["zipcode"]);
        //CHECK IF THE ZIPCODE ONLY CONTAINS NUMBERS
        if (!preg_match("/^\d*$/", $zipCode)) {
            $zipError =
                '<div class="alert alert-danger" role="alert">
                    Only numbers are allowed!
                </div>';
        }
    }

    //GET DATA FROM CHECKBOXES
    $arrayDrinks = [];
    $arrayDrinksPrices = [];
    if (!empty($_POST['products'])) {
        // COUNTING THE NUMBER OF CHECKED CHECKBOXES
        $checked_count = count($_POST['products']);

        // LOOP TO STORE AND DISPLAY VALUES OF INDIVIDUAL CHECKED CHECKBOXES
        foreach ($_POST['products'] as $value){
            //var_dump($value);
            array_push($arrayDrinks, $products[$value]['name']);
            array_push($arrayDrinksPrices, $products[$value]['price']);
            //$value . "</br>";
            //var_dump($arrayDrinks);
        }
    }

    $totalValue = array_sum($arrayDrinksPrices);

}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/*
function validate()
{
    // TODO: This function will send a list of invalid fields back

    return [];

}

function handleForm()
{
    // TODO: form related tasks (step 1)

    // Validation (step 2)
    //$invalidFields = validate();
    //if (!empty($invalidFields)) {
        // TODO: handle errors
    //} else {
        // TODO: handle successful submission
    //}
}

// TODO: replace this if by an actual check
$formSubmitted = false;
if ($formSubmitted) {
    handleForm();
}
*/
require 'form-view.php';