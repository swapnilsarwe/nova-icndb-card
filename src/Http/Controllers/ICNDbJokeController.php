<?php

namespace Swapnilsarwe\NovaIcndbCard\Http\Controllers;

use Illuminate\Support\Arr;
use Swapnilsarwe\ICNDbClient;

class ICNDbJokeController
{
    private $icndbClient;
    private $config;
    private $firstName;
    private $lastName;

    public function __construct()
    {
        $this->config = config('icndb-card');
        $nameToUse = $this->config['name_to_use'];
        $this->firstName = Arr::get($nameToUse, 'first_name', 'Chuck');
        $this->lastName = Arr::get($nameToUse, 'last_name', 'Norris');
        $config = [
            'firstName' => $this->firstName,
            'lastName'  => $this->lastName,
        ];
        $this->icndbClient = new ICNDbClient($config);
    }

    public function __invoke()
    {
        $url = url()->current();
        if (ends_with($url, 'random')) {
            $response = $this->icndbClient->random()->exclude($this->config['excluded_categories'])->get();

            return (count($response) > 0) ? $response[0]->joke : '';
        }
        if (ends_with($url, 'getName')) {
            return [
                'firstName' => $this->firstName,
                'lastName'  => $this->lastName,
            ];
        }
        abort(404);
    }
}
