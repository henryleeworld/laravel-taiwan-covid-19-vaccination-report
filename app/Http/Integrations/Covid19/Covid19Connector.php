<?php

namespace App\Http\Integrations\Covid19;

use GuzzleHttp\Client;
use Illuminate\Support\Carbon;

class Covid19Connector
{
    /**
     * Instantiate a new Covid19Connector instance.
     */
    public function __construct(protected Client $client)
    {
    }

    /**
     * Make Http request.
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
     */
    public function getDailyBreakdownByDistrictDataTable(): string
    {
            $vaccination = $this->makeHttpRequest(config('services.covid_19.url.daily_breakdown_vaccination_by_district'));
            $vaccination = $vaccination['data'];
            return datatables()->of($vaccination)
                               ->editColumn('a01', function ($vaccination) {
                                   return Carbon::parse($vaccination['a01'])->format('Y-m-d');
                               })
                               ->rawColumns(['id', 'a01', 'a02', 'a03', 'a04', 'a05', 'a06', 'a07', 'a08', 'a09', 'a10', 'a11'])->toJson();
    }
}
