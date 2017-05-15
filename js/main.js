var news = localStorage.getItem("hide-newsletter");

if (news == "YES") {
$('.newsletter').hide();
$('.body').css("margin-top", "40px");
}

else {
    $('.newsletter').show()
}
$('.social-block').hide();


$( ".aotw-image" ).click(function() {

  $("html, body").animate({ scrollTop: 0 }, "slow");
$('.random-row').addClass('row aotw-page');
$('.complete').addClass('white-complete').addClass('pt-page-flipInBottom pt-page-delay500');
$('.aotw-image').removeClass('aotw-image').addClass('artist-image');
$('.aotw-photo').removeClass('col-sm-4 col-xs-12').addClass('col-sm-5');
$('.aotw-body').addClass('inner-bio');
$('.complete-content').removeClass('col-sm-8 col-xs-12').addClass('col-sm-7');
$('.social-block').show();
$('.more-stories').hide();
$('.content').addClass("aotw-height");
$('.bio-text').addClass('col-sm-9');

$("ul.aotw-socials").appendTo(".bio-box");

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


  return false;
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



$( ".close-newsletter" ).click(function() {
    console.log('Close');
    localStorage.setItem("hide-newsletter", "YES");
    $('.newsletter').addClass('hide-news')

});




    var youtube = document.querySelectorAll( ".youtube" );
    
    for (var i = 0; i < youtube.length; i++) {
        
        var source = "https://img.youtube.com/vi/"+ youtube[i].dataset.embed +"/sddefault.jpg";
        var image = new Image();
                image.src = source;
                image.addEventListener( "load", function() {
                    youtube[ i ].appendChild( image );
                }( i ) );
        
                youtube[i].addEventListener( "click", function() {

                    var iframe = document.createElement( "iframe" );

                            iframe.setAttribute( "frameborder", "0" );
                            iframe.setAttribute( "allowfullscreen", "" );
                            iframe.setAttribute( "src", "https://www.youtube.com/embed/"+ this.dataset.embed +"?rel=0&showinfo=0&autoplay=1" );

                            this.innerHTML = "";
                            this.appendChild( iframe );
                } );    
    };
    



var ppp = 4; // Post per page
var pageNumber = 1, offset = 5, $loader = $("#more_posts");

var $content = $('#ajax-posts');


function load_posts(){
    pageNumber++;
    var str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';
    $.ajax({
        type: "POST",
        dataType: "html",
        url: ajax_posts.ajaxurl,
        data: {
        'ppp': ppp,
        'offset': offset,
        'action': 'more_post_ajax'
        },

        beforeSend : function () {
                $loader.addClass('post_loading_loader').html('loading...');
            },
        
        success: function(data){
            var $data = $(data);
            console.log($data.length);
            if($data.length){
                var $newElements = $data.css({ opacity: 0 });
                    $content.append($newElements);
                    $newElements.animate({ opacity: 1 });
                    console.log($newElements);
                $loader.removeClass('post_loading_loader').html('load more stories...');
            } else{
               $loader.removeClass('post_loading_loader').addClass('post_no_more_posts').html('nothing more to see here, folks!');
            }
        },
        error : function(jqXHR, textStatus, errorThrown) {
            $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
        }

    });

        offset += ppp;
    return false;
}

$("#more_posts").on("click",function(){ // When btn is pressed.
    console.log('hi');
    $("#more_posts").attr("disabled",true); // Disable the button, temp.
    load_posts();
});


var name = ".social-list";
var menuYloc = null;
 
$(document).ready(function(){
    menuYloc = parseInt($(name).css("top").substring(0,$(name).css("top").indexOf("px")))
    $(window).scroll(function () { 
        var offset;
            offset = menuYloc+$(document).scrollTop()+"px";
            
        $(name).animate({top:offset},{duration:500,queue:false});
    });
});

