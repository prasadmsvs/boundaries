/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var map;
var loc = function(){ 
    initialize = function(position){ 
        var obj=this;
        var mapProp = {
            center:new google.maps.LatLng(position.coords.latitude,position.coords.longitude),
            zoom:10
        };

        map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

        google.maps.event.addListener(map, 'click', function(event) {
            obj.placeMarker(event.latLng);
        });
    }
    placeMarker = function (location) {
      var obj=this;
      var marker = new google.maps.Marker({
        position: location,
        map: map,
      });
      $("#property-lat").val(location.lat());
      $("#property-lon").val(location.lng());
      var infowindow = new google.maps.InfoWindow({
        content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
      });
      infowindow.open(map,marker);
    }
    getLocation = function () {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(initialize);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }
    return{
        getLocation:getLocation
    }
}();

google.maps.event.addDomListener(window, 'load', loc.getLocation);

