<?php
$page_title = "Our Services – Primedean Limited";
$page_description = "Explore our comprehensive range of branding, printing, signage, and advertising services designed to elevate your business in Kampala.";
include 'includes/config.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>

<!-- Services Hero Section -->
<section
    class="relative py-14 md:py-20 px-6 md:px-16 lg:px-24 xl:px-32 bg-[#812C84] overflow-hidden text-left text-white">

    <!-- 1. Background Image -->
    <div class="absolute inset-0 z-0 pointer-events-none">
        <img src="assets/images/h3.jpg" alt="Hero Background"
            class="w-full h-full object-cover object-center opacity-30 mix-blend-overlay">
    </div>

    <!-- 2. Brand Color Overlay (Guarantees contrast & text readability) -->
    <div
        class="absolute inset-0 bg-gradient-to-r from-[#812C84] via-[#812C84]/90 to-[#812C84]/75 z-0 pointer-events-none">
    </div>

    <!-- 3. Abstract Dot Pattern -->
    <div
        class="absolute inset-0 bg-[url('https://raw.githubusercontent.com/prebuiltui/prebuiltui/main/assets/hero/dot-pattern-redical.svg')] opacity-20 bg-cover mix-blend-overlay pointer-events-none z-0">
    </div>

    <!-- Main Content Layer -->
    <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-8 md:gap-12">

        <!-- Left Side: Heading & Paragraph -->
        <div class="max-w-2xl md:max-w-3xl">
            <h1 class="text-3xl md:text-3xl lg:text-4xl font-extrabold mb-4 tracking-tight leading-tight">
                Everything you Need to <span class="text-[#E0C1D7]">Stand Out</span>
            </h1>
            <p class="text-sm md:text-md text-white/90 leading-relaxed">
                From visibility items, promotional items, customized signage and printing of different items like
                reports, workbooks etc. We deliver excellence across all touchpoints. <span
                    class="font-bold text-white">Start a journey with a partner who will understand your needs and
                    exceed your expectations.</span>
            </p>
        </div>

        <!-- Right Side: Button -->
        <div class="shrink-0 w-full md:w-auto">
            <a href="contact.php"
                class="inline-flex items-center justify-center w-50 md:w-auto px-6 py-2.5 md:px-8 md:py-4 text-xs sm:text-sm md:text-base bg-white text-[#812C84] font-bold hover:bg-[#E0C1D7] hover:text-[#812C84] active:scale-95 transition-all shadow-lg text-center">
                Get a Quote in 2Mins.
            </a>
        </div>

    </div>
</section>

