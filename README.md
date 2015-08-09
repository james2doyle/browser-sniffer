Browser Sniffer Class
=====================

A very simple class that takes in a user agent string and returns the browser name (Firefox, Chrome, Opera, etc.) and also the Operating System (Mac, Windows, Android, etc.).

### Install

It is recommended that you install the PHP Browser library [through composer](http://getcomposer.org/). To do so, add the following lines to your `composer.json` file.

```json
{
    "require": {
        "james2doyle/browser-sniffer": "dev-master"
    }
}
```

### Reasons

Firstly, you *should not* use browser sniffing for feature detection, [use Modernizr](http://modernizr.com/).

We mainly use this for style tweaks between different browsers, or sometimes you may need to add a little script (differences in keystroke handling can be difficult to feature detect) or tweak on a specific platform combination and so you might do a check to see if that makes sense.

The results are pretty crude. We only return `internet-explorer` if IE is found. There is *no version information*.

For the platform, we only return that operation system. This means all iOS devices (iPad, iPhone, iPod) would only return `ios`. If you need to know specifics about the device, [use media queries](http://stephen.io/mediaqueries/).

### Results

The information returned is all *class* safe. This package should primarily be used to add additional classes to the `<body>` or `<html>` tag of a template. That is the reason is was made.

### Support

**Platforms**

* Linux
* IOS
* Mac
* Windows
* Windows Phone
* Android
* Blackberry

**Browsers**

* MSIE
* Trident
* Edge
* Vivaldi
* Firefox
* Chrome
* Opera
* Opera Mini
* Safari

### Usage

```php
<?php
$browser = new Browser($_SERVER['HTTP_USER_AGENT']);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Browser Class</title>
  <style type="text/css" media="screen">
    body.google-chrome.mac {
      background: red;
    }
  </style>
</head>
<body class="<?php echo $browser->fullClass() ?>">
  <div class="content">
    <p><?php echo $browser->getBrowser().' '.$browser->getPlatform() ?></p>
    <pre><?php var_dump($browser->getResults()); ?></pre>
  </div>
</body>
</html>
```

Results for *Chrome on a Macbook*:

```html
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Browser Class</title>
  <style type="text/css" media="screen">
    body.google-chrome.mac {
      background: red;
    }
  </style>
</head>
<body class="google-chrome mac">
  <div class="content">
    <p>google-chrome mac</p>
    <pre>array(3) {
      ["ua"]=>
      string(120) "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.35 Safari/537.36"
      ["platform"]=>
      string(3) "mac"
      ["browser"]=>
      string(13) "google-chrome"
    }</pre>
  </div>
</body>
</html>
```

This page would only have a red background is someone was looking at the page using a Mac (desktop or laptop) with Google Chrome.