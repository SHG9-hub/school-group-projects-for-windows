<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('新規予約') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('reservations.store') }}" id="reservationForm">
                        @csrf

                        <!-- カレンダー表示 -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">予約日を選択してください</label>
                            <div id="calendar" class="border rounded-lg p-4 bg-gray-50">
                                <div class="flex justify-between items-center mb-4">
                                    <button type="button" id="prevMonth" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                        ←
                                    </button>
                                    <h3 id="currentMonth" class="text-lg font-semibold"></h3>
                                    <button type="button" id="nextMonth" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                        →
                                    </button>
                                </div>
                                <div class="grid grid-cols-7 gap-1 text-center mb-2">
                                    <div class="font-semibold text-gray-600 py-2">日</div>
                                    <div class="font-semibold text-gray-600 py-2">月</div>
                                    <div class="font-semibold text-gray-600 py-2">火</div>
                                    <div class="font-semibold text-gray-600 py-2">水</div>
                                    <div class="font-semibold text-gray-600 py-2">木</div>
                                    <div class="font-semibold text-gray-600 py-2">金</div>
                                    <div class="font-semibold text-gray-600 py-2">土</div>
                                </div>
                                <div id="calendarDays" class="grid grid-cols-7 gap-1"></div>
                            </div>
                            <input type="hidden" name="reservation_date" id="reservation_date" value="{{ old('reservation_date') }}">
                            <x-input-error :messages="$errors->get('reservation_date')" class="mt-2" />
                        </div>

                        <!-- 時間選択 -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">時間を選択してください</label>
                            <div id="timeSlots" class="grid grid-cols-2 md:grid-cols-4 gap-2">
                                <!-- 時間スロットはJavaScriptで動的に生成 -->
                            </div>
                            <input type="hidden" name="reservation_time" id="reservation_time" value="{{ old('reservation_time') }}">
                            <x-input-error :messages="$errors->get('reservation_time')" class="mt-2" />
                        </div>

                        <!-- 選択内容の確認 -->
                        <div id="selectedInfo" class="mb-6 p-4 bg-blue-50 rounded-lg hidden">
                            <h3 class="text-lg font-medium text-blue-900 mb-2">選択内容</h3>
                            <p id="selectedDateTime" class="text-blue-800"></p>
                        </div>

                        <div class="flex items-center justify-end mt-4 space-x-4">
                            <a href="{{ route('reservations.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                                戻る
                            </a>
                            <button type="submit" id="submitBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded disabled:opacity-50" disabled>
                                予約する
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendar = document.getElementById('calendarDays');
            const currentMonthElement = document.getElementById('currentMonth');
            const prevMonthBtn = document.getElementById('prevMonth');
            const nextMonthBtn = document.getElementById('nextMonth');
            const timeSlotsElement = document.getElementById('timeSlots');
            const selectedInfo = document.getElementById('selectedInfo');
            const selectedDateTime = document.getElementById('selectedDateTime');
            const reservationDateInput = document.getElementById('reservation_date');
            const reservationTimeInput = document.getElementById('reservation_time');
            const submitBtn = document.getElementById('submitBtn');

            let currentDate = new Date();
            let selectedDate = null;
            let selectedTime = null;

            // カレンダー初期化
            function initCalendar() {
                renderCalendar();
                updateButtonStates();
            }

            // カレンダー描画
            function renderCalendar() {
                const year = currentDate.getFullYear();
                const month = currentDate.getMonth();
                
                currentMonthElement.textContent = `${year}年${month + 1}月`;
                
                const firstDay = new Date(year, month, 1);
                const lastDay = new Date(year, month + 1, 0);
                const startDate = new Date(firstDay);
                startDate.setDate(startDate.getDate() - firstDay.getDay());

                calendar.innerHTML = '';

                // カレンダーデータを取得
                fetchCalendarData(year, month);
            }

            // カレンダーデータ取得
            function fetchCalendarData(year, month) {
                const monthStr = `${year}-${String(month + 1).padStart(2, '0')}`;
                
                fetch(`/api/calendar-data?month=${monthStr}`)
                    .then(response => response.json())
                    .then(data => {
                        renderCalendarDays(data.data);
                    })
                    .catch(error => {
                        console.error('Error fetching calendar data:', error);
                    });
            }

            // カレンダー日付描画
            function renderCalendarDays(calendarData) {
                calendar.innerHTML = '';
                const today = new Date();
                const currentMonth = currentDate.getMonth();

                // 月の最初の日の曜日まで空のセルを追加
                const firstDay = new Date(currentDate.getFullYear(), currentMonth, 1);
                for (let i = 0; i < firstDay.getDay(); i++) {
                    const emptyCell = document.createElement('div');
                    emptyCell.className = 'h-10';
                    calendar.appendChild(emptyCell);
                }

                calendarData.forEach(day => {
                    const dayElement = document.createElement('div');
                    dayElement.textContent = day.day;
                    dayElement.className = 'h-10 flex items-center justify-center cursor-pointer border rounded';

                    if (day.isPast || day.isHoliday || !day.hasAvailability) {
                        dayElement.className += ' bg-gray-200 text-gray-400 cursor-not-allowed';
                    } else {
                        dayElement.className += ' bg-white hover:bg-blue-100 border-blue-200';
                        dayElement.addEventListener('click', () => selectDate(day.date));
                    }

                    if (selectedDate === day.date) {
                        dayElement.className += ' bg-blue-500 text-white';
                    }

                    calendar.appendChild(dayElement);
                });
            }

            // 日付選択
            function selectDate(date) {
                selectedDate = date;
                selectedTime = null;
                reservationDateInput.value = date;
                reservationTimeInput.value = '';
                
                renderCalendar();
                fetchTimeSlots(date);
                updateSelectedInfo();
                updateButtonStates();
            }

            // 時間スロット取得
            function fetchTimeSlots(date) {
                fetch(`/api/available-slots?date=${date}`)
                    .then(response => response.json())
                    .then(data => {
                        renderTimeSlots(data.slots);
                    })
                    .catch(error => {
                        console.error('Error fetching time slots:', error);
                    });
            }

            // 時間スロット描画
            function renderTimeSlots(slots) {
                timeSlotsElement.innerHTML = '';

                if (slots.length === 0) {
                    timeSlotsElement.innerHTML = '<p class="col-span-full text-center text-gray-500">この日は予約できません</p>';
                    return;
                }

                slots.forEach(slot => {
                    const slotElement = document.createElement('button');
                    slotElement.type = 'button';
                    slotElement.textContent = slot.time;
                    slotElement.className = 'p-2 border rounded text-center';

                    if (slot.available) {
                        slotElement.className += ' bg-white hover:bg-green-100 border-green-200';
                        slotElement.addEventListener('click', () => selectTime(slot.time));
                    } else {
                        slotElement.className += ' bg-gray-200 text-gray-400 cursor-not-allowed';
                        slotElement.disabled = true;
                    }

                    if (selectedTime === slot.time) {
                        slotElement.className += ' bg-green-500 text-white';
                    }

                    timeSlotsElement.appendChild(slotElement);
                });
            }

            // 時間選択
            function selectTime(time) {
                selectedTime = time;
                reservationTimeInput.value = time;
                
                // 時間スロットの見た目を更新
                document.querySelectorAll('#timeSlots button').forEach(btn => {
                    btn.classList.remove('bg-green-500', 'text-white');
                    if (btn.textContent === time) {
                        btn.classList.add('bg-green-500', 'text-white');
                    }
                });

                updateSelectedInfo();
                updateButtonStates();
            }

            // 選択内容表示更新
            function updateSelectedInfo() {
                if (selectedDate && selectedTime) {
                    const date = new Date(selectedDate);
                    const dateStr = `${date.getFullYear()}年${date.getMonth() + 1}月${date.getDate()}日`;
                    selectedDateTime.textContent = `${dateStr} ${selectedTime}`;
                    selectedInfo.classList.remove('hidden');
                } else {
                    selectedInfo.classList.add('hidden');
                }
            }

            // ボタン状態更新
            function updateButtonStates() {
                submitBtn.disabled = !(selectedDate && selectedTime);
            }

            // 月移動
            prevMonthBtn.addEventListener('click', () => {
                currentDate.setMonth(currentDate.getMonth() - 1);
                renderCalendar();
            });

            nextMonthBtn.addEventListener('click', () => {
                currentDate.setMonth(currentDate.getMonth() + 1);
                renderCalendar();
            });

            // 初期化
            initCalendar();
        });
    </script>
</x-app-layout>