<?php   
  
/* 
Plugin Name: Islamic Graphics
Plugin URI: http://plugins.muslimmatters.org
Description: Shortcodes for the insertion of graphics representing the common Islamic phrases, e.g., SAW, RA, SWT and AS, into Wordpress posts and pages.
Version: 1.2.4
Author: Mehzabeen Ibrahim
Author URI: http://imuslim.tv
*/

/*
Copyright (C) 2012  Mehzabeen Ibrahim, email: info@imuslim.tv

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

/* IMPORTANT: PREVENT PHOTON FROM SERVING ISLAMIC GRAPHIC IMAGES */

function islamic_graphics_photon_exception( $val, $src, $tag ) {
        if (strpos($src, 'islamic-graphics') !== false ){
                return true;
        }
        return $val;
}
add_filter( 'jetpack_photon_skip_image', 'islamic_graphics_photon_exception', 10, 3 );


/* OPTIONS PAGE */

// Add admin actions
add_action('admin_menu', 'islamic_graphics_menu');
add_action( 'admin_init', 'islamic_graphics_init' );

// Add sub-menu to Settings Top Menu
function islamic_graphics_menu() {
	add_options_page('Islamic Graphics - Options', 'Islamic Graphics', 'manage_options', 'islamic-graphics', 'islamic_graphics_options');
}

// Register settings
function islamic_graphics_init(){
    add_settings_section('islamic_graphics_main', 'Main Settings', 'islamic_graphics_section_text', 'islamic-graphics');
    add_settings_field('islamic_graphics_default_height', 'Default height (pixels)', 'add_field_default_height', 'islamic-graphics', 'islamic_graphics_main');
    add_settings_field('islamic_graphics_default_colour', 'Default colour', 'add_field_default_colour', 'islamic-graphics', 'islamic_graphics_main');
    add_settings_field('islamic_graphics_display_type', 'Display type', 'add_field_display_type', 'islamic-graphics', 'islamic_graphics_main');
    
    register_setting( 'islamic-graphics-option-group', 'islamic_graphics_default_height', 'validate_default_height' );
    register_setting( 'islamic-graphics-option-group', 'islamic_graphics_display_type' );
    register_setting( 'islamic-graphics-option-group', 'islamic_graphics_default_colour' );
 }
 
function islamic_graphics_section_text(){
    echo '<p>Use the following options to alter the display of Islamic Graphics in your posts and pages.</p>';
}

function add_field_default_height(){   
    echo '<input type="text" name="islamic_graphics_default_height" value="';
    echo get_option('islamic_graphics_default_height', 25);
    echo '" />';           
}

function add_field_default_colour(){   
    echo '<select name="islamic_graphics_default_colour" id="islamic_graphics_default_colour">';
    
    $display_type_options = array(
            "black" => "Black",
            "white" => "White");

    $stored_type = get_option('islamic_graphics_default_colour', 'black');

    foreach ($display_type_options as $key => $row) {
        echo '<option value="' . $key . '"';
        if ($stored_type == $key) { echo 'selected="selected"'; }
        echo '>'. $row .'</option>';
    }
    
    echo '</select>';        
}

function add_field_display_type(){   
    echo '<select name="islamic_graphics_display_type" id="islamic_graphics_display_type">';
    
        $display_type_options = array(
                "images" => "Images only",
                "images_trans" => "Images (with translation)",
                "text_rom_trans" => "Romanized text (with translation)",
                "text_rom" => "Romanized text only",
                "text_trans" => "Translation only");

        $stored_type = get_option('islamic_graphics_display_type', 'images');

        foreach ($display_type_options as $key => $row) {
            echo '<option value="' . $key . '"';
            if ($stored_type == $key) { echo 'selected="selected"'; }
            echo '>'. $row .'</option>';
        } 
    
    echo '</select>';        
}

// Validate height input
function validate_default_height($input) {
    $newinput = trim($input);
    
    if (!is_numeric($newinput)){
        $newinput = 20; // if not numeric, then use 20 as default value
    }
    return $newinput;
}

