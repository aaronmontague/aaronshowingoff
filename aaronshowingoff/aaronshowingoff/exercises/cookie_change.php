<html>
<body>
    <h4>Before:</h4>

    <?php
    $cookie_name = "aaronshowingoff";
    $cookie_value = "Simple reset the cookie to change the value";
    setcookie($cookie_name, $cookie_value, time() + (60 * 30), "/"); 
    ?>

    <h4>After:</h4>

    <?php
    if(!isset($_COOKIE[$cookie_name])) {
        echo "Cookie named '" . $cookie_name . "' is not set!";
    } else {
        echo "Cookie '" . $cookie_name . "' is set!<br>";
        echo "Value is: " . $_COOKIE[$cookie_name];
    }
    ?>

</body>
</html>
