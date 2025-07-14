<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>アクセス - やわらか動物病院</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=noto-sans-jp:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-orange-50 text-gray-800">
        <!-- ナビゲーション -->
        <nav class="bg-white shadow-sm border-b border-orange-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="/" class="text-2xl font-bold text-orange-600">やわらか動物病院</a>
                    </div>
                    <div class="flex items-center space-x-6">
                        <a href="/about" class="text-gray-600 hover:text-orange-600 transition-colors">病院紹介</a>
                        <a href="/services" class="text-gray-600 hover:text-orange-600 transition-colors">診療案内</a>
                        <a href="/access" class="text-orange-600 border-b-2 border-orange-600 font-semibold">アクセス</a>
                        <a href="/news" class="text-gray-600 hover:text-orange-600 transition-colors">お知らせ</a>
                        @auth
                            <a href="{{ url('/dashboard') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg transition-colors">マイページ</a>
                        @else
                            <a href="{{ route('login') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg transition-colors">ログイン</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- パンくずリスト -->
        <div class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
                <nav class="text-sm">
                    <a href="/" class="text-gray-500 hover:text-orange-600">ホーム</a>
                    <span class="mx-2 text-gray-400">/</span>
                    <span class="text-orange-600 font-semibold">アクセス</span>
                </nav>
            </div>
        </div>

        <!-- ヘッダー -->
        <section class="bg-gradient-to-r from-orange-100 to-yellow-100 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                    アクセス
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    やわらか動物病院へのアクセス方法をご案内いたします。
                </p>
            </div>
        </section>

        <!-- 病院情報 -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-12">
                    <!-- 地図 -->
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800 mb-6">所在地</h2>
                        <div class="bg-gray-100 rounded-2xl p-8 h-96 flex items-center justify-center">
                            <div class="text-center text-gray-500">
                                <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <p class="text-lg">Google Maps</p>
                                <p class="text-sm">（実際の地図が表示されます）</p>
                            </div>
                        </div>
                        <div class="mt-6 text-center">
                            <a href="https://maps.google.com" target="_blank" class="inline-flex items-center bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                                Google Mapsで開く
                            </a>
                        </div>
                    </div>

                    <!-- 病院情報 -->
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800 mb-6">病院情報</h2>
                        <div class="space-y-6">
                            <div class="bg-orange-50 rounded-xl p-6">
                                <div class="flex items-start">
                                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-800 mb-2">住所</h3>
                                        <p class="text-gray-600">
                                            〒123-4567<br>
                                            東京都○○区○○町1-2-3<br>
                                            やわらかビル1F
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-green-50 rounded-xl p-6">
                                <div class="flex items-start">
                                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-800 mb-2">電話番号</h3>
                                        <p class="text-gray-600 mb-2">
                                            <a href="tel:03-1234-5678" class="text-green-600 hover:text-green-700 font-semibold text-xl">03-1234-5678</a>
                                        </p>
                                        <p class="text-sm text-gray-500">予約・お問い合わせ</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-blue-50 rounded-xl p-6">
                                <div class="flex items-start">
                                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-800 mb-2">診療時間</h3>
                                        <div class="text-gray-600 space-y-1">
                                            <p>平日: 9:00〜12:00 / 16:00〜19:00</p>
                                            <p>土曜: 9:00〜12:00 / 14:00〜17:00</p>
                                            <p class="text-red-600 font-semibold">日曜・祝日: 休診</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-yellow-50 rounded-xl p-6">
                                <div class="flex items-start">
                                    <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 8a4 4 0 01-4-4v-4h8v4a4 4 0 01-4 4z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-800 mb-2">駐車場</h3>
                                        <p class="text-gray-600">
                                            専用駐車場 5台完備<br>
                                            <span class="text-sm text-yellow-700">※満車の場合は近隣のコインパーキングをご利用ください</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 交通手段 -->
        <section class="py-16 bg-orange-25">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">交通手段</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- 電車でお越しの場合 -->
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4 text-center">電車でお越しの場合</h3>
                        <div class="space-y-3 text-gray-600">
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-blue-500 rounded-full mr-3"></div>
                                <p><strong>○○線</strong> ○○駅 東口より徒歩5分</p>
                            </div>
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                                <p><strong>○○線</strong> ○○駅 南口より徒歩8分</p>
                            </div>
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-orange-500 rounded-full mr-3"></div>
                                <p><strong>地下鉄○○線</strong> ○○駅 A2出口より徒歩3分</p>
                            </div>
                        </div>
                        <div class="mt-4 p-3 bg-blue-50 rounded-lg">
                            <p class="text-sm text-blue-700">
                                <strong>最寄り駅：</strong>地下鉄○○線 ○○駅が最も近く便利です。
                            </p>
                        </div>
                    </div>

                    <!-- バスでお越しの場合 -->
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 8a4 4 0 01-4-4v-4h8v4a4 4 0 01-4 4z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4 text-center">バスでお越しの場合</h3>
                        <div class="space-y-3 text-gray-600">
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                                <p>都営バス <strong>○○系統</strong></p>
                            </div>
                            <div class="pl-5">
                                <p class="text-sm">「○○病院前」バス停下車 徒歩1分</p>
                            </div>
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-blue-500 rounded-full mr-3"></div>
                                <p>○○バス <strong>○○線</strong></p>
                            </div>
                            <div class="pl-5">
                                <p class="text-sm">「○○交差点」バス停下車 徒歩3分</p>
                            </div>
                        </div>
                        <div class="mt-4 p-3 bg-green-50 rounded-lg">
                            <p class="text-sm text-green-700">
                                <strong>おすすめ：</strong>「○○病院前」バス停が病院の目の前にあります。
                            </p>
                        </div>
                    </div>

                    <!-- お車でお越しの場合 -->
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4 text-center">お車でお越しの場合</h3>
                        <div class="space-y-3 text-gray-600">
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-orange-500 rounded-full mr-3"></div>
                                <p><strong>環七通り</strong>「○○交差点」より2分</p>
                            </div>
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-red-500 rounded-full mr-3"></div>
                                <p><strong>○○街道</strong>「○○」信号より1分</p>
                            </div>
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-purple-500 rounded-full mr-3"></div>
                                <p><strong>首都高○○出口</strong>より約10分</p>
                            </div>
                        </div>
                        <div class="mt-4 p-3 bg-orange-50 rounded-lg">
                            <p class="text-sm text-orange-700">
                                <strong>駐車場：</strong>専用駐車場5台完備。満車時は近隣コインパーキングをご利用ください。
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 目印・ランドマーク -->
        <section class="py-16 bg-white">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">目印・ランドマーク</h2>
                <div class="bg-yellow-50 rounded-2xl p-8">
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-6">病院の外観</h3>
                            <div class="bg-white rounded-xl p-6 shadow-sm mb-6">
                                <div class="bg-gray-100 h-48 rounded-lg flex items-center justify-center mb-4">
                                    <div class="text-center text-gray-500">
                                        <svg class="w-12 h-12 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-2m-14 0h2m-2 0h-2m14 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2z"></path>
                                        </svg>
                                        <p>病院外観写真</p>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-sm">オレンジ色の看板が目印の白い建物です。</p>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-6">周辺の目印</h3>
                            <div class="space-y-4">
                                <div class="flex items-center p-4 bg-white rounded-lg shadow-sm">
                                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l-1 12H6L5 9z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800">○○コンビニ</h4>
                                        <p class="text-sm text-gray-600">病院の向かい側（徒歩30秒）</p>
                                    </div>
                                </div>
                                <div class="flex items-center p-4 bg-white rounded-lg shadow-sm">
                                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-2m-14 0h2m-2 0h-2m14 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800">○○薬局</h4>
                                        <p class="text-sm text-gray-600">病院の隣のビル（徒歩1分）</p>
                                    </div>
                                </div>
                                <div class="flex items-center p-4 bg-white rounded-lg shadow-sm">
                                    <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800">○○銀行</h4>
                                        <p class="text-sm text-gray-600">交差点の角（徒歩2分）</p>
                                    </div>
                                </div>
                                <div class="flex items-center p-4 bg-white rounded-lg shadow-sm">
                                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1.5a1.5 1.5 0 011.5 1.5v1a1.5 1.5 0 01-1.5 1.5H9m0-5a1.5 1.5 0 011.5-1.5H12a1.5 1.5 0 011.5 1.5v1a1.5 1.5 0 01-1.5 1.5H9.5M9 10V9a1.5 1.5 0 011.5-1.5h1"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800">○○公園</h4>
                                        <p class="text-sm text-gray-600">病院の裏手（徒歩3分）</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 来院時の注意事項 -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">来院時のお願い</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">ご予約について</h3>
                        <ul class="text-gray-600 space-y-2 text-sm">
                            <li>• 診察は完全予約制です</li>
                            <li>• オンライン予約が便利です</li>
                            <li>• お急ぎの場合はお電話ください</li>
                            <li>• 遅刻される場合は必ずご連絡ください</li>
                        </ul>
                    </div>
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">持参物</h3>
                        <ul class="text-gray-600 space-y-2 text-sm">
                            <li>• 診察券（2回目以降）</li>
                            <li>• ワクチン証明書</li>
                            <li>• お薬手帳（服薬中の場合）</li>
                            <li>• 保険証（ペット保険加入の場合）</li>
                        </ul>
                    </div>
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">ペットの来院準備</h3>
                        <ul class="text-gray-600 space-y-2 text-sm">
                            <li>• 犬：リード・首輪の着用</li>
                            <li>• 猫：キャリーケースでお越しください</li>
                            <li>• 普段の様子の動画があると診断に役立ちます</li>
                            <li>• 症状を詳しく教えてください</li>
                        </ul>
                    </div>
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">お支払い</h3>
                        <ul class="text-gray-600 space-y-2 text-sm">
                            <li>• 現金でのお支払い</li>
                            <li>• 各種クレジットカード対応</li>
                            <li>• 電子マネー対応</li>
                            <li>• ペット保険の窓口精算可能</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTAセクション -->
        <section class="py-16 bg-orange-100">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">ご来院お待ちしております</h2>
                <p class="text-xl text-gray-600 mb-8">
                    ご不明な点やご質問がございましたら、お気軽にお問い合わせください。
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    @auth
                        <a href="{{ route('reservations.calendar') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-lg text-lg font-semibold transition-colors">
                            オンライン予約
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-lg text-lg font-semibold transition-colors">
                            会員登録して予約
                        </a>
                    @endauth
                    <a href="tel:03-1234-5678" class="bg-white hover:bg-gray-50 text-orange-600 border border-orange-200 px-8 py-3 rounded-lg text-lg font-semibold transition-colors">
                        03-1234-5678
                    </a>
                </div>
            </div>
        </section>

        <!-- フッター -->
        <footer class="bg-gray-800 text-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-xl font-bold mb-4">やわらか動物病院</h3>
                        <p class="text-gray-300 mb-4">大切な家族の健康をやわらかくサポートします。</p>
                        <p class="text-gray-300">
                            〒123-4567<br>
                            東京都○○区○○町1-2-3<br>
                            TEL: 03-1234-5678
                        </p>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">診療時間</h4>
                        <div class="text-gray-300">
                            <p>平日: 9:00〜12:00 / 16:00〜19:00</p>
                            <p>土曜: 9:00〜12:00 / 14:00〜17:00</p>
                            <p class="text-orange-300 mt-2">日曜・祝日: 休診</p>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">リンク</h4>
                        <div class="space-y-2 text-gray-300">
                            <a href="/" class="block hover:text-orange-300 transition-colors">ホーム</a>
                            <a href="/about" class="block hover:text-orange-300 transition-colors">病院紹介</a>
                            <a href="/services" class="block hover:text-orange-300 transition-colors">診療案内</a>
                            <a href="/faq" class="block hover:text-orange-300 transition-colors">よくある質問</a>
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                    <p>&copy; 2025 やわらか動物病院. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </body>
</html>