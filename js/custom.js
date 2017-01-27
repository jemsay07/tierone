var JQuery = $.noConflict();

// Back to Top
JQuery(document).ready(function(){
   JQuery(window).scroll(function () {
        if (JQuery(this).scrollTop() > 50) {
            JQuery('#back-to-top').addClass('show');
        } else {
            JQuery('#back-to-top').removeClass('show');
        }
    });
   JQuery('#back-to-top').on('click',function(e){
         e.preventDefault();
         JQuery('html,body').animate({
            scrollTop: 0
         }, 600);
   });
  //popup
  JQuery('.popwindow').on('click', function(e){
    e.preventDefault();
    title = JQuery(this).data('title');
    type = JQuery(this).data('type');
    send_url = JQuery(this).data('url');
    media = JQuery(this).data('media');
    showPopup = "popupWindow";
    showSettings = "width=483,height=350,scrollbars=yes";
    
    if ( type == "twitter" ) {
        window.open( ("https://twitter.com/intent/tweet?text=" + title + "&amp;url=" +  send_url ), showPopup, showSettings);
        return false;
    }
    else if ( type == "facebook"  ) {
        window.open( ("https://www.facebook.com/sharer/sharer.php?u=" + send_url ), showPopup, showSettings);
        return false;
    }
    else if ( type == "google"  ) {
        window.open( ("https://plus.google.com/share?url=" + send_url ), showPopup, showSettings);
        return false;
    }
    else if ( type == "linkedin"  ) {
        window.open( ("https://www.linkedin.com/shareArticle?mini=true&url=" + send_url + "&amp;title=" +  title ), showPopup, showSettings);
        return false;
    }
    else if ( type == "pinterest"  ) {
        window.open( ("https://pinterest.com/pin/create/button/?url=" + send_url + "&amp;media=" +  media + '&amp;description=' +  send_url), showPopup, showSettings);
        return false;
    }
  });
});

// Ticker
JQuery('.ticker').ticker({
    random:        false, // Whether to display ticker items in a random order
    itemSpeed:     3000,  // The pause on each ticker item before being replaced
    cursorSpeed:   50,    // Speed at which the characters are typed
    pauseOnHover:  true,  // Whether to pause when the mouse hovers over the ticker
    finishOnHover: true,  // Whether or not to complete the ticker item instantly when moused over
    cursorOne:     '_',   // The symbol for the first part of the cursor
    cursorTwo:     '-',   // The symbol for the second part of the cursor
    fade:          true,  // Whether to fade between ticker items or not
    fadeInSpeed:   600,   // Speed of the fade-in animation
    fadeOutSpeed:  300    // Speed of the fade-out animation
});
