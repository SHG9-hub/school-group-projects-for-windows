document.addEventListener('DOMContentLoaded', function () {
    // 日時選択フィールドを探す（どちらのIDでも対応）
    const datetimeField = document.getElementById('reservation_datetime');

    // 休診日データを取得してからFlatpickrを初期化
    fetch('/api/holidays')
        .then(response => response.json())
        .then(holidays => {
            flatpickr(datetimeField, {
                locale: "ja",
                enableTime: true,           // 時間選択を有効化
                time_24hr: true,           // 24時間表記
                dateFormat: "Y-m-d H:i",   // 日時フォーマット
                altInput: true,            // 代替表示を使用
                altFormat: "Y年m月d日 H:i", // 日本語表示フォーマット
                minDate: "today",          // 今日以降のみ選択可能
                minuteIncrement: 30,       // 30分刻み
                defaultHour: 10,            // デフォルト時間: 9時
                minTime: "10:00",          // 最小時間: 9時
                maxTime: "20:30",          // 最大時間: 17時
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