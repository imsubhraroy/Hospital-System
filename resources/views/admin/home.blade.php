<x-app-layout>
    <div class="flex flex-col h-screen">
        <div class="flex flex-grow">
            <!-- Sidebar -->
                @include('admin.sidebar')

            <!-- Main Content -->
            <main class="flex-grow bg-gray-500 p-1">
                <!-- Content goes here -->
                @include('admin.welcome')
                <div class="grid grid-cols-12 gap-6">

                    @include('admin.card')

                    @include('admin.table')
                    {{-- @include('admin.customer') --}}
                </div>

            </main>
        </div>
    </div>

</x-app-layout>
