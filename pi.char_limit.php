<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$plugin_info = array(
						'pi_name'			=> 'Character Limiter',
						'pi_version'		=> '1.1',
						'pi_author'			=> 'Rick Ellis',
						'pi_author_url'		=> 'http://expressionengine.com/',
						'pi_description'	=> 'Permits you to limit the number of characters in some text',
						'pi_usage'			=> Char_limit::usage()
					);

/**
 * Char_limit Class
 *
 * @package			ExpressionEngine
 * @category		Plugin
 * @author			ExpressionEngine Dev Team
 * @copyright		Copyright (c) 2004 - 2009, EllisLab, Inc.
 * @link			http://expressionengine.com/downloads/details/character_limiter/
 */

class Char_limit {

	var $return_data;

	
	/**
	 * Constructor
	 *
	 */
	function Char_limit($str = '')
	{
		$this->EE =& get_instance();

		$total = ( ! $this->EE->TMPL->fetch_param('total')) ? 500 :  $this->EE->TMPL->fetch_param('total');		
		$total = ( ! is_numeric($total)) ? 500 : $total;
		
		$str = ($str == '') ? $this->EE->TMPL->tagdata : $str;
				
 		$this->return_data = $this->EE->functions->char_limiter($str, $total);
	}

	// --------------------------------------------------------------------
	
	/**
	 * Usage
	 *
	 * Plugin Usage
	 *
	 * @access	public
	 * @return	string
	 */
	function usage()
	{
		ob_start(); 
		?>
		Wrap anything you want to be processed between the tag pairs.

		{exp:char_limit total="100"}

		text you want processed

		{/exp:char_limit}

		The "total" parameter lets you specify the number of characters.

		Note: This tag will always leave entire words intact so you may get a few additional characters than what you specify.  

		Version 1.1
		******************
		- Updated plugin to be 2.0 compatible

		<?php
		$buffer = ob_get_contents();
	
		ob_end_clean(); 

		return $buffer;
	}
	
	// --------------------------------------------------------------------

}
// END CLASS

/* End of file pi.char_limit.php */
/* Location: ./system/expressionengine/char_limit/pi.char_limit.php */