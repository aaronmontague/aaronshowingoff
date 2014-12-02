<?php
$cookie_name = "Aaron_Set";
$cookie_value = "aaronshowingoff_set";
// 86400 seconds, not miliseconds = 1 day
setcookie($cookie_name, $cookie_value, time() + (60 * 30), "/"); 
?>
<html>
<body>

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