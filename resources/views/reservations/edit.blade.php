<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('予約変更') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- 現在の予約情報 -->
                    <div class="mb-8 p-4 bg-blue-50 rounded-lg">
                        <h3 class="text-lg font-medium text-blue-900 mb-2">現在の予約</h3>
                        <p class="text-blue-800">
                            {{ $reservation->reservation_datetime->format('Y年n月j日 (D) H:i') }}
                        </p>
                    </div>

                    <form method="POST" action="{{ route('reservations.update', $reservation) }}">
                        @csrf
                        @method('PUT')

                        <!-- 予約日 -->
                        <div class="mb-6">
                            <label for="reservation_date" class="block text-sm font-medium text-gray-700">新しい予約日</label>
                            <input type="text" name="reservation_date" id="reservation_date" 
                                value="{{ old('reservation_date', $reservation->reservation_datetime->format('Y-m-d')) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="日付を選択してください">
                            <x-input-error :messages="$errors->get('reservation_date')" class="mt-2" />
                        </div>

                        <!-- 予約時間 -->
                        <div class="mb-6">
                            <label for="reservation_time" class="block text-sm font-medium text-gray-700">新しい予約時間</label>
                            <select name="reservation_time" id="reservation_time" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">時間を選択してください</option>
                                <optgroup label="午前">
                                    <option value="09:00" {{ old('reservation_time', $reservation->reservation_datetime->format('H:i')) == '09:00' ? 'selected' : '' }}>09:00</option>
                                    <option value="10:00" {{ old('reservation_time', $reservation->reservation_datetime->format('H:i')) == '10:00' ? 'selected' : '' }}>10:00</option>
                                    <option value="11:00" {{ old('reservation_time', $reservation->reservation_datetime->format('H:i')) == '11:00' ? 'selected' : '' }}>11:00</option>
                                </optgroup>
                                <optgroup label="午後">
                                    <option value="14:00" {{ old('reservation_time', $reservation->reservation_datetime->format('H:i')) == '14:00' ? 'selected' : '' }}>14:00</option>
                                    <option value="15:00" {{ old('reservation_time', $reservation->reservation_datetime->format('H:i')) == '15:00' ? 'selected' : '' }}>15:00</option>
                                    <option value="16:00" {{ old('reservation_time', $reservation->reservation_datetime->format('H:i')) == '16:00' ? 'selected' : '' }}>16:00</option>
                                    <option value="17:00" {{ old('reservation_time', $reservation->reservation_datetime->format('H:i')) == '17:00' ? 'selected' : '' }}>17:00</option>
                                </optgroup>
                            </select>
                            <x-input-error :messages="$errors->get('reservation_time')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4 space-x-4">
                            <a href="{{ route('reservations.show', $reservation) }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                                戻る
                            </a>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                変更を保存
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/reservation-calendar.js') }}"></script>
</x-app-layout>