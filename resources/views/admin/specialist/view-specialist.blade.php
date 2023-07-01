<x-app-layout>
    <div class="flex flex-col h-screen">
        <div class="flex flex-grow">
            <!-- Sidebar -->
            @include('admin.sidebar')

            <!-- Main Content -->
            <main class="flex-grow bg-gray-500 p-1">

                @if (session()->has('message'))
                    <div class="p-2  justify-between flex items-center px-3" id="msg">
                        <span class="text-white text-lg">{{ session()->get('message') }}</span>
                        <i class="fa-solid fa-bars fa-xmark" onclick="closeMsg()"></i>
                    </div>
                @endif
                <!-- Content goes here -->
                <div class="grid grid-cols-12 gap-6">
                    <div
                        class="col-span-full xl:col-span-12 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
                        <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                            <h2 class="font-semibold text-slate-800 dark:text-slate-100">Customers</h2>
                        </header>
                        <div class="p-3">

                            <!-- Table -->
                            <div class="overflow-x-auto">
                                <table class="table-auto w-full">
                                    <!-- Table header -->
                                    <thead
                                        class="text-xs font-semibold uppercase text-slate-400 dark:text-slate-500 bg-slate-50 dark:bg-slate-700 dark:bg-opacity-50">
                                        <tr>

                                            <th class="p-2 whitespace-nowrap">
                                                <div class="font-semibold text-left text-white">Name</div>
                                            </th>

                                            <th class="p-2 whitespace-nowrap">
                                                <div class="font-semibold text-center text-white">Created At</div>
                                            </th>
                                            <th class="p-2 whitespace-nowrap">
                                                <div class="font-semibold text-center text-white">Action</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <!-- Table body -->
                                    <tbody class="text-sm divide-y divide-slate-100 dark:divide-slate-700">

                                        @foreach ($specialist as $specialists)
                                            <tr>
                                                <td class="p-2 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="font-medium text-gray-300">{{ $specialists->name }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="p-2 whitespace-nowrap">
                                                    <div class=" text-center text-gray-300">
                                                        {{ $specialists->created_at }}</div>
                                                </td>
                                                <td class="p-2 whitespace-nowrap">
                                                    <div class="flex items-start text-center justify-center">
                                                        <div class="text-blue-600 pr-3"><a
                                                                href="{{ url('edit-specialist/' . $specialists->id) }}"
                                                                style="text-decoration: none;"><i
                                                                    class="fa-solid fa-pen-to-square"></i></a>
                                                        </div>
                                                        <div class="text-red-500"><a
                                                                href="{{ url('delete-specialist/' . $specialists->id) }}"
                                                                style="text-decoration: none;"
                                                                onclick="return confirm('are you to delete the Specialist Type?')"><i
                                                                    class="fa-sharp fa-solid fa-trash"></i></a>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>

</x-app-layout>
