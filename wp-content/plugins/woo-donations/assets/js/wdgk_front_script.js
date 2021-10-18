jQuery(document).ready(function($) {

    jQuery(".wdgk_donation").on('keyup', function(e) {
        if (e.keyCode == 13) {
            jQuery(this).closest('.wdgk_donation_content').find(".wdgk_add_donation").trigger("click");
        }
    });
    jQuery('body').on("click", ".wdgk_add_donation", function() {

        var note = "";

        var price = jQuery(this).closest('.wdgk_donation_content').find("input[name='donation-price']").val();

        if (jQuery(this).closest('.wdgk_donation_content').find('.donation_note').val()) {
            var note = jQuery(this).closest('.wdgk_donation_content').find('.donation_note').val();
        }
        var ajaxurl = jQuery('.wdgk_ajax_url').val();
        var product_id = jQuery(this).attr('data-product-id');
        var redirect_url = jQuery(this).attr('data-product-url');

        if (price == "") {
            jQuery(this).closest('.wdgk_donation_content').find(".wdgk_error_front").text("Please enter a value!!");
            return false;
        } else {
            var pattern = new RegExp(/^[0-9.*]/);
            if (!pattern.test(price) || price < 0.01) {
                jQuery(this).closest('.wdgk_donation_content').find(".wdgk_error_front").text("Please enter valid value!!");
                return false;
            }
        }
        if (!jQuery.isNumeric(price)) {
            jQuery(this).closest('.wdgk_donation_content').find(".wdgk_error_front").text("Please enter numeric value!!");
            return false;
        }
        jQuery(this).closest('.wdgk_donation_content').find('.wdgk_loader').removeClass("wdgk_loader_img");
        setCookie('wdgk_product_price', price, 1);
        setCookie('wdgk_donation_note', note, 2);

        jQuery.ajax({
            url: ajaxurl,
            data: {
                action: 'wdgk_donation_form',
                product_id: product_id,
                price: price,
                note: note,
                redirect_url: redirect_url
            },
            type: 'POST',
            success: function(data) {
                var redirect = jQuery.parseJSON(data);
                if (redirect.error == "true") {
                    jQuery(this).closest('.wdgk_donation_content').find(".wdgk_error_front").text("Please enter valid value!!");
                    jQuery(this).closest('.wdgk_donation_content').find('.wdgk_loader').addClass("wdgk_loader_img");
                    return false;
                } else {
                    document.location.href = redirect.url;
                }
            }
        });
    });



});

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(";");
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == " ") {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}