<html>
    <head>
        <script>
function refreshContent() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("content").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "main.php", true);
    xhttp.send();
}


// Call the refreshContent function every 5 seconds
setInterval(refreshContent, 1000);
</script>

    </head>
    <body>
        <div id="content"></div>
    </body>
</html>