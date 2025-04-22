<section class="bg-green-700">
    <nav
        class=" container mx-auto py-4 flex flex-wrap justify-between items-center text-white navbar-sticky sticky top-0 z-50">
        <div class="text-4xl font-bold"><a href="{{ route('home') }}" class="hover:text-gray-300">ক্রি-বাংলাদেশ</a></div>
        <button class="md:hidden block text-white focus:outline-none" id="menu-toggle">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                </path>
            </svg>
        </button>

        <ul class="hidden md:flex flex-col md:flex-row md:space-x-6 text-2xl  bg-green-700 md:bg-transparent shadow-md md:shadow-none  p-4 md:p-0 z-10 w-full md:w-auto absolute md:static top-[113px] left-0"
            id="menu">
            <li><a href="#" class="hover:text-gray-300">ক্রিকেট</a></li>
            <li><a href="#" class="hover:text-gray-300">ফুটবল</a></li>
            <li><a href="#" class="hover:text-gray-300">অন্যান্য</a></li>
            <li><a href="#" class="hover:text-gray-300">টপ অফ দ্য ডে</a></li>
        </ul>

        <!-- resources/views/search.blade.php -->
        <livewire:search-form />
    </nav>


</section>
