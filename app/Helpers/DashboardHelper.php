<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Collection;

class DashboardHelper
{
    /**
     * Generate the last N months and merge them with provided month-count data.
     *
     * @param Collection $data E.g. ['2025-04' => 3, '2025-02' => 5]
     * @param int $monthsBack Number of months back to include (default: 6)
     * @return array ['months' => [...], 'totals' => [...]]
     */
    public static function generateMonthlyStats(Collection $data, int $monthsBack = 6): array
    {
        $monthsList = collect(range(0, $monthsBack - 1))->map(function ($i) {
            return Carbon::now()->subMonths($i)->format('Y-m');
        })->reverse()->values();

        $totals = $monthsList->map(fn($month) => $data[$month] ?? 0)->values();

        return [
            'months' => $monthsList->toArray(),
            'totals' => $totals->toArray()
        ];
    }
}
