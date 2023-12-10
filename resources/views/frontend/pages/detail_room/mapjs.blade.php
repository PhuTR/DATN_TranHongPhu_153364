
<script>
	
	goongjs.accessToken = 'JMPaJebR1mVjo8hKtGiPvOA5xOf8f4KFL30rePTw';
	<?php
	$arrmergeLatln = array();
  
	$arrlatlng = json_decode($room->map, true);
	if (is_array($arrlatlng) && count($arrlatlng) >= 2) {
		$arrmergeLatln[] = ["lat" => $arrlatlng[0], "lng" => $arrlatlng[1],"id" => $room->id, "title" => $room->name,'apartment_number' => $room->apartment_number, "address" => $room->full_address, "phone" => $room->user->phone, "slug" => $room->slug];
		$js_array = json_encode($arrmergeLatln);
		echo "var javascript_array = " . $js_array . ";\n";
	}
	
  
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
		map.addControl(new goongjs.FullscreenControl());
		map.addControl(new goongjs.NavigationControl());
		console.log(data);
		const content = `
		<div class="col-9" style="padding:0">
			<span style="color:black;font-size:14px; font-weight:600">${data.apartment_number}</span>
			<br>
			<span style="line-height:13px">
				${data.address}<br>
			</span>
			<span style="cursor:pointer;color:#007bff" onclick="openGoogleMapsDirections(${data.lat}, ${data.lng})">Xem bản đồ lớn hơn</span>
		</div>
		<div class="col-3 text-center d-flex " style="padding:0;">
			<a onclick="openGoogleMapsDirections(${data.lat}, ${data.lng})" style="margin:auto 0;color:#007bff;cursor:pointer">
				<i style="font-size:22px" class="fa-solid fa-map-location-dot"></i>
				<br>
				<span>Chỉ đường</span>
			</a>
		</div>
		`;

		const answer = document.getElementById('calculated-area');
		answer.innerHTML  = content;
		var marker = new goongjs.Marker()
		  .setLngLat(latlng)
		  .addTo(map);
	}
	function openGoogleMapsDirections(lat, lng) {
		var directionsURL = `https://www.google.com/maps/dir/?api=1&destination=${lat},${lng}`;
		window.open(directionsURL, '_blank');
	}
</script>
//   .setPopup(new goongjs.Popup({ offset: 2 })
		// 	.setHTML(content)
		//   )