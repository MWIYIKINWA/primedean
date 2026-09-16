<?php
$page_title = "Our Services – Primedean Limited";
$page_description = "Explore our comprehensive range of branding, printing, signage, and advertising services designed to elevate your business in Kampala.";

include 'includes/config.php';
include 'includes/functions.php';
include 'includes/header.php';
include 'includes/navbar.php';

$services = get_services();
?>

<!-- Services Hero Section -->
<section
    class="relative py-14 md:py-20 px-6 md:px-16 lg:px-24 xl:px-32 bg-[#812C84] overflow-hidden text-left text-white">
    <div class="absolute inset-0 z-0 pointer-events-none">
        <img src="assets/images/h3.jpg" alt="Hero Background"
            class="w-full h-full object-cover object-center opacity-30 mix-blend-overlay">
    </div>
    <div
        class="absolute inset-0 bg-gradient-to-r from-[#812C84] via-[#812C84]/90 to-[#812C84]/75 z-0 pointer-events-none">
    </div>
    <div
        class="absolute inset-0 bg-[url('https://raw.githubusercontent.com/prebuiltui/prebuiltui/main/assets/hero/dot-pattern-redical.svg')] opacity-20 bg-cover mix-blend-overlay pointer-events-none z-0">
    </div>

    <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-8 md:gap-12">
        <div class="max-w-2xl md:max-w-3xl">
            <h1 class="text-3xl md:text-3xl lg:text-4xl font-extrabold mb-4 tracking-tight leading-tight">
                Everything you Need to <span class="text-[#E0C1D7]">Stand Out</span>
            </h1>
            <p class="text-sm md:text-md text-white/90 leading-relaxed">
                From visibility items, promotional items, customized signage and printing of different items like
                reports, workbooks etc. We deliver excellence across all touchpoints.
                <span class="font-bold text-white">Start a journey with a partner who will understand your needs and
                    exceed your expectations.</span>
            </p>
        </div>
        <div class="shrink-0 w-full md:w-auto">
            <a href="contact.php"
                class="inline-flex items-center justify-center w-50 md:w-auto px-6 py-2.5 md:px-8 md:py-4 text-xs sm:text-sm md:text-base bg-white text-[#812C84] font-bold hover:bg-[#E0C1D7] hover:text-[#812C84] active:scale-95 transition-all shadow-lg text-center">
                Get a Quote in 2Mins.
            </a>
        </div>
    </div>
</section>

<!-- Dynamic Comprehensive Services Grid -->
<section class="py-20 px-6 md:px-16 lg:px-24 xl:px-32 bg-white">
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 text-white">
        <?php if (!empty($services)): ?>
        <?php foreach ($services as $service): ?>
        <a href="service-detail.php?service=<?= htmlspecialchars($service['slug']); ?>"
            class="group rounded-2xl border border-white/20 bg-white/10 backdrop-blur-md hover:bg-white/20 transition-all duration-300 relative overflow-hidden flex flex-col block">
            <!-- Image Top -->
            <div class="w-full h-48 relative overflow-hidden bg-slate-100">
                <img src="<?= htmlspecialchars($service['image_url'] ?? 'assets/images/nsssf.jpg'); ?>"
                    alt="<?= htmlspecialchars($service['title']); ?>"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
            </div>
            <!-- Content -->
            <div class="p-6 flex flex-col grow bg-[#812C84]">
                <h3 class="text-xl font-bold mb-3">
                    <?= htmlspecialchars($service['title']); ?>
                </h3>
                <p class="text-white/80 text-sm leading-relaxed mb-6 grow">
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

<?php include 'includes/footer.php'; ?>