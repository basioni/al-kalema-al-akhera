/**
 * @copyright Black Studio http://www.blackstudio.it
 * @license GPL 2.0
 */

jQuery(function($){
    // Set wpActiveEditor variables used when adding media from media library dialog
    $(document).on('click', '.wp-media-buttons a', function() {
        var $widget_inside = $(this).closest('div.ui-dialog')
        wpActiveEditor = $('textarea[id^=widget-black-studio-tinymce]', $widget_inside).attr('id');
    });

    $(document).on('panelsopen', function(e) {
        var dialog = $(e.target);
        if( dialog.data('widget-type') != 'WP_Widget_Black_Studio_TinyMCE' ) return;

        if(dialog.data('bs_tinymce_setup') == null) {
            dialog.filter('.widget-dialog-wp_widget_black_studio_tinymce').find('a[id$=tmce]').click();
            dialog.find('.wp-editor-container iframe[id$="_ifr"]').css('height', 350);
            dialog.data('bs_tinymce_setup', true);
        }
    });

    // Copy the value from the text editor to the text area.
    $(document).on('panelsdone', function(e) {
        var $text_area = $(e.target).find('textarea[id^=widget-black-studio-tinymce]');

        if ($text_area.length > 0) {
            var editor = tinyMCE.get( $text_area.attr('id') );
            if( editor != null && typeof( editor.getContent ) == "function" ) {
                var content = editor.getContent();
            }
            else {
                content = $text_area.val();
            }

            $text_area.val(content);
        }

    } );

} );