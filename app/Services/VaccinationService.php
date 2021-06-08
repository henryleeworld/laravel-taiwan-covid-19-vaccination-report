<?php

namespace App\Services;

use Carbon\Carbon;
use GuzzleHttp\Client;

class VaccinationService
{
    /**
     * @var client
     */
    protected $client;

    /**
     * Instantiate a new VaccinationService instance.
     *
     * @param Client $client Client
     *
     * @return void
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Make Http request.
     *
     * @return mixed
     */
    private function makeHttpRequest($url)
    {
        $response = $this->client->request('GET', $url, [
            'curl' => [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSLVERSION     => CURL_SSLVERSION_TLSv1_2,
            ],
        ]);
        return json_decode((string) $response->getBody(), true);
    }

    /**
     * Get daily data table
     *
     * @return string
     */
    public function getDailyBreakdownByDistrictDataTable()
    {
            $vaccination = $this->makeHttpRequest(config('client.daily_breakdown_vaccination_by_district_url'));
            $vaccination = $vaccination['data'];
            return datatables()->of($vaccination)
                               ->editColumn('a01', function ($vaccination) {
                                   return Carbon::parse($vaccination['a01'])->format('Y-m-d');
                               })
                               ->rawColumns(['id', 'a01', 'a02', 'a03', 'a04', 'a05', 'a06', 'a07', 'a08', 'a09'])->toJson();
    }
}
