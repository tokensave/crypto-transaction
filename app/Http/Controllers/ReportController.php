<?php

namespace App\Http\Controllers;

use App\Services\Report\ReportService;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function info(Request $request, ReportService $service)
    {
        $date = $request->input('date');

        $report = $service->store($request->user(), $date);

        return view('report.generate', compact('report'));
    }

}
