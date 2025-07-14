<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>診療案内 - やわらか動物病院</title>
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
                        <a href="/services" class="text-orange-600 border-b-2 border-orange-600 font-semibold">診療案内</a>
                        <a href="/access" class="text-gray-600 hover:text-orange-600 transition-colors">アクセス</a>
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
                    <span class="text-orange-600 font-semibold">診療案内</span>
                </nav>
            </div>
        </div>

        <!-- ヘッダー -->
        <section class="bg-gradient-to-r from-orange-100 to-yellow-100 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                    診療案内
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    ペットの健康を総合的にサポートする幅広い診療サービスをご提供しています。
                </p>
            </div>
        </section>

        <!-- 診療時間 -->
        <section class="py-16 bg-white">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">診療時間</h2>
                <div class="bg-orange-50 rounded-2xl p-8 mb-8">
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">診療時間表</h3>
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b border-orange-200">
                                        <th class="text-left py-2 text-gray-700">曜日</th>
                                        <th class="text-left py-2 text-gray-700">午前</th>
                                        <th class="text-left py-2 text-gray-700">午後</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600">
                                    <tr class="border-b border-orange-100">
                                        <td class="py-2">月曜日</td>
                                        <td class="py-2">9:00〜12:00</td>
                                        <td class="py-2">16:00〜19:00</td>
                                    </tr>
                                    <tr class="border-b border-orange-100">
                                        <td class="py-2">火曜日</td>
                                        <td class="py-2">9:00〜12:00</td>
                                        <td class="py-2">16:00〜19:00</td>
                                    </tr>
                                    <tr class="border-b border-orange-100">
                                        <td class="py-2">水曜日</td>
                                        <td class="py-2">9:00〜12:00</td>
                                        <td class="py-2">16:00〜19:00</td>
                                    </tr>
                                    <tr class="border-b border-orange-100">
                                        <td class="py-2">木曜日</td>
                                        <td class="py-2">9:00〜12:00</td>
                                        <td class="py-2">16:00〜19:00</td>
                                    </tr>
                                    <tr class="border-b border-orange-100">
                                        <td class="py-2">金曜日</td>
                                        <td class="py-2">9:00〜12:00</td>
                                        <td class="py-2">16:00〜19:00</td>
                                    </tr>
                                    <tr class="border-b border-orange-100">
                                        <td class="py-2">土曜日</td>
                                        <td class="py-2">9:00〜12:00</td>
                                        <td class="py-2">14:00〜17:00</td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 text-red-600 font-semibold">日曜日・祝日</td>
                                        <td class="py-2 text-red-600">休診</td>
                                        <td class="py-2 text-red-600">休診</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">お知らせ</h3>
                            <div class="space-y-4 text-gray-600">
                                <div class="bg-yellow-100 border border-yellow-300 rounded-lg p-4">
                                    <p class="font-semibold text-yellow-800">予約制です</p>
                                    <p class="text-sm text-yellow-700">診察は完全予約制となっております。事前にご予約をお取りください。</p>
                                </div>
                                <div class="bg-blue-100 border border-blue-300 rounded-lg p-4">
                                    <p class="font-semibold text-blue-800">緊急時の対応</p>
                                    <p class="text-sm text-blue-700">診療時間外の緊急時は、まずお電話でご相談ください。</p>
                                </div>
                                <div class="bg-green-100 border border-green-300 rounded-lg p-4">
                                    <p class="font-semibold text-green-800">ワクチン接種</p>
                                    <p class="text-sm text-green-700">混合ワクチン、狂犬病ワクチンの接種も行っております。</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 診療科目 -->
        <section class="py-16 bg-orange-25">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">診療科目</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- 一般内科 -->
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">一般内科</h3>
                        <p class="text-gray-600 mb-4">風邪、下痢、嘔吐、食欲不振などの一般的な体調不良から慢性疾患まで幅広く診療します。</p>
                        <ul class="text-sm text-gray-500 space-y-1">
                            <li>• 消化器疾患</li>
                            <li>• 呼吸器疾患</li>
                            <li>• 泌尿器疾患</li>
                            <li>• 内分泌疾患</li>
                        </ul>
                    </div>

                    <!-- 外科 -->
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">外科</h3>
                        <p class="text-gray-600 mb-4">避妊・去勢手術から腫瘍摘出まで、安全で確実な外科手術を行います。</p>
                        <ul class="text-sm text-gray-500 space-y-1">
                            <li>• 避妊・去勢手術</li>
                            <li>• 腫瘍摘出手術</li>
                            <li>• 外傷治療</li>
                            <li>• 整形外科</li>
                        </ul>
                    </div>

                    <!-- 皮膚科 -->
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">皮膚科</h3>
                        <p class="text-gray-600 mb-4">アレルギーや皮膚炎、脱毛などの皮膚トラブルを専門的に治療します。</p>
                        <ul class="text-sm text-gray-500 space-y-1">
                            <li>• アトピー性皮膚炎</li>
                            <li>• 食物アレルギー</li>
                            <li>• 細菌性皮膚炎</li>
                            <li>• 真菌感染症</li>
                        </ul>
                    </div>

                    <!-- 眼科 -->
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">眼科</h3>
                        <p class="text-gray-600 mb-4">結膜炎、白内障、緑内障などの目の疾患を診療します。</p>
                        <ul class="text-sm text-gray-500 space-y-1">
                            <li>• 結膜炎・角膜炎</li>
                            <li>• 白内障</li>
                            <li>• 緑内障</li>
                            <li>• 涙やけ</li>
                        </ul>
                    </div>

                    <!-- 歯科 -->
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1.5a1.5 1.5 0 011.5 1.5v1a1.5 1.5 0 01-1.5 1.5H9m0-5a1.5 1.5 0 011.5-1.5H12a1.5 1.5 0 011.5 1.5v1a1.5 1.5 0 01-1.5 1.5H9.5M9 10V9a1.5 1.5 0 011.5-1.5h1"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">歯科</h3>
                        <p class="text-gray-600 mb-4">歯石除去、歯周病治療など、口腔内の健康を維持します。</p>
                        <ul class="text-sm text-gray-500 space-y-1">
                            <li>• 歯石除去</li>
                            <li>• 歯周病治療</li>
                            <li>• 抜歯</li>
                            <li>• 口臭対策</li>
                        </ul>
                    </div>

                    <!-- 予防医療 -->
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">予防医療</h3>
                        <p class="text-gray-600 mb-4">ワクチン接種や定期健診で病気の予防に取り組みます。</p>
                        <ul class="text-sm text-gray-500 space-y-1">
                            <li>• 混合ワクチン</li>
                            <li>• 狂犬病ワクチン</li>
                            <li>• フィラリア予防</li>
                            <li>• ノミ・ダニ予防</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- 検査・診断 -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">検査・診断</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-800 mb-6">院内検査</h3>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-4 mt-1">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">血液検査</h4>
                                    <p class="text-gray-600 text-sm">血液生化学検査、血球計算などを院内で迅速に実施</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-4 mt-1">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">尿検査</h4>
                                    <p class="text-gray-600 text-sm">尿路感染症、腎疾患、糖尿病などの診断</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center mr-4 mt-1">
                                    <svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">便検査</h4>
                                    <p class="text-gray-600 text-sm">寄生虫検査、細菌検査など</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-800 mb-6">画像診断</h3>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center mr-4 mt-1">
                                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">デジタルX線検査</h4>
                                    <p class="text-gray-600 text-sm">骨折、関節疾患、胸部・腹部の異常を高画質で診断</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center mr-4 mt-1">
                                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">超音波検査</h4>
                                    <p class="text-gray-600 text-sm">内臓の状態をリアルタイムで観察、心疾患の診断も可能</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center mr-4 mt-1">
                                    <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">内視鏡検査</h4>
                                    <p class="text-gray-600 text-sm">消化管の詳細な観察と生検（提携病院にて）</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 料金表 -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">料金表</h2>
                <div class="bg-white rounded-2xl p-8 shadow-sm">
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-6">基本診療費</h3>
                            <table class="w-full">
                                <tbody class="text-gray-600">
                                    <tr class="border-b border-gray-100">
                                        <td class="py-3">初診料</td>
                                        <td class="py-3 text-right font-semibold">1,500円</td>
                                    </tr>
                                    <tr class="border-b border-gray-100">
                                        <td class="py-3">再診料</td>
                                        <td class="py-3 text-right font-semibold">800円</td>
                                    </tr>
                                    <tr class="border-b border-gray-100">
                                        <td class="py-3">往診料</td>
                                        <td class="py-3 text-right font-semibold">3,000円〜</td>
                                    </tr>
                                    <tr class="border-b border-gray-100">
                                        <td class="py-3">健康診断</td>
                                        <td class="py-3 text-right font-semibold">5,000円〜</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-6">予防医療</h3>
                            <table class="w-full">
                                <tbody class="text-gray-600">
                                    <tr class="border-b border-gray-100">
                                        <td class="py-3">混合ワクチン（犬）</td>
                                        <td class="py-3 text-right font-semibold">6,000円〜</td>
                                    </tr>
                                    <tr class="border-b border-gray-100">
                                        <td class="py-3">混合ワクチン（猫）</td>
                                        <td class="py-3 text-right font-semibold">5,000円〜</td>
                                    </tr>
                                    <tr class="border-b border-gray-100">
                                        <td class="py-3">狂犬病ワクチン</td>
                                        <td class="py-3 text-right font-semibold">3,000円</td>
                                    </tr>
                                    <tr class="border-b border-gray-100">
                                        <td class="py-3">フィラリア予防薬</td>
                                        <td class="py-3 text-right font-semibold">1,200円〜</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <div class="grid md:grid-cols-2 gap-8">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-6">検査費用</h3>
                                <table class="w-full">
                                    <tbody class="text-gray-600">
                                        <tr class="border-b border-gray-100">
                                            <td class="py-3">血液検査（基本）</td>
                                            <td class="py-3 text-right font-semibold">3,000円〜</td>
                                        </tr>
                                        <tr class="border-b border-gray-100">
                                            <td class="py-3">X線検査</td>
                                            <td class="py-3 text-right font-semibold">4,000円〜</td>
                                        </tr>
                                        <tr class="border-b border-gray-100">
                                            <td class="py-3">超音波検査</td>
                                            <td class="py-3 text-right font-semibold">5,000円〜</td>
                                        </tr>
                                        <tr class="border-b border-gray-100">
                                            <td class="py-3">尿検査</td>
                                            <td class="py-3 text-right font-semibold">1,500円〜</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-6">手術費用</h3>
                                <table class="w-full">
                                    <tbody class="text-gray-600">
                                        <tr class="border-b border-gray-100">
                                            <td class="py-3">避妊手術（犬）</td>
                                            <td class="py-3 text-right font-semibold">30,000円〜</td>
                                        </tr>
                                        <tr class="border-b border-gray-100">
                                            <td class="py-3">去勢手術（犬）</td>
                                            <td class="py-3 text-right font-semibold">20,000円〜</td>
                                        </tr>
                                        <tr class="border-b border-gray-100">
                                            <td class="py-3">避妊手術（猫）</td>
                                            <td class="py-3 text-right font-semibold">25,000円〜</td>
                                        </tr>
                                        <tr class="border-b border-gray-100">
                                            <td class="py-3">去勢手術（猫）</td>
                                            <td class="py-3 text-right font-semibold">15,000円〜</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                        <p class="text-sm text-yellow-800">
                            <strong>※ 料金について</strong><br>
                            上記料金は目安です。ペットの体重、症状、検査内容により変動いたします。<br>
                            詳しい料金については、診察時にご説明いたします。
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTAセクション -->
        <section class="py-16 bg-orange-100">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">診察のご予約はこちら</h2>
                <p class="text-xl text-gray-600 mb-8">
                    気になる症状やご質問がございましたら、お気軽にご相談ください。
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