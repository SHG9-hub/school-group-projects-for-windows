<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>お知らせ - やわらか動物病院</title>
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
                        <a href="/access" class="text-gray-600 hover:text-orange-600 transition-colors">アクセス</a>
                        <a href="/news" class="text-orange-600 border-b-2 border-orange-600 font-semibold">お知らせ</a>
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
                    <span class="text-orange-600 font-semibold">お知らせ</span>
                </nav>
            </div>
        </div>

        <!-- ヘッダー -->
        <section class="bg-gradient-to-r from-orange-100 to-yellow-100 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                    お知らせ
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    やわらか動物病院からの最新情報やお知らせをご確認いただけます。
                </p>
            </div>
        </section>

        <!-- 重要なお知らせ -->
        <section class="py-8 bg-red-50 border-b border-red-100">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center mb-4">
                    <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-red-800">重要なお知らせ</h2>
                </div>
                <div class="bg-white rounded-xl p-6 border border-red-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">年末年始の診療について</h3>
                    <p class="text-gray-600 mb-4">
                        12月29日（日）〜1月3日（金）は休診とさせていただきます。緊急時は夜間救急病院（03-XXXX-XXXX）までご連絡ください。
                        1月4日（土）より通常診療を開始いたします。
                    </p>
                    <span class="text-sm text-red-600 font-semibold">掲載日：2024年12月15日</span>
                </div>
            </div>
        </section>

        <!-- お知らせ一覧 -->
        <section class="py-16 bg-white">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="space-y-8">
                    <!-- お知らせ1 -->
                    <article class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center">
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full mr-3">
                                    システム
                                </span>
                                <span class="text-sm text-gray-500">2024年12月10日</span>
                            </div>
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">オンライン予約システムの機能追加について</h3>
                        <p class="text-gray-600 mb-4">
                            オンライン予約システムに新機能を追加いたしました。これまでよりもさらに使いやすく、予約の変更・キャンセルも簡単に行えるようになりました。
                            また、予約確認メールも自動送信されるようになりましたので、ご確認ください。
                        </p>
                        <ul class="text-gray-600 text-sm space-y-1 mb-4 ml-4">
                            <li>• 予約の変更・キャンセルがオンラインで可能</li>
                            <li>• 予約確認メールの自動送信</li>
                            <li>• 過去の診療履歴の確認機能</li>
                            <li>• 次回予約の提案機能</li>
                        </ul>
                        <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700 font-semibold text-sm">
                            オンライン予約システムを利用する →
                        </a>
                    </article>

                    <!-- お知らせ2 -->
                    <article class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center">
                                <span class="bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full mr-3">
                                    設備
                                </span>
                                <span class="text-sm text-gray-500">2024年12月5日</span>
                            </div>
                            <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">最新の検査機器を導入いたしました</h3>
                        <p class="text-gray-600 mb-4">
                            より精密な診断のため、最新のデジタルX線装置と高性能な超音波診断装置を導入いたしました。
                            これにより、より詳細で正確な検査が可能となり、早期発見・早期治療につなげることができます。
                        </p>
                        <div class="bg-green-50 rounded-lg p-4 mb-4">
                            <h4 class="font-semibold text-green-800 mb-2">新導入機器</h4>
                            <ul class="text-green-700 text-sm space-y-1">
                                <li>• デジタルX線装置（従来比50%の被曝量削減）</li>
                                <li>• カラードップラー超音波診断装置</li>
                                <li>• 血液検査自動分析装置</li>
                            </ul>
                        </div>
                        <p class="text-gray-600 text-sm">
                            検査料金に変更はございません。より質の高い診療をご提供できるよう努めてまいります。
                        </p>
                    </article>

                    <!-- お知らせ3 -->
                    <article class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center">
                                <span class="bg-purple-100 text-purple-800 text-xs font-semibold px-3 py-1 rounded-full mr-3">
                                    キャンペーン
                                </span>
                                <span class="text-sm text-gray-500">2024年11月25日</span>
                            </div>
                            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 0v1.3M12 21l3-3m-3 3l-3-3"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">冬の健康診断キャンペーンのお知らせ</h3>
                        <p class="text-gray-600 mb-4">
                            12月1日〜2月末まで、冬の健康診断キャンペーンを実施いたします。
                            シニア期（7歳以上）のワンちゃん・ネコちゃんを対象に、健康診断を特別価格でご提供いたします。
                        </p>
                        <div class="grid md:grid-cols-2 gap-4 mb-4">
                            <div class="bg-purple-50 rounded-lg p-4">
                                <h4 class="font-semibold text-purple-800 mb-2">基本コース</h4>
                                <p class="text-purple-700 text-sm mb-2">通常価格：8,000円</p>
                                <p class="text-lg font-bold text-purple-800">キャンペーン価格：6,000円</p>
                                <ul class="text-purple-600 text-xs mt-2 space-y-1">
                                    <li>• 血液検査（基本項目）</li>
                                    <li>• 尿検査</li>
                                    <li>• 身体検査</li>
                                </ul>
                            </div>
                            <div class="bg-purple-50 rounded-lg p-4">
                                <h4 class="font-semibold text-purple-800 mb-2">総合コース</h4>
                                <p class="text-purple-700 text-sm mb-2">通常価格：15,000円</p>
                                <p class="text-lg font-bold text-purple-800">キャンペーン価格：12,000円</p>
                                <ul class="text-purple-600 text-xs mt-2 space-y-1">
                                    <li>• 血液検査（詳細項目）</li>
                                    <li>• X線検査</li>
                                    <li>• 超音波検査</li>
                                    <li>• 尿検査・便検査</li>
                                </ul>
                            </div>
                        </div>
                        <a href="tel:03-1234-5678" class="text-purple-600 hover:text-purple-700 font-semibold text-sm">
                            健康診断のご予約・お問い合わせはお電話で →
                        </a>
                    </article>

                    <!-- お知らせ4 -->
                    <article class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center">
                                <span class="bg-orange-100 text-orange-800 text-xs font-semibold px-3 py-1 rounded-full mr-3">
                                    スタッフ
                                </span>
                                <span class="text-sm text-gray-500">2024年11月20日</span>
                            </div>
                            <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">新しい動物看護師が加わりました</h3>
                        <p class="text-gray-600 mb-4">
                            12月1日より、新しい動物看護師の田中美咲が当院に加わりました。
                            経験豊富で動物への愛情深いスタッフです。皆様により良いサービスをご提供できるよう、チーム一丸となって頑張ります。
                        </p>
                        <div class="bg-orange-50 rounded-lg p-4">
                            <h4 class="font-semibold text-orange-800 mb-2">田中美咲 動物看護師</h4>
                            <p class="text-orange-700 text-sm">
                                前職：○○動物病院（5年間勤務）<br>
                                専門：手術助手、入院管理<br>
                                「一匹一匹のペットと真摯に向き合い、飼い主様に安心していただける看護を心がけます。」
                            </p>
                        </div>
                    </article>

                    <!-- お知らせ5 -->
                    <article class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center">
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-3 py-1 rounded-full mr-3">
                                    お休み
                                </span>
                                <span class="text-sm text-gray-500">2024年11月15日</span>
                            </div>
                            <div class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 8a4 4 0 01-4-4v-4h8v4a4 4 0 01-4 4z"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">学会参加による臨時休診について</h3>
                        <p class="text-gray-600 mb-4">
                            12月8日（日）は、院長が獣医学会に参加のため臨時休診とさせていただきます。
                            緊急時は夜間救急病院（03-XXXX-XXXX）までご連絡ください。
                            ご迷惑をおかけいたしますが、よろしくお願いいたします。
                        </p>
                        <div class="bg-yellow-50 rounded-lg p-4">
                            <p class="text-yellow-800 text-sm font-semibold">
                                参加学会：第○回日本獣医内科学アカデミー学術大会<br>
                                テーマ：「小動物の消化器疾患の最新治療法」
                            </p>
                            <p class="text-yellow-700 text-sm mt-2">
                                学会で得た最新の知識を、今後の診療に活かしてまいります。
                            </p>
                        </div>
                    </article>

                    <!-- お知らせ6 -->
                    <article class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center">
                                <span class="bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full mr-3">
                                    予防
                                </span>
                                <span class="text-sm text-gray-500">2024年11月10日</span>
                            </div>
                            <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">冬季のノミ・ダニ予防についてのお知らせ</h3>
                        <p class="text-gray-600 mb-4">
                            気温が下がる冬でも、室内では一年中ノミ・ダニの活動が続きます。
                            暖房により室内環境が整うため、冬でも継続的な予防が重要です。
                        </p>
                        <ul class="text-gray-600 space-y-2 mb-4">
                            <li class="flex items-start">
                                <span class="text-green-600 mr-2">•</span>
                                <span>室内の湿度と温度により、ノミの繁殖サイクルが早まります</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-600 mr-2">•</span>
                                <span>マダニは気温が4度以上あれば活動を続けます</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-600 mr-2">•</span>
                                <span>お散歩時の草むらでの感染リスクは冬でも存在します</span>
                            </li>
                        </ul>
                        <div class="bg-green-50 rounded-lg p-4">
                            <p class="text-green-800 font-semibold text-sm mb-2">冬季も継続的な予防をおすすめします</p>
                            <p class="text-green-700 text-sm">
                                予防薬の種類や投与方法については、ペットの生活環境に合わせてご相談いたします。
                                お気軽にお声かけください。
                            </p>
                        </div>
                    </article>
                </div>

                <!-- ページネーション -->
                <div class="mt-12 flex justify-center">
                    <nav class="flex items-center space-x-1">
                        <button class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50">
                            前へ
                        </button>
                        <button class="px-3 py-2 text-sm font-medium text-white bg-orange-600 border border-orange-600">
                            1
                        </button>
                        <button class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50">
                            2
                        </button>
                        <button class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50">
                            3
                        </button>
                        <button class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50">
                            次へ
                        </button>
                    </nav>
                </div>
            </div>
        </section>

        <!-- お知らせ配信登録 -->
        <section class="py-16 bg-orange-100">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">お知らせ配信登録</h2>
                <p class="text-xl text-gray-600 mb-8">
                    重要なお知らせやキャンペーン情報をメールでお届けします。<br>
                    会員登録をしていただくと、自動的にお知らせ配信の対象となります。
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    @auth
                        <div class="bg-green-100 text-green-800 px-8 py-3 rounded-lg text-lg font-semibold">
                            ✓ 配信登録済み
                        </div>
                    @else
                        <a href="{{ route('register') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-lg text-lg font-semibold transition-colors">
                            会員登録してお知らせを受け取る
                        </a>
                    @endauth
                    <a href="tel:03-1234-5678" class="bg-white hover:bg-gray-50 text-orange-600 border border-orange-200 px-8 py-3 rounded-lg text-lg font-semibold transition-colors">
                        お電話でお問い合わせ
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