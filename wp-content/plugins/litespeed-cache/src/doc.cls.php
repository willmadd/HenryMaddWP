<?php
/**
 * The Doc class.
 *
 * @since     	2.2.7
 * @package    	LiteSpeed
 * @subpackage 	LiteSpeed/src
 * @author     	LiteSpeed Technologies <info@litespeedtech.com>
 */
namespace LiteSpeed ;

defined( 'WPINC' ) || exit ;

class Doc
{
	// protected static $_instance ;

	/**
	 * Privacy policy
	 *
	 * @since 2.2.7
	 * @access public
	 */
	public static function privacy_policy()
	{
		return __( 'This site utilizes caching in order to facilitate a faster response time and better user experience. Caching potentially stores a duplicate copy of every web page that is on display on this site. All cache files are temporary, and are never accessed by any third party, except as necessary to obtain technical support from the cache plugin vendor. Cache files expire on a schedule set by the site administrator, but may easily be purged by the admin before their natural expiration, if necessary.', 'litespeed-cache' ) ;
	}


	/**
	 * Learn more link
	 *
	 * @since  2.4.2
	 * @access public
	 */
	public static function learn_more( $url )
	{
		return ' <a href="' . $url . '" target="_blank" class="litespeed-learn-more">' . __( 'Learn More', 'litespeed-cache' ) . '</a>' ;
	}

	/**
	 * One per line
	 *
	 * @since  3.0
	 * @access public
	 */
	public static function one_per_line()
	{
		echo __( 'One per line.', 'litespeed-cache' ) ;
	}

	/**
	 * Notice to edit .htaccess
	 *
	 * @since  3.0
	 * @access public
	 */
	public static function notice_htaccess()
	{
		echo '<font class="litespeed-warning">' ;
		echo '⚠️ ' . __( 'This setting will edit the .htaccess file.', 'litespeed-cache' ) ;
		echo ' <a href="https://docs.litespeedtech.com/lscache/lscwp/toolbox/#edit-htaccess-tab" target="_blank" class="litespeed-learn-more">' . __( 'Learn More', 'litespeed-cache' ) . '</a>' ;
		echo '</font>' ;
	}

	/**
	 * Notice for whitelist IPs
	 *
	 * @since  3.0
	 * @access public
	 */
	public static function notice_ips()
	{
		echo '<div class="litespeed-warning">';
		echo '⚠️ ' . __( 'For online services to work correctly, you must whitelist all online server IPs.', 'litespeed-cache' ) . '<br/>';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . __( 'Before generating key, please verify all IPs on this list are whitelisted', 'litespeed-cache' ) . ': ';
		echo '<a href="' . Cloud::CLOUD_SERVER . '/ips" target="_blank">' . __( 'Current Online Server IPs', 'litespeed-cache' ) . '</a>';
		echo '</div>';
	}

}