export const init = ($) => {

    const myOverlay = "myOverlay";
    const searchForm = "searchForm";


    $("#openSearch").click(function (
        event //CHECK IF YOUR BUTTON IS PRESSED
    ) {
        $(`#${myOverlay}`).fadeTo( "fast", 1 )
        $(`#${myOverlay}`).addClass('visibled')
        $(`#s`).focus()
    });

    $("#closeSearch").click(function (
        event //CHECK IF YOUR BUTTON IS PRESSED
    ) {
        $(`#${myOverlay}`).fadeOut( "fast", 0 )

        
    });

    $(document).click(function(e) {
        if( e.target.id == 'myOverlay') {
            $(`#${myOverlay}`).fadeOut( "fast", 0 )
        }
      });

    
}