<?php
include 'includes/config.php';
include 'includes/functions.php';

// Safe Slug Handling (Defaults to first slug or visibility-banners if missing)
$slug = $_GET['service'] ?? 'visibility-banners';
$service = get_service_by_slug($slug);

// Handle 404 if service does not exist in API
if (!$service) {
    header("Location: services.php");
    exit();
}

// Extract and aggregate all dynamic images across categories into a single gallery array
$gallery = [];
if (!empty($service['categories'])) {
    foreach ($service['categories'] as $category) {
        if (!empty($category['images'])) {
            foreach ($category['images'] as $imgUrl) {
                $gallery[] = $imgUrl;
            }
        }
    }
}

include 'includes/header.php';
include 'includes/navbar.php';
?>

<section class="relative pt-12 pb-10 px-6 md:px-16 lg:px-24 xl:px-32 bg-slate-900 overflow-hidden text-white">
    <!-- Background Image -->
    <div
        class="absolute inset-0 bg-[url('<?= htmlspecialchars($service['image_url'] ?? ''); ?>')] bg-cover bg-center opacity-40 mix-blend-luminosity">
    </div>

    <!-- Color Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-r from-[#822C84] via-[#822C84]/90 to-[#822C84]/70"></div>

    <!-- Hero Content -->
    <div class="relative z-10 max-w-4xl">
        <h1 class="text-2xl md:text-4xl lg:text-5xl font-extrabold mb-2 md:-ml-1 tracking leading">
            <?= htmlspecialchars($service['title']); ?>
        </h1>
        <p class="text-sm md:text-lg text-white/90 font-medium">
            <?= htmlspecialchars($service['tagline'] ?? $service['tagline']); ?>
        </p>
    </div>
</section>

<!-- Main Content Grid Layout -->
<section class="py-10 px-6 md:px-16 lg:px-24 xl:px-32 bg-white relative z-20">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12">

        <!-- Left Column -->
        <div class="lg:col-span-8 space-y-12">

            <!-- Hero Image Showcase -->
            <div class="rounded-xl overflow-hidden shadow-2xl shadow-[#812C84]/50 h-[350px] md:h-[450px]">
                <img src="<?= htmlspecialchars($service['image_url'] ?? ''); ?>"
                    alt="<?= htmlspecialchars($service['title']); ?>" class="w-full h-full object-cover">
            </div>

            <!-- Description -->
            <div class="prose max-w-none text-[#812C84]">
                <?= strip_tags($service['description'] ?? '', '<p><br><strong><b><em><i><ul><ol><li><a>'); ?>
            </div>

            <!-- Dynamic Category Offerings Section -->
            <?php if (!empty($service['categories'])): ?>
            <div class="pt-4">
                <h2 class="text-2xl md:text-3xl font-extrabold text-[#812C84] mb-6">We offer;</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <?php foreach ($service['categories'] as $category): ?>
                    <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100 shadow-sm flex items-start gap-3">
                        <i class="fa-solid fa-check text-[#812C84] mt-1 shrink-0"></i>
                        <span class="text-xs md:text-sm text-[#812C84] leading font-normal">
                            <strong class="font-bold">
                                <?= htmlspecialchars($category['name']); ?>
                            </strong>
                            <?php if (!empty($category['description'])): ?>
                            –
                            <?= htmlspecialchars($category['description']); ?>
                            <?php endif; ?>
                        </span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Aggregated Dynamic Gallery Section -->
            <?php if (!empty($gallery)): ?>
            <div class="pt-4">
                <h2 class="text-2xl md:text-3xl font-extrabold text-[#812C84] mb-6">Some of our works</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <?php foreach ($gallery as $img): ?>
                    <div class="overflow-hidden h-56 shadow-sm border border-slate-100 rounded-lg">
                        <img src="<?= htmlspecialchars($img); ?>" alt="Gallery Work"
                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Execution Process Section -->
            <div class="pt-6">
                <h2 class="text-2xl md:text-3xl font-extrabold text-[#812C84] mb-8">Our Execution Process</h2>
                <div class="space-y-4">
                    <div class="flex gap-6 items-start p-6 rounded-2xl bg-slate-50 border border-slate-100">
                        <span
                            class="flex items-center justify-center w-10 h-10 rounded-xl bg-[#812C84] text-white font-bold shrink-0">1</span>
                        <div>
                            <h4 class="text-lg font-bold text-[#812C84] mb-1">Inquiry, RFQ & Quotation</h4>
                            <p class="text-[#812C84] text-sm">Share your requirements or RFQ with us. We review the
                                scope, discuss your needs where necessary, and provide a clear, competitive quotation
                                tailored to the project.</p>
                        </div>
                    </div>
                    <div class="flex gap-6 items-start p-6 rounded-2xl bg-slate-50 border border-[#812C84]/30">
                        <span
                            class="flex items-center justify-center w-10 h-10 rounded-xl bg-[#812C84] text-white font-bold shrink-0">2</span>
                        <div>
                            <h4 class="text-lg font-bold text-[#812C84] mb-1">Design, Mockups & Site Assessment</h4>
                            <p class="text-[#812C84] text-sm">Once aligned, our creative team develops and shares
                                designs, samples or mockups for review. For projects that require installation or
                                customization, we conduct a site visit to understand the location, take accurate
                                measurements and assess technical requirements.</p>
                        </div>
                    </div>
                    <div class="flex gap-6 items-start p-6 rounded-2xl bg-slate-50 border border-slate-100">
                        <span
                            class="flex items-center justify-center w-10 h-10 rounded-xl bg-[#812C84] text-white font-bold shrink-0">3</span>
                        <div>
                            <h4 class="text-lg font-bold text-[#812C84] mb-1">Approval, Production & Delivery</h4>
                            <p class="text-[#812C84] text-sm">Upon approval of the final design, specifications and
                                measurements, production begins. We ensure quality execution and finishing, followed by
                                timely delivery and professional installation where required.</p>
                        </div>
                    </div>
                    <div class="flex gap-6 items-start p-6 rounded-2xl bg-slate-50 border border-[#812C84]/30">
                        <span
                            class="flex items-center justify-center w-10 h-10 rounded-xl bg-[#812C84] text-white font-bold shrink-0">4</span>
                        <div>
                            <h4 class="text-lg font-bold text-[#812C84] mb-1">Invoicing</h4>
                            <p class="text-[#812C84] text-sm">Upon successful delivery, we share an EFRIS invoice for
                                the project.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Sidebar Inquiry Form -->
        <div class="lg:col-span-4">
            <div class="sticky top-12 space-y-8">
                <div class="p-8 rounded-3xl bg-slate-50 border border-slate-100 shadow-xl shadow-[#812C84]/50">
                    <h3 class="text-xl font-bold text-[#812C84] mb-2">Book this Service</h3>
                    <p class="text-[#812C84] text-sm mb-6">Fill out your details and our team will get back to you with
                        a custom quote.</p>

                    <form action="process-inquiry.php" method="POST" class="space-y-4">
                        <input type="hidden" name="service" value="<?= htmlspecialchars($service['title']); ?>">
                        <div>
                            <label class="block text-xs font-bold text-[#812C84] uppercase tracking-wider mb-2">Full
                                Name</label>
                            <input type="text" name="name" required
                                class="w-full px-5 py-3.5 border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#812C84]/20 focus:border-[#812C84] transition-all bg-[#E0C1D7] text-white placeholder-slate-200">
                        </div>
                        <div>
                            <label
                                class="block text-xs font-bold text-[#812C84] uppercase tracking-wider mb-2">Email</label>
                            <input type="email" name="email" required
                                class="w-full px-5 py-3.5 border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#812C84]/20 focus:border-[#812C84] transition-all bg-[#E0C1D7] text-white placeholder-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-[#812C84] uppercase tracking-wider mb-2">Company
                                Name</label>
                            <input type="text" name="company" required
                                class="w-full px-5 py-3.5 border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#812C84]/20 focus:border-[#812C84] transition-all bg-[#E0C1D7] text-white placeholder-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-[#812C84] uppercase tracking-wider mb-2">Phone
                                Number / WhatsApp</label>
                            <input type="text" name="phone" required
                                class="w-full px-5 py-3.5 border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#812C84]/20 focus:border-[#812C84] transition-all bg-[#E0C1D7] text-white placeholder-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-[#812C84] uppercase tracking-wider mb-2">Service
                                Category</label>
                            <input type="text" name="category" value="<?= htmlspecialchars($service['title']); ?>"
                                readonly
                                class="w-full px-5 py-3.5 border border-[#812C84] focus:outline-none focus:ring-2 focus:ring-[#812C84]/20 focus:border-[#812C84] transition-all bg-slate-100 text-[#812C84]">
                        </div>
                        <button type="submit"
                            class="w-full py-4 bg-[#812C84] hover:bg-[#6c236f] text-white font-bold shadow-lg transition-all mt-2 rounded">
                            Submit Inquiry
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>

<?php include 'includes/footer.php'; ?>