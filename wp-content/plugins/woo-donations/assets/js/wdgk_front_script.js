jQuery(document).ready(function ($) {

    jQuery(".wdgk_donation").on('keyup', function (e) {
        if (e.keyCode == 13) {
            jQuery(this).closest('.wdgk_donation_content').find(".wdgk_add_donation").trigger("click");
        }
    });
    jQuery(".wdgk_donation").on('keypress', function (e) {
        if (e.which == 44) return true;
        if (((e.keyCode != 46 || (e.keyCode == 46 && jQuery(this).val() == '')) || jQuery(this).val().indexOf('.') != -1) && (e.keyCode < 48 || e.keyCode > 57)) e.preventDefault();
    });
    jQuery('body').on("click", ".wdgk_add_donation", function () {

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
        // update function for allow comma in donation price
        if (isNumber(price)) {
            jQuery(this).closest('.wdgk_donation_content').find(".wdgk_error_front").text("Please enter numeric value!!");
            return false;
        }

        jQuery(this).closest('.wdgk_donation_content').find('.wdgk_loader').removeClass("wdgk_loader_img");
        // set new cookie for display price with comma
        setCookie('wdgk_product_display_price', price, 1);
        price = price.replace(/,/g, '');

        setCookie('wdgk_product_price', price, 2);
        setCookie('wdgk_donation_note', note, 3);

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
            success: function (data) {
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
// 
function isNumber(price) {
    var regex = /^[0-9.,\b]+$/;
    if (!regex.test(price)) return false;
}