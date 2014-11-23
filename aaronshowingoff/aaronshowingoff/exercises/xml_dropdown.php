<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Parsing XML into a Dropdown</title>
    <script type="text/javascript">
        function update_prices(dog) {
            //alert(dog.selectedIndex)
            var xmlhttp;
            var cows, bird, apple;
            //dog.selectedIndex -1 to account for empty first <option>
            var elk = dog.selectedIndex - 1;
            if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }
            else {// code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    apple = xmlhttp.responseText;
                    //alert(apple);
                    //http://stackoverflow.com/questions/14336381/responsetext-works-but-responsexml-is-always-null?lq=1 <-- help from here
                    //still not sure why I can't return the xmlhttp.responseXML correctly 11/23/14
                    // remove whitespaces from start and end
                    apple = apple.replace(/^\s+|\s+$/g, '');
                    //parse into DOM object
                    var parser = new DOMParser();
                    var xmlDoc;
                    try {
                        xmlDoc = parser.parseFromString(apple, "text/xml");
                    } catch (e) {
                        alert("XML parsing error.");
                        return false;
                    };
                    //load the info
                    //try is generally useless here, but good practice
                    try {
                        var bird = xmlDoc.getElementsByTagName("state");
                        cows = "State: " + bird[elk].getElementsByTagName("id")[0].firstChild.nodeValue + "<br>";
                    }
                    catch (er) {
                        cows = "State didn't work..." + dog.selectedIndex + "<br>";
                    }
                    cows += "Diesel Price: $" + bird[elk].getElementsByTagName("d")[0].firstChild.nodeValue + "<br>";
                    cows += "CNG Price: $" + bird[elk].getElementsByTagName("cng")[0].firstChild.nodeValue + "<br>";
                    cows += "LNG Price: $" + bird[elk].getElementsByTagName("lng")[0].firstChild.nodeValue + "<br>";
                    document.getElementById('display_prices').innerHTML = cows;
                }
            }
            xmlhttp.open("GET", "natural_gas.xml", true);
            xmlhttp.setRequestHeader("Content-type", "text/xml");
            xmlhttp.send();

        }
    </script>
</head>
<body>
    Select a State:
    <select id="state_select" onchange="update_prices(this)">
        <option value="" selected="selected"></option>
        <?php
        $xml=simplexml_load_file("natural_gas.xml") or die("Error: Cannot create object");
        //echo $xml->states->state[1]->title; 
        foreach($xml->state as $state) {
        ?><option value="<?php echo $state->id?>"><?php echo $state->title?></option>
        <?php    
        }
        ?>
    </select>
    <br />
    <div id="display_prices">
    </div>

</body>
</html>
