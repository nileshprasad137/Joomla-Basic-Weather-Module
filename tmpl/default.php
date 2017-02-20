<?php 
// No direct access
defined('_JEXEC') or die; ?>

<?php if(!empty($weather) && !empty($weather['temp'])): ?>
<div class="WeatherContainer">
	<div class="weather_city"><?php echo $weather['city']; ?></div>
	<div class="weather_temp"><?php echo $weather['temp']; ?>&deg;</div>    
	<div class="weather_description"><?php echo $weather['description']; ?></div>
	
</div>
<?php else: ?>
	<p class="weather-error">Unable to load weather results. Check your API Key and reload the page.</p>
<?php endif; ?>