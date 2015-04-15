(function($){
    if($.cookie('cookiebar') === undefined){
        $('body').append('<div class="cookie" id="cookie"> En continuant votre navigation, vous acceptez l\'utilisation de cookie. ' +
        '<a href="http://fr.wikipedia.org/wiki/Cookie_%28informatique%29" target="_blank">En savoir plus</a>' +
        '<div class="cookie_btn" id="cookie_accept">Ok</div>' +
        '<div class="cookie_btn cookie_btn-error" id="cookie_cancel">Refuser les cookies</div></div>');

        // Masquer la barre
        $('#cookie_accept').click(function(e){
            e.preventDefault();
            $('#cookie').fadeOut();
            $.cookie('cookiebar',"viewed",{expires:30*12});
        });
        $('#cookie_cancel').click(function(e){
            e.preventDefault();
            $('#cookie').fadeOut();
            $.cookie('cookiebar',"viewed",{expires:30*12});
            $.cookie('cookiecancel',"1");
        });
    }

if($.cookie('cookiebar') === undefined){
   // alert('Les cookies employes sont : Connection automatique, affichage des posts non vu simplifié')
}
})(jQuery);