
<?php
 
// No direct access
defined('_JEXEC') or die;
//Include Helper
require_once dirname(__FILE__) . '/helper.php';
$document = JFactory::getDocument();
$document->addStyleSheet(JUri::base() . '/modules/mod_weather24x7/css/weather.css');
$weather = modWeather24x7Helper::getWeather($params);
require JModuleHelper::getLayoutPath('mod_weather24x7');