function initMap() {
  if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
          var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
          };

          var map = new google.maps.Map(document.getElementById('map'), {
              center: pos,
              zoom: 15
          });

          var request = {
              location: pos,
              radius: '3000',
              types: ['store', 'electronics_recycling'],
              keyword: ['electronics', 'recycle']
          };

          var service = new google.maps.places.PlacesService(map);
          service.nearbySearch(request, callback);
      });
  }
}

function callback(results, status) {
    if (status == google.maps.places.PlacesServiceStatus.OK) {
      console.log(results);
      var locationContainer = document.getElementById('location-container');
  
      for (var i = 0; i < results.length; i++) {
          var place = results[i];
  
          var div = document.createElement('div');
          div.classList.add('location');
          div.innerHTML = `
              <h2>${place.name}</h2>
              <p>${place.vicinity}</p>
              <p>${place.rating} stars</p>
          `;
          // Create a 'Choose' button
          var button = document.createElement('button');
          button.innerHTML = 'Choose';
          button.classList.add('choose-button');
          // Add an event listener to the button here if needed
          button.addEventListener('click', function() {
            // Data to send to the server
            var data = {
                userID: userID,  // Now using the actual user ID
                storeName: place.name,
                storeAddress: place.vicinity
            };
        
            // Send the data to the server using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'save_location.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.send(JSON.stringify(data));

            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 400) {
                    // The request has been completed successfully
                    alert("You have chosen " + data.storeName + " on " + new Date().toLocaleDateString());
                    window.location.href = 'dashboard.php';
                } else {
                    // There was an error with the request
                    alert("There was an error. Please try again.");
                }
            };
            
        });
        
  
          // Append the button to the div
          div.appendChild(button);
  
          locationContainer.appendChild(div);
      }
    }
  }
  

initMap();
