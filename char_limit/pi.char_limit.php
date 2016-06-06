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
		$total = ( ! ee()->TMPL->fetch_param('total')) ? 500 :  ee()->TMPL->fetch_param('total');
		$total = ( ! is_numeric($total)) ? 500 : $total;

		//exact truncation
		$exact = ee()->TMPL->fetch_param('exact', 'no');
		$strip_tags = ee()->TMPL->fetch_param('strip_tags', 'no');
		$force_ellipses = ee()->TMPL->fetch_param('force_ellipses', 'no');

		$str = ($str == '') ? ee()->TMPL->tagdata : $str;

		if ($strip_tags == 'yes')
		{
			$str = strip_tags($str);
		}

		if (in_array($exact, array('yes', 'y')))
		{
			if ((strlen($str) > $total) AND in_array($force_ellipses, array('yes', 'y')))
			{
				$str = trim(substr($str, 0, $total)).'&#8230;';
			}
			else
			{
				$str = substr($str, 0, $total);
			}
		}
		else
		{
			$str = ee()->functions->char_limiter($str, $total);
		}

 		$this->return_data = $str;
	}
}
// END CLASS

/* End of file pi.char_limit.php */
/* Location: ./system/user/addons/char_limit/pi.char_limit.php */
