/**
 * JQuery Plugin for a modal box
 * Will create a simple modal box with all HTML and styling
 * 
 * Author: Paul Underwood
 * URL: http://www.paulund.co.uk
 * 
 * Available for free download from http://www.paulund.co.uk
 */

(function($){

	// Defining our jQuery plugin

	$.fn.paulund_modal_box_add = function(prop){

		// Default parameters

		var options = $.extend({
			height : "550",
			width : "800",
			title:"JQuery Modal Box Demo",
                        address:'',
			description: '',
			top: "15%",
			left: "25%",
                        lat: '42.8712',
                        lng: '74.5958',
                        zoom: '15',
                        type: '',
                        gender: '',
                        name: ''
		},prop);
                
                add_block_page();
                add_popup_box();
                add_styles();

                $('.paulund_modal_box').fadeIn();

                var map = L.map('map-add').setView([options.lat, options.lng], options.zoom);
                L.tileLayer('http://{s}.tiles.mapbox.com/v3/rusbek.il6iklih/{z}/{x}/{y}.png', {
                    maxZoom: 18
                }).addTo(map);
                var marker = L.marker([options.lat, options.lng],{ draggable: true}).addTo(map);
		marker.bindPopup(getPopupText());
                
                function getPopupText(){
                    var popupText = '';
                    popupText += '<b>' + $('#element_1').val() + '</b>';
                    if($('#element_2').val() !== ''){
                        popupText += '<br>'+$('#element_2').val();                        
                    }
                    if ($('#element_3').val() !== '') {
                        popupText += '<br>'+$('#element_3').val();
                    }
                    return popupText;
                }
                /*
                 * get marker
                 * @param {type} type
                 * @param {type} gender
                 * @returns {unresolved}
                 */
                function getMarkerIcon(type, gender) {
                    var icon_url = '';
                    
                    if(type != '' && gender != '' && type != 'undefined' && gender != 'undefined'){
                        icon_url = "js/images/";
                        if (type == "mosque") {
                            icon_url += "mosque";
                        } else if (type == "proom") {
                            icon_url += "proom";
                        }

                        icon_url += "_" + gender + ".png";
                    } else {
                        icon_url = 'js/images/undefined.png';
                    }
                    
                    return L.icon({
                        iconUrl: icon_url,
                        shadowUrl: 'js/images/marker-shadow.png',
                        iconSize: [40, 50], // size of the icon
                        shadowSize: [55, 40], // size of the shadow
                        iconAnchor: [20, 50], // point of the icon which will correspond to marker's location
                        shadowAnchor: [14, 40], // the same for the shadow
                        popupAnchor: [3, -48] // point from which the popup should open relative to the iconAnchor
                    });
                }
		/**
		 * Add styles to the html markup
		 */
		 function add_styles(){			
			$('.paulund_modal_box').css({ 
				'position':'fixed', 
				'left':options.left,
				'top':options.top,
				'display':'none',
				'height': options.height + 'px',
				'width': options.width + 'px',
				'border':'1px solid #fff',
                                'float':'top',
				'box-shadow': '0px 2px 7px #292929',
				'-moz-box-shadow': '0px 2px 7px #292929',
				'-webkit-box-shadow': '0px 2px 7px #292929',
				'border-radius':'10px',
				'-moz-border-radius':'10px',
				'-webkit-border-radius':'10px',
				'background': '#f2f2f2', 
				'z-index':'50',
			});
			$('.paulund_modal_close').css({
				'position':'relative',
				'top':'-25px',
				'left':'20px',
				'float':'right',
				'display':'block',
				'height':'50px',
				'width':'50px',
				'background': 'url(js/images/close.png) no-repeat',
			});
			$('.paulund_block_page').css({
				'position':'fixed',
				'top':'0',
				'left':'0',
				'background-color':'rgba(0,0,0,0.6)',
				'height':'100%',
				'width':'100%',
				'z-index':'10'
			});
			$('.paulund_inner_modal_box').css({
				'background-color':'#fff',
				'height':(options.height - 50) + 'px',
				'width':(options.width - 50) + 'px',
				'padding':'10px',
				'margin':'15px',
				'border-radius':'10px',
				'-moz-border-radius':'10px',
				'-webkit-border-radius':'10px'
			});
                        $('.map').css({
                            'width': '90%',
                            'height': '220px',
                            'border': '1px solid rgb(204, 204, 204)',
                            'bottom': '25px',
                            'position': 'absolute'
                        });
                        $('#map').css({
                            'width': '100%',
                            'height': '100%'
                        });
		}
		
		 /**
		  * Create the block page div
		  */
		 function add_block_page(){
			var block_page = $('<div class="paulund_block_page"></div>');
						
			$(block_page).appendTo('body');
		}
		 	
		 /**
		  * Creates the modal box
		  */
		 function add_popup_box(){
                     $(location).attr('href');
			 var pop_up = $('<div class="paulund_modal_box"><a class="paulund_modal_close"></a><div class="paulund_inner_modal_box"><h2>' + options.title + '</h2>'
                                +'<form id="form_909760" class="appnitro" method="get" action="model/setPoint.php">'
                                 +'<div style="float:left; width: 35%; padding: 0 1%;"><label>Название: </label><div><input class="add-element text" id = "element_1" name = "name" type = "text" maxlength = "255" value = ""></div><br>' 
                                + '<label>Адрес: </label><div><input class="add-element text" id = "element_2" name = "address" type = "text" maxlength = "255" value = ""></div><br>' 
                                + '<label>Примечание: </label><div><input class="add-element text" id = "element_3" name = "description" type = "text" maxlength = "255" value = ""></div><br>' 
                                + '<label class = "description"> Тип: </label><br>'
                                +'<input id = "" name = "type" class = "add-element radio" type = "radio" value = "undefined" checked> <label class = "choice" for = "element_4_1"> Неизвестно </label><br>'
                                +'<input id = "" name = "type" class = "add-element radio" type = "radio" value = "mosque"> <label class = "choice" for = "element_4_2"> Мечеть </label><br>'
                                +'<input id = "" name = "type" class = "add-element radio" type = "radio" value = "proom"> <label class = "choice" for = "element_4_3"> Намазкана </label><br><br> ' 
                                + '<label class = "description" for = "element_4"> Гендер: </label><br>'
                                + '<input id = "" name = "gender" class = "add-element radio" type = "radio" value = "undefined" checked> <label class = "choice" for = "element_4_1"> Неизвестно </label><br>'
                                + '<input id = "" name = "gender" class = "add-element radio" type = "radio" value = "male"> <label class = "choice" for = "element_4_2"> Мужской </label><br>'
                                + '<input id = "" name = "gender" class = "add-element radio" type = "radio" value = "female"> <label class = "choice" for = "element_4_3"> Женский </label><br>' 
                                + '<input id = "" name = "gender" class = "add-element radio" type = "radio" value = "joint"> <label class = "choice" for = "element_4_3"> Мужской/Женский </label><br><br>' 
                                + '<input type="hidden" name="lat" value="'+options.lat+'">'
                                + '<input type="hidden" name="lng" value="'+options.lng+'">'
                                + '<input type="hidden" name="operation" value="add">'
                                + '<input type="hidden" name="status" value="unconfirmed">'
                                +'<input type="submit" value="Сохранить"><input type="button" value="Отмена" id="close"></div>'
                                +'<div class="map-add"><div id="map-add"></div></div></div></div></form>');
			 $(pop_up).appendTo('.paulund_block_page');
			 			 
			 $('.paulund_modal_close').click(hideModal);
                         $('#close').click(hideModal);
                         
                         function hideModal(){
                            $(this).parent().fadeOut().remove();
                            $('.paulund_block_page').fadeOut().remove();	
                         }
		}

                $('input.add-element.radio').click(function() {
                    var type = $("input[name='type'].add-element:checked").val();
                    var gender = $("input[name='gender'].add-element:checked").val();
                    //var status = $("input[name='status']:checked").val();
                    marker.setIcon(getMarkerIcon(type, gender));
                });
                
                $('input.add-element.text').focusout(function(){
                        marker.bindPopup(getPopupText());
                        marker.openPopup();
                });
                
                marker.on('dragend',function(){
                    $('input[name="lat-add"]').val(marker.getLatLng().lat);
                    $('input[name="lng-add"]').val(marker.getLatLng().lng);
                });
                
		return this;
	};
	
})(jQuery);
