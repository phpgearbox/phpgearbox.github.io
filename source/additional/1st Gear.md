Step 1: Install Composer
================================================================================
Okay if your a PHP developer and you don't know what composer is by now
_(which rock have been hiding under)_, seriously though checkout this link:
https://getcomposer.org/doc/00-intro.md

> NOTE: From now on I assume you know what composer is and how it works.
> I am not going to hold your hand the entire way.

Step 2: Choose your Gear
================================================================================
Like other **frameworks** _(this is not a framework)_ there is no single
package to install that gives you access to everything.
You need to work out what packages you need.

The reason behind this is that I often see projects that have say the entire
[Zend Framework](http://framework.zend.com/) installed when they are using only
one or two of the classes for example. _(Yes I am guilty of this myself)_

> NOTE: Obviously if one of the packages depends on another composer
> will take care of that for you. Thats what composer does.

Step 3: Install the Gear
================================================================================
You can see each gear in the left hand tree navigation.
Each gear contains a README, this will contain instructions on how to install.

However for the most part it's as simple as running the command:

```
composer require gears/XXX:*
```

_Where ```XXX``` denotes the name of the gear you wish to install._

