<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>よくある質問 - やわらか動物病院</title>
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
                        <a href="/faq" class="text-orange-600 border-b-2 border-orange-600 font-semibold">よくある質問</a>
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
                    <span class="text-orange-600 font-semibold">よくある質問</span>
                </nav>
            </div>
        </div>

        <!-- ヘッダー -->
        <section class="bg-gradient-to-r from-orange-100 to-yellow-100 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                    よくある質問
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    やわらか動物病院によく寄せられるご質問にお答えします。その他ご不明な点がございましたら、お気軽にお問い合わせください。
                </p>
            </div>
        </section>

        <!-- カテゴリ別質問 -->
        <section class="py-16 bg-white">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- 予約について -->
                <div class="mb-12">
                    <div class="flex items-center mb-8">
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">予約について</h2>
                    </div>

                    <div class="space-y-6">
                        <div class="bg-orange-50 rounded-xl p-6 border border-orange-100">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Q. 予約は必要ですか？</h3>
                            <p class="text-gray-600">
                                A. はい、当院は完全予約制となっております。オンライン予約システムまたはお電話でご予約をお取りください。緊急時を除き、予約なしでの診察は承っておりませんので、あらかじめご了承ください。
                            </p>
                        </div>

                        <div class="bg-orange-50 rounded-xl p-6 border border-orange-100">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Q. 当日予約は可能ですか？</h3>
                            <p class="text-gray-600">
                                A. 空きがあれば当日予約も可能です。オンライン予約システムで空き状況をご確認いただくか、お電話でお問い合わせください。ただし、予約が混み合う場合もございますので、お早めのご予約をおすすめいたします。
                            </p>
                        </div>

                        <div class="bg-orange-50 rounded-xl p-6 border border-orange-100">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Q. 予約の変更・キャンセルはできますか？</h3>
                            <p class="text-gray-600">
                                A. はい、可能です。オンラインまたはお電話で変更・キャンセルを承っております。他の患者様のご迷惑になりますので、変更やキャンセルの際は必ずご連絡をお願いいたします。
                            </p>
                        </div>

                        <div class="bg-orange-50 rounded-xl p-6 border border-orange-100">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Q. 遅刻してしまった場合はどうなりますか？</h3>
                            <p class="text-gray-600">
                                A. 遅刻される場合は必ずご連絡ください。10分程度の遅刻でしたら診察可能ですが、それ以上の遅刻の場合は他の患者様の診察状況により、お待ちいただくか予約を取り直していただく場合がございます。
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 診察について -->
                <div class="mb-12">
                    <div class="flex items-center mb-8">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">診察について</h2>
                    </div>

                    <div class="space-y-6">
                        <div class="bg-blue-50 rounded-xl p-6 border border-blue-100">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Q. 初診時に必要な持ち物はありますか？</h3>
                            <p class="text-gray-600">
                                A. 初診時は以下をお持ちください：<br>
                                • ワクチン証明書（接種済みの場合）<br>
                                • 健康保険証（ペット保険加入の場合）<br>
                                • 他院からの紹介状や検査結果（ある場合）<br>
                                • 現在服用中のお薬（ある場合）
                            </p>
                        </div>

                        <div class="bg-blue-50 rounded-xl p-6 border border-blue-100">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Q. どのような動物を診てもらえますか？</h3>
                            <p class="text-gray-600">
                                A. 犬・猫を中心に診察しております。その他の動物につきましては、診察可能かどうか事前にお電話でご相談ください。専門的な治療が必要な場合は、適切な病院をご紹介いたします。
                            </p>
                        </div>

                        <div class="bg-blue-50 rounded-xl p-6 border border-blue-100">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Q. セカンドオピニオンは受けられますか？</h3>
                            <p class="text-gray-600">
                                A. はい、セカンドオピニオンも承っております。他院での診断や治療方針について、別の視点からの意見をお求めの際はお気軽にご相談ください。これまでの検査結果や診療記録をお持ちいただけるとより詳しく検討できます。
                            </p>
                        </div>

                        <div class="bg-blue-50 rounded-xl p-6 border border-blue-100">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Q. 診察時間はどのくらいかかりますか？</h3>
                            <p class="text-gray-600">
                                A. 診察内容により異なりますが、初診は30分程度、再診は15-20分程度を目安としております。検査や処置が必要な場合は、さらにお時間をいただく場合がございます。お時間に余裕を持ってお越しください。
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 料金・支払いについて -->
                <div class="mb-12">
                    <div class="flex items-center mb-8">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">料金・支払いについて</h2>
                    </div>

                    <div class="space-y-6">
                        <div class="bg-green-50 rounded-xl p-6 border border-green-100">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Q. 支払い方法を教えてください</h3>
                            <p class="text-gray-600">
                                A. 以下のお支払い方法をご利用いただけます：<br>
                                • 現金<br>
                                • 各種クレジットカード（VISA、MasterCard、JCB、AMEX等）<br>
                                • 電子マネー（Suica、PASMO、iD、QUICPay等）<br>
                                • QRコード決済（PayPay、d払い等）
                            </p>
                        </div>

                        <div class="bg-green-50 rounded-xl p-6 border border-green-100">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Q. ペット保険は使えますか？</h3>
                            <p class="text-gray-600">
                                A. はい、各種ペット保険に対応しております。一部の保険会社では窓口精算が可能です。保険証をお持ちいただき、事前にお申し出ください。窓口精算に対応していない保険の場合は、後日お客様ご自身で保険会社にご請求いただくことになります。
                            </p>
                        </div>

                        <div class="bg-green-50 rounded-xl p-6 border border-green-100">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Q. 料金の見積もりはもらえますか？</h3>
                            <p class="text-gray-600">
                                A. はい、手術や高額な治療が必要な場合は、事前に詳細な見積もりをお渡しいたします。治療内容や料金についてご不明な点がございましたら、遠慮なくお尋ねください。患者様にご納得いただいてから治療を進めるよう心がけております。
                            </p>
                        </div>

                        <div class="bg-green-50 rounded-xl p-6 border border-green-100">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Q. 分割払いはできますか？</h3>
                            <p class="text-gray-600">
                                A. 高額な治療費については、クレジットカードの分割払い・リボ払いをご利用いただけます。また、状況に応じて治療計画の調整もご相談させていただきますので、お気軽にお声かけください。
                            </p>
                        </div>
                    </div>
                </div>

                <!-- ワクチン・予防について -->
                <div class="mb-12">
                    <div class="flex items-center mb-8">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">ワクチン・予防について</h2>
                    </div>

                    <div class="space-y-6">
                        <div class="bg-purple-50 rounded-xl p-6 border border-purple-100">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Q. ワクチンはいつ受ければよいですか？</h3>
                            <p class="text-gray-600">
                                A. 子犬・子猫は生後6-8週から初回接種を開始し、3-4週間隔で2-3回接種します。成犬・成猫は年1回の追加接種をおすすめしています。ペットの年齢や健康状態、生活環境に応じて最適な接種スケジュールをご提案いたします。
                            </p>
                        </div>

                        <div class="bg-purple-50 rounded-xl p-6 border border-purple-100">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Q. フィラリア予防はいつからいつまで必要ですか？</h3>
                            <p class="text-gray-600">
                                A. 関東地方では4月から12月までの予防が必要です。蚊の活動期間に合わせて予防薬を投与します。予防薬には錠剤タイプ、チュアブルタイプ、注射タイプがありますので、ペットに最適なものをご相談いたします。
                            </p>
                        </div>

                        <div class="bg-purple-50 rounded-xl p-6 border border-purple-100">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Q. ノミ・ダニ予防はどうすればよいですか？</h3>
                            <p class="text-gray-600">
                                A. 通年の予防をおすすめしています。スポットタイプ（首筋に滴下）、内服薬、首輪タイプなど様々な予防薬があります。ペットの生活環境や飼い主様のご希望に応じて、最適な予防方法をご提案いたします。
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 緊急時について -->
                <div class="mb-12">
                    <div class="flex items-center mb-8">
                        <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">緊急時について</h2>
                    </div>

                    <div class="space-y-6">
                        <div class="bg-red-50 rounded-xl p-6 border border-red-100">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Q. 診療時間外に具合が悪くなった場合はどうすればよいですか？</h3>
                            <p class="text-gray-600">
                                A. まずは当院にお電話ください。緊急度を判断し、応急処置のアドバイスをいたします。生命に関わる状況の場合は、夜間救急病院をご紹介いたします。普段からかかりつけ医として症状を把握しているため、適切な指示ができます。
                            </p>
                        </div>

                        <div class="bg-red-50 rounded-xl p-6 border border-red-100">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Q. どのような症状の時に緊急受診が必要ですか？</h3>
                            <p class="text-gray-600 mb-4">
                                A. 以下のような症状がある場合は緊急受診をおすすめします：
                            </p>
                            <ul class="text-gray-600 space-y-1 ml-4">
                                <li>• 意識がない、ぐったりしている</li>
                                <li>• 呼吸が苦しそう、チアノーゼがある</li>
                                <li>• 大量出血している</li>
                                <li>• 激しい嘔吐・下痢が続く</li>
                                <li>• けいれんを起こしている</li>
                                <li>• 交通事故など外傷がある</li>
                                <li>• 異物を誤飲した可能性がある</li>
                            </ul>
                        </div>

                        <div class="bg-red-50 rounded-xl p-6 border border-red-100">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Q. 夜間対応はしていますか？</h3>
                            <p class="text-gray-600">
                                A. 当院では夜間診療は行っておりませんが、緊急時は24時間対応の夜間救急病院と連携しております。まずは当院にお電話いただければ、適切な病院をご紹介し、必要に応じて紹介状もお作りいたします。
                            </p>
                        </div>
                    </div>
                </div>

                <!-- その他 -->
                <div class="mb-12">
                    <div class="flex items-center mb-8">
                        <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">その他</h2>
                    </div>

                    <div class="space-y-6">
                        <div class="bg-yellow-50 rounded-xl p-6 border border-yellow-100">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Q. 駐車場はありますか？</h3>
                            <p class="text-gray-600">
                                A. はい、病院専用の駐車場を5台分ご用意しております。満車の場合は近隣のコインパーキングをご利用ください。駐車料金の補助制度はございませんが、診察時間によってはサービス券をお渡しする場合があります。
                            </p>
                        </div>

                        <div class="bg-yellow-50 rounded-xl p-6 border border-yellow-100">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Q. ペットホテルやトリミングサービスはありますか？</h3>
                            <p class="text-gray-600">
                                A. 申し訳ございませんが、当院ではペットホテルやトリミングサービスは行っておりません。信頼できる提携施設をご紹介することは可能ですので、ご希望の際はお声かけください。
                            </p>
                        </div>

                        <div class="bg-yellow-50 rounded-xl p-6 border border-yellow-100">
                            <h3 class="text-lg font-semibold text-gray-808 mb-3">Q. 往診はしていますか？</h3>
                            <p class="text-gray-600">
                                A. はい、状況に応じて往診も承っております。高齢や病気で来院が困難な場合、また終末期ケアなどでご相談ください。往診エリアや料金については、事前にお問い合わせください。できる限り対応させていただきます。
                            </p>
                        </div>

                        <div class="bg-yellow-50 rounded-xl p-6 border border-yellow-100">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Q. 診察券を忘れた場合はどうすればよいですか？</h3>
                            <p class="text-gray-600">
                                A. 診察券をお忘れの場合でも、お名前とペットのお名前で受付いたします。再発行も可能ですので、受付でお申し出ください。次回からは忘れずにお持ちいただくようお願いいたします。
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- お問い合わせCTA -->
        <section class="py-16 bg-orange-100">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">他にご質問はございませんか？</h2>
                <p class="text-xl text-gray-600 mb-8">
                    こちらに掲載されていないご質問やご不明な点がございましたら、<br>
                    お気軽にお問い合わせください。
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="tel:03-1234-5678" class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-lg text-lg font-semibold transition-colors">
                        お電話でお問い合わせ
                    </a>
                    @auth
                        <a href="{{ route('reservations.calendar') }}" class="bg-white hover:bg-gray-50 text-orange-600 border border-orange-200 px-8 py-3 rounded-lg text-lg font-semibold transition-colors">
                            オンライン予約
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="bg-white hover:bg-gray-50 text-orange-600 border border-orange-200 px-8 py-3 rounded-lg text-lg font-semibold transition-colors">
                            会員登録して予約
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
                            <a href="/testimonials" class="block hover:text-orange-300 transition-colors">お客様の声</a>
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