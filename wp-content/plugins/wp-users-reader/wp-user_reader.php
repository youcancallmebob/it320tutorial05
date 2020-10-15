<?php
   /*
   Plugin Name: WP Users Reader 
   Description: plugin to read the MySQL DB Users table - GUTENBERG COMPATIBLE
   Version: 1.0
   Folder: wp-users-reader
   Shortcode: [wp_users_shortcode]
   Author: Mr. Chase
   License: GPL2
   */
   
  add_shortcode( 'wp_users_shortcode', 'wp_users_reader' );

function wp_users_reader( $attributes ) {
	
	global $wpdb;
	
	$output = "";  //The output string
	
	$tableName =   $wpdb->prefix . "users"; 
	 
	$result = $wpdb->get_results( "SELECT * FROM $tableName");  //<-- Uses $wpdb->prefix 

	$output .=  "<table border=\"1\">";
	$output .= "<tr>";
	$output .=  "<th>"  . "ID" . "</th>" 
		. "<th>" . "Login"  . "</th>" 
		. "<th>" . "Nickname" . "</th>" 
        . "<th>" . "Email" . "</th>"
        . "<th>" . "Status" . "</th>" 
		. "<th>" . "DisplayName" . "</th>";
	$output .=  "</tr>";

	foreach($result as $row)  {
	  $output .=  "<tr>";
	 
	   $output .=  "<td>" . $row->user_login . "</td>"
		        .  "<td>" . $row->user_nicename . "</td>"
                .  "<td>" . $row->user_email . "</td>"
		        .  "<td>" . $row->user_status . "</td>"
		        .  "<td>" . $row->display_name  . "</td>";
		  
	   $output .=  "</tr>";
	}

	$output .=  "</table>";
	
	return $output;
}
?>