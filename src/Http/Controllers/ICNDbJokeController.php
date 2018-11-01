<?php

namespace Swapnilsarwe\NovaIcndbCard\Http\Controllers;

use ICNDb;

class ICNDbJokeController
{
    private $icndbClient;
    private $config;

    public function __construct()
    {
        $this->config = config('icndb-card');
        $nameToUse = $this->config['name_to_use'];
        $config = [
            'firstName' => array_get($nameToUse, 'first_name', 'Chuck'),
            'lastName' => array_get($nameToUse, 'last_name', 'Norris'),
        ];
        $this->icndbClient = new ICNDb\Client($config);
    }
    
    public function __invoke()
    {
        $response = $this->icndbClient->random()->exclude($this->config['excluded_categories'])->get();
        return (count($response) > 0) ? $response[0]->joke : '';
    }
}
