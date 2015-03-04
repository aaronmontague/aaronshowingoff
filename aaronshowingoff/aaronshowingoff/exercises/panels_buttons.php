<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script> 
$(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideToggle("slow");
    });
    $("#slideUp").click(function(){
        $("#panel").slideUp(1000);
    });
    $("#below").click(function(){
        $("#below").hide();
    });
    $("#below_show").click(function(){
        $("#below").show();
    });
    $("#hello_gone").click(function(){
        $("#below_show").toggle();
    });
});
</script>

<style> 
#panel, #flip {
padding: 5px;
text-align: center;
background-color: #e5eecc;
border: solid 1px #c3c3c3;
width: 490px;
}

#panel {
padding: 50px;
display: none;
width: 400px;
}
</style>
</head>
<body>

<button id="hello_gone">Toggle --></button>
<button id="below_show">Bring back "Click Me!"</button>
 
<div id="flip">Click to slide the panel down or up</div>
<div id="panel">Hello world!
<p id="slideUp">Slide this panel up</p>
</div>
<p id="below">Click Me!</p>

</body>
</html>
