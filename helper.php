<?php
/**
 * Helper class for Weather module
 * 
 */
class ModWeather24x7Helper
{
    /**
     * returns weather results from OpenWeatherMap.com
     * @param  object $params parameters set in administrator
     * @return object        results found from OpenWeatherMap.com
     */
    public static function getWeather($params){
        
        $key = $params->get('key', '');   
        $city = $params->get('city', ''); 
        $temp_type = $params->get('temp_type','1');  
        
        if(!empty($key) && !empty($city))
           {
                $url = 'http://api.openweathermap.org/data/2.5/weather?q='.urlencode($city).'&APPID='.$key;
                $url_contents = file_get_contents($url);
                $weather = json_decode($url_contents,true);        
                $weather_description = $weather['weather'][0]['description'];
                $current_temp_kelvin = $weather['main']['temp'];
                $current_temp_celcius = round(($current_temp_kelvin - 273.15));
                $current_temp_fahrenheit = round((($current_temp_kelvin - 273.15) * 1.8) + 32);
                
                $weather['description'] = $weather_description;
                $weather['city'] = $city;
                if($temp_type==0)
                {
                    $weather['temp'] = $current_temp_celcius;
                }
                else if($temp_type==1)
                {
                    $weather->temp = $current_temp_fahrenheit;
                }
                
           }           
            return $weather;
        }    
    
}