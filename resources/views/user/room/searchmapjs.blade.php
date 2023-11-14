<script>
  goongjs.accessToken = 'wnicbAmnNkoMHNYUKWnlFHezV189FjmMwkNJ7hKW';
  let map = null;
  let marker = null;
  let coords = null;

  const getCoordsFromAddress = async (address) => {
      const response = await fetch(`https://rsapi.goong.io/geocode?address=${encodeURIComponent(address)}&api_key=HEjWj0QRZ5nooIKr1YaSEYG7utwBJWUD5ClRtEHP`);
      const data = await response.json();
      return { lat: data.results[0].geometry.location.lat, lng: data.results[0].geometry.location.lng };
  };
  
  const initializeMap = async (address) => {
      if (!map) {
          map = new goongjs.Map({
              container: 'map',
              style: 'https://tiles.goong.io/assets/goong_map_web.json',
              center: [105.84478, 21.02897],
              zoom: 13
          });
          map.addControl(new goongjs.FullscreenControl());
          map.addControl(new goongjs.NavigationControl());
      }

      if (marker) {
          marker.remove();
      }

      if (address) {
          try {
              coords = await getCoordsFromAddress(address);
              map.flyTo({ center: [coords.lng, coords.lat], essential: true });
              marker = new goongjs.Marker().setLngLat([coords.lng, coords.lat]).addTo(map);
              document.getElementById('txtlat').value = coords.lat;
              document.getElementById('txtlng').value = coords.lng;
          } catch (error) {
              console.error('Error fetching geocoding data:', error);
          }
      } else {
          navigator.geolocation.getCurrentPosition(({ coords: { latitude, longitude } }) => {
              map.setCenter([longitude, latitude]);
              coords = { lat: latitude, lng: longitude };
              document.getElementById('txtlat').value = coords.lat;
              document.getElementById('txtlng').value = coords.lng;
              marker = new goongjs.Marker().setLngLat([coords.lng, coords.lat]).addTo(map);
          });
      }
  };
  // const ad = 'Thành phố Hà Nội'
  // console.log($ )
  initializeMap();
</script>