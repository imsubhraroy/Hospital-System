<aside class="bg-gray-800 text-white w-12 lg:w-56 relative lg:relative overflow-visible flex-none z-10 h-full" id="sidebar">
    <div class="h-full px-1 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <div class="text-white items-center pl-3 text-xl lg:hidden" id="menu">
            <i class="fa-solid fa-bars" onclick="dropdown()" id="hamburger"></i>
        </div>
        {{-- <div class="hidden text-white items-center pl-3 text-xl" onclick="dropdown1()" id="menuclose">
            <i class="fa-sharp fa-solid fa-xmark"></i>
        </div> --}}
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('/home') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg aria-hidden="true"
                        class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="ml-3 hidden lg:block" id="item1">Dashboard</span>
                </a>
            </li>
            <!-- Dropdown -->
            <li>
                <div>
                    <div class="sidebar-title flex items-center justify-between p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 px-3"
                        onclick="dropDownBTN()">
                        <div class="flex justify-center items-center font-medium text-base">
                            <i class="fa-solid fa-user w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white text-xl -mt-2"></i>
                            <div
                                class="ml-2 hidden lg:block  sidebar-item">
                                Doctor
                            </div>
                        </div>
                        <span class="-rotate-90 transition-all duration-150 hidden lg:flex justify-center items-center" id="arrow">
                            <i class="fa-solid fa-angle-down"></i>
                        </span>
                    </div>
                    <!-- sub route  -->
                    <div class="sidebar-conten p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 bg-gray-700 dark:hover:bg-gray-600 px-3 hidden"
                        id="submenu">
                        <a href="{{ url('add-doctor-view') }}" class="flex items-center font-medium text-sm">
                            <div
                                class="flex w-full items-center pl-8 py-2 rounded-md dark:hover:bg-gray-800">
                                <span class="pr-3 text-sm flex justify-center items-center">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                <div
                                    class="transition-all duration-300 whitespace-nowrap overflow-ellipsis overflow-hidden">
                                    Add Doctor</div>
                            </div>
                        </a>
                        <a href="{{ url('/admin-view-doctors') }}" class="flex items-center font-medium text-sm">
                            <div
                                class="flex w-full items-center pl-8 py-2 rounded-md dark:hover:bg-gray-800">
                                <span class="pr-3 text-sm flex justify-center items-center">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                <div
                                    class="transition-all duration-300 whitespace-nowrap overflow-ellipsis overflow-hidden">
                                    View Doctor</div>
                            </div>
                        </a>
                    </div>
                </div>
            </li>
            <li>
                <a href="{{ url('/view-appointment') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg aria-hidden="true"
                        class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="ml-3 hidden lg:block" id="item1">Appointment</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/view-users') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg aria-hidden="true"
                        class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="ml-3 hidden lg:block" id="item1">User</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/view-contact') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg aria-hidden="true"
                        class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="ml-3 hidden lg:block" id="item1">Contact</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
