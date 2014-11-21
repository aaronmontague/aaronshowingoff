<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Parsing XML</title>
</head>
<body>
    Gas Pricing by State:
    <?php
    $xml=simplexml_load_file("natural_gas.xml") or die("Error: Cannot create object");
    echo $xml->id . "<br>";
    echo $xml->title . "<br>";
    echo $xml->d . "<br>";
    echo $xml->cng . "<br>";
    echo $xml->lng;
    ?>
</body>
</html>
