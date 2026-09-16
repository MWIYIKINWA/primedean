<?php
$page_title = "Primedean – Branding, Signage & Printing in Kampala";
$page_description = "Primedean Limited is a creative branding and advertising agency in Kampala, Uganda. We deliver signage, vehicle branding, printing, and promotional solutions.";
include 'includes/config.php';
include 'includes/header.php';
include 'includes/navbar.php';
include 'includes/functions.php';

$hero_sliders = get_hero_sliders();
$services = get_services();
$portfolios = get_portfolios();
$about = get_about();
?>

<section
    class="relative flex flex-col items-center text-slate-800 md:px-16 lg:px-24 xl:px-32 py-5 lg:py-5 overflow-hidden bg-[url('https://raw.githubusercontent.com/prebuiltui/prebuiltui/main/assets/hero/dot-pattern-redical.svg')] bg-center bg-cover">

    <div class="flex flex-col-reverse lg:flex-row items-center justify-between gap-12 lg:gap-20 w-full mt-5 lg:mt-5">

        <!-- left Side: Swiper Image Slider -->
        <div class="w-full hidden lg:block lg:w-1/2 relative max-md:px-4">
            <!-- Decorative Background Blob -->
            <div
                class="absolute inset-0 z-0 rounded-full bg-gradient-to-r from-[#812C84] via-violet-500 to-[#E0724A] blur-3xl opacity-30 scale-90 translate-y-4">
            </div>

            <div class="swiper heroSwiper w-full h-[350px] md:h-[450px] lg:h-[550px] rounded-3xl relative z-10 overflow-hidden border border-white/50 group"
                style="--swiper-pagination-color: #E0C1D7; --swiper-pagination-bullet-inactive-color: #ffffff; --swiper-pagination-bullet-inactive-opacity: 0.5; --swiper-navigation-color: #ffffff; --swiper-navigation-size: 20px;">
                <div class="swiper-wrapper">
                    <?php if (!empty($hero_sliders)): ?>
                        <?php foreach ($hero_sliders as $slide): ?>
                            <div class="swiper-slide">
                                <img src="<?= htmlspecialchars($slide['image_url']); ?>" class="w-full h-full object-cover"
                                    alt="<?= htmlspecialchars($slide['title']); ?>">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <!-- Fallback if no dynamic slides exist -->
                        <div class="swiper-slide">
                            <img src="assets/images/4.jpg" class="w-full h-full object-cover" alt="Primedean Branding">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Pagination Dots -->
                <div class="swiper-pagination !bottom-4"></div>

                <!-- Navigation Arrows (Hidden until hover on desktop, always visible on mobile) -->
                <div
                    class="swiper-button-prev !w-10 !h-10 !bg-white/20 hover:!bg-[#812C84] !rounded-full backdrop-blur-md transition-all duration-300 opacity-100 lg:opacity-0 lg:group-hover:opacity-100 !left-4">
                </div>
                <div
                    class="swiper-button-next !w-10 !h-10 !bg-white/20 hover:!bg-[#812C84] !rounded-full backdrop-blur-md transition-all duration-300 opacity-100 lg:opacity-0 lg:group-hover:opacity-100 !right-4">
                </div>
            </div>
        </div>

        <!-- Left Right: Heading, Text, and CTAs -->
        <div class="w-full  lg:w-1/2 flex flex-col max-md:px-4 text-center lg:text-left z-10">
            <h1
                class="text-[20px] eagle text-left md:text-left  md:text-3xl  lg:text-[31px] font-bold leading md:leading-[3rem] px-0 text-[#812C84]">
                For over 10 years, Primedean has
                been helping Brands get Noticed

            </h1>

            <p class="text-sm text-left md:text-lg md:text-justify text-[#812C84] mt-6 max-w-lg mx-auto lg:mx-0">
                We believe every brand deserves to stand out. From signage and branding to high-quality printing, we
                deliver tailored visibility solutions that bring brands to life, strengthen their presence and make a
                lasting impression
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-3 sm:gap-4 mt-8">
                <a href="contact.php"
                    class="px-5 py-2.5 sm:px-8 sm:py-3.5 text-sm sm:text-base text-white font-medium bg-[#812C84] hover:opacity-90 active:scale-95 transition-all shadow-lg text-center">
                    Get a Free Quote in 2Mins.
                </a>
                <a href="#portfolio"
                    class="px-5 py-2.5 sm:px-8 sm:py-3.5 text-sm sm:text-base text-[#812C84] font-medium border border-slate-300 hover:bg-[#E0C1D7] active:scale-95 transition-all text-center">
                    View Portfolio
                </a>
            </div>

            <!-- Social Proof / Trust Indicators -->
            <div class="flex items-center justify-center lg:justify-start mt-8 md:mt-10 gap-4 w-full">
                <div class="text-sm text-[#812C84] flex flex-col sm:flex-row items-center gap-2">
                    <div class="flex items-center gap-1 text-[#FF8F20]">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <span>Trusted by 100+ brands</span>
                </div>
            </div>
        </div>

        <!-- phone slider -->
        <div class="w-full lg:hidden lg:w-1/2 relative max-md:px-4">
            <!-- Decorative Background Blob -->
            <div
                class="absolute inset-0 z-0 rounded-full bg-gradient-to-r from-[#812C84] via-violet-500 to-[#E0724A] blur-3xl opacity-30 scale-90 translate-y-4">
            </div>

            <div class="swiper heroSwiper w-full h-[350px] md:h-[450px] lg:h-[550px] rounded-3xl relative z-10 overflow-hidden border border-white/50 group"
                style="--swiper-pagination-color: #E0C1D7; --swiper-pagination-bullet-inactive-color: #ffffff; --swiper-pagination-bullet-inactive-opacity: 0.5; --swiper-navigation-color: #ffffff; --swiper-navigation-size: 20px;">

                <div class="swiper-wrapper">
                    <?php if (!empty($hero_sliders)): ?>
                        <?php foreach ($hero_sliders as $slide): ?>
                            <div class="swiper-slide">
                                <img src="<?= htmlspecialchars($slide['image_url']); ?>" class="w-full h-full object-cover"
                                    alt="<?= htmlspecialchars($slide['title']); ?>">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <!-- Fallback if no dynamic slides exist -->
                        <div class="swiper-slide">
                            <img src="assets/images/4.jpg" class="w-full h-full object-cover" alt="Primedean Branding">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Pagination Dots -->
                <div class="swiper-pagination !bottom-4"></div>

                <!-- Navigation Arrows (Hidden until hover on desktop, always visible on mobile) -->
                <div
                    class="swiper-button-prev !w-10 !h-10 !bg-white/20 hover:!bg-[#812C84] !rounded-full backdrop-blur-md transition-all duration-300 opacity-100 lg:opacity-0 lg:group-hover:opacity-100 !left-4">
                </div>
                <div
                    class="swiper-button-next !w-10 !h-10 !bg-white/20 hover:!bg-[#812C84] !rounded-full backdrop-blur-md transition-all duration-300 opacity-100 lg:opacity-0 lg:group-hover:opacity-100 !right-4">
                </div>
            </div>
        </div>

    </div>
