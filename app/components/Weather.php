<?php
class Weather
{
    const API_URL = 'http://api.openweathermap.org/data/2.5/weather';
    const CACHE_DIR = __DIR__.'/../../var/cache/weather/';
    private $apiKey;
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }
    public function getWeatherByCity($city) {
        $param = [
            'q' => $city,
            'appid' => $this->apiKey,
        ];
        $url = self::API_URL . '?' . http_build_query($param);
        return $this->getResponse($url);
    }
    public function getWeatherByCoordinate() {
    }
    private function getResponse($url) {
        $cacheFile = self::CACHE_DIR.md5($url);
        if (file_exists($cacheFile) && time()-filemtime($cacheFile) <= 5) {
            $result = file_get_contents($cacheFile);
        } else {
            $result = @file_get_contents($url);
            if ($result) {
                $this->cacheWeather($result, $cacheFile);
            }
        }
        return json_decode($result, true);
    }
    private function cacheWeather($result, $cacheFile) {
        if (!file_exists(self::CACHE_DIR)) {
            mkdir(self::CACHE_DIR, 0777, true);
            chmod(self::CACHE_DIR, 0777);
        }
        file_put_contents($cacheFile, $result);
        chmod($cacheFile, 0777);
        Session::addFlash(Session::FLASH_SUCCESS, 'Файл закэшеирован');
    }
}
