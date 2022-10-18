<?php
/**
 * Plugin Name: Digital Business Card
 * Plugin URI: https://rndexperts.com/
 * Description: With this plugin you only need to install and then put your basic information and your business card is ready to view, You can share that link with any one and they can view your business card, So we can also call it MiniPocket Website or Paper Less Business Card. This is plugin is good fit for small, medium and large organization. This plugin using the Custom Post Type.
 * Author: RND Experts, Rajeev Kumar
 * Author URI: https://rndexperts.com/
 * Version: 1.3
 * Requires at least: 4.7.0
 * Text Domain: digi
 * Domain Path: /languages
 * Network: True
 *
 * Copyright (C) 2013-2021 RND Experts.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
 // Include main file
 require_once plugin_dir_path( __FILE__ ) . '/digi.php';
 new rnd_digi_business();