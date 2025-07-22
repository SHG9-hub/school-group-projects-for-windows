document.addEventListener('DOMContentLoaded', function() {
    flatpickr("#reservation_date", {
        locale: "ja",
        dateFormat: "Y-m-d",
        minDate: "today",
        altInput: true,
        altFormat: "Y年m月d日",
        disable: [
            // 日曜日を無効にする
            function(date) {
                return date.getDay() === 0;
            }
        ]
    });
});