 <div class="md:hidden">
     <button id="hamburgerBtn">
         <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
         </svg>
     </button>
 </div>

 <div id="sidebar"
     class="fixed top-0 left-0 h-full w-64 bg-white shadow-lg transform -translate-x-full transition-transform duration-300 z-50">
     <div class="p-4 border-b flex justify-between items-center">
         <img src="{{ asset('jawari-logo.png') }}" alt="Jawari Logo" class="h-10">
         <button id="closeSidebar" class="text-gray-700">
             <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
             </svg>
         </button>
     </div>
     <ul class="flex flex-col space-y-4 p-4">
         <li><a href="#" class="text-base font-semibold hover:text-primary">Beranda</a></li>
         <li><a href="#tentang" class="text-base font-semibold hover:text-primary">Tentang Kami</a></li>
         <li><a href="#kesenian" class="text-base font-semibold hover:text-primary">Kesenian Banten</a></li>
         <li><a href="#galeri" class="text-base font-semibold hover:text-primary">Galeri</a></li>
         <li><a href="#artikel" class="text-base font-semibold hover:text-primary">Artikel</a></li>
     </ul>
 </div>

 <div id="overlay" class="fixed inset-0 bg-black bg-opacity-40 hidden z-40"></div>

 <script>
     const hamburgerBtn = document.getElementById('hamburgerBtn');
     const sidebar = document.getElementById('sidebar');
     const overlay = document.getElementById('overlay');
     const closeSidebar = document.getElementById('closeSidebar');

     hamburgerBtn.addEventListener('click', () => {
         sidebar.classList.remove('-translate-x-full');
         overlay.classList.remove('hidden');
     });

     closeSidebar.addEventListener('click', () => {
         sidebar.classList.add('-translate-x-full');
         overlay.classList.add('hidden');
     });

     overlay.addEventListener('click', () => {
         sidebar.classList.add('-translate-x-full');
         overlay.classList.add('hidden');
     });
 </script>
