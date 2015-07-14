# Char-Limit

Wrap anything you want to be processed between the tag pairs.

	{exp:char_limit total="100" exact="no"}
		text you want processed
	{/exp:char_limit}

The "total" parameter lets you specify the number of characters.
The "exact" parameter will truncate the string exact to the "limit"
The "strip_tags" parameter will remove any HTML tags from the input string
The "force_elipses" parameter will add elipses to the output when exact is used and the result is trimmed

Note: When exact="no" this tag will always leave entire words intact so you may get a few additional characters than what you specify.

## Change Log

- 1.3
	- Add "force_elipses" parameter
- 1.2
	- Add "exact" parameter
- 1.1
	- Updated plugin to be 2.0 compatible
