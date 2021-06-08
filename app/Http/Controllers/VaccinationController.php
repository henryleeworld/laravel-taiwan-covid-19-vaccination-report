<?php

namespace App\Http\Controllers;

use App\Services\VaccinationService;
use Illuminate\Http\Request;

class VaccinationController extends Controller
{

    private $vaccinationService;

    /**
     * Instantiate a new VaccinationController instance.
     *
     * @param VaccinationService $vaccinationService Vaccination service
     *
     * @return void
     */
    public function __construct(VaccinationService $vaccinationService)
    {
        $this->vaccinationService = $vaccinationService;
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
            return $this->vaccinationService->getDailyBreakdownByDistrictDataTable();
        }
        return view('daily-report');
    }
}
