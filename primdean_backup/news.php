<?php
$page_title = "News & Updates – Primedean Limited";
$page_description = "Stay up to date with the latest news, branding tips, company milestones, and industry insights from Primedean Limited in Kampala.";
include 'includes/config.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>


<section class="relative py-15 px-6 md:px-16 lg:px-15 xl:px-32 bg-[#812C84] overflow-hidden text-center text-white">
    <!-- Abstract Background Elements -->
    <!-- <div
        class="absolute inset-0 bg-[url('https://raw.githubusercontent.com/prebuiltui/prebuiltui/main/assets/hero/dot-pattern-redical.svg')] opacity-20 bg-cover mix-blend-overlay">
    </div> -->

    <div class="relative z-10 max-w-3xl mx-auto">
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold mb-6 tracking-tight">Latest News & Updates</h1>
        <p class="text-md text-white/90 leading-relaxed">
            Discover expert tips on corporate branding, behind-the-scenes looks at our recent projects, and
            announcements straight from our Kampala workshop.
        </p>
    </div>
</section>

<!-- Featured Article Section -->
<section class="py-20 px-6 md:px-16 lg:px-24 xl:px-32 bg-white relative z-20">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-8">

            <span
                class="px-4 py-1.5 rounded-full bg-[#812C84]/10 text-[#812C84] font-semibold text-xs uppercase tracking-wider">Spotlight</span>
        </div>

        <!-- Featured Card Grid -->
        <div
            class="grid grid-cols-1 lg:grid-cols-12 gap-8 bg-slate-50 border border-slate-100 rounded-3xl overflow-hidden shadow-xl shadow-slate-200/40 group hover:shadow-2xl transition-all duration-300">
            <!-- Article Image -->
            <div class="lg:col-span-7 relative h-72 lg:h-auto overflow-hidden">
                <img src="assets/images/new/7.jpg" alt="Featured Article"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            </div>
            <!-- Article Content -->
            <div class="lg:col-span-5 p-8 md:p-12 flex flex-col justify-center">
                <div class="flex items-center gap-4 text-sm text-slate-500 mb-4">
                    <span class="text-[#812C84]"><i class="fa-regular fa-calendar text-[#812C84] mr-2"></i> August 15, 2026</span>
                   
                  
                </div>
                <h3
                    class="text-2xl text-[#812C84] md:text-3xl font-bold  mb-4 leading-snug group-hover:text-[#812C84] transition-colors">
                   HOW TO CHOOSE THE BEST PRINTING COMPANY IN KAMPALA
                </h3>
                <p class="text-[#812C84] leading-relaxed mb-8">
                    Uganda is full of many printing companies, with Kampala being the heart of the print and media industry, with renowned places like Nasser. However, all those media houses do not provide the same quality and pricing.
                </p>
                <a href="article.php"
                    class="inline-flex items-center gap-2 text-[#812C84] font-bold hover:text-[#E0724A] transition-colors">
                    Read Full Article <i
                        class="fa-solid fa-arrow-right text-sm transform group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
        </div>
    </div>
</section>


<?php include 'includes/footer.php'; ?>