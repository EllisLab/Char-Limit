# Char-Limit

Wrap anything you want to be processed between the tag pairs.

    {exp:char_limit total="100" exact="no"}

        text you want processed

    {/exp:char_limit}

The "total" parameter lets you specify the number of characters.
The "exact" parameter will truncate the string exact to the "limit"

Note: When exact="no" this tag will always leave entire words intact so you may get a few additional characters than what you specify.

## Change Log

- Version 1.2
    - Add "exact" parameter
- Version 1.1
    - Updated plugin to be 2.0 compatible
