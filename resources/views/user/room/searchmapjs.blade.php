

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzlVX517mZWArHv4Dt3_JVG0aPmbSE5mE&callback=initialize&libraries=geometry,places" async defer></script>
<script>
  var map;
  var marker;
  function initialize() {
    goongjs.accessToken = 'JMPaJebR1mVjo8hKtGiPvOA5xOf8f4KFL30rePTw';
    var mapOptions = {
        container: 'map', // Đổi từ 'document.getElementById('map')' sang 'container: 'map''
        style: 'https://tiles.goong.io/assets/goong_map_web.json', // Đổi lại kiểu bản đồ tùy thuộc vào nhu cầu của bạn
        center: [108.214388, 16.070372], // Đảo ngược tọa độ Lat và Lng
        zoom: 12,
    };

    map = new goongjs.Map(mapOptions);

    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function (position) {
        var pos = [position.coords.latitude, position.coords.longitude];
        var geocoder = new GoongGeocoder({
          accessToken: 'HEjWj0QRZ5nooIKr1YaSEYG7utwBJWUD5ClRtEHP',
        });

        geocoder
          .reverseQuery({ latitude: pos[0], longitude: pos[1] })
          .send()
          .then(function (response) {
            if (response.status === 'ok') {
              console.log(response.features[0].place_name);
            } else {
              console.log('No results found');
            }
          })
          .catch(function (error) {
            console.log('Geocoder failed due to: ' + error);
          });

        map.setCenter(pos);

        marker = new goong.Marker({ draggable: true })
          .setLngLat(pos)
          .addTo(map);
      }, function () {
        handleNoGeolocation(true);
      });
    } else {
      // Browser doesn't support Geolocation
      handleNoGeolocation(false);
    }

//   function handleNoGeolocation(errorFlag) {
//     if (errorFlag) {
//       var content = 'Error: The Geolocation service failed.';
//     } else {
//       var content = 'Error: Your browser doesn\'t support geolocation.';
//     }

//     var options = {
//       map: map,
//       zoom: 19,
//       position: new google.maps.LatLng(16.070372,108.214388),
//       content: content
//     };

//     map.setCenter(options.position);
//     marker = new google.maps.Marker({
//       position: options.position,
//       map: map,
//       zoom: 19,
//       icon: "./images/gps.png",
//       draggable: true
//     });
//     /* Dragend Marker */ 
//     google.maps.event.addListener(marker, 'dragend', function() {
//       var geocoder = new google.maps.Geocoder();
//       geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
//         if (status == google.maps.GeocoderStatus.OK) {
//           if (results[0]) {
//             $('#location-text-box').val(results[0].formatted_address);
//             $('#txtaddress').val(results[0].formatted_address);
//             $('#txtlat').val(marker.getPosition().lat());
//             $('#txtlng').val(marker.getPosition().lng());
//             infowindow.setContent(results[0].formatted_address);
//             infowindow.open(map, marker);
//           }
//         }
//       });
//     });
//     /* End Dragend */

//   }

//   // get places auto-complete when user type in location-text-box
//   var input = /** @type {HTMLInputElement} */
//   (
//     document.getElementById('location-text-box'));


//   var autocomplete = new google.maps.places.Autocomplete(input);
//   autocomplete.bindTo('bounds', map);

//   var infowindow = new google.maps.InfoWindow();
//   marker = new google.maps.Marker({
//     map: map,
//     icon: "images/gps.png",
//     anchorPoint: new google.maps.Point(0, -29),
//     draggable: true
//   });

//   google.maps.event.addListener(autocomplete, 'place_changed', function() {
//     infowindow.close();
//     marker.setVisible(false);
//     var place = autocomplete.getPlace();
//     if (!place.geometry) {
//       return;
//     }
//     var geocoder = new google.maps.Geocoder();
//     geocoder.geocode({'latLng': place.geometry.location}, function(results, status) {
//       if (status == google.maps.GeocoderStatus.OK) {
//         if (results[0]) {
//           $('#txtaddress').val(results[0].formatted_address);
//           infowindow.setContent(results[0].formatted_address);
//           infowindow.open(map, marker);
//         }
//       }
//     });
//     // If the place has a geometry, then present it on a map.
//     if (place.geometry.viewport) {
//       map.fitBounds(place.geometry.viewport);
//     } else {
//       map.setCenter(place.geometry.location);
//       map.setZoom(17); // Why 17? Because it looks good.
//     }
//     marker.setIcon( /** @type {google.maps.Icon} */ ({
//       url: "images/gps.png"
//     }));
//     document.getElementById('txtlat').value = place.geometry.location.lat();
//     document.getElementById('txtlng').value = place.geometry.location.lng();
//     console.log(place.geometry.location.lat());
//     marker.setPosition(place.geometry.location);
//     marker.setVisible(true);

//     var address = '';
//     if (place.address_components) {
//       address = [
//       (place.address_components[0] && place.address_components[0].short_name || ''), (place.address_components[1] && place.address_components[1].short_name || ''), (place.address_components[2] && place.address_components[2].short_name || '')
//       ].join(' ');
//     }
//     /* Dragend Marker */ 
//     google.maps.event.addListener(marker, 'dragend', function() {
//       var geocoder = new google.maps.Geocoder();
//       geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
//         if (status == google.maps.GeocoderStatus.OK) {
//           if (results[0]) {
//             $('#location-text-box').val(results[0].formatted_address);
//             $('#txtlat').val(marker.getPosition().lat());
//             $('#txtlng').val(marker.getPosition().lng());
//             infowindow.setContent(results[0].formatted_address);
//             infowindow.open(map, marker);
//           }
//         }
//       });
//     });
//     /* End Dragend */
//   });

}


// google.maps.event.addDomListener(window, 'load', initialize);
</script>