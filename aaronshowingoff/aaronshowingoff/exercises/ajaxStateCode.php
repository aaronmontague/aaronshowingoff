<!DOCTYPE html>
<html>
<head>
<script>
var xmlhttp;
function yorg(url,dorien)
{
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=dorien;
    xmlhttp.open("GET",url,true);
    xmlhttp.send();
}
function myFunction()
{
    yorg("ajax_info.txt",function()
        {
            document.getElementById("readyState").innerHTML += xmlhttp.readyState + " ";
            document.getElementById("statusState").innerHTML += xmlhttp.status + " ";
            if (xmlhttp.readyState==3 && xmlhttp.status==200)
            {
                document.getElementById("spork").innerHTML +=" hi " + xmlhttp.readyState;
            }
            else if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
            }
        });
}
</script>
</head>
<body>

<div id="myDiv"><h2>Let AJAX change this text</h2></div>
<div id="spork"><h2>Craziness</h2></div>
<div id="readyState">Ready States: </div>
<div id="statusState">Status: </div>
<button type="button" onclick="myFunction()">Change Content</button>

</body>
</html>
