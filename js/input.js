(function($){

	var editors = [];

	function createEditor($el)
	{
		var mode_type = $($el).attr('data-mode');

		if(typeof mode_type !== 'undefined'){

			var editor = CodeMirror.fromTextArea( $el , {
				lineNumbers: true,
				mode: mode_type
			});

			editors.push(editor);
		}
	}

	var textareas = document.getElementsByClassName('code_editor');

	jQuery.each(textareas, function (index, el) {
		createEditor(el);
	})

	function initialize_field( $el ) {

	}
	
	if( typeof acf.add_action !== 'undefined' ) {

		acf.add_action('ready append', function( $el ){

			acf.get_fields({ type : 'ACF_CODE_HIGHLIGHT'}, $el).each(function(){

				initialize_field( $(this) );

			});

		});

		acf.add_action('show_field', function( $field ){

			jQuery.each(editors, function (index, editor) {
				editor.refresh();
			})

		});
		
	} else {

		$(document).on('acf/setup_fields', function(e, postbox){
			
			$(postbox).find('.field[data-field_type="ACF_CODE_HIGHLIGHT"]').each(function(){

				initialize_field( $(this) );

			});

		});
	
	}


})(jQuery);
