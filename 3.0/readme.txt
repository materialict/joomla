honkbalmuseum prerequisites
---------------------------
NOPE - install the dutch language
NOPE - Copy layouts/joomla/content/info_block/publish_date.php to templates/<your_template>/html/layouts/joomla/content/info_block/publish_date.php and edit as you like (you can copy modify_date.php and create_date.php as well). In your case it's sufficient to replace DATE_FORMAT_LC3 by DATE_FORMAT_LC1.
In the php.ini set :
	[intl]
	intl.default_locale = Dutch
