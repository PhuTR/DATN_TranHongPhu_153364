{{-- <script>
 		goongjs.accessToken = 'D7p1YcBWF9EdYPwn8JrmNYtkAJxdeDGdGj6Uue3Q';
            var map = new goongjs.Map({
                container: 'map',
                style: 'https://tiles.goong.io/assets/goong_map_web.json', 
                center: {lat: 16.067011, lng: 108.214388},
                zoom: 15 // starting zoom
            });
            var marker = new goongjs.Marker()
                .setLngLat({lat: 16.067011, lng: 108.214388})
                .addTo(map);
				marker.getElement().addEventListener('click', function() {
					console.log('Hello');
				});
		
	

</script> --}}
{{-- <script>
	
	var map;
	function initMap() {
		goongjs.accessToken = 'D7p1YcBWF9EdYPwn8JrmNYtkAJxdeDGdGj6Uue3Q';
		map = new goongjs.Map({
            container: 'map',
            style: 'https://tiles.goong.io/assets/goong_map_web.json', // stylesheet location
            center: { lat: 16.067011, lng: 108.214388 }, // starting position [lng, lat]
            zoom: 15 // starting zoom
        });
		/* Get latlng vị trí phòng trọ */
		<?php
		$arrmergeLatln = array();

		$arrlatlng = json_decode($room->map,true);

		$arrmergeLatln[] = ["lat"=> $arrlatlng[0],"lng"=> $arrlatlng[1],"title"=>$room->title,"address"=> $room->address,"phone"=> $room->phone,"slug"=>$room->slug];
		$js_array = json_encode($arrmergeLatln);
		echo "var javascript_array = ". $js_array . ";\n";

		?>
		/* ---------------  */
		
		for (i in javascript_array){
			var data = javascript_array[i];
			var latlng =  new goongjs.LngLat(data.lng,data.lat);
			var phongtro = new goongjs.Marker().setLngLat(latlng).addTo(map);
			
			// phongtro.getElement().addEventListener('click', function() {
			// 		console.log('Hello');
			// 	});



			var infowindow = new goongjs.Popup();
			(function(phongtro, data) {
				var content = '<div id="iw-container">' +
					'<a href="phongtro/' + data.slug + '"><div class="iw-title">' + data.title + '</div></a>' +
					'<p><i class="fas fa-map-marker" style="color:#003352"></i> ' + data.address + '<br>' +
					'<br>Phone. ' + data.phone + '</div>';
				infowindow.setHTML(content);
				infowindow.addTo(map); // Thêm Popup vào map
				phongtro.getElement().addEventListener('click', function (e) {
					// console.log('hello');
					infowindow.setLngLat(latlng).addTo(map); // Hiển thị Popup khi nhấp vào Marker
				});
			})(phongtro, data);

		}
		// google.maps.event.addListener(map, 'mousemove', function (e) {
		// 	document.getElementById("flat").innerHTML = e.latLng.lat().toFixed(6);
		// 	document.getElementById("lng").innerHTML = e.latLng.lng().toFixed(6);

		// });


	}
	initMap();
</script> --}}

<script>

	var map;
	function initMap() {
		map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: 16.067011, lng: 108.214388},
			zoom: 15,
			draggable: true
		});
		/* Get latlng vị trí phòng trọ */
		<?php
		$arrmergeLatln = array();

		$arrlatlng = json_decode($room->map,true);

		$arrmergeLatln[] = ["lat"=> $arrlatlng[0],"lng"=> $arrlatlng[1],"title"=>$room->name,"address"=> $room->full_address,"phone"=> $room->user->phone,"slug"=>$room->slug];
		$js_array = json_encode($arrmergeLatln);
		echo "var javascript_array = ". $js_array . ";\n";

		?>
		/* ---------------  */
	
		for (i in javascript_array){
			var data = javascript_array[i];
			var latlng =  new google.maps.LatLng(data.lat,data.lng);
			var phongtro = new google.maps.Marker({
				position:  latlng,
				map: map,
				title: data.title,
				icon: "images/gps.png",
				content: 'dgfdgfdg'
			});
			var infowindow = new google.maps.InfoWindow();
			(function(phongtro, data){
				var content = '<div id="iw-container">' +
				'<a href="'+data.slug+'"><div class="iw-title">' + data.title +'</div></a>' +
				'<p><i class="fas fa-map-marker" style="color:#003352"></i> '+ data.address +'<br>'+
				'<br>Phone. ' +data.phone +'</div>';
				infowindow.setContent(content);
				infowindow.open(map, phongtro);
				google.maps.event.addListener(phongtro, "click", function(e){

					infowindow.setContent(content);
					infowindow.open(map, phongtro);
            
              });
			})(phongtro,data);

		}
		// google.maps.event.addListener(map, 'mousemove', function (e) {
		// 	document.getElementById("flat").innerHTML = e.latLng.lat().toFixed(6);
		// 	document.getElementById("lng").innerHTML = e.latLng.lng().toFixed(6);

		// });


	}

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA66KwUrjxcFG5u0exynlJ45CrbrNe3hEc&callback=initMap"
async defer></script>


