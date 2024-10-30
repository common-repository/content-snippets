<?php
/*
Plugin Name: Content Snippets
Plugin URI:
Description: Create reusable snippets of content that can be inserted into any page or post
Version: 1.0.0
Author: Room 34 Creative Services, LLC
Author URI: http://room34.com
Text Domain: content-snippets
License: GPL2
*/

/*  Copyright 2017 Room 34 Creative Services, LLC (email: info@room34.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as 
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Don't load directly
if (!defined('ABSPATH')) { exit; }

// Load plugin classes
require_once(dirname(__FILE__) . '/class-r34-snippet.php');

// Instantiate
add_action('init', function() {
	global $R34Snippet;
	$R34Snippet = new R34Snippet();
});

// Resolve Select2 conflict between Shortcake (Shortcode UI) and ACF
add_action('init', function() { define('SELECT2_NOCONFLICT', true); }, 1);

// Flush rewrite rules on activation
register_activation_hook(__FILE__, function() { flush_rewrite_rules(); });
