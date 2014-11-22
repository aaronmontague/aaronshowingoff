<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Parsing XML into a Dropdown</title>
</head>
<body>
    Select a State:
    <select>
        <?php
        $xml=simplexml_load_file("natural_gas.xml") or die("Error: Cannot create object");
        //echo $xml->states->state[1]->title; 
        foreach($xml->states->state as $state) {
        ?><option value="<?php echo $state->id?>"><?php echo $state->title?></option>
        <?php    
        }
        ?>
    </select>

    <!-- create a div to display the prices in various states | perform minor calculations as well -->
</body>
</html>
