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


$( "#wpcf-song-choice" ).change(function() {
  $('.pre-release').show();

  var theURL = $("#wpcf-song-choice").val();
  theURL = theURL.replace(' ', '+');

  var artistName = $("#title").val();
  artistName = artistName.replace(' ', '+');


  var combinedURL = 'https://itunes.apple.com/search?term='+theURL+"+"+artistName;
  console.log(combinedURL);


  $.ajax({
    url: combinedURL,
    dataType: 'JSONP'
})
    .done(function(data) { 
        $('.pre-release').hide();

        $('.releases').show();

    
    var artistimage = data.results[0].artworkUrl100;
    artistimage = artistimage.replace('100x100bb','1200x1200bb');
    artistimage = artistimage.replace('http','https');

    
    var releasedate = data.results[0].releaseDate;
    var seconddate = moment(releasedate).format('MMMM D, YYYY');



    $('#wpcf-release-title').val(data.results[0].trackName);
    $('#wpcf-release-date').val(seconddate);
    $('#release-image').val(artistimage);
    $('#wpcf-purchase').val(data.results[0].collectionViewUrl);
    $('#wpcf-genre').val(data.results[0].primaryGenreName);

    $('#wpcf-lyrics').val('https://genius.com/search?q='+theURL+"+"+artistName);





})
    .fail(function(data) { 
        $('.releases').html('Sorry, no results were found for that release. Try another one?');

        console.log(data); })


  return false;


});

});