<html>
<script>

    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "note.xml", false);
    xmlhttp.send();
    xmlDoc = xmlhttp.responseXML;

    document.getElementById("to").innerHTML =
    xmlDoc.getElementsByTagName("to")[0].childNodes[0].nodeValue;
    document.getElementById("from").innerHTML =
    xmlDoc.getElementsByTagName("from")[0].childNodes[0].nodeValue;
    document.getElementById("message").innerHTML =
    xmlDoc.getElementsByTagName("body")[0].childNodes[0].nodeValue;
</script>
<body>
    <h1>W3Schools Internal Note</h1>
    <div>
        <b>To:</b> <span id="to"></span>
        <br />
        <b>From:</b> <span id="from"></span>
        <br />
        <b>Message:</b> <span id="message"></span>
    </div>



</body>
</html>
