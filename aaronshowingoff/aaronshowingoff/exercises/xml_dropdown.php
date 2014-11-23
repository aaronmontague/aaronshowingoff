<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Parsing XML into a Dropdown</title>
    <script type="text/javascript">
        function update_prices(dog, url) {
            //alert(dog.selectedIndex)
            var xmlhttp;
            var cows, bird, apple;
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    cows = "";
                    bird = xmlhttp.responseXML.documentElement.getElementsByTagName("state");
                    apple = bird[dog.selectedIndex].getElementsByTagName("id");
                    try {
                        cows += "State: " + apple[0].firstChild.nodeValue + "<br>";
                    }
                    catch (er) {
                        cows += "State didn't work..." + dog.selectedIndex + "<br>"
                    }
                    cows += "Diesel Price: " + " xxx<br>";
                    cows += "CNG Price: " + " xxx<br>";
                    cows += "LNG Price: " + " xxx<br>";
                    document.getElementById('display_prices').innerHTML = cows;
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();

        }
    </script>
</head>
<body>
    Select a State:
    <select id="state_select" onchange="update_prices(this,'natural_gas.xml')">
        <?php
        $xml=simplexml_load_file("natural_gas.xml") or die("Error: Cannot create object");
        //echo $xml->states->state[1]->title; 
        foreach($xml->states->state as $state) {
        ?><option value="<?php echo $state->id?>"><?php echo $state->title?></option>
        <?php    
        }
        ?>
    </select>
    <br />
    <div id="display_prices">
        State: 
        <br />
        LNG Price:
        <br />
        CNG Price:
        <br />
        Diesel Price:
        <br />
    </div>

</body>
</html>