</section>

<section class="relative mt-1 py-6 px-6 md:px-16 lg:px-24 xl:px-32 bg-[#812C84] overflow-hidden text-center text-white">
    <!-- Abstract Background Elements -->
    <div
        class="absolute inset-0 bg-[url('https://raw.githubusercontent.com/prebuiltui/prebuiltui/main/assets/hero/dot-pattern-redical.svg')] opacity-20 bg-cover mix-blend-overlay">
    </div>

    <div class="relative z-10 max-w-3xl mx-auto">
        <h1 class="text-2xl md:text-2xl lg:text-3xl tracking-tight">Recent Projects</h1>
    </div>
</section>
<!-- Featured Work -->
<section id="portfolio" class="py-5 px-6 md:px-5 lg:px-8 xl:px-10 bg-slate-50">
    <!-- Masonry/Grid Gallery -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">

        <?php if (!empty($portfolios)): ?>
            <?php foreach ($portfolios as $index => $item): ?>
                <?php
                // Alternate backgrounds based on the index (even = Purple, odd = Pink)
                $bgClass = ($index % 2 === 0) ? 'bg-[#812C84]' : 'bg-[#E0C1D7]';

                // Construct the full image URL
                $imageUrl = htmlspecialchars($cms_storage_base . ($item['image_path'] ?? ''));
                $imageTitle = htmlspecialchars($item['title'] ?? 'Featured Work ' . ($index + 1));
                ?>
                <div onclick="openModal(this.querySelector('img').src)"
                    class="group relative overflow-hidden h-full cursor-pointer <?= $bgClass ?>">
                    <img src="<?= $imageUrl ?>"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-90"
                        alt="<?= $imageTitle ?>">
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center col-span-full py-10 text-slate-500 font-medium">No featured work available.</p>
        <?php endif; ?>

    </div>
