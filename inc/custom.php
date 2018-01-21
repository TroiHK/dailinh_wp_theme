<?php
// Gestion du sprite SVG
$HTTP_USER_AGENT = preg_match("/(Trident\/(\d{2,}|4|5|6|7|8|9)(.*)rv:(\d{2,}))|(MSIE\ (\d{2,}|4|5|6|7|8|9)(.*)Tablet\ PC)|(Trident\/(\d{2,}|4|5|6|7|8|9))/", $_SERVER["HTTP_USER_AGENT"]);
define('HTTP_USER_AGENT', $HTTP_USER_AGENT);

if( HTTP_USER_AGENT ) {
	$sprite = '';
} else {
	$sprite = get_template_directory_uri() . '/assets/svg/sprite.svg';
}
define('SPRITE', $sprite);

// Print svg sprite if IE
function printSvgSprite() {
	if(HTTP_USER_AGENT) {
		echo '<div style="display: none;">';
		require_once("./app/themes/dailinh_wp_theme/assets/svg/sprite.svg");
		echo '</div>';
	}
}

/**
 * Get a SVG icon
 * @param String $shapeName The svg name (in images/spriteSVG/raw/)
 * @return string SVG HTML element
 */
function getSvgIcon($shapeName, $viewBox) {

    $svg = '<i class="icon icon__' . $shapeName . '">';
    $svg .= '<svg viewBox="' . $viewBox . '" class="svg_' . $shapeName . '">';
    $svg .= '<use xlink:href="' . SPRITE . '#svg-' . $shapeName . '"></use>';
    $svg .= '<use xlink:href="#svg-' . $shapeName . '"></use>';
    $svg .= '</svg>';
    $svg .= '</i>';

    return $svg;
}

// add_image_size
add_image_size('main-slide', 1243, 564, true);
add_image_size('actu-thumnail', 290, 213, true);
add_image_size('project-thumbnail', 520, 315, true);
add_image_size('iconiques-thumbnail', 595, 354, true);
add_image_size('project-thumb-list', 300, 215, true);
add_image_size('project-thumb-list-2', 315, 190, true);
add_image_size('mobile-slide', 337, 466, true);