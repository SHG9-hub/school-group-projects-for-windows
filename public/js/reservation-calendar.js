document.addEventListener('DOMContentLoaded', function () {
    // 日付選択フィールドを探す
    const dateField = document.getElementById('reservation_date');

    // 休診日データを取得してからFlatpickrを初期化
    fetch('/api/holidays')
        .then(response => response.json())
        .then(holidays => {
            flatpickr(dateField, {
                locale: "ja",
                dateFormat: "Y-m-d",           // 日付のみのフォーマット
                altInput: true,                // 代替表示を使用
                altFormat: "Y年m月d日",        // 日本語表示フォーマット
                minDate: "today",              // 今日以降のみ選択可能
                disable: [
                    // 日曜日を無効にする
                    function (date) {
                        return date.getDay() === 0;
                    },
                    // 休診日を無効にする
                    ...holidays,
                ]
            });
        })
        .catch(() => {
            alert('休診日データの取得に失敗しました。管理者にお問い合わせください。');
        });
});