<?php
$error_msg = array();

$content = array();

$today = date("F j, Y, g:i a");
$today_modified = str_replace(",", "", $today);

if (isset($_POST["submit"])) {

    $_POST["name"] = isset($_POST["name"]) ? trim($_POST["name"]) : null;
    $_POST["email"] = isset($_POST["email"]) ? trim($_POST["email"]) : null;
    $_POST["message"] = isset($_POST["message"]) ? trim($_POST["message"]) : null;

    foreach ($_POST as $field) {
        if (empty($field)) {
            $error_msg[] = "all fields are required";
        }
    }

    $name = $_POST["name"];
    if (strlen($name) > 100) {
        $error_msg[] = "name should be less than 100 characters";
    }

    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_msg[] = "email is not valid";
    }

    $message = $_POST["message"];
    if (strlen($message) > 255) {
        $error_msg[] = "name should be less than 255 characters";
    }

    if (empty($error_msg)) {
        $fp = fopen("log.txt", "a+");
        $line = "$today_modified," . $_SERVER['REMOTE_ADDR'] . ",$email,$name";
        fwrite($fp, $line . PHP_EOL);
        fclose($fp);
        die("<center> Thank you for contacting Us <br/> $name <br/> $email <br/> $message");
    }
}

function get_default($field)
{
    if (isset($_POST[$field])) {
        return $_POST[$field];
    } else {
        return " ";
    }
}

?>

<html>

<head>
    <title> contact form </title>
</head>

<body>
    <h3> Contact Form </h3>
    <div id="after_submit">
        <?php
foreach ($error_msg as $line) {
    echo "** $line <br/>";
}
?>
    </div>

    <form id="contact_form" action="WriteToFile.php" method="POST" enctype="multipart/form-data">

        <div class="row">
            <label class="required" for="name">Your name:</label><br />
            <input id="name" class="input" name="name" type="text" value=" <?php echo get_default("name"); ?>"
                size="30" /><br />
        </div>

        <div class="row">
            <label class="required" for="email">Your email:</label><br />
            <input id="email" class="input" name="email" type="text" value=" <?php echo get_default("email"); ?>"
                size="30" /><br />
        </div>

        <div class="row">
            <label class="required" for="message">Your message:</label><br />
            <textarea id="message" class="input" name="message" rows="7"
                cols="30"> <?php echo get_default("message"); ?></textarea><br />
        </div>

        <input id="submit" name="submit" type="submit" value="Send email" />
        <input id="clear" name="clear" type="reset" value="clear form" />

    </form>
</body>

</html>