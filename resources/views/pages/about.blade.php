<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>病院紹介 - やわらか動物病院</title>
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
                        <a href="/about" class="text-orange-600 border-b-2 border-orange-600 font-semibold">病院紹介</a>
                        <a href="/services" class="text-gray-600 hover:text-orange-600 transition-colors">診療案内</a>
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
                    <span class="text-orange-600 font-semibold">病院紹介</span>
                </nav>
            </div>
        </div>

        <!-- ヘッダー -->
        <section class="bg-gradient-to-r from-orange-100 to-yellow-100 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                    病院紹介
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    「やわらか動物病院」は、ペットと飼い主様が安心して過ごせる、あたたかな動物病院を目指しています。
                </p>
            </div>
        </section>

        <!-- 院長挨拶 -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800 mb-6">院長挨拶</h2>
                        <div class="space-y-4 text-gray-600 leading-relaxed">
                            <p>
                                はじめまして。やわらか動物病院の院長、田中健一です。
                                この度は当院のホームページをご覧いただき、ありがとうございます。
                            </p>
                            <p>
                                当院は「やわらかな心で、あたたかな診療を」をモットーに、
                                ペットも飼い主様も安心して通院できる動物病院づくりを心がけています。
                            </p>
                            <p>
                                動物たちは言葉で症状を伝えることができません。
                                だからこそ、私たちは一頭一頭の小さなサインを見逃さず、
                                細やかな観察と丁寧な診察を大切にしています。
                            </p>
                            <p>
                                また、治療だけでなく予防医療にも力を入れており、
                                定期的な健康チェックを通じて、ペットたちの健康を長期的にサポートいたします。
                            </p>
                            <p>
                                ご不明な点やご心配なことがございましたら、
                                どんな小さなことでもお気軽にご相談ください。
                                スタッフ一同、心よりお待ちしております。
                            </p>
                        </div>
                        <div class="mt-8">
                            <p class="text-lg font-semibold text-gray-800">やわらか動物病院 院長</p>
                            <p class="text-2xl font-bold text-orange-600 mt-2">田中 健一</p>
                            <p class="text-sm text-gray-500 mt-1">獣医師・獣医学博士</p>
                        </div>
                    </div>
                    <div class="lg:order-first">
                        <div class="bg-orange-100 rounded-2xl p-8 text-center">
                            <div class="w-48 h-48 bg-orange-200 rounded-full mx-auto mb-6 flex items-center justify-center">
                                <svg class="w-24 h-24 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">田中 健一 院長</h3>
                            <p class="text-gray-600">獣医師・獣医学博士</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 病院の理念 -->
        <section class="py-16 bg-orange-25">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">病院の理念</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-white rounded-xl p-8 text-center shadow-sm">
                        <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">やわらかな心</h3>
                        <p class="text-gray-600 leading-relaxed">
                            ペットの気持ちに寄り添い、ストレスを感じさせない優しい診療を心がけています。恐怖心を取り除き、リラックスして治療を受けられる環境作りを大切にしています。
                        </p>
                    </div>
                    <div class="bg-white rounded-xl p-8 text-center shadow-sm">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">専門的な知識</h3>
                        <p class="text-gray-600 leading-relaxed">
                            最新の獣医学知識と技術を常に学び続け、エビデンスに基づいた適切な診断と治療を提供します。継続的な研修により、質の高い医療を維持しています。
                        </p>
                    </div>
                    <div class="bg-white rounded-xl p-8 text-center shadow-sm">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">チーム医療</h3>
                        <p class="text-gray-600 leading-relaxed">
                            獣医師、動物看護師、受付スタッフが連携し、チーム一丸となってペットの健康をサポートします。各専門分野の知識を活かした総合的なケアを提供します。
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- スタッフ紹介 -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">スタッフ紹介</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- 院長 -->
                    <div class="text-center">
                        <div class="w-32 h-32 bg-orange-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <svg class="w-16 h-16 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">田中 健一</h3>
                        <p class="text-orange-600 font-medium">院長・獣医師</p>
                        <p class="text-sm text-gray-600 mt-2">
                            小動物内科・外科<br>
                            獣医師歴15年
                        </p>
                    </div>

                    <!-- 副院長 -->
                    <div class="text-center">
                        <div class="w-32 h-32 bg-blue-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <svg class="w-16 h-16 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">佐藤 美和</h3>
                        <p class="text-blue-600 font-medium">副院長・獣医師</p>
                        <p class="text-sm text-gray-600 mt-2">
                            皮膚科・眼科専門<br>
                            獣医師歴12年
                        </p>
                    </div>

                    <!-- 動物看護師長 -->
                    <div class="text-center">
                        <div class="w-32 h-32 bg-green-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <svg class="w-16 h-16 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">山田 花子</h3>
                        <p class="text-green-600 font-medium">動物看護師長</p>
                        <p class="text-sm text-gray-600 mt-2">
                            手術・入院管理<br>
                            看護師歴10年
                        </p>
                    </div>

                    <!-- 動物看護師 -->
                    <div class="text-center">
                        <div class="w-32 h-32 bg-purple-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <svg class="w-16 h-16 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">鈴木 太郎</h3>
                        <p class="text-purple-600 font-medium">動物看護師</p>
                        <p class="text-sm text-gray-600 mt-2">
                            検査・受付業務<br>
                            看護師歴5年
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 院長経歴 -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">院長経歴</h2>
                <div class="space-y-6">
                    <div class="bg-white rounded-lg p-6 border-l-4 border-orange-500">
                        <div class="flex items-center mb-2">
                            <span class="bg-orange-100 text-orange-800 text-sm font-semibold px-3 py-1 rounded-full">2009年</span>
                            <h3 class="text-lg font-semibold text-gray-800 ml-4">日本獣医生命科学大学 獣医学部 卒業</h3>
                        </div>
                        <p class="text-gray-600 ml-20">獣医師国家試験合格、獣医師免許取得</p>
                    </div>
                    
                    <div class="bg-white rounded-lg p-6 border-l-4 border-blue-500">
                        <div class="flex items-center mb-2">
                            <span class="bg-blue-100 text-blue-800 text-sm font-semibold px-3 py-1 rounded-full">2009-2014年</span>
                            <h3 class="text-lg font-semibold text-gray-800 ml-4">都内大手動物病院勤務</h3>
                        </div>
                        <p class="text-gray-600 ml-20">小動物内科・外科の基礎を学び、多数の症例を経験</p>
                    </div>
                    
                    <div class="bg-white rounded-lg p-6 border-l-4 border-green-500">
                        <div class="flex items-center mb-2">
                            <span class="bg-green-100 text-green-800 text-sm font-semibold px-3 py-1 rounded-full">2015-2019年</span>
                            <h3 class="text-lg font-semibold text-gray-800 ml-4">大学院進学・研究活動</h3>
                        </div>
                        <p class="text-gray-600 ml-20">獣医学博士号取得、消化器疾患の研究に従事</p>
                    </div>
                    
                    <div class="bg-white rounded-lg p-6 border-l-4 border-purple-500">
                        <div class="flex items-center mb-2">
                            <span class="bg-purple-100 text-purple-800 text-sm font-semibold px-3 py-1 rounded-full">2020年</span>
                            <h3 class="text-lg font-semibold text-gray-800 ml-4">やわらか動物病院 開院</h3>
                        </div>
                        <p class="text-gray-600 ml-20">地域に根ざした動物医療の提供を目指して開院</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 設備紹介 -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">院内設備</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-orange-50 rounded-xl p-6">
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">デジタルX線装置</h3>
                        <p class="text-gray-600">最新のデジタルX線装置により、高画質な画像診断が可能です。</p>
                    </div>
                    
                    <div class="bg-blue-50 rounded-xl p-6">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">超音波診断装置</h3>
                        <p class="text-gray-600">内臓の状態をリアルタイムで確認できる高性能超音波装置を導入。</p>
                    </div>
                    
                    <div class="bg-green-50 rounded-xl p-6">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">血液検査機器</h3>
                        <p class="text-gray-600">院内で迅速な血液検査が可能、その場で結果をお伝えできます。</p>
                    </div>
                    
                    <div class="bg-yellow-50 rounded-xl p-6">
                        <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">手術室</h3>
                        <p class="text-gray-600">清潔で設備の整った手術室で安全な外科手術を実施しています。</p>
                    </div>
                    
                    <div class="bg-purple-50 rounded-xl p-6">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v3H8V5z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">入院室</h3>
                        <p class="text-gray-600">術後管理や治療のための快適な入院環境を完備しています。</p>
                    </div>
                    
                    <div class="bg-red-50 rounded-xl p-6">
                        <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">待合室</h3>
                        <p class="text-gray-600">ペットも飼い主様もリラックスできる明るく清潔な待合室です。</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTAセクション -->
        <section class="py-16 bg-orange-100">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">診察のご予約はこちら</h2>
                <p class="text-xl text-gray-600 mb-8">
                    ご質問やご相談がございましたら、お気軽にお問い合わせください。
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