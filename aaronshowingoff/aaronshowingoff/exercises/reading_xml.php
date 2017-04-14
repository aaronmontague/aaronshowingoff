<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Parsing XML</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#xml_show").click(function () {
                $("#below_show").toggle();
                // http://stackoverflow.com/questions/13652835/button-text-toggle-in-jquery
                $(this).text(function (i, v) {
                    return v === 'Hide XML Code' ? 'Show XML Code' : 'Hide XML Code'
                })
            });
            $("#below_show").hide();
        });
    </script>
    <style> 
        #below_show{
            background-color: #e5eecc;
            border: solid 1px #c3c3c3;
        }

    </style>
</head>
<body>
    <button id="xml_show" type="button">Show XML Code</button>
    <!--Display friendly code: http://www.plus2net.com/html_tutorial/tags-page.php-->
    <div id="below_show">
        $xml=simplexml_load_file(&quot;natural_gas.xml&quot;) or die(&quot;Error: Cannot create object&quot;);<br />
        <br />
        foreach($xml-&gt;state as $state) {<br />
            echo &quot;State: &quot; . $state-&gt;title . &quot;&lt;br&gt;&quot;;<br />
            echo &quot;Diesel Price: &quot; . $state-&gt;d . &quot;&lt;br&gt;&quot;;<br />
            echo &quot;CNG Price: &quot; . $state-&gt;cng . &quot;&lt;br&gt;&quot;;<br />
            echo &quot;LNG Price: &quot; . $state-&gt;lng . &quot;&lt;br&gt;&lt;br&gt;&quot;;<br />
        }
    </div>

    <br />
    Gas Pricing by State:
   <br />
    <br />
    <?php
    $xml=simplexml_load_file("natural_gas.xml") or die("Error: Cannot create object");
        //echo $xml->states->state[1]->title; 
    foreach($xml->state as $state) {
        //echo "State: " . $state->id . "<br>";
        echo "State: " . $state->title . "<br>";
        echo "Diesel Price: " . $state->d . "<br>";
        echo "CNG Price: " . $state->cng . "<br>";
        echo "LNG Price: " . $state->lng . "<br><br>";
    }
    ?>
 
</body>
</html>
