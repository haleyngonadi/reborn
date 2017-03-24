$.ajax({
    url: "http://query.yahooapis.com/v1/public/yql",

    // The name of the callback parameter, as specified by the YQL service
    jsonp: "callback",

    // Tell jQuery we're expecting JSONP
    dataType: "jsonp",

    // Tell YQL what we want and that we want JSON
    data: {
        q: "select items from json where url=\"https://www.instagram.com/blanca_suarez/media\"",
        format: "json"
    },

    // Work with the response
    success: function( response ) {
        
        var items = [];
    
        
        for (var i = 0; i < 3; i++) {
            var obj = response.query.results.json[i];
            items.push('<li class="col-md-4"><a href="' + obj.items.link + '" target="_blank"><img src="' + obj.items.images.standard_resolution.url + '" width="100%"/></a></li>');
        }
                
            $( "<ul/>", {
                "class": "insta-images row",
                html: items.join( "" )
            }).appendTo( ".insta-feed" );
        
      //  console.log( response.query.results.json[0].items.images.standard_resolution.url ); 
   
        
        
    }
});



function screenClass() {
    //    var $clone =	$('.right-menu ul.menu').children('li').first().clone();

    if($(window).innerWidth() < 768) {
        $('body').addClass('mobile-active');
    } else {
        $('body').removeClass('mobile-active');

        var header = $("header");
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 117) {
                header.addClass("upper");
            } else {
                header.removeClass("upper");
            }
        });

    }
}

// Fire.
screenClass();

// And recheck if window gets resized.
$(window).bind('resize',function(){
    screenClass();
});


$( ".bars" ).click(function() {
    $('.right-menu ul.menu').toggleClass('mobile-menu');
    console.log('Clicked');

});



$.ajax({
    url: "http://itunes.apple.com/search?term=maggie+rogers",
    dataType: 'JSONP'
})
    .done(function(data) { 
    
    var artistimage = data.results[0].artworkUrl100;
    artistimage = artistimage.replace('100x100bb','1200x1200bb');
    
    var releasedate = data.results[0].releaseDate;
    var seconddate = moment(releasedate).format('MMMM D, YYYY');

    $('.case').prepend($('<img>',{id:'theImg',src:artistimage}))
    $( ".release" ).append( "<strong>Purchase:</strong> <a href=\""+data.results[0].collectionViewUrl+"\" target=\"_blank\">iTunes</a><br><strong>Artist:</strong> "+data.results[0].artistName+"<br><strong>Title:</strong> "+data.results[0].collectionName+"<br><strong>Release Date:</strong> "+seconddate+"<br>" );
    
    $('.vinyl-record').fadeIn("slow");




})
    .fail(function(data) { console.log(data); })



/*
var configProfile = {
    "profile": {"screenName": 'maggierogers'},
    "domId": 'example1',
    "maxTweets": 2,
    "enableLinks": true, 
    "showUser": false,
    "showTime": true,
    "showImages": false,
    "lang": 'en',
    "showInteraction": false,
    "showRetweet": false,
};
twitterFetcher.fetch(configProfile);
*/

/*** Gallery ***/


var owlOptions = {
    loop:false,
    nav:false,
    animateOut: 'slideOutRight',
    animateIn: 'slideInLeft',
    items:1,
lazyLoad:true,
autoHeight:false,
onChanged: callback
};


owl = $('.owl-carousel').owlCarousel(owlOptions);


function callback(event) {
    console.log(event.item.index);

    if( event.item.index == 0) {
      $('#prev-photo').addClass('inactive');
    } 
    else if( event.item.index == event.item.count- 1) {
      $('#next-photo').addClass('inactive');
    }
    else {
       $('#prev-photo').removeClass('inactive');
       $('#next-photo').removeClass('inactive'); 
    }
}


$( ".gallery-size" ).click(function() {
    
    $('body').addClass('gallery-active');
    owl.trigger('refresh.owl.carousel');


});

$( ".close-button" ).click(function() {
    
    $('body').removeClass('gallery-active');

});

    

$("#prev-photo").click(function () {
    owl.trigger('prev.owl.carousel');
});

$("#next-photo").click(function () {
    owl.trigger('next.owl.carousel');
});

$('.caption-text').readmore({
  lessLink: '<a href="#">Read less</a>'
});



$( ".expand-button" ).click(function() {
    
    $('.caption-view').toggleClass('caption-expand');
        $('body').toggleClass('owl-expand');

        $('.owl-carousel').toggleClass('owl-expanded');

    var mainwidth =   $('.below').width(); 
    var itemcount = $(".owl-carousel .owl-item").length;
    var windowWidth = $(window).width();
    var combined = mainwidth*itemcount;





/*    if($('.caption-view').css('opacity') == 0) {
        owl.trigger('refresh.owl.carousel');
    console.log('no');
}
    else {
        console.log('yes');
         $(".owl-carousel").css({width: combined + "px"});
        $(".owl-item").css({width: windowWidth + "px"});
         $(".owl-stage").css({width: combined + "px", transform: "translate3d(0px, 0px, 0px)" });
    }*/


        if($('.caption-view').css('opacity') == 0) {
        owl.trigger('refresh.owl.carousel');
        console.log('no');
        }
    else {
        console.log('yes');
         var $owl = $('.owl-carousel');
        $owl.addClass('owl-expanded');
$owl.trigger('destroy.owl.carousel');
$owl.html($owl.find('.owl-stage-outer').html()).removeClass('owl-loaded');
 $owl.owlCarousel(owlOptions);



    }




     if ( $( '.expand-button i' ).hasClass( "fa-plus-square" ) ) {
 
            $('.expand-button i').removeClass('fa-plus-square');
            $('.expand-button i').addClass('fa-minus-square');
            $(".expand-button").css({background: "#2c2935"});





    } 

    else {
        $('.expand-button i').addClass('fa-plus-square');
            $('.expand-button i').removeClass('fa-minus-square');
        $(".expand-button").css({background: "#332f3e"});



    }




});


