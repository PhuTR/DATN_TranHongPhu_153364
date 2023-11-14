
<script>
	goongjs.accessToken = 'JMPaJebR1mVjo8hKtGiPvOA5xOf8f4KFL30rePTw';
	<?php
	$arrmergeLatln = array();
  
	$arrlatlng = json_decode($room->map, true);
  
	$arrmergeLatln[] = ["lat" => $arrlatlng[0], "lng" => $arrlatlng[1],"id" => $room->id, "title" => $room->name, "address" => $room->full_address, "phone" => $room->user->phone, "slug" => $room->slug];
	$js_array = json_encode($arrmergeLatln);
	echo "var javascript_array = " . $js_array . ";\n";
  
	?>
	
	for(i in javascript_array) {
		data = javascript_array[i];
		var latlng = new goongjs.LngLat(data.lng, data.lat);
		var map = new goongjs.Map({
		   container: 'map',
		   style: 'https://tiles.goong.io/assets/goong_map_web.json', 
		   center: [data.lng,data.lat],
		   zoom: 15,
		   
	    });
		var marker = new goongjs.Marker()
		  .setLngLat(latlng)
		  .setPopup(new goongjs.Popup({ offset: 2 })
			.setHTML(
			  `<a href="${data.slug}-${data.id}.html"><div class="iw-title">${data.title}</div></a>` +
			  `<p style="line-height:13px"><i class="fas fa-map-marker" style="color:#003352"></i> ${data.address}<br>` +
			  `<br>Số điện thoại. ${data.phone}</p>` +
			  `<p style="cursor:pointer" onclick="openGoogleMapsDirections(${data.lat}, ${data.lng})">Xem bản đồ lớn hơn</p>`
			)
		  )
		  .addTo(map);
	}
	function openGoogleMapsDirections(lat, lng) {
		var directionsURL = `https://www.google.com/maps/dir/?api=1&destination=${lat},${lng}`;
		window.open(directionsURL, '_blank');
	}
</script>