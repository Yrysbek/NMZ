$( document ).ready(function() {
    var map = L.map('map').setView([42.8712, 74.5958], 13);
//    L.tileLayer('http://{s}.tile.cloudmade.com/eb18bb71b49f43c6a6dcef32211856ad/997/256/{z}/{x}/{y}.png', {
//        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://	//creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
//        maxZoom: 18
//    }).addTo(map);

L.tileLayer('http://{s}.tiles.mapbox.com/v3/rusbek.il6iklih/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 18
}).addTo(map);
    //var marker = L.marker([42.8712, 74.5958]).addTo(map);
    //marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();


    function onMapClick(e) {	
        clearAllMarkers();
        iterator_number=0;
        myPosition = e.latlng;
        addMyPosition(e.latlng);
        show_distance = true;
        addNearestPoints(e.latlng.lat, e.latlng.lng);
    }

    map.on('click', onMapClick);
    map.on('contextmenu', saveE);

    var myPosition;
    var markers = new L.FeatureGroup();
    var nearMarkers = new L.FeatureGroup();

    map.addLayer(nearMarkers);
    map.addLayer(markers);

    var nearestMarker;
    var iterator_number;

    function addMyPosition(latlng){
        marker = L.marker(latlng);
        marker.bindPopup("<b>My position</b>").openPopup();
        markers.addLayer(marker);
    }
	
    function addNearestPoints(lat, lng){
        fnLoadStart();
        var gender = $('input[name=gender]:checked').val();
        var count = $('input[name=count]:checked').val();
        var placeType = $('input[name=type]:checked').val();
        var ajaxCall = $.ajax({type: "GET",
            url: "model/getPoints.php",
            data: "gender="+gender+"&count="+count+"&lat="+lat+"&lng="+lng+"&type="+placeType
        });

        $.when(ajaxCall)
         .then(function(xml) { 
            addMarkersFromXML(xml);
            fnLoadStop();
        });
    }
    
    var greenIcon = L.icon({
        iconUrl: 'js/images/mosque.png',
        shadowUrl: 'js/images/marker-shadow.png',

        iconSize:     [40, 50], // size of the icon
        shadowSize:   [55, 40], // size of the shadow
        iconAnchor:   [20, 50], // point of the icon which will correspond to marker's location
        shadowAnchor: [14, 40],  // the same for the shadow
        popupAnchor:  [3, -48] // point from which the popup should open relative to the iconAnchor
    });
    
    function getMarkerIcon(type, gender){
        var icon_url = "js/images/";
        if(type == "mosque"){
            icon_url += "mosque";
        }
        else if(type == "proom"){
            icon_url += "proom";
        }
        
        icon_url += "_"+gender+".png";
        
        //alert(icon_url);
        
        return L.icon({
        iconUrl: icon_url,
        shadowUrl: 'js/images/marker-shadow.png',

        iconSize:     [40, 50], // size of the icon
        shadowSize:   [55, 40], // size of the shadow
        iconAnchor:   [20, 50], // point of the icon which will correspond to marker's location
        shadowAnchor: [14, 40],  // the same for the shadow
        popupAnchor:  [3, -48] // point from which the popup should open relative to the iconAnchor
    });
    }
    
    function addMarker(type, gender, name, address, description, latitude, longitude){
        var output_str = "<b>";
        if(type==="mosque")
                output_str+="Мечеть";
        else if(type==="proom")
                output_str+="Намазкана";
        var marker = L.marker([latitude, longitude], {icon: getMarkerIcon(type, gender)});
        output_str += " - " + name + "</b>";
        var gender_str="<br>Тип: ";
        if(gender==="joint")gender_str+="М/Ж";else if(gender==="male")gender_str+="М";else if(gender==="female")gender_str+="Ж";
        output_str += gender_str;
        if(address)output_str += "<br>Адрес: "+address;
        if(description)output_str += "<br>Примечание: "+description;
        if(show_distance){
            var distance = myPosition.distanceTo(marker.getLatLng()).toFixed(2);
            output_str += "<br>Расстояние: "+distance.toString()+" м";
        }

        nearMarkers.addLayer(marker);
        marker.bindPopup(output_str);
        if(iterator_number==0){
//            
//            dir = MQ.routing.directions();
//
//            dir.route({
//                locations: [
//                    { latLng: { lat: myPosition.lat, lng: myPosition.lng } },
//                    { latLng: { lat: latitude, lng: longitude } }
//                ],
//                options: { routeType: 'pedestrian' }
//            });
//
//            map.addLayer(MQ.routing.routeLayer({
//                directions: dir,
//                fitBounds: true
//            }));
            
            marker.openPopup();
        }
    }
    var show_distance = false;
    $("#btn_show_all").click(function(){
        fnLoadStart();
        clearAllMarkers();
        show_distance = false;
        var ajaxCall = $.ajax({type: "GET",
            url: "points/geopoints.xml",
            dataType: "xml"
        });

        $.when(ajaxCall).then(function(xml) { 
            addMarkersFromXML(xml); 
            fnLoadStop();
        });

    });
     
    $("#btn_filter").click(function() {
        fnLoadStart();
        clearAllMarkers();
        show_distance = false;
        var gender = $('input[name=gender]:checked').val();
        var placeType = $('input[name=type]:checked').val();
        var ajaxCall = $.ajax({type: "GET",
            url: "model/getPoints.php",
            data: "gender=" + gender + "&type=" + placeType
        });

        $.when(ajaxCall).then(function(xml) {
            addMarkersFromXML(xml);
            fnLoadStop();
        });

    });
    
    function fnLoadStart() {
        $('#ajax-load').css('display','block');
    }
    function fnLoadStop() {
        $('#ajax-load').css('display','none');
    }
     
    function clearAllMarkers(){
        markers.clearLayers();
        nearMarkers.clearLayers();
    }

    $("#btn_clear").click(function(){
        clearAllMarkers();
    });


    function addMarkersFromXML(xml){
	jQuery(xml).find('point').each(
            function()
            {
                var id = jQuery(this).attr('id'),
                    type = jQuery(this).find('type').text(),
                    gender = jQuery(this).find('gender').text(),
                    name = jQuery(this).find('name').text(),
                    address = jQuery(this).find('address').text(),
                    description = jQuery(this).find('description').text(),
                    latitude = jQuery(this).find('latitude').text(),
                    longitude = jQuery(this).find('longitude').text();
                    addMarker(type, gender, name, address, description, latitude, longitude);
                    iterator_number++;
            }
	);
    }

    var contextE;

    function saveE(e){
        contextE = e;    
    }
    
    $.contextMenu({
        // define which elements trigger this menu
        selector: ".context-menu-one",
        // define the elements of the menu
        items: {
            setPosition: {name: "Мое мeстоположение", icon:"marker-icon.png", callback: function(key, opt){ onMapClick(contextE); }},
            newPoint: {name: "New point", callback: function(){ $('.context-menu-list').contextMenu("hide"); openEdit(contextE); }},
        }
        // there's more, have a look at the demos and docs...
    });
    
    
    function openEdit(e){
            var title = 'Добавить новое место молитвы';
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;

            $(this).paulund_modal_box_edit({
                title: title,
                lat: lat,
                lng: lng
            });
    }
    
});
