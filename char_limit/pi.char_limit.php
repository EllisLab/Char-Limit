<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
Copyright (C) 2011 EllisLab, Inc.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
ELLISLAB, INC. BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

Except as contained in this notice, the name of EllisLab, Inc. shall not be
used in advertising or otherwise to promote the sale, use or other dealings
in this Software without prior written authorization from EllisLab, Inc.
*/


$plugin_info = array(
						'pi_name'			=> 'Character Limiter',
						'pi_version'		=> '1.2',
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
 * @copyright		Copyright (c) 2004 - 2011, EllisLab, Inc.
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

		//exact truncation
		$exact = $this->EE->TMPL->fetch_param('exact', 'no');
		
		$str = ($str == '') ? $this->EE->TMPL->tagdata : $str;
				
 		$this->return_data = in_array($exact, array('yes', 'y')) ? substr($str, 0, $total) : $this->EE->functions->char_limiter($str, $total);
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

		{exp:char_limit total="100" exact="no"}

		text you want processed

		{/exp:char_limit}

		The "total" parameter lets you specify the number of characters.
		The "exact" parameter will truncate the string exact to the "limit"

		Note: When exact="no" this tag will always leave entire words intact so you may get a few additional characters than what you specify.  

		Version 1.2
		******************
		- Add "exact" parameter

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