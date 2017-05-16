jQuery(document).ready(function($){

    jQuery('.cookie_date').datepicker({
dateFormat : 'M d, yy'
});


    var imageurl = $('#meta-image').val();
        var releaseurl = $('#release-image').val();


    if(typeof imageurl !== "undefined")
{

    if (imageurl.length == 0) {
        $('.photo-square').removeClass("appear");
    }

}



    if(typeof releaseurl !== "undefined")
{

    if (releaseurl.length == 0) {
        $('.release-square').removeClass("appear");
    }

}
 
    // Instantiates the variable that holds the media library frame.
    var meta_image_frame;
 
    // Runs when the image button is clicked.
    $('#meta-image-button').click(function(e){
 
        // Prevents the default action from occuring.
        e.preventDefault();
 
        // If the frame already exists, re-open it.
        if ( meta_image_frame ) {
            meta_image_frame.open();
            return;
        }
 
        // Sets up the media library frame
        meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button }
           // library: { type: 'image' }
        });
 
        // Runs when an image is selected.
        meta_image_frame.on('select', function(){
 
            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
 
            // Sends the attachment URL to our custom image input field.
            $('#meta-image').val(media_attachment.url);
             $('.photo-square').addClass("appear");
              $('.photo-square').css('background-image', 'url(' + media_attachment.url + ')');
            
        });
 
        // Opens the media library frame.
        meta_image_frame.open();
    });

        $('#release-button').click(function(e){
 
        // Prevents the default action from occuring.
        e.preventDefault();
 
        // If the frame already exists, re-open it.
        if ( meta_image_frame ) {
            meta_image_frame.open();
            return;
        }
 
        // Sets up the media library frame
        meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button }
           // library: { type: 'image' }
        });
 
        // Runs when an image is selected.
        meta_image_frame.on('select', function(){
 
            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
 
            // Sends the attachment URL to our custom image input field.
            $('#release-image').val(media_attachment.url);
             $('.release-square').addClass("appear");
              $('.release-square').css('background-image', 'url(' + media_attachment.url + ')');
            
        });
 
        // Opens the media library frame.
        meta_image_frame.open();
    });


$( "#wpcf-purchase" ).change(function() {
  alert( "Handler for .change() called." );
});

});