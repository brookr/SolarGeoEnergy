<?php

/*-----------------------------------------------------------------------------------

	Theme Shortcodes

-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*	Buttons Shortcodes
/*-----------------------------------------------------------------------------------*/

function tz_button_yellow( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self',
		'position'   => 'left'
    ), $atts));
	$out = "<a href=\"" .$url. "\" target=\"" .$target. "\" class=\"buttons btn_yellow " .$position. "\"><span class=\"left\">".do_shortcode($content)."</span></a>";
    return $out;
}
add_shortcode('button-yellow', 'tz_button_yellow');

function tz_button_blue( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self',
		'position'   => 'left'
    ), $atts));
	$out = "<a href=\"" .$url. "\" target=\"" .$target. "\" class=\"buttons btn_blue " .$position. "\"><span class=\"left\">".do_shortcode($content)."</span></a>";
    return $out;
}
add_shortcode('button-blue', 'tz_button_blue');

function tz_button_green( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self',
		'position'   => 'left'
    ), $atts));
	$out = "<a href=\"" .$url. "\" target=\"" .$target. "\" class=\"buttons btn_green " .$position. "\"><span class=\"left\">".do_shortcode($content)."</span></a>";
    return $out;
}
add_shortcode('button-green', 'tz_button_green');

function tz_button_red( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self',
		'position'   => 'left'
    ), $atts));
	$out = "<a href=\"" .$url. "\" target=\"" .$target. "\" class=\"buttons btn_red " .$position. "\"><span class=\"left\">".do_shortcode($content)."</span></a>";
    return $out;
}
add_shortcode('button-red', 'tz_button_red');

function tz_button_purple( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self',
		'position'   => 'left'
    ), $atts));
	$out = "<a href=\"" .$url. "\" target=\"" .$target. "\" class=\"buttons btn_purple " .$position. "\"><span class=\"left\">".do_shortcode($content)."</span></a>";
    return $out;
}
add_shortcode('button-purple', 'tz_button_purple');

function tz_button_teal( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self',
		'position'   => 'left'
    ), $atts));
	$out = "<a href=\"" .$url. "\" target=\"" .$target. "\" class=\"buttons btn_teal " .$position. "\"><span class=\"left\">".do_shortcode($content)."</span></a>";
    return $out;
}
add_shortcode('button-teal', 'tz_button_teal');

function tz_button_white( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self',
		'position'   => 'left'
    ), $atts));
	$out = "<a href=\"" .$url. "\" target=\"" .$target. "\" class=\"buttons btn_white " .$position. "\"><span class=\"left\">".do_shortcode($content)."</span></a>";
    return $out;
}
add_shortcode('button-white', 'tz_button_white');

function tz_button_dark( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self',
		'position'   => 'left'
    ), $atts));
	$out = "<a href=\"" .$url. "\" target=\"" .$target. "\" class=\"buttons btn_dark " .$position. "\"><span class=\"left\">".do_shortcode($content)."</span></a>";
    return $out;
}
add_shortcode('button-dark', 'tz_button_dark');


/*-----------------------------------------------------------------------------------*/
/*	Alert Shortcodes
/*-----------------------------------------------------------------------------------*/

function tz_alert_white( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'style'    	 => 'white'
    ), $atts));
	$out = "<div class=\"alert white\">".do_shortcode($content)."</div>";
    return $out;
}
add_shortcode('alert-white', 'tz_alert_white');

function tz_alert_red( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'style'    	 => 'red'
    ), $atts));
	$out = "<div class=\"alert red\">".do_shortcode($content)."</div>";
    return $out;
}
add_shortcode('alert-red', 'tz_alert_red');

function tz_alert_orange( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'style'    	 => 'orange'
    ), $atts));
	$out = "<div class=\"alert orange\">".do_shortcode($content)."</div>";
    return $out;
}
add_shortcode('alert-orange', 'tz_alert_orange');

