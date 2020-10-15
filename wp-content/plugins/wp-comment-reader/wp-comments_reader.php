<?php
   /*
   Plugin Name: WP Comments Reader 
   Description: plugin to read the MySQL DB comments table - GUTENBERG COMPATIBLE
   Version: 1.2
   Folder: wp-comments-reader
   Shortcode: [wp_comments_shortcode]
   Author: Mr. Chase
   License: GPL2
   */
   
  add_shortcode( 'wp_comments_shortcode', 'wp_comments_reader' );

function wp_comments_reader( $attributes ) {
	
	global $wpdb;
	
	$output = "";  //The output string
	
	$tableName =   $wpdb->prefix . "comments"; 
	 
	$result = $wpdb->get_results( "SELECT * FROM $tableName");  //<-- Uses $wpdb->prefix 

	$output .=  "<table border=\"1\">";
	$output .= "<tr>";
	$output .=  "<th>"  . "Comment Post ID" . "</th>" 
		. "<th>" . "Comment Author"  . "</th>" 
		. "<th>" . "Comment Date" . "</th>" 
		. "<th>" . "Comment Content" . "</th>";
	$output .=  "</tr>";

	foreach($result as $row)  {
	  $output .=  "<tr>";
	 
	   $output .=  "<td>" . $row->comment_post_ID . "</td>"
		        .  "<td>" . $row->comment_author . "</td>"
		        .  "<td>" . $row->comment_date . "</td>"
		        .  "<td>" . $row->comment_content  . "</td>";
		  
	   $output .=  "</tr>";
	}

	$output .=  "</table>";
	
	return $output;
}
?>