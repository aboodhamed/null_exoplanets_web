<x-layout>
    <main class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8 min-h-screen" dir="rtl">
        <div class="bg-gray-900 rounded-2xl shadow-2xl p-6 sm:p-8 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-[#008080]/10 to-gray-500/10 opacity-50 pointer-events-none"></div>

            <h1 class="text-4xl font-extrabold text-center mb-6 bg-[#008080] text-transparent bg-clip-text animate-fade-in relative z-10">
                الجلسات النشطة - ExoHunter
            </h1>

            <div class="bg-[#008080] p-6 sm:p-8 rounded-xl shadow-lg transition-all duration-300 hover:shadow-xl relative z-10">
                <h2 class="text-2xl font-bold text-white mb-6 flex items-center space-x-2 space-x-reverse">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5v14"></path></svg>
                    <span>جميع الجلسات</span>
                </h2>
                <div class="mb-6">
                    <form method="GET" action="{{ route('sessions.index') }}" class="flex items-center space-x-2 space-x-reverse">
                        <input type="text" name="search" value="{{ request()->input('search') ?? '' }}" placeholder="ابحث عن جلسة"
                               class="w-full max-w-md rounded-lg border-gray-300 shadow-sm focus:ring-[#008080] focus:border-[#008080] text-gray-900 p-2">
                        <button type="submit" class="px-4 py-2 bg-[#008080] text-white rounded-lg hover:bg-[#006666] transition-all duration-300 transform hover:scale-105">
                            بحث
                        </button>
                    </form>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-white">
                        <thead>
                            <tr class="text-right">
                                <th class="py-3 px-4">المستخدم</th>
                                <th class="py-3 px-4">عنوان IP</th>
                                <th class="py-3 px-4">الجهاز</th>
                                <th class="py-3 px-4">آخر نشاط</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sessions as $session)
                                <tr class="border-t border-white/20">
                                    <td class="py-3 px-4">{{ $session->name ?? 'زائر' }}</td>
                                    <td class="py-3 px-4">{{ $session->ip_address }}</td>
                                    <td class="py-3 px-4">{{ $session->user_agent }}</td>
                                    <td class="py-3 px-4">{{ \Carbon\Carbon::createFromTimestamp($session->last_activity)->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-6 text-white text-sm">
                        عرض {{ $showing }} من إجمالي {{ $total }} نتيجة
                    </div>
                    <div class="mt-6">
                        {{ $sessions->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </main>

    <style>
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes slideIn { from { opacity: 0; transform: translateX(20px); } to { opacity: 1; transform: translateX(0); } }
        @keyframes scaleIn { from { opacity: 0; transform: scale(0.95); } to { opacity: 1; transform: scale(1); } }
        .animate-fade-in { animation: fadeIn 0.5s ease-out forwards; }
        .animate-slide-in { animation: slideIn 0.5s ease-out forwards; }
        .animate-scale-in { animation: scaleIn 0.3s ease-out forwards; }
        [dir="rtl"] .animate-slide-in { animation: slideInRTL 0.5s ease-out forwards; }
        @keyframes slideInRTL { from { opacity: 0; transform: translateX(-20px); } to { opacity: 1; transform: translateX(0); } }
    </style>
</x-layout>