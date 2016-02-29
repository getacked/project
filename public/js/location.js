
function getAddresses(){
 var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 51.8962, lng: -8.7200},
    zoom: 12
  });

  var service = new google.maps.places.PlacesService(map);

//get placeIds of suggested events
  var placeIds = {!! $suggestedEvents->lists('gmaps_id')->toJSON() !!};

  for( i = 0; i < placeIds.length; i++ ){
    fillAddressDetails(service, placeIds[i]);
  }

  function fillAddressDetails(service, id){
    service.getDetails({
       placeId: id
     }, function(place, status) {
       if (status === google.maps.places.PlacesServiceStatus.OK) {
          $("#".concat(id)).html('<b>' + place.name + '</b><br><i>' + place.formatted_address + '</i>');
       }
     });
  }    
}