function tz_alert_green( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'style'    	 => 'green'
    ), $atts));
	$out = "<div class=\"alert green\">".do_shortcode($content)."</div>";
    return $out;
}
add_shortcode('alert-green', 'tz_alert_green');


/*-----------------------------------------------------------------------------------*/
/*	Callout Shortcodes
/*-----------------------------------------------------------------------------------*/

function tz_callout( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'title'    	 => 'Title goes here'
    ), $atts));
	$out = "<div class=\"callout_box\"><h4>".$title."</h4><div class=\"inner\">".do_shortcode($content)."</div><!--inner--></div><!--callout_box-->";
    return $out;
}
add_shortcode('callout', 'tz_callout');


/*-----------------------------------------------------------------------------------*/
/*	Toggle Shortcodes
/*-----------------------------------------------------------------------------------*/

function tz_toggle( $atts, $content = null ) {
	
    extract(shortcode_atts(array(
		'title'    	 => 'Title goes here',
		'state'		 => 'open'
    ), $atts));

	$out = '';
	
	$out .= "<div data-id='".$state."' class=\"toggle\"><h4>".$title."</h4><div class=\"toggle-inner\">".do_shortcode($content)."</div></div>";
	
    return $out;
	
}

add_shortcode('toggle', 'tz_toggle');


/*-----------------------------------------------------------------------------------*/
/*	Tabs Shortcodes
/*-----------------------------------------------------------------------------------*/

function tz_tabs( $atts, $content = null ) {
	extract(shortcode_atts(array(
    ), $atts));
	
	global $tab_counter_1;
	global $tab_counter_2;
	
	$tab_counter_1++;
	$tab_counter_2++;
	
	$out .= '<div class="clear"></div><div class="tabs"><div class="tab_wrap">';
	
	$out .= '<ul class="nav">';
	
	$count = 1;
	
	foreach ($atts as $tab) {
		if($count == 1){$first = 'first';}else{$first = '';}
		$out .= '<li class="'.$first.'"><a title="' .$tab. '" href="#tab-' . $tab_counter_1 . '">' .$tab. '</a></li>';
		$tab_counter_1++;
		$count++;
	}
	$out .= '</ul>';

	$out .= do_shortcode($content) .'</div><!--tab_wrap--></div><!--tabs-->';
	
	return $out;
	
}
add_shortcode('tabs', 'tz_tabs');


/*-----------------------------------------------------------------------------------*/
/*	Tab Panes Shortcodes
/*-----------------------------------------------------------------------------------*/

function tabpanes( $atts, $content = null ) {
	extract(shortcode_atts(array(
    ), $atts));
	
	global $tab_counter_2;
	
	$out .= '<div class="tab" id="tab-' . $tab_counter_2 . '"><div class="padder">' . do_shortcode($content) .'</div></div>';
	
	$tab_counter_2++;
	
	return $out;
}
add_shortcode('tab', 'tabpanes');


/*-----------------------------------------------------------------------------------*/
/*	Tour Shortcodes
/*-----------------------------------------------------------------------------------*/

function tz_tour( $atts, $content = null ) {
	extract(shortcode_atts(array(
    ), $atts));
	
	global $tour_counter_1;
	global $tour_counter_2;
	
	$out = '';
	
	$tour_counter_1++;
	$tour_counter_2++;
	
	$out .= '<div class="clear"></div><div class="tour"><div class="callout_box"><h4>'.stripslashes(get_option('tz_tour_header')).'</h4><div class="inner">';
	
	$out .= '<ul class="nav">';
	
	foreach ($atts as $tab) {
		$out .= '<li><a href="#tour-' . $tour_counter_1 . '">' .$tab. '<span></span></a></li>';
		$tour_counter_1++;
	}
	$out .= '</ul>';

	$out .= '</div><!--inner--></div><!--callout_box-->' .do_shortcode($content) .'<div class="clear"></div></div><!--tour-->';
	
	return $out;
	
}
add_shortcode('tour', 'tz_tour');


