<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Parsing XML</title>
</head>
<body>
    Gas Pricing by State:
    <br />
    <?php
    $xml=simplexml_load_file("natural_gas.xml") or die("Error: Cannot create object");
        //echo $xml->states->state[1]->title; 
    foreach($xml->states->state as $state) {
        //echo "State: " . $state->id . "<br>";
        echo "State: " . $state->title . "<br>";
        echo "Diesel Price: " . $state->d . "<br>";
        echo "CNG Price: " . $state->cng . "<br>";
        echo "LNG Price: " . $state->lng . "<br><br>";
    }
    ?>
</body>
</html>
