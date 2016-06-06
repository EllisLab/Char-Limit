# Char-Limit

Wrap anything you want to be processed between the tag pairs.

	{exp:char_limit total="100" exact="no"}
		text you want processed
	{/exp:char_limit}

The "total" parameter lets you specify the number of characters.
The "exact" parameter will truncate the string exact to the "limit"

Note: When exact="no" this tag will always leave entire words intact so you may get a few additional characters than what you specify.

## Change Log

- 2.0
	- Updated plugin to be 3.0 compatible
- 1.2
	- Add "exact" parameter
- 1.1
	- Updated plugin to be 2.0 compatible

## License

Copyright (C) 2004 - 2016 EllisLab, Inc.

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL ELLISLAB, INC. BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

Except as contained in this notice, the name of EllisLab, Inc. shall not be used in advertising or otherwise to promote the sale, use or other dealings in this Software without prior written authorization from EllisLab, Inc.