</section>

<!-- Services Preview -->
<section class="py-20 px-6 md:px-16 lg:px-24 xl:px-32 bg-[#812C84] text-white">
    <div class="text-center max-w-2xl mx-auto mb-16">
        <h4 class="text-[#E0C1D7] font-semibold text-sm uppercase tracking-wider mb-2">Our Services</h4>
        <h2 class="text-2xl md:text-4xl font-bold mb-4">Everything You Need to Stand Out</h2>
        <p class="text-white/80 text-sm">From large-scale outdoor displays to intricate promotional items, we deliver
            excellence across all branding touchpoints.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">
        <!-- Service 1 -->

        <?php if (!empty($services)): ?>
            <?php foreach ($services as $service): ?>

                <a href="service-detail.php?service=<?= htmlspecialchars($service['slug']); ?>"
                    class="group rounded-2xl border-3 border-white/20 bg-white/10 backdrop-blur-md hover:bg-white/20 transition-all duration-300 relative overflow-hidden flex flex-col block">
                    <!-- Image Top -->
                    <div class="w-full h-48 relative overflow-hidden">
                        <img src="<?= htmlspecialchars($service['image_url'] ?? 'assets/images/nsssf.jpg'); ?>"
                            alt="<?= htmlspecialchars($service['title']); ?>"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <!-- Content -->
                    <div class="p-6 flex flex-col grow">
                        <h3 class="text-xl font-bold mb-3"><?= htmlspecialchars($service['title']); ?></h3>
                        <p class="text-white/80 text-sm leading-relaxed mb-6 grow text-justify">
                            <?= htmlspecialchars($service['previewtext']); ?>
                        </p>
                        <span
                            class="text-[#E0C1D7] group-hover:text-white font-medium text-sm transition-colors flex items-center gap-2 mt-auto">
                            Explore <i class="fa-solid fa-arrow-right text-xs"></i>
                        </span>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-slate-600 col-span-full text-center">No services found.</p>
        <?php endif; ?>


    </div>
</section>

