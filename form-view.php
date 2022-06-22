<?php // This file is mostly containing things for your view / html ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <title>Tastes like...</title>
</head>
<body>
<div class="container">
    <h1>Place your order</h1>
    <?php // Navigation for when you need it ?>
    <?php /*
    <nav>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="?food=1">Order food</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?food=0">Order drinks</a>
            </li>
        </ul>
    </nav>
    */ ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">E-mail:</label>
                <?php if (isset($emailError)){ echo $emailError; } ?>
                <input type="email" id="email" name="email" class="form-control" value="<?php if (isset($email)) { echo $email; } ?>"/>
            </div>
            <div></div>
        </div>

        <fieldset>
            <legend>Address</legend>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="street">Street:</label>
                    <?php if (isset($streetError)) { echo $streetError; } ?>
                    <input type="text" name="street" id="street" class="form-control" value="<?php if (isset($street)) { echo $street; } ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="streetnumber">Street number:</label>
                    <?php if (isset($numberError)) { echo $numberError; } ?>
                    <input type="text" id="streetnumber" name="streetnumber" class="form-control" value="<?php if (isset($streetnumber)) { echo $streetnumber; } ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City:</label>
                    <?php if (isset($cityError)) { echo $cityError; } ?>
                    <input type="text" id="city" name="city" class="form-control" value="<?php if (isset($city)) { echo $city; } ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="zipcode">Zip Code</label>
                    <?php if (isset($zipError)) { echo $zipError; } ?>
                    <input type="text" id="zipcode" name="zipcode" class="form-control" value="<?php if (isset($zipCode)) { echo $zipCode; } ?>">
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Products</legend>
            <?php foreach ($products as $i => $product): ?>
                <label>
                    <?php // <?= is equal to <?php echo ?>
                    <input type="checkbox" value="<?php echo $i ?>" name="products[<?php echo $i ?>]"/> <?php echo $product['name'] ?> -
                    &euro; <?= number_format($product['price'], 2) ?></label><br />
            <?php endforeach; ?>
        </fieldset>

        <button type="submit" name="submit" class="btn btn-primary">Order!</button>
    </form>

    <?php

    echo "<h2>Order Confirmation:</h2>";
    if(isset($street, $streetnumber, $zipCode, $city)) {
        echo "<p>Your shipping address is: 
                <ul>
                    <li>$street, $streetnumber</li>
                    <li>$zipCode $city</li>
                </ul>
              </p>";
        echo "You have selected the following " . $checked_count . " drink(s): <br/>" . implode("</br>", $arrayDrinks) ;
    }

    ?>

    <footer>You already ordered <strong>&euro; <?php echo $totalValue ?></strong> in drinks that taste like food.</footer>
</div>

<style>
    footer {
        text-align: center;
    }
</style>
</body>
</html>
