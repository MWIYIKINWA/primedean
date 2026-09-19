<div class="text-sm text-white w-full relative">

    <!-- Top Contact Banner -->
    <div
        class="text-[#812C84] text-xs py-2 px-4 md:px-16 lg:px-24 xl:px-32 flex flex-wrap items-center justify-center sm:justify-between gap-3 font-medium">

        <div class="flex items-center gap-4 md:gap-6">
            <!-- Email -->
            <a href="mailto:info@primedean.com" class="flex items-center gap-1.5 hover:text-white transition-colors">
                <i class="fa-regular fa-envelope"></i>
                <span class="font-bold">sales@primedean.com</span>
            </a>
            <!-- Address (Hidden on extra small screens) -->
            <div class="hidden sm:flex items-center gap-1.5">
                <i class="fa-solid fa-location-dot"></i>
                <span>Kira Road, Kamokya-Kampala, Uganda</span>
            </div>
        </div>

        <!-- WhatsApp -->
        <a href="https://wa.me/256760249354" target="_blank" class="flex items-center gap-1.5 ">
            <i class="fa-brands fa-whatsapp text-[#25D366] text-sm"></i>
            <span class="font-bold">+256 760 249 354</span>
        </a>

    </div>


    <!-- Mobile Social Media Banner -->
    <div
        class="bg-[#812C84] border-b border-white/20 py-2 px-4 flex md:hidden items-center justify-center gap-6 text-white text-sm">
        <a href="https://www.tiktok.com/@primedeanug?_r=1&_t=ZS-93QH457KP45" target="_blank"
            class="hover:text-[#E0C1D7] transition-colors"><i class="fa-brands fa-tiktok"></i></a>
        <a href="https://www.facebook.com/primedeanug" target="_blank" class="hover:text-[#E0C1D7] transition-colors"><i
                class="fa-brands fa-facebook-f"></i></a>
        <a href="https://ug.linkedin.com/company/primedeanug" target="_blank"
            class="hover:text-[#E0C1D7] transition-colors"><i class="fa-brands fa-linkedin-in"></i></a>
        <a href="https://www.instagram.com/primedeanug?igsh=cHN1eHVjY3AxMmlm&utm_source=qr" target="_blank"
            class="hover:text-[#E0C1D7] transition-colors"><i class="fa-brands fa-instagram"></i></a>
        <a href="https://x.com/primedeanug?s=21" target="_blank" class="hover:text-[#E0C1D7] transition-colors"><i
                class="fa-brands fa-x-twitter"></i></a>
    </div>

    <!-- Main Navbar -->
    <nav
        class="relative h-[70px] flex items-center bg-[#812C84] justify-between md:px-5 lg:px-10 xl:px-12 py-4 text-white transition-all shadow">

        <a href="index.php" class="flex items-center gap-2">
            <img src="assets/images/logo.png" alt="Primedean" class="w-full h-17">
        </a>

        <!-- Desktop menu -->
        <ul class="hidden md:flex items-center space-x-8 md:pl-28">
            <li><a href="index.php"
                    class="<?= ($current_page == 'index.php') ? $active_class : $inactive_class; ?>">Home</a></li>
            <li><a href="about.php"
                    class="<?= ($current_page == 'about.php') ? $active_class : $inactive_class; ?>">About Us</a></li>
            <li><a href="services.php"
                    class="<?= ($current_page == 'services.php') ? $active_class : $inactive_class; ?>">Services</a>
            </li>
            <li><a href="news.php"
                    class="<?= ($current_page == 'news.php') ? $active_class : $inactive_class; ?>">News/Updates</a>
            </li>
            <li><a href="contact.php"
                    class="<?= ($current_page == 'contact.php') ? $active_class : $inactive_class; ?>">Contact Us</a>
            </li>
        </ul>

        <!-- DESKTOP Download Profile button — restored to original classes -->
        <a href="assets/profile.pdf" target="_blank" rel="noopener noreferrer"
            class="inline-flex items-center justify-center bg-white text-[#812C84] border border-gray-300 ml-6 text-[10px] sm:text-[14px] hover:bg-gray-50 active:scale-95 transition-all w-28 sm:w-40 h-9 sm:h-11">
            Download Profile
        </a>

        <!-- Mobile hamburger -->
        <button aria-label="menu-btn" type="button" id="mobileMenuOpen"
            class="pr-3 inline-block md:hidden active:scale-90 transition">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="currentColor">
                <path
                    d="M3 7a1 1 0 1 0 0 2h24a1 1 0 1 0 0-2zm0 7a1 1 0 1 0 0 2h24a1 1 0 1 0 0-2zm0 7a1 1 0 1 0 0 2h24a1 1 0 1 0 0-2z" />
            </svg>
        </button>
    </nav>
