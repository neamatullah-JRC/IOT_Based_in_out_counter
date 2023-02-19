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
    xhttp.open("GET", "refresh.php", true);
    xhttp.send();
}

// Call the refreshContent function every 5 seconds
setInterval(refreshContent, 5000);
</script>

    </head>
    <div id="content">This is the content to be refreshed</div>

</html>