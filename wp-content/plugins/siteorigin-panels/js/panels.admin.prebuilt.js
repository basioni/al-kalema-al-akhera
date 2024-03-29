/**
 * Handles pre-built Panel layouts.
 *
 * @copyright Greg Priday 2013
 * @license GPL 2.0 http://www.gnu.org/licenses/gpl-2.0.html
 */

jQuery(function($){
    $( '#grid-prebuilt-dialog' ).show().dialog( {
        dialogClass: 'panels-admin-dialog',
        autoOpen:    false,
        resizable:   false,
        draggable:   false,
        modal:       false,
        title:       $( '#grid-prebuilt-dialog' ).attr( 'data-title' ),
        minWidth:    600,
        height:      450,
        create:      function(event, ui){
        },
        open:        function(){
            var overlay = $('<div class="siteorigin-panels-ui-widget-overlay ui-widget-overlay ui-front"></div>').css('z-index', 80001);
            $(this).data('overlay', overlay).closest('.ui-dialog').before(overlay);

            // Turn the dropdown into a chosen selector
            $( '#grid-prebuilt-dialog' ).find('select').chosen({
                disable_search_threshold: 8,
                search_contains: true,
                placeholder_text: $( '#grid-prebuilt-dialog' ).find('select' ).attr('placeholder')
            });

        },
        close :      function(){
            $(this).data('overlay').remove();
        },
        buttons : [
            {
                text: panels.i10n.buttons.insert,
                click: function(){
                    var dialog = $(this).closest('.ui-dialog');
                    if(dialog.hasClass('panels-ajax-loading')) return;
                    dialog.addClass('panels-ajax-loading');

                    var s = $('#grid-prebuilt-input' ).find(':selected');
                    if(s.attr('data-layout-id') == null) {
                        $( '#grid-prebuilt-dialog' ).dialog('close');
                        return;
                    }

                    $.get( ajaxurl, {action: 'so_panels_prebuilt', layout: s.attr('data-layout-id')}, function(data){
                        dialog.removeClass('panels-ajax-loading');

                        if(typeof data.name != 'undefined') {
                            if(confirm(panels.i10n.messages.confirmLayout)){
                                // Clear the grids and load the prebuilt layout
                                panels.clearGrids();
                                panels.loadPanels(data);
                                $( '#grid-prebuilt-dialog' ).dialog('close');
                            }
                        }
                    } );

                }
            }
        ]
    } );
    
    // Button for adding prebuilt layouts
    $( '#add-to-panels .prebuilt-set' )
        .button( {
            icons: {primary: 'ui-icon-prebuilt'},
            text:  false
        } )
        .click( function () {
            $( '#grid-prebuilt-dialog' ).dialog( 'open' );
            return false;
        } );
});