<!-- Comprehensive Services Grid -->
<section class="py-20 px-6 md:px-16 lg:px-24 xl:px-32 bg-white">

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 text-white">
        <!-- Service 1: Visibility Display Banners -->
        <a href="service-detail.php?service=visibility-banners"
            class="group rounded-2xl border border-white/20 bg-white/10 backdrop-blur-md hover:bg-white/20 transition-all duration-300 relative overflow-hidden flex flex-col block">
            <!-- Image Top -->
            <div class="w-full h-48 relative overflow-hidden">
                <img src="assets/images/nsssf.jpg" alt="Visibility Display Banners"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
            </div>
            <!-- Content -->
            <div class="p-6 flex flex-col grow bg-[#812C84]">
                <h3 class="text-xl font-bold mb-3">Visibility Banners</h3>
                <p class="text-white/80 text-sm leading-relaxed mb-6 grow">Let your brand stand out with professionally
                    designed and produced teardrop banners, pull-up banners,
                    X-stand, backdrop banners and vinyl banners. From corporate events and exhibitions to activations,
                    offices and outdoor promotions, Primedean Limited delivers practical visibility solutions that keep
                    your
                    brand seen, professional and memorable.</p>
                <span
                    class="text-[#E0C1D7] group-hover:text-white font-medium text-sm transition-colors flex items-center gap-2 mt-auto">Explore
                    <i class="fa-solid fa-arrow-right text-xs"></i></span>
            </div>
        </a>

        <!-- Service 2: Printing Services -->
        <a href="service-detail.php?service=printing-services"
            class="group rounded-2xl border border-white/20 bg-white/10 backdrop-blur-md hover:bg-white/20 transition-all duration-300 relative overflow-hidden flex flex-col block">
            <!-- Image Top -->
            <div class="w-full h-48 relative overflow-hidden">
                <img src="assets/images/new/4.jpg" alt="Printing Services"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
            </div>
            <!-- Content -->
            <div class="p-6 flex flex-col grow bg-[#812C84]">
                <h3 class="text-xl font-bold mb-3">Printing Services</h3>
                <p class="text-white/80 text-sm leading-relaxed mb-6 grow">Bring your ideas to print with quality and
                    professional finishing. From reports, books, manuals and
                    workbooks to flyers, brochures, posters, table talkers, business cards, calendars, notebooks,
                    folders and
                    other corporate stationery, Primedean delivers reliable printing solutions tailored to your brand
                    and
                    requirements.</p>
                <span
                    class="text-[#E0C1D7] group-hover:text-white font-medium text-sm transition-colors flex items-center gap-2 mt-auto">Explore
                    <i class="fa-solid fa-arrow-right text-xs"></i></span>
            </div>
        </a>

        <!-- Service 3: Visibility Promotional Items -->
        <a href="service-detail.php?service=promotional-items"
            class="group rounded-2xl border border-white/20 bg-white/10 backdrop-blur-md hover:bg-white/20 transition-all duration-300 relative overflow-hidden flex flex-col block">
            <!-- Image Top -->
            <div class="w-full h-48 relative overflow-hidden">
                <img src="assets/images/ss4.jpg" alt="Visibility Promotional Items"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
            </div>
            <!-- Content -->
            <div class="p-6 flex flex-col grow bg-[#812C84]">
                <h3 class="text-xl font-bold mb-3">Visibility Promotional Items</h3>
                <p class="text-white/80 text-sm leading-relaxed mb-6 grow">Keep your brand visible beyond the first
                    interaction with customised promotional items designed for
                    everyday use. From branded T-shirts, umbrellas, bottles and mugs to thermal flasks, tote bags, caps,
                    notebooks, keyholders and corporate gifts, Primedean delivers quality merchandise that keeps your
                    brand in the hands and minds of your customers. </p>
                <span
                    class="text-[#E0C1D7] group-hover:text-white font-medium text-sm transition-colors flex items-center gap-2 mt-auto">Explore
                    <i class="fa-solid fa-arrow-right text-xs"></i></span>
            </div>
        </a>

        <!-- Service 4: Events & Branding -->
        <a href="service-detail.php?service=events-branding"
            class="group rounded-2xl border border-white/20 bg-white/10 backdrop-blur-md hover:bg-white/20 transition-all duration-300 relative overflow-hidden flex flex-col block">
            <!-- Image Top -->
            <div class="w-full h-48 relative overflow-hidden">
                <img src="assets/images/4.jpg" alt="Events & Branding"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
            </div>
            <!-- Content -->
            <div class="p-6 flex flex-col grow bg-[#812C84]">
                <h3 class="text-xl font-bold mb-3">Events Branding</h3>
                <p class="text-white/80 text-sm leading-relaxed mb-6 grow">Make your event look professional and your
                    brand impossible to miss. From backdrops, banners and
                    exhibition stands to photo booths, speaker podiums, stage branding and event signage, Primedean
                    delivers complete event branding solutions designed to create a consistent and memorable brand
                    experience.</p>
                <span
                    class="text-[#E0C1D7] group-hover:text-white font-medium text-sm transition-colors flex items-center gap-2 mt-auto">Explore
                    <i class="fa-solid fa-arrow-right text-xs"></i></span>
            </div>
        </a>

        <!-- Service 5: Office Branding -->
        <a href="service-detail.php?service=office-branding"
            class="group rounded-2xl border border-white/20 bg-white/10 backdrop-blur-md hover:bg-white/20 transition-all duration-300 relative overflow-hidden flex flex-col block">
            <!-- Image Top -->
            <div class="w-full h-48 relative overflow-hidden">
                <img src="assets/images/jubilee.jpg" alt="Office Branding"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
            </div>
            <!-- Content -->
            <div class="p-6 flex flex-col grow bg-[#812C84]">
                <h3 class="text-xl font-bold mb-3">Office Branding</h3>
                <p class="text-white/80 text-sm leading-relaxed mb-6 grow">Turn your office into a professional
                    expression of your brand. Primedean provides brand-colour
                    painting, wall graphics, door and window branding, vinyl wraps, frosted and one-way vision stickers,
                    reception branding and office signage, professionally designed, printed and installed to create a
                    consistent brand environment.</p>
                <span
                    class="text-[#E0C1D7] group-hover:text-white font-medium text-sm transition-colors flex items-center gap-2 mt-auto">Explore
                    <i class="fa-solid fa-arrow-right text-xs"></i></span>
            </div>
        </a>

        <!-- Service 6: Outdoor Banners -->
        <a href="service-detail.php?service=outdoor-banners"
            class="group rounded-2xl border border-white/20 bg-white/10 backdrop-blur-md hover:bg-white/20 transition-all duration-300 relative overflow-hidden flex flex-col block">
            <!-- Image Top -->
            <div class="w-full h-48 relative overflow-hidden">
                <img src="assets/images/mtn.jpg" alt="Outdoor Banners"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
            </div>
            <!-- Content -->
            <div class="p-6 flex flex-col grow bg-[#812C84]">
                <h3 class="text-xl font-bold mb-3">Outdoor Banners</h3>
                <p class="text-white/80 text-sm leading-relaxed mb-6 grow">Take your message to where your audience is.
                    From street and roadside advertising to golf clubs, malls,
                    billboards, events, sports venues, buildings and perimeter branding, Primedean produces durable,
                    highimpact outdoor banners designed for maximum visibility in public spaces and changing weather
                    conditions.
                </p>
                <span
                    class="text-[#E0C1D7] group-hover:text-white font-medium text-sm transition-colors flex items-center gap-2 mt-auto">Explore
                    <i class="fa-solid fa-arrow-right text-xs"></i></span>
            </div>
        </a>

        <!-- Service 7: Signage Solutions -->
        <a href="service-detail.php?service=signage-solutions"
            class="group rounded-2xl border border-white/20 bg-white/10 backdrop-blur-md hover:bg-white/20 transition-all duration-300 relative overflow-hidden flex flex-col block">
            <!-- Image Top -->
            <div class="w-full h-48 relative overflow-hidden">
                <img src="assets/images/global.webp" alt="Signage Solutions"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
            </div>
            <!-- Content -->
            <div class="p-6 flex flex-col grow bg-[#812C84]">
                <h3 class="text-xl font-bold mb-3">Signage Services</h3>
                <p class="text-white/80 text-sm leading-relaxed mb-6 grow">Get your business noticed with professionally
                    designed, produced and installed signage built for lasting
                    visibility. From custom, reception and indoor glass signage to roadside signs, pylons, lightboxes,
                    directional and safety signage, as well as 2D and 3D solutions, Primedean delivers durable signage
                    designed to maintain a professional brand presence even under harsh outdoor weather conditions.</p>
                <span
                    class="text-[#E0C1D7] group-hover:text-white font-medium text-sm transition-colors flex items-center gap-2 mt-auto">Explore
                    <i class="fa-solid fa-arrow-right text-xs"></i></span>
            </div>
        </a>

        <!-- Service 8: Vehicles & Motorcycle Branding -->
        <a href="service-detail.php?service=vehicle-branding"
            class="group rounded-2xl border border-white/20 bg-white/10 backdrop-blur-md hover:bg-white/20 transition-all duration-300 relative overflow-hidden flex flex-col block">
            <!-- Image Top -->
            <div class="w-full h-48 relative overflow-hidden">
                <img src="assets/images/wraps.jpg" alt="Vehicles & Motorcycle Branding"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
            </div>
            <!-- Content -->
            <div class="p-6 flex flex-col grow bg-[#812C84]">
                <h3 class="text-xl font-bold mb-3">Vehicle & Motorcycle Branding</h3>
                <p class="text-white/80 text-sm leading-relaxed mb-6 grow">Take your brand wherever your business goes.
                    Primedean professionally brands motorcycles, company
                    cars, pickups, vans, trucks, trailers and entire fleets using quality, durable materials designed to
                    maintain strong visibility through everyday road use, dust and changing weather conditions.</p>
                <span
                    class="text-[#E0C1D7] group-hover:text-white font-medium text-sm transition-colors flex items-center gap-2 mt-auto">Explore
                    <i class="fa-solid fa-arrow-right text-xs"></i></span>
            </div>
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>