// HTML for options page
function islamic_graphics_options() {
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
?>
    <div class="wrap">
        <h2>Islamic Graphics - Options Page</h2>
        <form method="post" action="options.php">
        <?php settings_fields( 'islamic-graphics-option-group' ); ?>
        <?php do_settings_sections('islamic-graphics'); ?>
        <!-- Submit Button -->
        <p class="submit"> <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" /></p>
        </form>
    </div>
        
<?php }



/* GLOBAL ARRAY OF SHORTCODES + ALT TEXT VALUES */

$alt_text = array();

function add_to_alt_text($code, $romanized, $translation){
    $GLOBALS['alt_text'][$code] = array("romanized" => $romanized, "translation" => $translation); 
}

add_to_alt_text("alayhis", "'alayhi'l-salām", "peace be upon him");
add_to_alt_text("rahimaha", "raḥimahā Allāh", "may Allāh have mercy upon her");
add_to_alt_text("rahimahu", "raḥimahullāh","may Allāh have mercy upon him");
add_to_alt_text("rahimahum", "raḥimahum Allāh","may Allāh have mercy upon them");
add_to_alt_text("ranha", "raḍyAllāhu 'anha","may Allāh be pleased with her");
add_to_alt_text("ranhu", "raḍyAllāhu 'anhu","may Allāh be pleased with him");
add_to_alt_text("ranhum", "raḍyAllāhu 'anhum","may Allāh be pleased with them");
add_to_alt_text("saw", "ṣallallāhu 'alayhi wa sallam","peace and blessings of Allāh be upon him");
add_to_alt_text("swt", "subḥānahu wa ta'āla","glorified and exalted be He");


/* ADD SHORTCODES */
        
foreach ($alt_text as $key => $row) {
    add_shortcode( $key, 'insert_islamic_graphic' );
    add_shortcode( $key.'_w', 'insert_islamic_graphic' ); // to be compatible with pre-v1.1 shortcodes
}   


/* ISLAMIC GRAPHIC SHORTCODE FUNCTION */

function insert_islamic_graphic( $atts, $content=null, $code="" ) {
        $code = preg_replace("/_w/", "", $code); // to be compatible with pre-v1.1 shortcodes   
    
        // fetch display type from wp options (default to images)
        $display_type = get_option('islamic_graphics_display_type', 'images');
        
        // Fetch alt_text
        $romanized = $GLOBALS['alt_text'][$code]['romanized'];
        $translation = $GLOBALS['alt_text'][$code]['translation'];
        
        if ($display_type == 'images' || $display_type == 'images_trans'){
            // fetch default height from wp options (default of 20 if not set)
            $default_height = get_option('islamic_graphics_default_height', 20);
            
            // fetch default colour from wp_options (default to black if not set)
            $default_colour = get_option('islamic_graphics_default_colour', 'black');

            // extract attributes
            extract( shortcode_atts( array(
                    'h' => $default_height,
                    'c' => $default_colour,
            ), $atts ) );
            
            // plugin URL
            $plugin_url = plugin_dir_url( "islamic_graphics.php" );
            
            // Construct alt_text
            $alt_text_str =  $romanized . ' (' . $translation . ')';

            // Build Img Path
            $imgpath = $plugin_url . 'islamic-graphics/img/' . "{$c}" . '/';            
            $pngsrc = $imgpath . 'png/' . $code . '.png';    
	        $svgsrc = $imgpath . 'svg/' . $code . '.svg';

            // Build HTML
            $html .= '<img title="' . $alt_text_str . '"';
            $html .= ' alt="' . $alt_text_str . '"';
            $html .= ' class="islamic_graphic"';
            $html .= ' src="'.  $pngsrc . '" width="'. "{$h}" . 'px" height="'. "{$h}" . 'px" srcset="' . $svgsrc .'">';

            if ($display_type == 'images_trans') {
                $html .= '<span class="islamic_graphic"> (' . $translation . ')</span>';
            }
            
        }       
        elseif ($display_type == 'text_rom_trans') {          
            $html = '<span class="islamic_graphic"> '. $romanized . ' (' . $translation . ')</span>';           
        }
        elseif ($display_type == 'text_rom') {          
            $html = '<span class="islamic_graphic"> ' . $romanized . '</span>';         
        }
        elseif ($display_type == 'text_trans') {          
            $html = '<span class="islamic_graphic">(' . $translation . ')</span>';         
        }
        
	return $html;
	}


?>