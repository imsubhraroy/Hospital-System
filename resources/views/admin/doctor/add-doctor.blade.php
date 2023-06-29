<x-app-layout>
    <div class="flex flex-col h-screen">
        <div class="flex flex-grow">
            <!-- Sidebar -->
            @include('admin.sidebar')

            <!-- Main Content -->
            <main class="flex-grow bg-gray-500 p-1">
                <!-- Content goes here -->
              @if(session()->has('message'))
                <div class="p-2  justify-between flex items-center px-3" id="doctorMsg">
                    <span class="text-white text-lg">{{ session()->get('message')}}</span>
                    <i class="fa-solid fa-bars fa-xmark" onclick="closeMsg()">M</i>
                </div>
              @endif

                <section class="bg-white dark:bg-gray-900">
                    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a New Doctor</h2>
                        <form action="{{ url('add-doctor') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="sm:col-span-2">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Doctor
                                        Name</label>
                                    <input type="text" name="name" id="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Doctor Name" required="">
                                </div>
                                <div class="w-full">
                                    <label for="phone"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                                    <input type="text" name="phone" id="phone"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Doctor Phone" required="">
                                </div>
                                <div class="w-full">
                                    <label for="price"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Visit</label>
                                    <input type="number" name="price" id="price"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Doctor Visit Price" required="">
                                </div>
                                <div>
                                    <label for="speciality"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Speciality</label>
                                    <select id="speciality" name="speciality"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected="">Select speciality</option>
                                        <option value="heart">Heart</option>
                                        <option value="ENT">ENT</option>
                                        <option value="generalPhysician">General Physician</option>
                                        <option value="dentist">Dentist</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="room"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room No.
                                        </label>
                                    <input type="number" name="room" id="room"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="12" required="">
                                </div>
                                <div class="sm:col-span-2" >
                                    <label for="registration"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room No.
                                        </label>
                                    <input type="text" name="registration" id="registration"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Registration No" required="">
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="image"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                                        <input type="file" name="image" id="image"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="12" required="">
                                </div>
                            </div>
                            <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-lg font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800 border-white border-2">
                                Add
                            </button>
                        </form>
                    </div>
                </section>

            </main>
        </div>
    </div>

</x-app-layout>
