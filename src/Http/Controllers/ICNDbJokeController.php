<?php

namespace Swapnilsarwe\NovaIcndbCard\Http\Controllers;

use ICNDb;

class ICNDbJokeController
{
    private $icndbClient;

    public function __construct()
    {
        $config = [];
        $this->icndbClient = new ICNDb\Client($config);
    }
    
    public function __invoke()
    {
        $response = $this->icndbClient->random()->exclude(config('icndb-card')['excluded_categories'])->get();
        return (count($response) > 0) ? $response[0]->joke : '';
    }
}