<!-- Trusted Brands Section -->
<section class="py-12 md:py-16 bg-slate-50 border-y border-slate-200/80">
    <div class="max-w-7xl mx-auto px-6 md:px-16 lg:px-24">

        <!-- Section Header -->
        <div class="text-center max-w-xl mx-auto mb-10">
            <span
                class="text-[#812C84] text-xs font-extrabold uppercase tracking-widest bg-[#812C84]/10 px-3 py-1 rounded-full">
                Proven Track Record
            </span>
            <h2 class="text-md md:text-xl font-extrabold text-[#812C84] mt-3">
                Trusted by Leading Brands & Businesses
            </h2>
        </div>

        <!-- Logo Grid -->
        <div
            class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-8 items-center justify-items-center">

            <!-- Brand 1 -->
            <div
                class="w-full flex items-center justify-center p-4 bg-white rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition-all duration-300 group">
                <img src="assets/images/logos/ayuda.png" alt="Client Logo"
                    class="h-9 w-auto object-contain  group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300">
            </div>

            <!-- Brand 2 -->
            <div
                class="w-full flex items-center justify-center p-4 bg-white rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition-all duration-300 group">
                <img src="assets/images/logos/jubilee.png" alt="Client Logo"
                    class="h-9 w-auto object-contain  group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300">
            </div>

            <!-- Brand 3 -->
            <div
                class="w-full flex items-center justify-center p-4 bg-white rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition-all duration-300 group">
                <img src="assets/images/logos/jumia.png" alt="Client Logo"
                    class="h-9 w-auto object-contain  group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300">
            </div>

            <!-- Brand 3 -->
            <div
                class="w-full flex items-center justify-center p-4 bg-white rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition-all duration-300 group">
                <img src="assets/images/logos/alpha.png" alt="Client Logo"
                    class="h-9 w-auto object-contain  group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300">
            </div>

            <!-- Brand 3 -->
            <div
                class="w-full flex items-center justify-center p-4 bg-white rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition-all duration-300 group">
                <img src="assets/images/logos/ami.png" alt="Client Logo"
                    class="h-9 w-auto object-contain  group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300">
            </div>

            <!-- Brand 3 -->
            <div
                class="w-full flex items-center justify-center p-4 bg-white rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition-all duration-300 group">
                <img src="assets/images/logos/conti.png" alt="Client Logo"
                    class="h-9 w-auto object-contain  group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300">
            </div>

            <!-- Brand 3 -->
            <div
                class="w-full flex items-center justify-center p-4 bg-white rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition-all duration-300 group">
                <img src="assets/images/logos/ums.png" alt="Client Logo"
                    class="h-9 w-auto object-contain  group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300">
            </div>

            <!-- Brand 3 -->
            <div
                class="w-full flex items-center justify-center p-4 bg-white rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition-all duration-300 group">
                <img src="assets/images/logos/lifelink.png" alt="Client Logo"
                    class="h-9 w-auto object-contain  group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300">
            </div>

            <!-- Brand 3 -->
            <div
                class="w-full flex items-center justify-center p-4 bg-white rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition-all duration-300 group">
                <img src="assets/images/logos/span.png" alt="Client Logo"
                    class="h-9 w-auto object-contain  group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300">
            </div>

            <!-- Brand 3 -->
            <div
                class="w-full flex items-center justify-center p-4 bg-white rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition-all duration-300 group">
                <img src="assets/images/logos/street.png" alt="Client Logo"
                    class="h-9 w-auto object-contain  group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300">
            </div>

            <!-- Brand 3 -->
            <div
                class="w-full flex items-center justify-center p-4 bg-white rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition-all duration-300 group">
                <img src="assets/images/logos/swift.png" alt="Client Logo"
                    class="h-9 w-auto object-contain  group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300">
            </div>

            <!-- Brand 3 -->
            <div
                class="w-full flex items-center justify-center p-4 bg-white rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition-all duration-300 group">
                <img src="assets/images/logos/trees.png" alt="Client Logo"
                    class="h-9 w-auto object-contain  group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300">
            </div>
            <!-- Brand 3 -->

        </div>

        <!-- Optional Trust Badge Subtext -->
        <p class="text-center text-xs text-slate-500 mt-8 font-medium">
            Delivering high-impact corporate printing, signage, and branding across Uganda.
        </p>
    </div>
</section>

<!-- About Primedean -->
<section id="about" class="relative py-20 px-6 md:px-8 lg:px-24 xl:px-12 bg-[#812C84] overflow-hidden">
    <!-- Background Image with Overlay Blend -->
    <div
        class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1542744094-24638ea0b56c?q=80&w=1920&auto=format&fit=crop')] bg-cover bg-center opacity-20 mix-blend-luminosity">
    </div>

    <div class="relative z-10 flex flex-col lg:flex-row items-center gap-16">
        <div class="w-full lg:w-1/2 text-white">
            <h4 class="text-[#E0C1D7] font-semibold text-sm uppercase tracking-wider mb-2">About</h4>
            <h2 class="text-3xl md:text-4xl font-bold mb-6">PRIMEDEAN LIMITED</h2>
            <div class="text-sm md:text-sm">
                <p class="text-white/90 mb-6 leading-relaxed text-justify">Our journey began in 2014 through Vaito U
                    Limited, an agency that provided branding, printing, signage, promotional materials and related
                    visibility solutions to businesses and organisations. Over the years, this work built a strong
                    portfolio, practical industry experience and a deeper understanding of what businesses value when
                    choosing a branding partner: quality, professionalism, reliability and timely delivery.<br></p>
                <p class="text-white/90 mb-6 leading-relaxed text-justify"> As Vaito U Limited evolved into Contivibe
                    Media, with a greater focus on media and related services, its branding, printing and visibility
                    business was transferred to Primedean Limited in 2024 following an acquisition process.<br></p>
                <p class="text-white/90 mb-6 leading-relaxed text-justify"> Primedean therefore inherited an established
                    portfolio, industry experience, client understanding and practical knowledge developed since
                    2014.<br></p>
                <p class="text-white/90 mb-6 leading-relaxed text-justify"> We provide businesses and organisations with
                    a dependable partner that can manage their branding and visibility requirements from concept to
                    completion. From understanding the brief and developing creative concepts to sourcing, production,
                    printing, finishing, installation and delivery, we focus on making the process professional,
                    efficient and reliable.<br></p>
                <p class="text-white/90 mb-6 leading-relaxed text-justify">Today, our solutions span signage, printing,
                    promotional merchandise, visibility and outdoor banners, event branding, office branding, vehicle
                    and motorcycle branding, and customised brand visibility solutions.<br></p>
            </div>
        </div>
        <div class="w-full h-full lg:w-1/2 relative">
            <!-- Subtle glow behind the image -->
            <div class="absolute -inset-4 bg-white opacity-10 blur-2xl rounded-full"></div>

            <?php
            // Build dynamic image URL, fallback to local image if API returns null/empty
            $aboutImageUrl = (!empty($about['image_path']))
                ? $cms_storage_base . $about['image_path']
                : 'assets/images/about.jpeg';
            ?>
            <img src="<?= htmlspecialchars($aboutImageUrl) ?>" alt="Primedean Team"
                class="relative shadow-2xl border border-white/20 w-full object-cover h-full">
        </div>
    </div>
