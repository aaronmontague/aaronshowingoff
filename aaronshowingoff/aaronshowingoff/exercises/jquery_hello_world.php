<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script> 
$(document).ready(function(){
$("button").click(function(){
var div = $("div"); 
div.animate({left: '100px'}, "slow");
div.animate({fontSize: '5em'}, "fast");
});
});
</script> 
</head>
<body>

<button>Start Animation</button>

<div style="background:#98bf21;height:80px;width:262px;position:absolute;">HELLO</div>

</body>
</html>
