$(document).ready(function() {

    $('.li-content').click(function(e) {
        var lat = $(this).find('a').attr('data-lat');
        var lng = $(this).find('a').attr('data-lng');
        var type = $(this).find('a').attr('data-type');
        var gender = $(this).find('a').attr('data-gender');
        var name = $(this).find('a').attr('data-name');
        var desc = $(this).find('a').attr('data-desc');
        var addr = $(this).find('a').attr('data-addr');
        var status = $(this).find('a').attr('data-status');
        var title = $(this).find('a').text();

        $(this).paulund_modal_box({
            title: title,
            name: name,
            lat: lat,
            lng: lng,
            type: type,
            gender: gender,
            description: desc,
            address: addr,
            status: status
        });
    });

    $('#search').keyup(function(key) {
        var search = $('#search').val();
        $('li').each(function() {
            $(this).hide();
            var placeName = $(this).find('a.place-name').text();
            var regex = new RegExp(search, "i");
            var res = placeName.match(regex);
            if (res) {
                $(this).find('a.place-name').html($(this).find('a.place-name').text().replace(regex, "<span class='search-text'>" + res[0] + "</span>"));
                $(this).show();
            }
        });
    });

    $('a.edit-place').click(function(e) {
        var place = $(this).parent().parent().find('a.place-name');
        var id = place.attr('data-id');
        var lat = place.attr('data-lat');
        var lng = place.attr('data-lng');
        var type = place.attr('data-type');
        var gender = place.attr('data-gender');
        var name = place.attr('data-name');
        var desc = place.attr('data-desc');
        var addr = place.attr('data-addr');
        var status = place.attr('data-status');
        var title = place.text();

        $(this).paulund_modal_box_edit({
            id: id,
            title: title,
            name: name,
            lat: lat,
            lng: lng,
            type: type,
            gender: gender,
            description: desc,
            address: addr,
            status: status
        });
    });
});
