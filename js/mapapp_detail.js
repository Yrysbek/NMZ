$( document ).ready(function() {
    //*
    var latitude = $('.container').attr('data-lat');
    var longitude = $('.container').attr('data-lng');
    var type = $('.container').attr('data-type');
    var gender = $('.container').attr('data-gender');
    var status = $('.container').attr('data-status');
    
    var map = L.map('map', 
                {
                    scrollWheelZoom: false, 
                    touchZoom: false, 
                    doubleClickZoom: false, 
                    boxZoom: false, 
                    minZoom: 15, 
                    bounceAtZoomLimits: false
                }
            )
            .setView([latitude, longitude], 17);

L.tileLayer('http://{s}.tiles.mapbox.com/v3/rusbek.il6iklih/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    scrollWheelZoom: false
}).addTo(map);
        
    var marker = L.marker([latitude, longitude], {icon: getMarkerIcon(type, gender, status)}).addTo(map);
    //marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();
    
    
    function getMarkerIcon(type, gender, status){
        var icon_url = "";
        if(type == "mosque"){
            icon_url += "mosque";
        }
        else{// if(type == "proom"){
            icon_url += "proom";
        }
        
        if(status == "unconfirmed"){
            icon_url = "unconfirmed_" + icon_url;
        }
        
        if(gender != "undefined"){
            icon_url += "_"+gender;
        }
        icon_url = "js/images/" + icon_url + ".png";
        
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

});
