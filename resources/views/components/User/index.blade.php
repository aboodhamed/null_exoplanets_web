<x-layout>
    <!-- Main Content -->
    <main class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8 min-h-screen" dir="rtl">
        <div class="relative bg-white/80 dark:bg-gray-900/80 rounded-3xl shadow-2xl p-6 sm:p-8 overflow-hidden border-2 border-[#008080]/50 transition-all duration-500 hover:shadow-2xl hover:shadow-[#008080]/60 ">
            <!-- Decorative Background Element -->
            <div class="absolute inset-0 gradient-overlay rounded-2xl pointer-events-none"></div>

            <!-- Page Title -->
            <h1 class="text-4xl font-extrabold text-center mb-6 bg-gradient-to-r from-[#008080] to-[#00CED1] text-transparent bg-clip-text animate-fade-in relative z-10">
                حسابي
            </h1>

            <!-- Success & Error Messages -->
            @if(session('success'))
                <div class="bg-green-50 border border-green-300 text-green-600 px-4 py-3 rounded-lg my-4 shadow-sm animate-slide-in flex items-center space-x-2 space-x-reverse" role="alert">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif
            @if(session('error'))
                <div class="bg-red-50 border border-red-300 text-red-600 px-4 py-3 rounded-lg my-4 shadow-sm animate-slide-in flex items-center space-x-2 space-x-reverse" role="alert">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <!-- Account Information and Forms Section -->
            <div class="space-y-10 relative z-10">
                <!-- Profile Information -->
                <div class="bg-gradient-to-r from-[#008080] to-[#006666] p-6 sm:p-8 rounded-xl shadow-lg transition-all duration-300 hover:shadow-xl">
                    <h2 class="text-2xl font-bold text-white mb-6 flex items-center space-x-2 space-x-reverse animate-fade-in">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span>معلومات الحساب</span>
                    </h2>
                    <form method="POST" action="/account/update" class="space-y-6">
                        @csrf
                        @method('PUT')
                        <!-- Name -->
                        <div class="relative">
                            <label for="name" class="block text-sm font-medium text-white">الاسم</label>
                            <div class="mt-2 flex items-center rounded-lg bg-white/95 p-3 shadow-sm hover:bg-gray-50 transition-colors duration-200">
                                <svg class="w-5 h-5 text-[#008080] ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                <input type="text" name="name" id="name" value="{{ Auth::user()->name }}"
                                       class="block w-full bg-transparent text-gray-900 placeholder-gray-500 focus:outline-none border-none focus:ring-0 sm:text-sm p-1">
                            </div>
                            <x-form-error name="name" class="text-red-200 text-sm mt-1" />
                        </div>
                        <!-- Email -->
                        <div class="relative">
                            <label for="email" class="block text-sm font-medium text-white">الايميل</label>
                            <div class="mt-2 flex items-center rounded-lg bg-white/95 p-3 shadow-sm hover:bg-gray-50 transition-colors duration-200">
                                <svg class="w-5 h-5 text-[#008080] ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l9-6 9 6v12a2 2 0 01-2 2H5a2 2 0 01-2-2V8z"></path></svg>
                                <input type="email" name="email" id="email" value="{{ Auth::user()->email }}"
                                       class="block w-full bg-transparent text-gray-900 placeholder-gray-500 focus:outline-none border-none focus:ring-0 sm:text-sm p-1">
                            </div>
                            <x-form-error name="email" class="text-red-200 text-sm mt-1" />
                        </div>
                        <!-- Phone Number -->
                        <div class="relative">
                            <label for="MobileNumber" class="block text-sm font-medium text-white">رقم الهاتف</label>
                            <div class="mt-2 flex items-center rounded-lg bg-white/95 p-3 shadow-sm hover:bg-gray-50 transition-colors duration-200">
                                <svg class="w-5 h-5 text-[#008080] ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h18M9 3v2m6-2v2M3 19h18M9 21v-2m6 2v-2m-9-7h12"></path></svg>
                                <input type="text" name="MobileNumber" id="MobileNumber" value="{{ Auth::user()->MobileNumber }}"
                                       class="block w-full bg-transparent text-gray-900 placeholder-gray-500 focus:outline-none border-none focus:ring-0 sm:text-sm p-1">
                            </div>
                            <x-form-error name="MobileNumber" class="text-red-200 text-sm mt-1" />
                        </div>
                        <!-- Role (Display Only) -->
                        <div class="relative">
                            <label for="role" class="block text-sm font-medium text-white">دورك</label>
                            <div class="mt-2 flex items-center rounded-lg bg-white/95 p-3 shadow-sm">
                                <svg class="w-5 h-5 text-[#008080] ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.66 0 3-1.34 3-3S13.66 5 12 5s-3 1.34-3 3 1.34 3 3 3zm0 2c-2.76 0-5 2.24-5 5h10c0-2.76-2.24-5-5-5z"></path></svg>
                                <input type="text" id="role" value="{{ Auth::user()->role->RoleName ?? 'لم يتم تعيين دور' }}"
                                       class="block w-full bg-transparent text-gray-900 placeholder-gray-500 focus:outline-none border-none focus:ring-0 sm:text-sm p-1" disabled>
                            </div>
                        </div>
                        <!-- Save Button -->
                        <div class="flex justify-end">
                            <button type="submit"
                                    class="inline-flex items-center py-2 px-4 rounded-lg text-sm font-semibold text-white bg-gradient-to-r from-[#008080] to-[#006666] hover:from-[#006666] hover:to-[#004d4d] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#008080] transition-all duration-300 transform hover:scale-105 shadow-md">
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                حفظ التغييرات
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Change Password Section -->
                <div class="bg-gradient-to-r from-[#008080] to-[#006666] p-6 sm:p-8 rounded-xl shadow-lg transition-all duration-300 hover:shadow-xl">
                    <h2 class="text-2xl font-bold text-white mb-6 flex items-center space-x-2 space-x-reverse animate-fade-in">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.66 0 3-1.34 3-3S13.66 5 12 5s-3 1.34-3 3 1.34 3 3 3zm0 2c-2.76 0-5 2.24-5 5h10c0-2.76-2.24-5-5-5z"></path></svg>
                        <span>تغيير كلمة السر</span>
                    </h2>
                    <form method="POST" action="/account/change-password" class="space-y-6">
                        @csrf
                        <!-- Current Password -->
                        <div class="relative">
                            <label for="current_password" class="block text-sm font-medium text-white">كلمة السر الحالية</label>
                            <div class="mt-2 flex items-center rounded-lg bg-white/95 p-3 shadow-sm hover:bg-gray-50 transition-colors duration-200">
                                <svg class="w-5 h-5 text-[#008080] ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.66 0 3-1.34 3-3S13.66 5 12 5s-3 1.34-3 3 1.34 3 3 3zm0 2c-2.76 0-5 2.24-5 5h10c0-2.76-2.24-5-5-5z"></path></svg>
                                <input type="password" name="current_password" id="current_password"
                                       class="block w-full bg-transparent text-gray-900 placeholder-gray-500 focus:outline-none border-none focus:ring-0 sm:text-sm p-1">
                            </div>
                            <x-form-error name="current_password" class="text-red-200 text-sm mt-1" />
                        </div>
                        <!-- New Password -->
                        <div class="relative">
                            <label for="new_password" class="block text-sm font-medium text-white">كلمة السر الجديدة</label>
                            <div class="mt-2 flex items-center rounded-lg bg-white/95 p-3 shadow-sm hover:bg-gray-50 transition-colors duration-200">
                                <svg class="w-5 h-5 text-[#008080] ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.66 0 3-1.34 3-3S13.66 5 12 5s-3 1.34-3 3 1.34 3 3 3zm0 2c-2.76 0-5 2.24-5 5h10c0-2.76-2.24-5-5-5z"></path></svg>
                                <input type="password" name="new_password" id="new_password"
                                       class="block w-full bg-transparent text-gray-900 placeholder-gray-500 focus:outline-none border-none focus:ring-0 sm:text-sm p-1">
                            </div>
                            <x-form-error name="new_password" class="text-red-200 text-sm mt-1" />
                        </div>
                        <!-- Confirm New Password -->
                        <div class="relative">
                            <label for="new_password_confirmation" class="block text-sm font-medium text-white">تأكيد كلمة السر</label>
                            <div class="mt-2 flex items-center rounded-lg bg-white/95 p-3 shadow-sm hover:bg-gray-50 transition-colors duration-200">
                                <svg class="w-5 h-5 text-[#008080] ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.66 0 3-1.34 3-3S13.66 5 12 5s-3 1.34-3 3 1.34 3 3 3zm0 2c-2.76 0-5 2.24-5 5h10c0-2.76-2.24-5-5-5z"></path></svg>
                                <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                                       class="block w-full bg-transparent text-gray-900 placeholder-gray-500 focus:outline-none border-none focus:ring-0 sm:text-sm p-1">
                            </div>
                            <x-form-error name="new_password_confirmation" class="text-red-200 text-sm mt-1" />
                        </div>
                        <!-- Update Password Button -->
                        <div class="flex justify-end">
                            <button type="submit"
                                    class="inline-flex items-center py-2 px-4 rounded-lg text-sm font-semibold text-white bg-gradient-to-r from-[#008080] to-[#006666] hover:from-[#006666] hover:to-[#004d4d] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#008080] transition-all duration-300 transform hover:scale-105 shadow-md">
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                تحديث كلمة السر
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Delete Account Section -->
                <div class="bg-gradient-to-r from-[#008080] to-[#006666] p-6 sm:p-8 rounded-xl shadow-lg transition-all duration-300 hover:shadow-xl">
                    <h2 class="text-2xl font-bold text-white mb-6 flex items-center space-x-2 space-x-reverse animate-fade-in">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        <span>حذف الحساب</span>
                    </h2>
                    <p class="text-sm text-white/90 mb-6">بمجرد حذف حسابك، سيتم حذف جميع موارده وبياناته نهائيًا. يرجى إدخال كلمة المرور للتأكيد.</p>
                    <form method="POST" action="/account/delete" id="deleteAccountForm" class="space-y-6">
                        @csrf
                        @method('DELETE')
                        <!-- Password -->
                        <div class="relative">
                            <label for="password" class="block text-sm font-medium text-white">كلمة السر</label>
                            <div class="mt-2 flex items-center rounded-lg bg-white/95 p-3 shadow-sm hover:bg-gray-50 transition-colors duration-200">
                                <svg class="w-5 h-5 text-[#008080] ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.66 0 3-1.34 3-3S13.66 5 12 5s-3 1.34-3 3 1.34 3 3 3zm0 2c-2.76 0-5 2.24-5 5h10c0-2.76-2.24-5-5-5z"></path></svg>
                                <input type="password" name="password" id="password"
                                       class="block w-full bg-transparent text-gray-900 placeholder-gray-500 focus:outline-none border-none focus:ring-0 sm:text-sm p-1">
                            </div>
                            <x-form-error name="password" class="text-red-200 text-sm mt-1" />
                        </div>
                        <!-- Delete Account Button -->
                        <div class="flex justify-end">
                            <button type="button" id="deleteAccountButton"
                                    class="inline-flex items-center py-2 px-4 rounded-lg text-sm font-semibold text-white bg-red-500 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-300 transform hover:scale-105 shadow-md">
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                حذف الحساب
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Delete Account Confirmation Modal -->
                <div id="deleteAccountModal" class="fixed inset-0 bg-black/70 flex items-center justify-center hidden transition-opacity duration-300 z-50">
                    <div class="bg-white rounded-xl p-6 w-full max-w-md shadow-2xl animate-scale-in relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-red-500 to-red-700"></div>
                        <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center space-x-2 space-x-reverse">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>هل أنت متأكد؟</span>
                        </h2>
                        <p class="text-gray-600 mb-6">هذا الإجراء سيحذف حسابك وجميع البيانات المرتبطة به نهائيًا. لا يمكن التراجع عن هذا الإجراء.</p>
                        <div class="flex justify-end space-x-4 space-x-reverse">
                            <button id="cancelDelete" class="px-4 py-2 bg-gray-200 rounded-lg text-gray-700 hover:bg-gray-300 focus:outline-none transition-all duration-200 transform hover:scale-105">
                                إلغاء
                            </button>
                            <button id="confirmDelete" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-700 focus:outline-none transition-all duration-200 transform hover:scale-105 flex items-center space-x-2 space-x-reverse">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                <span>حذف الحساب</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <style>
        /* Custom Animations */
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes slideIn { from { opacity: 0; transform: translateX(-20px); } to { opacity: 1; transform: translateX(0); } }
        @keyframes scaleIn { from { opacity: 0; transform: scale(0.95); } to { opacity: 1; transform: scale(1); } }
        .animate-fade-in { animation: fadeIn 0.5s ease-out forwards; }
        .animate-slide-in { animation: slideIn 0.5s ease-out forwards; }
        .animate-scale-in { animation: scaleIn 0.3s ease-out forwards; }

        /* Gradient Overlay */
        .gradient-overlay {
            background: linear-gradient(135deg, rgba(0, 128, 128, 0.2), rgba(0, 206, 209, 0.1));
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 16px;
        }

        /* Responsive Adjustments */
        @media (max-width: 640px) {
            .text-4xl { font-size: 2rem; }
            .text-2xl { font-size: 1.5rem; }
            .p-6 { padding: 1.5rem; }
            .p-8 { padding: 1.5rem; }
            .py-10 { padding-top: 2rem; padding-bottom: 2rem; }
            .space-y-10 > * + * { margin-top: 1.5rem; }
        }

        /* RTL Adjustments */
        [dir="rtl"] .animate-slide-in {
            animation: slideInRTL 0.5s ease-out forwards;
        }
        @keyframes slideInRTL { from { opacity: 0; transform: translateX(20px); } to { opacity: 1; transform: translateX(0); } }

        /* Additional Styling */
        input:disabled {
            color: #666;
            background-color: #f9f9f9;
        }
        .hover:bg-gray-50:hover {
            background-color: #f9fafb;
        }
    </style>

    <!-- Script for Delete Account Confirmation Modal -->
    <script>
        const deleteAccountModal = document.getElementById('deleteAccountModal');
        const deleteAccountForm = document.getElementById('deleteAccountForm');
        const deleteAccountButton = document.getElementById('deleteAccountButton');
        const cancelDeleteButton = document.getElementById('cancelDelete');
        const confirmDeleteButton = document.getElementById('confirmDelete');

        deleteAccountButton.addEventListener('click', function (e) {
            e.preventDefault();
            deleteAccountModal.classList.remove('hidden');
        });

        cancelDeleteButton.addEventListener('click', function () {
            deleteAccountModal.classList.add('hidden');
        });

        confirmDeleteButton.addEventListener('click', function () {
            deleteAccountForm.submit();
        });
    </script>
</x-layout>