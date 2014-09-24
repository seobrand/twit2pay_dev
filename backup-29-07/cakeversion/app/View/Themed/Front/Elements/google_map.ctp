<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyCTG8LCDSpX7yOYGj_uv3MUCO8_Xg0XAX8" type="text/javascript"></script>
<script type="text/javascript">
 //<![CDATA[
 var map = null;
 var geocoder = null;
 function load() {
 if (GBrowserIsCompatible()) {
 map = new GMap2(document.getElementById("map"));
 map.addControl(new GSmallMapControl());
 geocoder = new GClientGeocoder();

// Here enter your url of ashx/php file
GDownloadUrl("http://www.seobranddev.com/mahima_live/xml.php", function(data) {
var xml = GXml.parse(data);
var markers = xml.documentElement.getElementsByTagName("marker");
for (var i = 0; i < markers.length; i++) {
 var name = markers[i].getAttribute("name");
 var address = markers[i].getAttribute("address");
 showAddress(address,name);
}
});

}
}

function showAddress(address, name) {
if (geocoder) {
geocoder.getLatLng(
name+","+address,
function(point) {
if (!point) {
// alert(address + " not found");
} else {
map.setCenter(point, 8);
var marker = createMarker(point, name, address);
map.addOverlay(marker);
}
});

}

}

function createMarker(point, name, address) {
var marker = new GMarker(point);
var html = "<b>" + name + "</b> <br/>" + address;
GEvent.addListener(marker, 'click', function() {
marker.openInfoWindowHtml(html);
});

return marker;
}

//]]>
</script>
   <div>
<div id="map" style="width: 1052px; height: 258px"></div>
</div>