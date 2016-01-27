
// All images need to be loaded for this plugin to work so
// we end up waiting for the whole window to load in this example
$(window).load(function () {
    $(document).ready(function(){
        collage();
        $('.Collage').collageCaption();
    });
});


// Here we apply the actual CollagePlus plugin
function collage() {
    $('.Collage').removeWhitespace().collagePlus(
        {
            'fadeSpeed'     : 28000,
            'targetHeight'  : 400,
            'effect'        : 'effect-3',
            'direction'     : 'vertical'
        }
    );
};

// This is just for the case that the browser window is resized
var resizeTimer = null;
$(window).bind('resize', function() {
    // hide all the images until we resize them
    $('.Collage .Image_Wrapper').css("opacity", 0);
    // set a timer to re-apply the plugin
    if (resizeTimer) clearTimeout(resizeTimer);
    resizeTimer = setTimeout(collage, 600);
});