</section>

<!-- Process -->
<section class="py-20 px-6 md:px-16 lg:px-24 xl:px-32 bg-white">

    <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative">
        <!-- Connecting Line (hidden on mobile) -->
        <div class="hidden md:block absolute top-12 left-[10%] right-[10%] h-0.5 bg-slate-100 -z-10"></div>

        <!-- Step 1 -->
        <div class="text-center relative">
            <div
                class="w-16 h-16 md:w-24 md:h-24 mx-auto bg-white border border-[#812C84] rounded-full flex items-center justify-center mb-4 md:mb-6 shadow-lg shadow-slate-200/50">
                <span class="text-lg md:text-2xl font-bold text-transparent bg-clip-text bg-[#812C84]">01</span>
            </div>
            <h4 class="text-xl font-bold text-[#812C84] mb-2">Customized Solutions</h4>
            <p class="text-sm text-[#812C84]">Every project is uniquely handled to reflect your brand, audience and
                visibility goals</p>
        </div>

        <!-- Step 2 -->
        <div class="text-center relative">
            <div
                class="w-16 h-16 md:w-24 md:h-24 mx-auto bg-white border border-[#812C84] rounded-full flex items-center justify-center mb-4 md:mb-6 shadow-lg shadow-slate-200/50">
                <span class="text-lg md:text-2xl font-bold text-transparent bg-clip-text bg-[#812C84]">02</span>
            </div>
            <h4 class="text-xl font-bold text-[#812C84] mb-2">Quality you can Trust</h4>
            <p class="text-sm text-[#812C84]">We use premium materials and professional production standards for
                lasting impact.</p>
        </div>

        <!-- Step 3 -->
        <div class="text-center relative">
            <div
                class="w-16 h-16 md:w-24 md:h-24 mx-auto bg-white border border-[#812C84] rounded-full flex items-center justify-center mb-4 md:mb-6 shadow-lg shadow-slate-200/50">
                <span class="text-lg md:text-2xl font-bold text-transparent bg-clip-text bg-[#812C84]">03</span>
            </div>
            <h4 class="text-xl font-bold text-[#812C84] mb-2">Fast Turnaround Time</h4>
            <p class="text-sm text-[#812C84]">Our efficient team delivers projects within agreed timelines.</p>
        </div>

        <!-- Step 4 -->
        <div class="text-center relative">
            <div
                class="w-16 h-16 md:w-24 md:h-24 mx-auto bg-white border border-[#812C84] rounded-full flex items-center justify-center mb-4 md:mb-6 shadow-lg shadow-slate-200/50">
                <span class="text-lg md:text-2xl font-bold text-transparent bg-clip-text bg-[#812C84]">04</span>
            </div>
            <h4 class="text-xl font-bold text-[#812C84] mb-2">End to End Service</h4>
            <p class="text-sm text-[#812C84]">From concept and design to production, installation and delivery, we
                handle every aspect of your project.</p>
        </div>
    </div>
</section>

