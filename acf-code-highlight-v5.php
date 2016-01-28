<?php

class acf_field_code_highlight extends acf_field {
	
	function __construct() {
		
		$this->name = 'ACF_CODE_HIGHLIGHT';
		
		$this->label = __('Code Highlighter', 'acf-code-highlight');
		
		$this->category = 'Code';
		
		$this->defaults = array(
			'type_code' => 'css'
		);
		
		$this->l10n = array(
			'error'	=> __('Error! Please enter a higher value', 'acf-code-highlight'),
		);

    	parent::__construct();
    	
	}
	
	function render_field_settings( $field ) {

		acf_render_field_setting( $field, array(
			'label'			=> __('Type','acf-code-highlight'),
			'instructions'	=> __('The type of the code editor','acf-code-highlight'),
			'type'			=> 'select',
			'name'			=> 'type_code',

			'choices' 		=> array(
				'css' => 'CSS',
				'javascript' => 'JavaScript',
				'text/html' => 'HTML',
				'text/x-mariadb' => 'SQL'
			)
		));

	}
	
	function render_field( $field ) {

		?>

		<textarea name="<?php echo esc_attr($field['name']) ?>" class="code_editor" data-mode='<?php echo $field['type_code']?>' cols="30" rows="10"><?php echo esc_attr($field['value']) ?></textarea>

		<?php
	}
		
	function input_admin_head() {

		$dir = plugin_dir_url( __FILE__ );

		wp_register_script( 'codemirror', "{$dir}js/codemirror.js" );
		wp_enqueue_script('codemirror');

		wp_register_script( 'emmet', "{$dir}js/emmet.js" );
		wp_enqueue_script('emmet');

		wp_register_script('code-highlight-mode-css', "{$dir}mode/css/css.js");
		wp_enqueue_script('code-highlight-mode-css');

		wp_register_script('code-highlight-mode-javascript', "{$dir}mode/javascript/javascript.js");
		wp_enqueue_script('code-highlight-mode-javascript');

		wp_register_script('code-highlight-mode-xml', "{$dir}mode/xml/xml.js");
		wp_enqueue_script('code-highlight-mode-xml');

		wp_register_script('code-highlight-mode-sql', "{$dir}mode/sql/sql.js");
		wp_enqueue_script('code-highlight-mode-sql');

		wp_register_style( 'acf-input-code-highlight', "{$dir}css/input.css" );
		wp_enqueue_style('acf-input-code-highlight');

		wp_register_script( 'acf-input-code-highlight', "{$dir}js/input.js" );
		wp_enqueue_script('acf-input-code-highlight');


	}
		
}

new acf_field_code_highlight();

?>
