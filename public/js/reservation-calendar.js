document.addEventListener('DOMContentLoaded', function() {
    // 日時選択フィールドを探す（どちらのIDでも対応）
    const datetimeField = document.getElementById('reservation_datetime') || document.getElementById('reservation_date');
    
    if (!datetimeField) return;
    
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
                minuteIncrement: 60,       // 1時間刻み
                defaultHour: 9,            // デフォルト時間: 9時
                minTime: "09:00",          // 最小時間: 9時
                maxTime: "17:00",          // 最大時間: 17時
                disable: [
                    // 日曜日を無効にする
                    function(date) {
                        return date.getDay() === 0;
                    },
                    // 休診日を無効にする
                    ...holidays,
                    // 営業時間外を無効にする（12-14時の昼休み）
                    function(date) {
                        const hour = date.getHours();
                        return hour >= 12 && hour < 14;
                    }
                ]
            });
        })
        .catch(error => {
            console.error('休診日データの取得に失敗しました:', error);
            // エラー時はデフォルト設定で初期化
            flatpickr(datetimeField, {
                locale: "ja",
                enableTime: true,
                time_24hr: true,
                dateFormat: "Y-m-d H:i",
                altInput: true,
                altFormat: "Y年m月d日 H:i",
                minDate: "today",
                minuteIncrement: 60,
                defaultHour: 9,
                minTime: "09:00",
                maxTime: "17:00",
                disable: [
                    function(date) {
                        return date.getDay() === 0;
                    },
                    function(date) {
                        const hour = date.getHours();
                        return hour >= 12 && hour < 14;
                    }
                ]
            });
        });
});