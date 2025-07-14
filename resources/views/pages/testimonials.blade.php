<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>お客様の声 - やわらか動物病院</title>
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
                        <a href="/testimonials" class="text-orange-600 border-b-2 border-orange-600 font-semibold">お客様の声</a>
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
                    <span class="text-orange-600 font-semibold">お客様の声</span>
                </nav>
            </div>
        </div>

        <!-- ヘッダー -->
        <section class="bg-gradient-to-r from-orange-100 to-yellow-100 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                    お客様の声
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    やわらか動物病院をご利用いただいた飼い主様とペットたちからのあたたかなメッセージをご紹介します。
                </p>
            </div>
        </section>

        <!-- 満足度統計 -->
        <section class="py-16 bg-white">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">患者様満足度</h2>
                <div class="grid md:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="w-24 h-24 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-3xl font-bold text-orange-600">98%</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">総合満足度</h3>
                        <p class="text-sm text-gray-600">診療・サービス全般</p>
                    </div>
                    <div class="text-center">
                        <div class="w-24 h-24 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-3xl font-bold text-blue-600">96%</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">スタッフ対応</h3>
                        <p class="text-sm text-gray-600">やさしさ・丁寧さ</p>
                    </div>
                    <div class="text-center">
                        <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-3xl font-bold text-green-600">94%</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">待ち時間</h3>
                        <p class="text-sm text-gray-600">予約システム</p>
                    </div>
                    <div class="text-center">
                        <div class="w-24 h-24 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-3xl font-bold text-purple-600">97%</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">再来院意向</h3>
                        <p class="text-sm text-gray-600">また利用したい</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- お客様の声 -->
        <section class="py-16 bg-orange-25">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">皆様からのメッセージ</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- 体験談1 -->
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mr-4">
                                <span class="text-orange-600 font-bold">A.S</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">田中さん</h3>
                                <p class="text-sm text-gray-500">ゴールデンレトリバー・6歳</p>
                            </div>
                        </div>
                        <div class="flex mb-3">
                            <span class="text-yellow-400">★★★★★</span>
                        </div>
                        <p class="text-gray-600 mb-4">
                            「初めて利用させていただきましたが、スタッフの皆さんがとても優しく、愛犬もリラックスして診察を受けることができました。先生の説明も分かりやすく、安心してお任せできる病院だと思います。」
                        </p>
                        <div class="text-xs text-gray-400">
                            2024年12月
                        </div>
                    </div>

                    <!-- 体験談2 -->
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                                <span class="text-blue-600 font-bold">M.K</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">佐藤さん</h3>
                                <p class="text-sm text-gray-500">雑種猫・3歳</p>
                            </div>
                        </div>
                        <div class="flex mb-3">
                            <span class="text-yellow-400">★★★★★</span>
                        </div>
                        <p class="text-gray-600 mb-4">
                            「猫の皮膚炎で悩んでいましたが、丁寧な診察とアドバイスのおかげで症状が改善しました。オンライン予約システムも便利で、待ち時間が少ないのが助かります。」
                        </p>
                        <div class="text-xs text-gray-400">
                            2024年11月
                        </div>
                    </div>

                    <!-- 体験談3 -->
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                                <span class="text-green-600 font-bold">H.Y</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">山田さん</h3>
                                <p class="text-sm text-gray-500">柴犬・8歳</p>
                            </div>
                        </div>
                        <div class="flex mb-3">
                            <span class="text-yellow-400">★★★★★</span>
                        </div>
                        <p class="text-gray-600 mb-4">
                            「高齢犬の健康管理でお世話になっています。定期的な健診で病気の早期発見ができ、適切な治療を受けられました。院長先生をはじめ、スタッフの皆さんに感謝しています。」
                        </p>
                        <div class="text-xs text-gray-400">
                            2024年11月
                        </div>
                    </div>

                    <!-- 体験談4 -->
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                                <span class="text-purple-600 font-bold">R.T</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">鈴木さん</h3>
                                <p class="text-sm text-gray-500">トイプードル・2歳</p>
                            </div>
                        </div>
                        <div class="flex mb-3">
                            <span class="text-yellow-400">★★★★★</span>
                        </div>
                        <p class="text-gray-600 mb-4">
                            「避妊手術でお世話になりました。手術前の説明が丁寧で、術後のケアも親身にサポートしていただき、安心でした。病院内も清潔で、設備も整っています。」
                        </p>
                        <div class="text-xs text-gray-400">
                            2024年10月
                        </div>
                    </div>

                    <!-- 体験談5 -->
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center mr-4">
                                <span class="text-yellow-600 font-bold">K.N</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">中村さん</h3>
                                <p class="text-sm text-gray-500">アメリカンショートヘア・5歳</p>
                            </div>
                        </div>
                        <div class="flex mb-3">
                            <span class="text-yellow-400">★★★★★</span>
                        </div>
                        <p class="text-gray-600 mb-4">
                            「夜間に急に体調を崩した時、電話での応急処置のアドバイスをいただき、翌朝すぐに診察していただけました。緊急時の対応も素晴らしく、信頼できる病院です。」
                        </p>
                        <div class="text-xs text-gray-400">
                            2024年10月
                        </div>
                    </div>

                    <!-- 体験談6 -->
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mr-4">
                                <span class="text-red-600 font-bold">Y.W</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">渡辺さん</h3>
                                <p class="text-sm text-gray-500">ミニチュアダックスフンド・4歳</p>
                            </div>
                        </div>
                        <div class="flex mb-3">
                            <span class="text-yellow-400">★★★★★</span>
                        </div>
                        <p class="text-gray-600 mb-4">
                            「椎間板ヘルニアの治療でお世話になりました。手術はせずに、理学療法と投薬で治療していただき、今では元気に走り回っています。セカンドオピニオンも快く受けていただきました。」
                        </p>
                        <div class="text-xs text-gray-400">
                            2024年9月
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- カテゴリ別の声 -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">診療内容別のお声</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- 一般診療 -->
                    <div class="bg-blue-50 rounded-xl p-8">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800">一般診療について</h3>
                        </div>
                        <div class="space-y-4">
                            <blockquote class="border-l-4 border-blue-500 pl-4 text-gray-600">
                                「風邪の症状で受診しましたが、とても丁寧に診察していただきました。薬の説明も分かりやすく、安心でした。」
                                <footer class="text-sm text-gray-500 mt-2">- お客様 A.I様</footer>
                            </blockquote>
                            <blockquote class="border-l-4 border-blue-500 pl-4 text-gray-600">
                                「下痢が続いていた愛犬の診察で、原因を特定していただき、適切な治療で完治しました。」
                                <footer class="text-sm text-gray-500 mt-2">- お客様 M.O様</footer>
                            </blockquote>
                        </div>
                    </div>

                    <!-- 手術・外科 -->
                    <div class="bg-red-50 rounded-xl p-8">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800">手術・外科について</h3>
                        </div>
                        <div class="space-y-4">
                            <blockquote class="border-l-4 border-red-500 pl-4 text-gray-600">
                                「去勢手術でお世話になりました。手術前後のケアが素晴らしく、回復も順調でした。」
                                <footer class="text-sm text-gray-500 mt-2">- お客様 T.S様</footer>
                            </blockquote>
                            <blockquote class="border-l-4 border-red-500 pl-4 text-gray-600">
                                「腫瘍摘出手術を受けました。先生の技術力の高さと、スタッフの皆さんのサポートに感謝しています。」
                                <footer class="text-sm text-gray-500 mt-2">- お客様 H.K様</footer>
                            </blockquote>
                        </div>
                    </div>

                    <!-- 予防医療 -->
                    <div class="bg-green-50 rounded-xl p-8">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800">予防医療について</h3>
                        </div>
                        <div class="space-y-4">
                            <blockquote class="border-l-4 border-green-500 pl-4 text-gray-600">
                                「ワクチン接種で毎年お世話になっています。予約システムが便利で、待ち時間も短いです。」
                                <footer class="text-sm text-gray-500 mt-2">- お客様 N.F様</footer>
                            </blockquote>
                            <blockquote class="border-l-4 border-green-500 pl-4 text-gray-600">
                                「健康診断で早期に病気を発見していただき、大事に至らずに済みました。定期的なチェックの大切さを実感しています。」
                                <footer class="text-sm text-gray-500 mt-2">- お客様 K.M様</footer>
                            </blockquote>
                        </div>
                    </div>

                    <!-- スタッフ対応 -->
                    <div class="bg-purple-50 rounded-xl p-8">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800">スタッフ対応について</h3>
                        </div>
                        <div class="space-y-4">
                            <blockquote class="border-l-4 border-purple-500 pl-4 text-gray-600">
                                「受付の方から先生まで、皆さんとても親切で、初めてでも安心して利用できました。」
                                <footer class="text-sm text-gray-500 mt-2">- お客様 E.L様</footer>
                            </blockquote>
                            <blockquote class="border-l-4 border-purple-500 pl-4 text-gray-600">
                                「動物看護師さんが愛犬をやさしく扱ってくださり、怖がりの子も落ち着いて診察を受けられました。」
                                <footer class="text-sm text-gray-500 mt-2">- お客様 J.U様</footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 写真付き体験談 -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">元気になったペットたち</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="bg-white rounded-xl p-8 shadow-sm">
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <div class="bg-orange-100 rounded-xl h-48 flex items-center justify-center mb-4">
                                    <div class="text-center text-orange-600">
                                        <svg class="w-16 h-16 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                        </svg>
                                        <p class="text-sm">チョコちゃん</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">チョコちゃん（ラブラドール・7歳）</h3>
                                <p class="text-sm text-gray-600 mb-4">
                                    「股関節の手術でお世話になりました。術後のリハビリも含めて丁寧にサポートしていただき、今では元気に散歩しています。本当にありがとうございました。」
                                </p>
                                <div class="flex items-center">
                                    <span class="text-yellow-400 mr-2">★★★★★</span>
                                    <span class="text-sm text-gray-500">飼い主：田中様</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl p-8 shadow-sm">
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <div class="bg-blue-100 rounded-xl h-48 flex items-center justify-center mb-4">
                                    <div class="text-center text-blue-600">
                                        <svg class="w-16 h-16 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                        </svg>
                                        <p class="text-sm">ミケちゃん</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">ミケちゃん（三毛猫・5歳）</h3>
                                <p class="text-sm text-gray-600 mb-4">
                                    「腎臓病の治療で通院しています。食事療法や投薬指導も丁寧で、症状が安定しています。先生やスタッフの皆さんには感謝の気持ちでいっぱいです。」
                                </p>
                                <div class="flex items-center">
                                    <span class="text-yellow-400 mr-2">★★★★★</span>
                                    <span class="text-sm text-gray-500">飼い主：佐藤様</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- お客様の声募集 -->
        <section class="py-16 bg-orange-100">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">あなたの体験談をお聞かせください</h2>
                <p class="text-xl text-gray-600 mb-8">
                    やわらか動物病院での体験や、ペットの健康に関するエピソードをぜひお聞かせください。<br>
                    皆様の声が、より良い動物医療の提供につながります。
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="tel:03-1234-5678" class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-lg text-lg font-semibold transition-colors">
                        お電話でお声をお寄せください
                    </a>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="bg-white hover:bg-gray-50 text-orange-600 border border-orange-200 px-8 py-3 rounded-lg text-lg font-semibold transition-colors">
                            マイページから投稿
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="bg-white hover:bg-gray-50 text-orange-600 border border-orange-200 px-8 py-3 rounded-lg text-lg font-semibold transition-colors">
                            会員登録して投稿
                        </a>
                    @endauth
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