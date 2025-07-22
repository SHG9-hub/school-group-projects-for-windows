document.addEventListener('DOMContentLoaded', function() {
    // 休診日データを取得してからFlatpickrを初期化
    fetch('/api/holidays')
        .then(response => response.json())
        .then(holidays => {
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
                    },
                    // 休診日を無効にする
                    ...holidays
                ]
            });
        })
        .catch(error => {
            console.error('休診日データの取得に失敗しました:', error);
            // エラー時はデフォルト設定でFlatpickrを初期化
            flatpickr("#reservation_date", {
                locale: "ja",
                dateFormat: "Y-m-d",
                minDate: "today",
                altInput: true,
                altFormat: "Y年m月d日",
                disable: [
                    function(date) {
                        return date.getDay() === 0;
                    }
                ]
            });
        });
});