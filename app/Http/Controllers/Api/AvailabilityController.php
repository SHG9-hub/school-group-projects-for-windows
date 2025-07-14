<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Holiday;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AvailabilityController extends Controller
{
    public function getAvailableSlots(Request $request)
    {
        $request->validate([
            'date' => 'required|date|after_or_equal:today'
        ]);

        $date = Carbon::parse($request->date);

        // 日曜日チェック
        if ($date->isSunday()) {
            return response()->json([
                'available' => false,
                'message' => '日曜日は定休日です',
                'slots' => []
            ]);
        }

        // 休診日チェック
        $isHoliday = Holiday::where('holiday_date', $date->format('Y-m-d'))->exists();
        if ($isHoliday) {
            $holiday = Holiday::where('holiday_date', $date->format('Y-m-d'))->first();
            return response()->json([
                'available' => false,
                'message' => '休診日です' . ($holiday->description ? ': ' . $holiday->description : ''),
                'slots' => []
            ]);
        }

        // 営業時間のスロット
        $timeSlots = [
            '09:00', '10:00', '11:00', // 午前
            '14:00', '15:00', '16:00', '17:00' // 午後
        ];

        $availableSlots = [];
        foreach ($timeSlots as $time) {
            $datetime = Carbon::parse($date->format('Y-m-d') . ' ' . $time);
            
            // 過去の時間はスキップ
            if ($datetime < now()) {
                continue;
            }

            // 既存の予約チェック
            $isBooked = Reservation::where('reservation_datetime', $datetime)->exists();
            
            $availableSlots[] = [
                'time' => $time,
                'available' => !$isBooked,
                'datetime' => $datetime->format('Y-m-d H:i:s')
            ];
        }

        return response()->json([
            'available' => count(array_filter($availableSlots, fn($slot) => $slot['available'])) > 0,
            'date' => $date->format('Y-m-d'),
            'slots' => $availableSlots
        ]);
    }

    public function getCalendarData(Request $request)
    {
        $request->validate([
            'month' => 'required|date_format:Y-m'
        ]);

        $month = Carbon::parse($request->month . '-01');
        $startDate = $month->copy()->startOfMonth();
        $endDate = $month->copy()->endOfMonth();

        // 休診日を取得
        $holidays = Holiday::whereBetween('holiday_date', [$startDate, $endDate])
            ->pluck('holiday_date')
            ->map(fn($date) => Carbon::parse($date)->format('Y-m-d'))
            ->toArray();

        // 既存の予約日を取得
        $reservedDates = Reservation::whereBetween('reservation_datetime', [$startDate, $endDate])
            ->selectRaw('DATE(reservation_datetime) as date, COUNT(*) as count')
            ->groupBy('date')
            ->pluck('count', 'date')
            ->toArray();

        $calendarData = [];
        $current = $startDate->copy();

        while ($current <= $endDate) {
            $dateStr = $current->format('Y-m-d');
            $isHoliday = in_array($dateStr, $holidays) || $current->isSunday();
            $reservationCount = $reservedDates[$dateStr] ?? 0;
            $maxSlots = 7; // 1日の最大予約枠数

            $calendarData[] = [
                'date' => $dateStr,
                'day' => $current->format('j'),
                'dayOfWeek' => $current->format('w'),
                'isHoliday' => $isHoliday,
                'isPast' => $current < now()->startOfDay(),
                'reservationCount' => $reservationCount,
                'hasAvailability' => !$isHoliday && $reservationCount < $maxSlots && $current >= now()->startOfDay()
            ];

            $current->addDay();
        }

        return response()->json([
            'month' => $month->format('Y-m'),
            'data' => $calendarData
        ]);
    }
}
