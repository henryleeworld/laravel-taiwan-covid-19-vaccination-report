<?php

namespace App\Http\Controllers;

use App\Http\Integrations\Covid_19\Covid19Connector;
use Illuminate\Http\Request;

class Covid19Controller extends Controller
{

    private $covid19Connector;

    /**
     * Instantiate a new Covid19Controller instance.
     *
     * @param Covid19Connector $covid19Connector COVID-19 connector
     *
     * @return void
     */
    public function __construct(Covid19Connector $covid19Connector)
    {
        $this->covid19Connector = $covid19Connector;
    }

    /**
     * Create daily breakdown by district dashboard.
     *
     * @return void
     */
    public function showDailyBreakdownByDistrict()
    {
        return view('daily-report');
    }

    /**
     * Get daily breakdown by district data
     *
     * @param Request $request Request
     *
     * @return string | \Illuminate\Contracts\Support\Renderable
     */
    public function getDailyBreakdownByDistrictData(Request $request)
    {
        if ($request->ajax()) {
            return $this->covid19Connector->getDailyBreakdownByDistrictDataTable();
        }
        return view('daily-report');
    }
}
