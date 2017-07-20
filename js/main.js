$(document).ready(function(){

        $('.prettySocial').prettySocial();


 $("#nav").tinyNav(

    {
          active: 'selected', 
  header: 'Select A Tag', // String: Specify text for "header" and show header instead of the active item
    });



var news = localStorage.getItem("hide-newsletter");

if (news == "YES") {
$('.newsletter').hide();
$('.body').css("margin-top", "40px");
}

else {
    $('.newsletter').show()
}





    if ($(".single-aotw")[0]){




$('.content').addClass("aotw-height");

var instauser = $('.insta-user').attr('data-instagram');


$.ajax({
    url: "http://query.yahooapis.com/v1/public/yql",

    // The name of the callback parameter, as specified by the YQL service
    jsonp: "callback",

    // Tell jQuery we're expecting JSONP
    dataType: "jsonp",

    // Tell YQL what we want and that we want JSON
    data: {
        q: 'select items from json where url="https://www.instagram.com/' + instauser + '/media"',
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




  
}





function screenClass() {
    //    var $clone =  $('.right-menu ul.menu').children('li').first().clone();

    if($(window).innerWidth() < 768) {
        $('body').addClass('mobile-active');
    } else {
        $('body').removeClass('mobile-active');

        var header = $(".show-desktop");
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
    $('.left-menu ul.menu').toggleClass('mobile-menu');

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
    nav:true,
    autoWeight: false,
    items:1,
lazyLoad:true,
autoHeight:false,
onChanged: callback,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
        touchDrag  : false,
     mouseDrag  : false,
    onInitialized: function(){
        var t = this,
            currSlide = t._current + 1,
            length = t._items.length;
         $('.image-count').html('<b>Image </b>' + currSlide + ' of ' + length );
           sessionStorage.setItem("current_index", currSlide);

    },
    onTranslate: function(){
        var t = this,
            currSlide = t._current + 1,
            length = t._items.length;
        $('.image-count').html('<b>Image </b>' + currSlide + ' of ' + length);
        sessionStorage.setItem("current_index", currSlide);
    }
};


owl = $('.owl-carousel').owlCarousel(owlOptions);



function callback(event) {

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
     $('.owl-carousel').trigger('refresh.owl.carousel');
          $('.owl-caption').trigger('refresh.owl.carousel');


    var getgallery = $('.item-image').width();
        var getstage = $('.owl-main .owl-stage').css('width');

    console.log(getstage);


  sessionStorage.setItem("intial_width", getgallery);
  sessionStorage.setItem("intial_stage", getstage);



});

$( ".close-button" ).click(function() {
    
    $('body').removeClass('gallery-active');
    $('.owl-carousel').trigger('refresh.owl.carousel');
    $('.owl-caption').trigger('refresh.owl.carousel');



});




$('.caption-text').readmore({
  lessLink: '<a href="#">Read less</a>'
});




$('.expand-button').on('click',function(){

            $(".owl-main .owl-stage").css({transform: "translate3d(-" + $(".owl-main .owl-item").width()*getIndex + "px, 0px, 0px)" }); 

    
    $('.caption-view').toggleClass('caption-expand');
        $('body').toggleClass('owl-expand');

        $('.owl-carousel').toggleClass('owl-expanded');

         var getIndex = sessionStorage.getItem("current_index")-1;


     $(".owl-main .owl-stage").css({transform: "translate3d(-" + $(".owl-main .owl-item").width()*getIndex + "px, 0px, 0px)" }); 


    var mainwidth =   $('.below').width(); 
    var itemcount = $(".owl-main .owl-item").length;
    var windowWidth = $(window).width();
    var combined = windowWidth*itemcount;


   if($('.caption-view').css('opacity') == 0) {
    console.log('no');
     var thevalue = sessionStorage.getItem("intial_width");
    $(".owl-main .owl-item").css({width: thevalue});
     $(".owl-main .owl-stage").css({width: sessionStorage.getItem("intial_stage")});
                      $(".owl-main .owl-stage").css({transform: "translate3d(-" + $(".owl-main .owl-item").width()*getIndex + "px, 0px, 0px)" }); 

}
    else {
        console.log('yes');
       $(".owl-main .owl-item").css({width: windowWidth + "px"});

          
         $(".owl-main .owl-stage").css({width: combined + "px"}); 
        
        $(".owl-main .owl-stage").css({transform: "translate3d(-" + $(".owl-main .owl-item").width()*getIndex + "px, 0px, 0px)" }); 



     }
    


     if ( $( '.expand-button i' ).hasClass( "fa-plus-square" ) ) {
 
            $('.expand-button i').removeClass('fa-plus-square');
            $('.expand-button i').addClass('fa-minus-square');
            $(".expand-button").css({background: "#2c2935"});
                    $(".owl-main .owl-stage").css({transform: "translate3d(-" + $(".owl-main .owl-item").width()*getIndex + "px, 0px, 0px)" }); 






    } 

    else {
        $('.expand-button i').addClass('fa-plus-square');
            $('.expand-button i').removeClass('fa-minus-square');
        $(".expand-button").css({background: "#332f3e"});
                $(".owl-main .owl-stage").css({transform: "translate3d(-" + $(".owl-main .owl-item").width()*getIndex + "px, 0px, 0px)" }); 




    }




});



$( ".close-newsletter" ).click(function() {

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

            if($data.length){
                var $newElements = $data.css({ opacity: 0 });
                    $content.append($newElements);
                    $newElements.animate({ opacity: 1 });

                $loader.removeClass('post_loading_loader').html('load more stories...');
                $("#more_posts").attr("disabled",false);
            } else{
               $loader.removeClass('post_loading_loader').addClass('post_no_more_posts').html('dassit!');
               $("#more_posts").attr("disabled",true);
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
    load_posts();
});


if ($(".single-aotw")[0]){

    var name = ".social-list";
var menuYloc = null;
 

    menuYloc = parseInt($(name).css("top").substring(0,$(name).css("top").indexOf("px")))
    $(window).scroll(function () { 

        var scroll = $(window).scrollTop();
        var offset;

                 offset = menuYloc+$(document).scrollTop()+"px";


        $(name).animate({top:offset},{duration:500,queue:false});
    });




    }

if ($(".change-footer")[0]){

var name = ".social-list";
var menuYloc = null;
 

    menuYloc = parseInt($(name).css("top").substring(0,$(name).css("top").indexOf("px")))
    $(window).scroll(function () { 

        var scroll = $(window).scrollTop();
        var offset;

            
             var myDiv = document.getElementById('main'); //get #myDiv
            var related = document.getElementById('related-post');

            if (related) {

            
            if (scroll >= myDiv.clientHeight+related.clientHeight) {
                  offset = myDiv.clientHeight+300+"px";
              
             }

             else {
                 offset = menuYloc+$(document).scrollTop()+"px";
             }

         }


        $(name).animate({top:offset},{duration:500,queue:false});
    });



 $(window).scroll(function() {
            var scroll = $(window).scrollTop();

            var name = ".social-list";


            var myDiv = document.getElementById('main'); //get #myDiv
            var related = document.getElementById('related-post');

            if (related) {

                

                        var calc = myDiv.clientHeight+related.clientHeight-240;


            

            if (scroll >= myDiv.clientHeight-related.clientHeight-240) {
                $('#prev-post a').addClass('slide-prev');
                $('#next-post a').addClass('slide-next');
            }
        

             else {
               $('#prev-post a').removeClass('slide-prev');
               $('#next-post a').removeClass('slide-next');

            }

        if (scroll >= calc) {
                $('#prev-post a').removeClass('slide-prev');
               $('#next-post a').removeClass('slide-next');
             }

         }

        });

}


var tagOptions = {
    loop:true,
    nav:false,
    items: 1,
    animateOut: 'bounceOutLeft',
    animateIn: 'bounceInLeft'
};


issatag = $('.tag-slide').owlCarousel(tagOptions);



$("#tag-prev").click(function () {
    issatag.trigger('prev.owl.carousel');
});

$("#tag-next").click(function () {
    issatag.trigger('next.owl.carousel');
});


$('.owl-caption').owlCarousel({

    loop:false,
    nav:false,
    items: 1,
    touchDrag  : false,
     mouseDrag  : false,
     animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    autoWeight: true,
    autoHeight: true


});

$('#prev-photo').on('click',function(){
    owl.trigger('prev.owl.carousel');
    $('.owl-caption').trigger('prev.owl.carousel');

     var getIndex = sessionStorage.getItem("current_index")-1;

             $(".owl-main .owl-stage").css({transform: "translate3d(-" + $(".owl-main .owl-item").width()*getIndex + "px, 0px, 0px)" }); 

});

$('#next-photo').on('click',function(){
    owl.trigger('next.owl.carousel');
    $('.owl-caption').trigger('next.owl.carousel');
        
        var getIndex = sessionStorage.getItem("current_index")-1;
          
         $(".owl-main .owl-stage").css({transform: "translate3d(-" + $(".owl-main .owl-item").width()*getIndex + "px, 0px, 0px)" }); 



});



 });




/*** Get Tweets ***/

/*********************************************************************
*  #### Twitter Post Fetcher v17.0.0 ####
*  Coded by Jason Mayes 2015. A present to all the developers out there.
*  www.jasonmayes.com
*  Please keep this disclaimer with my code if you use it. Thanks. :-)
*  Got feedback or questions, ask here:
*  http://www.jasonmayes.com/projects/twitterApi/
*  Github: https://github.com/jasonmayes/Twitter-Post-Fetcher
*  Updates will be posted to this site.
*********************************************************************/
(function(root,factory){if(typeof define==='function'&&define.amd){define([],factory);}else if(typeof exports==='object'){module.exports=factory();}else{factory();}}(this,function(){var domNode='';var maxTweets=20;var parseLinks=true;var queue=[];var inProgress=false;var printTime=true;var printUser=true;var formatterFunction=null;var supportsClassName=true;var showRts=true;var customCallbackFunction=null;var showInteractionLinks=true;var showImages=false;var useEmoji=false;var targetBlank=true;var lang='en';var permalinks=true;var dataOnly=false;var script=null;var scriptAdded=false;function handleTweets(tweets){if(customCallbackFunction===null){var x=tweets.length;var n=0;var element=document.getElementById(domNode);var html='<ul>';while(n<x){html+='<li>'+tweets[n]+'</li>';n++;}
html+='</ul>';element.innerHTML=html;}else{customCallbackFunction(tweets);}}
function strip(data){return data.replace(/<b[^>]*>(.*?)<\/b>/gi,function(a,s){return s;}).replace(/class="(?!(tco-hidden|tco-display|tco-ellipsis))+.*?"|data-query-source=".*?"|dir=".*?"|rel=".*?"/gi,'');}
function targetLinksToNewWindow(el){var links=el.getElementsByTagName('a');for(var i=links.length-1;i>=0;i--){links[i].setAttribute('target','_blank');}}
function getElementsByClassName(node,classname){var a=[];var regex=new RegExp('(^| )'+classname+'( |$)');var elems=node.getElementsByTagName('*');for(var i=0,j=elems.length;i<j;i++){if(regex.test(elems[i].className)){a.push(elems[i]);}}
return a;}
function extractImageUrl(image_data){if(image_data!==undefined&&image_data.innerHTML.indexOf('data-srcset')>=0){var data_src=image_data.innerHTML.match(/data-srcset="([A-z0-9%_\.-]+)/i)[0];return decodeURIComponent(data_src).split('"')[1];}}
var twitterFetcher={fetch:function(config){if(config.maxTweets===undefined){config.maxTweets=20;}
if(config.enableLinks===undefined){config.enableLinks=true;}
if(config.showUser===undefined){config.showUser=true;}
if(config.showTime===undefined){config.showTime=true;}
if(config.dateFunction===undefined){config.dateFunction='default';}
if(config.showRetweet===undefined){config.showRetweet=true;}
if(config.customCallback===undefined){config.customCallback=null;}
if(config.showInteraction===undefined){config.showInteraction=true;}
if(config.showImages===undefined){config.showImages=false;}
if(config.useEmoji===undefined){config.useEmoji=false;}
if(config.linksInNewWindow===undefined){config.linksInNewWindow=true;}
if(config.showPermalinks===undefined){config.showPermalinks=true;}
if(config.dataOnly===undefined){config.dataOnly=false;}
if(inProgress){queue.push(config);}else{inProgress=true;domNode=config.domId;maxTweets=config.maxTweets;parseLinks=config.enableLinks;printUser=config.showUser;printTime=config.showTime;showRts=config.showRetweet;formatterFunction=config.dateFunction;customCallbackFunction=config.customCallback;showInteractionLinks=config.showInteraction;showImages=config.showImages;useEmoji=config.useEmoji;targetBlank=config.linksInNewWindow;permalinks=config.showPermalinks;dataOnly=config.dataOnly;var head=document.getElementsByTagName('head')[0];if(script!==null){head.removeChild(script);}
script=document.createElement('script');script.type='text/javascript';if(config.list!==undefined){script.src='https://syndication.twitter.com/timeline/list?'+'callback=__twttrf.callback&dnt=false&list_slug='+
config.list.listSlug+'&screen_name='+config.list.screenName+'&suppress_response_codes=true&lang='+(config.lang||lang)+'&rnd='+Math.random();}else if(config.profile!==undefined){script.src='https://syndication.twitter.com/timeline/profile?'+'callback=__twttrf.callback&dnt=false'+'&screen_name='+config.profile.screenName+'&suppress_response_codes=true&lang='+(config.lang||lang)+'&rnd='+Math.random();}else if(config.likes!==undefined){script.src='https://syndication.twitter.com/timeline/likes?'+'callback=__twttrf.callback&dnt=false'+'&screen_name='+config.likes.screenName+'&suppress_response_codes=true&lang='+(config.lang||lang)+'&rnd='+Math.random();}else{script.src='https://cdn.syndication.twimg.com/widgets/timelines/'+
config.id+'?&lang='+(config.lang||lang)+'&callback=__twttrf.callback&'+'suppress_response_codes=true&rnd='+Math.random();}
head.appendChild(script);}},callback:function(data){if(data===undefined||data.body===undefined){inProgress=false;if(queue.length>0){twitterFetcher.fetch(queue[0]);queue.splice(0,1);}
return;}
if(!useEmoji){data.body=data.body.replace(/(<img[^c]*class="Emoji[^>]*>)|(<img[^c]*class="u-block[^>]*>)/g,'');}
if(!showImages){data.body=data.body.replace(/(<img[^c]*class="NaturalImage-image[^>]*>|(<img[^c]*class="CroppedImage-image[^>]*>))/g,'');}
if(!printUser){data.body=data.body.replace(/(<img[^c]*class="Avatar"[^>]*>)/g,'');}
var div=document.createElement('div');div.innerHTML=data.body;if(typeof(div.getElementsByClassName)==='undefined'){supportsClassName=false;}
function swapDataSrc(element){var avatarImg=element.getElementsByTagName('img')[0];avatarImg.src=avatarImg.getAttribute('data-src-2x');return element;}
var tweets=[];var authors=[];var times=[];var images=[];var rts=[];var tids=[];var permalinksURL=[];var x=0;if(supportsClassName){var tmp=div.getElementsByClassName('timeline-Tweet');while(x<tmp.length){if(tmp[x].getElementsByClassName('timeline-Tweet-retweetCredit').length>0){rts.push(true);}else{rts.push(false);}
if(!rts[x]||rts[x]&&showRts){tweets.push(tmp[x].getElementsByClassName('timeline-Tweet-text')[0]);tids.push(tmp[x].getAttribute('data-tweet-id'));if(printUser){authors.push(swapDataSrc(tmp[x].getElementsByClassName('timeline-Tweet-author')[0]));}
times.push(tmp[x].getElementsByClassName('dt-updated')[0]);permalinksURL.push(tmp[x].getElementsByClassName('timeline-Tweet-timestamp')[0]);if(tmp[x].getElementsByClassName('timeline-Tweet-media')[0]!==undefined){images.push(tmp[x].getElementsByClassName('timeline-Tweet-media')[0]);}else{images.push(undefined);}}
x++;}}else{var tmp=getElementsByClassName(div,'timeline-Tweet');while(x<tmp.length){if(getElementsByClassName(tmp[x],'timeline-Tweet-retweetCredit').length>0){rts.push(true);}else{rts.push(false);}
if(!rts[x]||rts[x]&&showRts){tweets.push(getElementsByClassName(tmp[x],'timeline-Tweet-text')[0]);tids.push(tmp[x].getAttribute('data-tweet-id'));if(printUser){authors.push(swapDataSrc(getElementsByClassName(tmp[x],'timeline-Tweet-author')[0]));}
times.push(getElementsByClassName(tmp[x],'dt-updated')[0]);permalinksURL.push(getElementsByClassName(tmp[x],'timeline-Tweet-timestamp')[0]);if(getElementsByClassName(tmp[x],'timeline-Tweet-media')[0]!==undefined){images.push(getElementsByClassName(tmp[x],'timeline-Tweet-media')[0]);}else{images.push(undefined);}}
x++;}}
if(tweets.length>maxTweets){tweets.splice(maxTweets,(tweets.length-maxTweets));authors.splice(maxTweets,(authors.length-maxTweets));times.splice(maxTweets,(times.length-maxTweets));rts.splice(maxTweets,(rts.length-maxTweets));images.splice(maxTweets,(images.length-maxTweets));permalinksURL.splice(maxTweets,(permalinksURL.length-maxTweets));}
var arrayTweets=[];var x=tweets.length;var n=0;if(dataOnly){while(n<x){arrayTweets.push({tweet:tweets[n].innerHTML,author:authors[n]?authors[n].innerHTML:'Unknown Author',time:times[n].textContent,timestamp:times[n].getAttribute('datetime').replace('+0000','Z').replace(/([\+\-])(\d\d)(\d\d)/,'$1$2:$3'),image:extractImageUrl(images[n]),rt:rts[n],tid:tids[n],permalinkURL:(permalinksURL[n]===undefined)?'':permalinksURL[n].href});n++;}}else{while(n<x){if(typeof(formatterFunction)!=='string'){var datetimeText=times[n].getAttribute('datetime');var newDate=new Date(times[n].getAttribute('datetime').replace(/-/g,'/').replace('T',' ').split('+')[0]);var dateString=formatterFunction(newDate,datetimeText);times[n].setAttribute('aria-label',dateString);if(tweets[n].textContent){if(supportsClassName){times[n].textContent=dateString;}else{var h=document.createElement('p');var t=document.createTextNode(dateString);h.appendChild(t);h.setAttribute('aria-label',dateString);times[n]=h;}}else{times[n].textContent=dateString;}}
var op='';if(parseLinks){if(targetBlank){targetLinksToNewWindow(tweets[n]);if(printUser){targetLinksToNewWindow(authors[n]);}}
if(printUser){op+='<div class="user">'+strip(authors[n].innerHTML)+'</div>';}
op+='<p class="tweet">'+strip(tweets[n].innerHTML)+'</p>';if(printTime){if(permalinks){op+='<p class="timePosted"><a href="'+permalinksURL[n]+'">'+times[n].getAttribute('aria-label')+'</a></p>';}else{op+='<p class="timePosted">'+
times[n].getAttribute('aria-label')+'</p>';}}}else{if(tweets[n].textContent){if(printUser){op+='<p class="user">'+authors[n].textContent+'</p>';}
op+='<p class="tweet">'+tweets[n].textContent+'</p>';if(printTime){op+='<p class="timePosted">'+times[n].textContent+'</p>';}}else{if(printUser){op+='<p class="user">'+authors[n].textContent+'</p>';}
op+='<p class="tweet">'+tweets[n].textContent+'</p>';if(printTime){op+='<p class="timePosted">'+times[n].textContent+'</p>';}}}
if(showInteractionLinks){op+='<p class="interact"><a href="https://twitter.com/intent/'+'tweet?in_reply_to='+tids[n]+'" class="twitter_reply_icon"'+
(targetBlank?' target="_blank">':'>')+'Reply</a><a href="https://twitter.com/intent/retweet?'+'tweet_id='+tids[n]+'" class="twitter_retweet_icon"'+
(targetBlank?' target="_blank">':'>')+'Retweet</a>'+'<a href="https://twitter.com/intent/favorite?tweet_id='+
tids[n]+'" class="twitter_fav_icon"'+
(targetBlank?' target="_blank">':'>')+'Favorite</a></p>';}
if(showImages&&images[n]!==undefined&&extractImageUrl(images[n])!==undefined){op+='<div class="media">'+'<img src="'+extractImageUrl(images[n])+'" alt="Image from tweet" />'+'</div>';}
if(showImages){arrayTweets.push(op);}else if(!showImages&&tweets[n].textContent.length){arrayTweets.push(op);}
n++;}}
handleTweets(arrayTweets);inProgress=false;if(queue.length>0){twitterFetcher.fetch(queue[0]);queue.splice(0,1);}}};window.__twttrf=twitterFetcher;window.twitterFetcher=twitterFetcher;return twitterFetcher;}));


// ##### Simple example 1 #####
// A simple example to get my latest tweet and write to a HTML element with
// id "example1". Also automatically hyperlinks URLS and user mentions and
// hashtags.

var getTwitterName = $('.aotwtweets').attr('data-twitter');
var configProfile = {
  "profile": {"screenName": getTwitterName},
  "domId": 'example1',
  "maxTweets": 3,
  "enableLinks": true, 
  "showUser": false,
  "showTime": true,
  "showImages": false,
  "lang": 'en',
    "showRetweet": false,
};
twitterFetcher.fetch(configProfile);

