<aside class="bg-gray-800 text-white w-12 lg:w-56 relative lg:relative overflow-visible flex-none z-10 h-full" id="sidebar">
    {{-- <svg fill="#000000" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
    class="w-8 h-8 pl-12" xmlns:xlink="http://www.w3.org/1999/xlink" width="800px"
    height="800px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
    <g>
        <path
            d="M44.942,50.412l14.037-15.487c0.742-0.818,0.68-2.083-0.139-2.824c-0.817-0.742-2.083-0.679-2.824,0.139L40.784,49.044
        c-0.409,0.451-0.565,1.038-0.493,1.598c-0.016,0.564,0.196,1.131,0.647,1.539L57.74,67.412c0.383,0.348,0.864,0.519,1.344,0.519
        c0.545,0,1.087-0.222,1.482-0.657c0.741-0.818,0.68-2.083-0.139-2.824L44.942,50.412z" />
        <path
            d="M84.133,49.756c0-18.448-15.01-33.457-33.458-33.457S17.218,31.308,17.218,49.756c0,18.449,15.009,33.458,33.457,33.458
        S84.133,68.205,84.133,49.756z M50.675,79.214c-16.243,0-29.457-13.215-29.457-29.458c0-16.242,13.214-29.457,29.457-29.457
        c16.243,0,29.458,13.215,29.458,29.457C80.133,65.999,66.918,79.214,50.675,79.214z" />
    </g>
    </svg> --}}
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
                        <a href="#" class="flex items-center font-medium text-sm">
                            <div
                                class="flex w-full items-center pl-8 py-2 rounded-md dark:hover:bg-gray-800">
                                <span class="pr-3 text-sm flex justify-center items-center">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                <div
                                    class="transition-all duration-300 whitespace-nowrap overflow-ellipsis overflow-hidden">
                                    View Sidebar 1</div>
                            </div>
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>
