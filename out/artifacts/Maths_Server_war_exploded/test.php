<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Galway SpeedLimit Database</title>
    <link rel="stylesheet" type="text/css" href="green.php">

</head>
<body>

<?php
echo "<h1>SpeedLimit Network</h1>";
echo "<h2>Choose a county to view the current speedlimts</h2>";
?>
<form>
    <select name="users" onchange="showUser(this.value)">
        <option value="0">Select County:</option>
        <option value="dublin">Dublin</option>
        <option value="galway">Galway</option>
        <option value="mayo">Mayo</option>
        </option>
    </select>
</form>
<!--<div id="txtHint"></div>-->
<?php
echo"<div id=\"txtHint\"></div>";
echo"<table style=\"width:100%\">";
echo"<tr>";
echo"<td>";echo"<h2>Roadmap</h2>";echo"</td>";
echo"<td style=\"padding-left:3%\">";echo"<h2>Twitter Feed</h2>";echo"</td>";
echo"</tr>";
echo"<tr >";
echo"<td style=\"width:auto\">";echo"<div id=\"googleMap\" style=\"width:1300px;height:600px;\" ></div>";echo"</td>";
echo"<td style=\"width:100%;align:right:auto;padding-left: 3%\">";echo"<div><a class=\"twitter-timeline\" href=\"https://google.ie\" data-widget-id=\"721345192159244288\">
    Tweets by @FYP_G00244090_
     </a></div>";echo"</td>";
echo"</tr>";
echo"</table>";
?>
<script>

   function showUser(str) {
        // document.write("in the function");
        if (str == "") {
            document.getElementById("txtHint").innerHTML = " ";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                //  document.write("in the function");
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange   = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                }
            };
            xmlhttp.open("GET","getusers.php?q="+str,true);
            // document.write("in the function");
            xmlhttp.send();
        }
    }
</script>

<!--<div id="googleMap" style="width:1000px;height:600px;display=inline-block;" ></div>-->

<!--<div>-->
<!--<a class="twitter-timeline"-->
<!--   href="https://google.ie"-->
<!--   data-widget-id="721345192159244288"-->
<!--    >-->
<!--    Tweets by @FYP_G00244090_-->
<!--</a>-->
<script>
    !function(d,s,id){
        var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
        if(!d.getElementById(id)){
            js=d.createElement(s);
            js.id=id;js.src=p+"://platform.twitter.com/widgets.js";
            fjs.parentNode.insertBefore(js,fjs);}
    }
    (document,"script","twitter-wjs");
</script>
<!--</div>-->

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBONjPGuM3A4KkZztpgpUApwKXkt_HoMIo"></script>
<script>
    function initialize() {
        var mapProp = {
            center:new google.maps.LatLng(53.2734,-7.7783),
            zoom: 7,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

</body>
</html>
