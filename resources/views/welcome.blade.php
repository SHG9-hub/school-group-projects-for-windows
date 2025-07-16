<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>やわらか動物病院 - 大切な家族の健康をサポート</title>
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
                        <h1 class="text-2xl font-bold text-orange-600">やわらか動物病院</h1>
                    </div>
                    <div class="flex items-center space-x-6">
                        <a href="#about" class="text-gray-600 hover:text-orange-600 transition-colors">病院紹介</a>
                        <a href="#services" class="text-gray-600 hover:text-orange-600 transition-colors">診療案内</a>
                        <a href="#access" class="text-gray-600 hover:text-orange-600 transition-colors">アクセス</a>
                        <a href="#news" class="text-gray-600 hover:text-orange-600 transition-colors">お知らせ</a>
                        @auth
                            <a href="{{ url('/dashboard') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg transition-colors">マイページ</a>
                        @else
                            <a href="{{ route('login') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg transition-colors">ログイン</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- ヒーローセクション -->
        <section class="bg-gradient-to-r from-orange-100 to-yellow-100 py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                    大切な家族の健康を<br>
                    <span class="text-orange-600">やわらかく</span>サポート
                </h2>
                <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                    ペットも飼い主様も安心できる、あたたかな診療を心がけています。<br>
                    お気軽にご相談ください。
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    @auth
                        <a href="{{ route('reservations.index') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-lg text-lg font-semibold transition-colors">
                            予約管理
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-lg text-lg font-semibold transition-colors">
                            予約する
                        </a>
                    @endauth
                    <a href="tel:03-1234-5678" class="bg-white hover:bg-gray-50 text-orange-600 border border-orange-200 px-8 py-3 rounded-lg text-lg font-semibold transition-colors">
                        電話で相談
                    </a>
                </div>
            </div>
        </section>

        <!-- 病院の特徴 -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h3 class="text-3xl font-bold text-center text-gray-800 mb-12">やわらか動物病院の特徴</h3>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center p-6 bg-orange-50 rounded-xl">
                        <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-800 mb-3">やさしい診療</h4>
                        <p class="text-gray-600">ペットの気持ちに寄り添い、ストレスを最小限に抑えた診療を行います。</p>
                    </div>
                    <div class="text-center p-6 bg-yellow-50 rounded-xl">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-800 mb-3">予約制でスムーズ</h4>
                        <p class="text-gray-600">オンライン予約システムで待ち時間を短縮。ご都合に合わせてご来院いただけます。</p>
                    </div>
                    <div class="text-center p-6 bg-green-50 rounded-xl">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-800 mb-3">充実した設備</h4>
                        <p class="text-gray-600">最新の医療機器を導入し、精密な診断と適切な治療を提供いたします。</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 主要ページへのリンク -->
        <section class="py-16 bg-orange-25">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h3 class="text-3xl font-bold text-center text-gray-800 mb-12">詳しい情報</h3>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- 病院紹介 -->
                    <a href="/about" id="about" class="block bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow p-6 border border-orange-100">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-2m-14 0h2m-2 0h-2m14 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2z"></path>
                                </svg>
                            </div>
                            <h4 class="text-xl font-semibold text-gray-800">病院紹介</h4>
                        </div>
                        <p class="text-gray-600">院長の挨拶、病院の理念、スタッフ紹介など</p>
                    </a>

                    <!-- 診療案内 -->
                    <a href="/services" id="services" class="block bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow p-6 border border-orange-100">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                            <h4 class="text-xl font-semibold text-gray-800">診療案内</h4>
                        </div>
                        <p class="text-gray-600">診療科目、診療時間、料金表など</p>
                    </a>

                    <!-- アクセス -->
                    <a href="/access" id="access" class="block bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow p-6 border border-orange-100">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <h4 class="text-xl font-semibold text-gray-800">アクセス</h4>
                        </div>
                        <p class="text-gray-600">住所、地図、交通手段のご案内</p>
                    </a>

                    <!-- お客様の声 -->
                    <a href="/testimonials" class="block bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow p-6 border border-orange-100">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                            </div>
                            <h4 class="text-xl font-semibold text-gray-800">お客様の声</h4>
                        </div>
                        <p class="text-gray-600">実際にご利用いただいた飼い主様の体験談</p>
                    </a>

                    <!-- よくある質問 -->
                    <a href="/faq" class="block bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow p-6 border border-orange-100">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h4 class="text-xl font-semibold text-gray-800">よくある質問</h4>
                        </div>
                        <p class="text-gray-600">診療や予約に関するよくあるご質問</p>
                    </a>

                    <!-- お知らせ -->
                    <a href="/news" id="news" class="block bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow p-6 border border-orange-100">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                                </svg>
                            </div>
                            <h4 class="text-xl font-semibold text-gray-800">お知らせ</h4>
                        </div>
                        <p class="text-gray-600">病院からの最新情報・お知らせ</p>
                    </a>
                </div>
            </div>
        </section>

        <!-- 休診日のお知らせ -->
        @if($upcomingHolidays->count() > 0)
        <section class="py-16 bg-red-50">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-8">
                    <h3 class="text-3xl font-bold text-red-800 mb-4">休診日のお知らせ</h3>
                    <p class="text-red-600">以下の日程は休診とさせていただきます</p>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($upcomingHolidays as $holiday)
                        <div class="bg-white rounded-xl p-6 border border-red-200 shadow-sm">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 8a4 4 0 01-4-4v-4h8v4a4 4 0 01-4 4z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-800">
                                        {{ $holiday->holiday_date->format('n月j日') }}（{{ $holiday->holiday_date->format('D') }}）
                                    </h4>
                                    <p class="text-sm text-red-600">休診日</p>
                                </div>
                            </div>
                            @if($holiday->description)
                                <p class="text-gray-600 text-sm">
                                    理由：{{ $holiday->description }}
                                </p>
                            @endif
                            <p class="text-xs text-gray-500 mt-2">
                                緊急時は夜間救急病院へご連絡ください
                            </p>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-8">
                    <a href="/news" class="text-red-600 hover:text-red-700 font-semibold">
                        その他のお知らせを見る →
                    </a>
                </div>
            </div>
        </section>
        @endif

        <!-- 予約・お問い合わせ -->
        <section class="py-16 bg-white">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h3 class="text-3xl font-bold text-gray-800 mb-8">ご予約・お問い合わせ</h3>
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="bg-orange-50 p-8 rounded-xl">
                        <h4 class="text-xl font-semibold text-gray-800 mb-4">オンライン予約</h4>
                        <p class="text-gray-600 mb-6">24時間いつでも予約が可能です。<br>会員登録でさらに便利にご利用いただけます。</p>
                        @auth
                            <a href="{{ route('reservations.index') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg inline-block transition-colors">
                                予約管理へ
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg inline-block transition-colors">
                                会員登録して予約
                            </a>
                        @endauth
                    </div>
                    <div class="bg-green-50 p-8 rounded-xl">
                        <h4 class="text-xl font-semibold text-gray-800 mb-4">お電話でのご相談</h4>
                        <p class="text-gray-600 mb-6">急な症状やご不明な点は<br>お電話でお気軽にご相談ください。</p>
                        <a href="tel:03-1234-5678" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg inline-block transition-colors">
                            03-1234-5678
                        </a>
                    </div>
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
                            <a href="/about" class="block hover:text-orange-300 transition-colors">病院紹介</a>
                            <a href="/services" class="block hover:text-orange-300 transition-colors">診療案内</a>
                            <a href="/access" class="block hover:text-orange-300 transition-colors">アクセス</a>
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
