WPREMCountdown
==============

Wordpress Plugin to display a countdown and different messages (depending on choosen date and time) 

HOWTO INSTALL PLUGIN
====================

Copy REMCountdown directory to your wp-content/plugins/ directory.
Add the following line wherever you want it to be displayed (in your theme, go to wp-content/themes/<yourtheme>/) : 
```php
<?php if(function_exists(rem_countdown_display))rem_countdown_display()?>
```

Then go to the Wordpress plugins administration page, activate the plugin and configure it.
