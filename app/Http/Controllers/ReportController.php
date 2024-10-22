<?php

namespace App\Http\Controllers;

use App\Services\Report\ReportService;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function info(Request $request, ReportService $service)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Если конечная дата не указана, то устанавливаем её равной начальной дате
        if (!$endDate) {
            $endDate = $startDate;
        }

        // Генерация отчета за указанный период
        $report = $service->store($request->user(), $startDate, $endDate);

        return view('report.generate', compact('report'));
    }

}
