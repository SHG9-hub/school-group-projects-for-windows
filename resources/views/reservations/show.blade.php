<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('予約詳細') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">予約情報</h3>
                        
                        <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">予約日</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $reservation->reservation_datetime->format('Y年n月j日 (D)') }}
                                </dd>
                            </div>
                            
                            <div>
                                <dt class="text-sm font-medium text-gray-500">予約時間</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $reservation->reservation_datetime->format('H:i') }}
                                </dd>
                            </div>
                            
                            <div>
                                <dt class="text-sm font-medium text-gray-500">お客様名</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $reservation->user->name }}
                                </dd>
                            </div>
                            
                            <div>
                                <dt class="text-sm font-medium text-gray-500">ステータス</dt>
                                <dd class="mt-1">
                                    @if($reservation->reservation_datetime < now())
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            完了
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            予約中
                                        </span>
                                    @endif
                                </dd>
                            </div>
                            
                            <div>
                                <dt class="text-sm font-medium text-gray-500">予約日時</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $reservation->created_at->format('Y年n月j日 H:i') }}
                                </dd>
                            </div>
                        </dl>
                    </div>

                    @if($reservation->reservation_datetime > now())
                        <div class="border-t border-gray-200 pt-6">
                            <div class="bg-yellow-50 border border-yellow-200 rounded-md p-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="text-sm font-medium text-yellow-800">
                                            予約の変更・キャンセルについて
                                        </h3>
                                        <div class="mt-2 text-sm text-yellow-700">
                                            <p>
                                                予約の変更やキャンセルは、下記のボタンから行えます。<br>
                                                当日のキャンセルはお電話でお願いいたします。
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="flex items-center justify-between mt-6 pt-6 border-t border-gray-200">
                        <a href="{{ route('reservations.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                            一覧に戻る
                        </a>
                        
                        @if($reservation->reservation_datetime > now())
                            <div class="space-x-2">
                                <a href="{{ route('reservations.edit', $reservation) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                    変更
                                </a>
                                <form action="{{ route('reservations.destroy', $reservation) }}" method="POST" class="inline" onsubmit="return confirm('本当にキャンセルしますか？')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        キャンセル
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>