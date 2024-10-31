<?php

	/*
	 	* Plugin Name: Real Seguro Viagem
	 	* Plugin URI:  http://wordpress.org/plugins/seguro-viagem
	 	* Description: O Plugin da Real Seguro Viagem permite que você adicione nossa ferramenta comparativa de seguro viagem - um hotsite - ao seu site wordpress e aumente seus lucros.
	 	* Version:     2.0.5
	 	* Author:      Real Seguro Viagem
	 	* Author URI:  https://www.seguroviagem.srv.br/
	 	* License:     GPLv2 or later
		* License URI: http://www.gnu.org/licenses/gpl-2.0.txt
		* Domain Path: languages/
	 	* Text Domain: seguro-viagem
	 	*
	 	*
	 	* License:
	 	* ==============================================================================
	 	* Copyright 2024 Real Seguro Viagem 
	 	* Hints, maintain updates in 2024 from Real Seguro Viagem 
	 	*
	 	* This program is free software; you can redistribute it and/or modify
	 	* it under the terms of the GNU General Public License as published by
	 	* the Free Software Foundation; either version 3 of the License, or
	 	* (at your option) any later version.
	 	*
	 	* This program is distributed in the hope that it will be useful,
	 	* but WITHOUT ANY WARRANTY; without even the implied warranty of
	 	* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	 	* GNU General Public License for more details.
	 	*
	 	* You should have received a copy of the GNU General Public License
	 	* along with this program; if not, write to the Free Software
	 	* Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
		*
	*/
	
	// Make sure WordPress is loaded
	if( !defined('ABSPATH') ) { exit; }
	if( !defined('WP_URL_PLUGIN') ){
	  define('WP_URL_PLUGIN', untrailingslashit( dirname( __FILE__ ) ) );
	}

	// Assert WordPress Version
	if ( get_bloginfo("version") < 3.5 ) {
	  die("Wordpress must be or above version 3.5");
	}

	// Includes
	include WP_URL_PLUGIN . '/class/TI_PublicVars.php';
	include WP_URL_PLUGIN . '/class/TI_Strings.php';
	include WP_URL_PLUGIN . '/class/TI_Template.php';
	include WP_URL_PLUGIN . '/class/TI_TravelInsurance.php';
	

	use RTI\TI_TravelInsurance as RTI;

	function travelinsurance_load_textdomain() {
	  load_plugin_textdomain( 'travel-insurance', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 
	}

	function TI_TravelInsurance_Instantiate() {
	  new RTI( plugin_dir_url(__FILE__) );
	}

	add_action( 'plugins_loaded', 'travelinsurance_load_textdomain' );
	add_action( 'plugins_loaded', 'TI_TravelInsurance_Instantiate', 1 );