</div>

<!-- ============================================================= -->
<!-- Mobile Menu Overlay floating card)           -->
<!-- ============================================================= -->

<div id="mobileMenu" class="fixed inset-0 z-[100] hidden md:hidden">

    <!-- Backdrop -->
    <div id="mobileMenuBackdrop" class="absolute inset-0"></div>

    <!-- Card wrapper -->
    <div class="relative h-full flex items-center justify-end p-6">
        <!-- The white card — narrower, same height feel -->
        <div
            class="bg-white rounded-2xl shadow-2xl w-full max-w-[250px] max-h-[100] flex flex-col overflow-hidden -translate-y-8">

            <!-- Close button (top-right) -->
            <div class="flex justify-end pt-3 mb-3 pr-3">
                <button id="mobileMenuClose" aria-label="Close menu"
                    class="p-2 rounded-full text-[#812C84] hover:text-[#812C84] hover:bg-[#812c84]/5 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Menu items -->
            <nav class="flex-1 overflow-y-auto px-4 pb-2">
                <ul>
                    <?php
                    $mobile_links = [
                        'index.php' => 'Home',
                        'about.php' => 'About Us',
                        'services.php' => 'Services',
                        'news.php' => 'News/Updates',
                        'contact.php' => 'Contact Us',
                    ];
                    $last_key = array_key_last($mobile_links);
                    foreach ($mobile_links as $href => $label):
                        $is_active = ($current_page == $href);
                        ?>
                        <li>
                            <a href="<?= $href ?>" style="padding-left: 32px; padding-right: 12px;" class="group relative flex items-center justify-between py-4 text-[#812C84] text-sm transition-all duration-200
                                <?= $href !== $last_key ? 'border-b border-slate-200' : '' ?>
                                <?= $is_active
                                    ? 'font-bold bg-[#812C84]/5'
                                    : 'font-normal hover:bg-[#812C84]/5' ?>">

                                <!-- Left accent bar (active only) -->
                                <?php if ($is_active): ?>
                                    <span
                                        style="left: 0; top: 50%; transform: translateY(-50%); height: 2rem; width: 4px; border-top-right-radius: 9999px; border-bottom-right-radius: 9999px;"
                                        class="absolute bg-[#812C84]"></span>
                                <?php endif; ?>

                                <!-- Label -->
                                <span><?= $label ?></span>

                                <!-- Chevron indicator (active only) -->
                                <?php if ($is_active): ?>
                                    <i
                                        class="fa-solid fa-chevron-right text-xs text-[#812C84] opacity-80 group-hover:translate-x-0.5 transition-transform"></i>
                                <?php endif; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <!-- CTA button -->
            <div class="p-6 pt-4">
                <a href="contact.php" rel="noopener noreferrer"
                    class="flex items-center justify-center -mt-4 gap-2 w-full bg-[#812C84] hover:bg-[#6b2370] active:scale-[0.98] text-white py-3.5 font-bold text-xs transition-all shadow-lg shadow-[#812C84]/30">
                    Request Quote in 2 Mins
                </a>
            </div>

        </div>
    </div>
</div>

<!-- Mobile menu toggle script (self-contained) -->
<script>
    (function () {
        var openBtn = document.getElementById('mobileMenuOpen');
        var overlay = document.getElementById('mobileMenu');
        var backdrop = document.getElementById('mobileMenuBackdrop');
        var closeBtn = document.getElementById('mobileMenuClose');

        function openMenu() {
            overlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeMenu() {
            overlay.classList.add('hidden');
            document.body.style.overflow = '';
        }

        if (openBtn) openBtn.addEventListener('click', openMenu);
        if (closeBtn) closeBtn.addEventListener('click', closeMenu);
        if (backdrop) backdrop.addEventListener('click', closeMenu);

        // Close on Escape
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && !overlay.classList.contains('hidden')) {
                closeMenu();
            }
        });
    })();
</script>