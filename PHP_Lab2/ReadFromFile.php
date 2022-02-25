<?php

function redirected()
{
    session_start();

    if (!isset($_SESSION["is_visited"])) {
        echo "First Visit, Hello!";
        $_SESSION["is_visited"] = true;

    } else {
        $_SESSION["counter"] = isset($_SESSION["counter"]) ? $_SESSION["counter"] + 1 : 2;
        echo "you visited this page " . $_SESSION["counter"] . " times";
    }

    if (file_exists("log.txt")) {

        $content = file("log.txt");

        foreach ($content as $ln) {
            $item = explode(",", "$ln");
            echo "</b><br/>";
            echo "</b><br/>";
            echo "Visit Date: " . $item[0] . "<br/>";
            echo "Ip Address: " . $item[1] . "<br/>";
            echo "Email: " . $item[2] . "<br/>";
            echo "Name: " . $item[3] . "<br/>";
            echo "</b><br/>";
            echo "==================";
        }
    }
}

?>

<html>

<head>
    <title> test </title>
</head>

<body>
    <div>
        <?php
redirected();
?>
    </div>
    </form>
</body>

</html>