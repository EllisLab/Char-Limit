<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
Copyright (C) 2016 EllisLab, Inc.

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


/**
 * Char_limit Class
 *
 * @package			ExpressionEngine
 * @category		Plugin
 * @author			EllisLab
 * @copyright		Copyright (c) 2004 - 2015, EllisLab, Inc.
 * @link			https://github.com/EllisLab/Char-Limit
 */

class Char_limit {

	var $return_data;


	/**
	 * Constructor
	 *
	 */
	function __construct($str = '')
	{
		$this->EE =& get_instance();

		$total = ( ! $this->EE->TMPL->fetch_param('total')) ? 500 :  $this->EE->TMPL->fetch_param('total');
		$total = ( ! is_numeric($total)) ? 500 : $total;

		//exact truncation
		$exact = $this->EE->TMPL->fetch_param('exact', 'no');

		$str = ($str == '') ? $this->EE->TMPL->tagdata : $str;

 		$this->return_data = in_array($exact, array('yes', 'y')) ? substr($str, 0, $total) : $this->EE->functions->char_limiter($str, $total);
	}

}
// END CLASS

/* End of file pi.char_limit.php */
/* Location: ./system/user/addons/char_limit/pi.char_limit.php */
