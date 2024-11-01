(function( $ ) {
    "use strict";

    // upload image
    jQuery( document ).on( 'click', '[data-wecreativez-upload-id]', function(e) {
        e.preventDefault();
        var uid = jQuery( this ).attr( 'data-wecreativez-upload-id' );
        var image = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the input field
            jQuery('[data-wecreativez-upload-url-id='+uid+']').val(image_url);
        });
    });


    jQuery('.wcc-add-support-person').click(function() {
        tb_show('Add Support Person', 'admin-ajax.php?action=wcc_add_support_person');
        return false;
    });

    jQuery('.wcc-edit-support-person').click(function() {
        var support_person_id = jQuery(this).attr('data-wcc-support-person-id');
        tb_show('Edit Support Person', 'admin-ajax.php?action=wcc_edit_support_person&wcc_support_person_id='+support_person_id);
        return false;
    });

})(jQuery)