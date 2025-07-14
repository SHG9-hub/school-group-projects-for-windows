<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        $query = Reservation::with('user');

        if ($request->filled('date')) {
            $query->whereDate('reservation_datetime', $request->date);
        }

        if ($request->filled('user_name')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->user_name . '%');
            });
        }

        $reservations = $query->orderBy('reservation_datetime', 'desc')->paginate(15);

        return view('admin.reservations.index', compact('reservations'));
    }

    public function create()
    {
        $users = User::orderBy('name')->get();
        return view('admin.reservations.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'reservation_date' => 'required|date|after_or_equal:today',
            'reservation_time' => 'required',
        ]);

        $datetime = Carbon::parse($request->reservation_date . ' ' . $request->reservation_time);

        $existing = Reservation::where('reservation_datetime', $datetime)->first();
        if ($existing) {
            return back()->withErrors(['reservation_time' => 'この時間は既に予約が入っています。']);
        }

        Reservation::create([
            'user_id' => $request->user_id,
            'reservation_datetime' => $datetime,
        ]);

        return redirect()->route('admin.reservations.index')
            ->with('success', '予約を作成しました。');
    }

    public function show(Reservation $reservation)
    {
        $reservation->load('user');
        return view('admin.reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        $users = User::orderBy('name')->get();
        return view('admin.reservations.edit', compact('reservation', 'users'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'reservation_date' => 'required|date',
            'reservation_time' => 'required',
        ]);

        $datetime = Carbon::parse($request->reservation_date . ' ' . $request->reservation_time);

        $existing = Reservation::where('reservation_datetime', $datetime)
            ->where('id', '!=', $reservation->id)
            ->first();
        if ($existing) {
            return back()->withErrors(['reservation_time' => 'この時間は既に予約が入っています。']);
        }

        $reservation->update([
            'user_id' => $request->user_id,
            'reservation_datetime' => $datetime,
        ]);

        return redirect()->route('admin.reservations.index')
            ->with('success', '予約を更新しました。');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('admin.reservations.index')
            ->with('success', '予約を削除しました。');
    }
}