<!-- Social Media Connection -->
<section class="py-4 px-6 border-t border-slate-100 bg-white text-center">
    <div class="flex flex-wrap justify-center items-center gap-4 md:gap-6">
        <!-- LinkedIn -->
        <a href="https://ug.linkedin.com/company/primedeanug" target="_blank"
            class="group flex items-center justify-center w-14 h-14 rounded-full bg-white border border-[#812C84]/30 text-[#812C84] hover:bg-[#0077b5] hover:text-white hover:border-[#0077b5] transition-all duration-300 shadow-sm hover:shadow-lg hover:-translate-y-1">
            <i class="fa-brands fa-linkedin-in text-xl"></i>
        </a>
        <!-- Instagram -->
        <a href="https://www.instagram.com/primedeanug?igsh=cHN1eHVjY3AxMmlm&utm_source=qr" target="_blank"
            class="group flex items-center justify-center w-14 h-14 rounded-full bg-white border border-[#812C84]/30 text-[#812C84] hover:bg-gradient-to-tr hover:from-[#f09433] hover:via-[#dc2743] hover:to-[#bc1888] hover:text-white hover:border-transparent transition-all duration-300 shadow-sm hover:shadow-lg hover:-translate-y-1">
            <i class="fa-brands fa-instagram text-xl"></i>
        </a>
        <!-- X (Twitter) -->
        <a href="https://x.com/primedeanug?s=21" target="_blank"
            class="group flex items-center justify-center w-14 h-14 rounded-full bg-white border border-[#812C84]/30 text-[#812C84] hover:bg-black hover:text-white hover:border-black transition-all duration-300 shadow-sm hover:shadow-lg hover:-translate-y-1">
            <i class="fa-brands fa-x-twitter text-xl"></i>
        </a>
        <!-- Facebook -->
        <a href="https://www.facebook.com/primedeanug" target="_blank"
            class="group flex items-center justify-center w-14 h-14 rounded-full bg-white border border-[#812C84]/30 text-[#812C84] hover:bg-[#1877F2] hover:text-white hover:border-[#1877F2] transition-all duration-300 shadow-sm hover:shadow-lg hover:-translate-y-1">
            <i class="fa-brands fa-facebook-f text-xl"></i>
        </a>
        <!-- TikTok -->
        <a href="https://www.tiktok.com/@primedeanug?_r=1&_t=ZS-93QH457KP45" target="_blank"
            class="group flex items-center justify-center w-14 h-14 rounded-full bg-white border border-[#812C84]/30 text-[#812C84] hover:bg-black hover:text-white hover:border-black transition-all duration-300 shadow-sm hover:shadow-lg hover:-translate-y-1">
            <i class="fa-brands fa-tiktok text-xl"></i>
        </a>
    </div>
</section>

<!-- Final CTA -->
<section class="py-20 px-6 md:px-16 lg:px-24 xl:px-32 bg-white">
    <div class="rounded-3xl bg-[#812C84] p-10 md:p-16 text-center text-white relative overflow-hidden shadow-2xl">
        <!-- Subtle Pattern overlay -->
        <div
            class="absolute inset-0 bg-[url('https://raw.githubusercontent.com/prebuiltui/prebuiltui/main/assets/hero/dot-pattern-redical.svg')] opacity-20 bg-cover mix-blend-overlay">
        </div>

        <div class="relative z-10 max-w-2xl mx-auto">
            <h2 class="text-2xl md:text-5xl font-bold mb-6">Ready to elevate your brand?</h2>
            <p class="text-white/80 text-sm mb-10 md:text-lg">Contact us today for a free consultation and quote. Let's
                create something extraordinary together.</p>

            <div class="flex flex-col sm:flex-row justify-center gap-3 sm:gap-4">
                <!-- Request a Quote Button -->
                <a href="contact.php"
                    class="px-2 py-2.5 md:px-8 md:py-4 bg-white text-[#812C84] text-sm md:text-base font-bold  hover:bg-slate-50 transition-all active:scale-95 shadow-lg text-center">
                    Request a Quote
                </a>

                <!-- WhatsApp Button -->
                <a href="https://wa.me/256760249354" target="_blank"
                    class="px-2 py-2.5 md:px-8 md:py-4 bg-transparent border-2 border-white text-white text-sm md:text-base font-bold  hover:bg-white/10 transition-all active:scale-95 flex items-center justify-center gap-2">
                    <i class="fa-brands fa-whatsapp text-base md:text-lg"></i> Chat on WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Swiper Initialization for Testimonials -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const testimonialSwiper = new Swiper('.testimonialSwiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                }
            }
        });
    });
</script>






<?php include 'includes/footer.php'; ?>