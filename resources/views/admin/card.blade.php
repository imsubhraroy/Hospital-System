    <div
        class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
        <div class="px-5 pt-5 pb-5">
            <header class="flex justify-between items-start mb-2">
                <!-- Icon -->
                <img src="{{ asset('images/icon-01.svg') }}" width="32" height="32" alt="Icon 01" />
                <!-- Menu button -->

            </header>
            <h2 class="text-lg font-semibold text-slate-800 dark:text-slate-100 mb-2">Total Doctor</h2>
            <div class="text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase mb-1">Doctor</div>
            <div class="flex items-start">
                <div class="text-3xl font-bold text-slate-800 dark:text-slate-100 mr-2">{{ $totalDoctor }}</div>
            </div>
        </div>
    </div>
    <div
        class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
        <div class="px-5 pt-5 pb-5">
            <header class="flex justify-between items-start mb-2">
                <!-- Icon -->
                <img src="{{ asset('images/icon-01.svg') }}" width="32" height="32" alt="Icon 01" />
                <!-- Menu button -->

            </header>
            <h2 class="text-lg font-semibold text-slate-800 dark:text-slate-100 mb-2">Total Appointment</h2>
            <div class="text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase mb-1">Appointment</div>
            <div class="flex items-start">
                <div class="text-3xl font-bold text-slate-800 dark:text-slate-100 mr-2">{{ $totalAppointment }}</div>
            </div>
        </div>
    </div>
    <div
        class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
        <div class="px-5 pt-5 pb-5">
            <header class="flex justify-between items-start mb-2">
                <!-- Icon -->
                <img src="{{ asset('images/icon-01.svg') }}" width="32" height="32" alt="Icon 01" />
                <!-- Menu button -->

            </header>
            <h2 class="text-lg font-semibold text-slate-800 dark:text-slate-100 mb-2">Approve Appointment</h2>
            <div class="text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase mb-1">Appointment</div>
            <div class="flex items-start">
                <div class="text-3xl font-bold text-slate-800 dark:text-slate-100 mr-2">{{ $totalApprovedAppointment }}</div>
            </div>
        </div>
    </div>
