<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
    public function getWeather()
    {
        $apiKey = '1fe5f03e8b679377cbc41601289edfdd'; // Gantilah dengan kunci API Anda
        $city = 'Ambon'; // Gantilah dengan kota yang diinginkan

        $client = new Client();

        $response = $client->get("https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey");
        $data = json_decode($response->getBody(), true);

        return view('weather', ['weather' => $data]);
    }
}
