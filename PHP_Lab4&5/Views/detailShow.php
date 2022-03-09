<?php

$id = $_GET["glass"];

$table = $database::table("items");

if ($table->where("id", "$id")->exists()) {

    $glass = $table->where("id", "$id")->first();

} else {
    die("not exist");
}

?>

<html>

<h5> name: <?php echo $glass->product_name; ?> </h5>

<h5> Country: <?php echo $glass->CouNtry; ?> </h5>

<h5> Image: <img src="Resources/images/<?php echo $glass->Photo; ?> " </h5>

</html>