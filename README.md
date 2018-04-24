# EnlightenedTitle - MediaWiki extension

Improve HTML `<title>` tag and `<h1>` tag output of MediaWiki. Better for SEO and readability.

## Design & Thinking

MediaWiki provides a configuration to change `<title>` of pages. For example:

* MediaWiki:Pagetitle (all pages)
  ```
  $1 - RabbitWiki, world of rabbits and bunnies
  ```
* MediaWiki:Pagetitle-view-main-page (only main page)
  ```
  RabbitWiki, world of rabbits and bunnies
  ```

`$1` is the page name, which cannot be changed. For example:

> Help:Image/How to upload

Page titles of subpages and namespaces are not good for SEO and reading.

### HTML Title

We want to convert `<title>` from:

> Help:Image/How to upload - RabbitWiki, world of rabbits and bunnies

to

> How to upload - Image - Help - RabbitWiki, world of rabbits and bunnies

### First Heading & Subpages

And convert first heading and subpages from:

> # Help:Image/How to upload
>
> [&lt;](#) | [Help:Image](#)

to

> [Home](#) / [Help](#) / [Image](#) / **How to upload**
>
> # How to upload

## Installation

```bash
cd path/to/wiki/extensions/
git pull git@github.com:guoyunhe/mediawiki-extension-EnlightenedTitle.git EnlightenedTitle
```

Edit LocalSettings.php and this line:

```php
<?php

...

wfLoadExtension( 'EnlightenedTitle' );

...
```

> How to upload | Image | Help - RabbitWiki, world of rabbits and bunnies

## Configuration

Add following code to LocalSettings.php to change default behavior of the extension.

### $wgEnlightenedTitleHTMLTitleSeparator `string`

Separator between subpages and namespace in HTML `<title>`. Default value is `' - '`.

```php
<?php

...

$wgEnlightenedTitleHTMLTitleSeparator = ' | ';

...
```

### $wgEnlightenedTitleHTMLTitleReverse `boolean`

Whether to reverse the order of subpages and namespace in HTML `<title>`. Default
value is `true`.

```php
<?php

...

$wgEnlightenedTitleHTMLTitleReverse = false;

...
```

> Help - Image - How to upload - RabbitWiki, world of rabbits and bunnies

## Copyright

2018 Guo Yunhe.

## License

GNU General Public License version 3 or later.
