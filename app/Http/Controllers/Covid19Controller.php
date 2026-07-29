<?php

namespace App\Http\Controllers;

use App\Http\Integrations\Covid19\Covid19Connector;
use Illuminate\Http\Request;

class Covid19Controller extends Controller
{
    /**
     * Instantiate a new Covid19Controller instance.
     */
    public function __construct(private Covid19Connector $covid19Connector)
    {
    }

    /**
     * Create daily breakdown by district dashboard.
     */
    public function showDailyBreakdownByDistrict()
    {
        return view('daily-report');
    }

    /**
     * Get daily breakdown by district data.
     */
    public function getDailyBreakdownByDistrictData(Request $request)
    {
        if ($request->ajax()) {
            return $this->covid19Connector->getDailyBreakdownByDistrictDataTable();
        }
        return view('daily-report');
    }
}