/*-----------------------------------------------------------------------------------*/
/*	Tour Shortcodes
/*-----------------------------------------------------------------------------------*/

function tourpanes( $atts, $content = null ) {
	extract(shortcode_atts(array(
    ), $atts));
    
    $out = '';
	
	global $tour_counter_2;
	
	$out .= '<div class="tab" id="tour-' . $tour_counter_2 . '">' . do_shortcode($content) .'</div>';
	
	$tour_counter_2++;
	
	return $out;
}
add_shortcode('tourtab', 'tourpanes');


/*-----------------------------------------------------------------------------------*/
/*	Table Shortcodes
/*-----------------------------------------------------------------------------------*/

function tz_smalltable( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
	$out = '';
    return $out;
}
add_shortcode('small table', 'tz_smalltable');

function tz_largetable( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
	$out = '';
    return $out;
}
add_shortcode('large table', 'tz_largetable');


/*-----------------------------------------------------------------------------------*/
/*	Column Shortcodes
/*-----------------------------------------------------------------------------------*/

function tz_one_third( $atts, $content = null ) {
   return '<div class="one_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'tz_one_third');

function tz_one_third_last( $atts, $content = null ) {
   return '<div class="one_third column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_third_last', 'tz_one_third_last');

function tz_two_third( $atts, $content = null ) {
   return '<div class="two_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third', 'tz_two_third');

function tz_two_third_last( $atts, $content = null ) {
   return '<div class="two_third column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('two_third_last', 'tz_two_third_last');

function tz_one_half( $atts, $content = null ) {
   return '<div class="one_half">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'tz_one_half');

function tz_one_half_last( $atts, $content = null ) {
   return '<div class="one_half column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_half_last', 'tz_one_half_last');

function tz_one_fourth( $atts, $content = null ) {
   return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'tz_one_fourth');

function tz_one_fourth_last( $atts, $content = null ) {
   return '<div class="one_fourth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_fourth_last', 'tz_one_fourth_last');

function tz_three_fourth( $atts, $content = null ) {
   return '<div class="three_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourth', 'tz_three_fourth');

function tz_three_fourth_last( $atts, $content = null ) {
   return '<div class="three_fourth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('three_fourth_last', 'tz_three_fourth_last');

function tz_one_fifth( $atts, $content = null ) {
   return '<div class="one_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fifth', 'tz_one_fifth');

function tz_one_fifth_last( $atts, $content = null ) {
   return '<div class="one_fifth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_fifth_last', 'tz_one_fifth_last');

function tz_two_fifth( $atts, $content = null ) {
   return '<div class="two_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_fifth', 'tz_two_fifth');

function tz_two_fifth_last( $atts, $content = null ) {
   return '<div class="two_fifth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('two_fifth_last', 'tz_two_fifth_last');

function tz_three_fifth( $atts, $content = null ) {
   return '<div class="three_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fifth', 'tz_three_fifth');

function tz_three_fifth_last( $atts, $content = null ) {
   return '<div class="three_fifth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('three_fifth_last', 'tz_three_fifth_last');

function tz_four_fifth( $atts, $content = null ) {
   return '<div class="four_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('four_fifth', 'tz_four_fifth');

function tz_four_fifth_last( $atts, $content = null ) {
   return '<div class="four_fifth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('four_fifth_last', 'tz_four_fifth_last');

function tz_one_sixth( $atts, $content = null ) {
   return '<div class="one_sixth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_sixth', 'tz_one_sixth');

function tz_one_sixth_last( $atts, $content = null ) {
   return '<div class="one_sixth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_sixth_last', 'tz_one_sixth_last');

function tz_five_sixth( $atts, $content = null ) {
   return '<div class="five_sixth">' . do_shortcode($content) . '</div>';
}
add_shortcode('five_sixth', 'tz_five_sixth');

function tz_five_sixth_last( $atts, $content = null ) {
   return '<div class="five_sixth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('five_sixth_last', 'tz_five_sixth_last');




?>