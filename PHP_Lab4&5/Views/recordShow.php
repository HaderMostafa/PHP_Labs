<?php

//check if index is exist in get array sent through url
// check if it's a number and not less than zero
// for condition >> true > another casting to number false > index=0
$index = (isset($_GET["index"]) && is_numeric($_GET["index"]) && $_GET["index"] > 0) ? (int) $_GET["index"] : 0;

// to show only 5 records every time
$records = $database::table("items")->skip($index)->take(pager_size)->get();

$prevIndex = (($index - pager_size) >= 0) ? ($index - pager_size) : 0;
$prevLink = "http://localhost/iti/index.php?index=$prevIndex";

$nextIndex = ($index + pager_size);
$nextLink = "http://localhost/iti/index.php?index=$nextIndex";

echo "<table border=1>"; //start of table

$index = 0;

//loop over array of records
foreach ($records as $record) {

    if ($index === 0) {

        //row
        echo "<tr>";
        echo "<td> name </td>";
        echo "<td> price </td>";
        echo "<td> country </td>";
        echo "<td> Image </td>";
        echo "<td> Details </td>";
        echo "</tr>"; //end of tr
    }

    //row
    echo "<tr>";

    // to convert $record->Photo string to array according to . "03.png"
    $image = explode(".", $record->Photo);

    // then try to make it "03tz.png"
    $image = $image[0] . "tz" . ".png";

    // to change link/ url
    $current_url = $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $current_url = explode("?", $current_url);
    $detail = $current_url[0] . "?glass=" . $record->id;

    echo "<td> $record->product_name</td>";
    echo "<td> $record->list_price</td>";
    echo "<td> $record->CouNtry</td>";

    // to reach photo according to images folder path
    echo "<td> <img src='Resources/images/" . $image . "'></td>";

    //link
    echo "<td> <a href='" . $detail . "'>Visit</a></td>";

    echo "</tr>"; //end of tr

    $index++;
}

echo "</table>"; //end of table

?>

<html>

<div>
    <a href="<?php echo $prevLink; ?>"> Prev</a>

    <a href="<?php echo $nextLink; ?>"> Next </a>
</div>

</html>