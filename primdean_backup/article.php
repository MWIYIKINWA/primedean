<?php
include 'includes/config.php';

// Article Metadata
$page_title = "How to Choose the Best Printing Company in Kampala – Primedean Limited";
$page_description = "Explore key factors when choosing a printing company in Kampala, from quality of work to legal compliance.";
$page_image = "assets/images/new/7.jpg";

// Generate absolute URL and encoded strings for social sharing
$current_url = SITE_URL . $_SERVER['REQUEST_URI'];
$encoded_url = urlencode($current_url);
$encoded_title = urlencode("HOW TO CHOOSE THE BEST PRINTING COMPANY IN KAMPALA");

include 'includes/header.php';
include 'includes/navbar.php';
?>

<!-- Service Hero Section -->
<section class="relative pt-12 pb-10 px-6 md:px-16 lg:px-24 xl:px-32 bg-slate-900 overflow-hidden text-white">
    <div
        class="absolute inset-0 bg-[url('assets/images/new/7.jpg')] bg-cover bg-center opacity-40 mix-blend-luminosity">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-[#822C84] via-[#822C84]/90 to-[#822C84]/70"></div>

    <div class="relative z-10 max-w-4xl">
        <span
            class="inline-block px-4 py-1.5 rounded-full bg-gray-900 text-white font-semibold text-xs uppercase tracking-wider mb-6 shadow-md">
            Printing
        </span>
        <h1 class="text-3xl md:text-4xl lg:text-4xl font-extrabold mb-6 tracking-tight leading-tight">
            HOW TO CHOOSE THE BEST PRINTING COMPANY IN KAMPALA
        </h1>
        <p class="text-slate-300 text-sm">
            Published on August 15, 2026 by <span class="font-semibold text-white">Admin</span>
        </p>
    </div>
</section>

<!-- Main Content & Sidebar Layout -->
<section class="py-20 px-6 md:px-16 lg:px-24 xl:px-32 bg-white relative z-20">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12">

        <!-- Left Column: Desktop Dynamic Share Icons -->
        <div class="hidden lg:block lg:col-span-1">
            <div class="sticky top-32 flex flex-col items-center gap-4">
                <span
                    class="text-xs font-bold text-[#812C84] uppercase tracking-widest writing-mode-vertical mb-2">Share</span>

                <!-- LinkedIn Share -->
                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= $encoded_url ?>" target="_blank"
                    rel="noopener noreferrer"
                    class="w-12 h-12 rounded-full bg-slate-50 border border-[#812C84] text-[#812C84] hover:bg-[#0077b5] hover:text-white hover:border-[#0077b5] transition-all flex items-center justify-center shadow-sm"
                    title="Share on LinkedIn">
                    <i class="fa-brands fa-linkedin-in"></i>
                </a>

                <!-- WhatsApp Share -->
                <a href="https://api.whatsapp.com/send?text=<?= $encoded_title ?>%20<?= $encoded_url ?>" target="_blank"
                    rel="noopener noreferrer"
                    class="w-12 h-12 rounded-full bg-slate-50 border border-[#812C84] text-[#812C84] hover:bg-[#25D366] hover:text-white hover:border-[#25D366] transition-all flex items-center justify-center shadow-sm"
                    title="Share on WhatsApp">
                    <i class="fa-brands fa-whatsapp"></i>
                </a>

                <!-- Facebook Share -->
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $encoded_url ?>" target="_blank"
                    rel="noopener noreferrer"
                    class="w-12 h-12 rounded-full bg-slate-50 border border-[#812C84] text-[#812C84] hover:bg-[#1877F2] hover:text-white hover:border-[#1877F2] transition-all flex items-center justify-center shadow-sm"
                    title="Share on Facebook">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
            </div>
        </div>

        <!-- Center Column: Article Body -->
        <div class="lg:col-span-8">
            <div class="mb-12 rounded-3xl overflow-hidden shadow-xl shadow-slate-200/50 h-[350px] md:h-[450px]">
                <img src="<?= $page_image ?>" alt="Vehicle Branding Showcase" class="w-full h-full object-cover">
            </div>

            <div class="prose prose-lg max-w-none text-[#812C84] space-y-6 leading-relaxed">
                <p class="text-md text-[#812C84] text-justify leading-relaxed">
                    Uganda is full of many printing companies, with Kampala being the heart of the print and media
                    industry, with renowned places like Nasser. However, all those media houses do not provide the same
                    quality and pricing; some charge low prices while producing poor-quality products, and others charge
                    high prices while offering poor quality.<br>
                    Choosing the right printing company that offers quality products is somewhat challenging in Kampala
                    today; the city is full of people who are more after money than prioritizing service delivery,
                    conmen, and people who have no physical place of work.<br>
                    In this guide, I am going to help you explore how to choose the best printing company in Kampala.
                    When selecting a printing company in Uganda, it’s crucial to consider several factors to ensure you
                    get the best service and results for your business needs.
                </p>

                <div class="space-y-6">
                    <h2 class="text-2xl text-justify md:text-3xl font-bold text-[#812C84] pt-4">FACTORS TO CONSIDER WHEN
                        CHOOSING A PRINTING COMPANY IN KAMPALA.</h2>

                    <ul class="list-disc pl-6 font-light space-y-4 text-[#812C84] text-justify">
                        <li>Quality of work: When choosing the best printing company, it's wise to
                            choose a company with a strong portfolio of high-quality work. Going through the clients'
                            reviews also shows the credibility of the company. Brands like primedean have built strong,
                            credible portfolios to ensure that your brand stands out.</li>
                        <li>Turnaround time: Ensure that a company you are selecting can deliver in
                            your required time frame; timely delivery ensures minimized errors and saves time.</li>
                        <li>Printing machines and equipment: Before choosing the company to use, find
                            out what types of machines they are using; digital printing is good for small quantities,
                            and offset printing can be more economical for large quantities.</li>
                        <li>Costing and pricing: Compare quotations of different companies before
                            selecting a company; don't automatically choose the cheapest option; very low prices can
                            sometimes mean lower-quality materials or finishing.</li>
                        <li>Payment terms: Ask about deposits, payment on delivery, credit facilities,
                            and accepted payment methods. Information about the company, like bank account, mobile money
                            accounts being registered in the company names shows authenticity that you are dealing with
                            a legit company not conmen. For large corporate orders, favourable and clear payment terms
                            can be important.</li>
                        <li>Experience and reputation: Consider how long the company has been operating
                            and the types of clients they serve. Ask for references or look at reviews and previous
                            projects. A company with experience in your particular type of printing is preferable.</li>
                        <li>The digital footprint and branding consistency across channels: Before
                            deciding on the type of company to use, take time to check their digital channels such as
                            websites and social media platforms; do they communicate what they do, and is the branding
                            and content the same.</li>
                        <li>Legal and regulatory compliance: Before choosing any company to use for you
                            printing services, always confirm that the company is a registered company operating legally
                            and compliant with the business laws governing the country. Always ask for documents like
                            the Trading license, URA TIN and PPDA certificate to ensure you are working with a legit
                            company on which you can take legal action in case of breach of contract or any
                            disagreement.</li>
                    </ul>
                </div>
            </div>

            <!-- Mobile Share Bar (Visible only on mobile/tablet below the article text) -->
            <div
                class="flex lg:hidden items-center justify-between mt-12 p-4 bg-slate-50 rounded-2xl border border-slate-100">
                <span class="text-xs font-bold text-[#812C84] uppercase tracking-wider">Share this article:</span>
                <div class="flex items-center gap-3">
                    <!-- LinkedIn Share -->
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= $encoded_url ?>" target="_blank"
                        rel="noopener noreferrer"
                        class="w-10 h-10 rounded-full bg-white border border-[#812C84] text-[#812C84] hover:bg-[#0077b5] hover:text-white hover:border-[#0077b5] transition-all flex items-center justify-center shadow-sm"
                        title="Share on LinkedIn">
                        <i class="fa-brands fa-linkedin-in text-sm"></i>
                    </a>
                    <!-- WhatsApp Share -->
                    <a href="https://api.whatsapp.com/send?text=<?= $encoded_title ?>%20<?= $encoded_url ?>"
                        target="_blank" rel="noopener noreferrer"
                        class="w-10 h-10 rounded-full bg-white border border-[#812C84] text-[#812C84] hover:bg-[#25D366] hover:text-white hover:border-[#25D366] transition-all flex items-center justify-center shadow-sm"
                        title="Share on WhatsApp">
                        <i class="fa-brands fa-whatsapp text-sm"></i>
                    </a>
                    <!-- Facebook Share -->
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $encoded_url ?>" target="_blank"
                        rel="noopener noreferrer"
                        class="w-10 h-10 rounded-full bg-white border border-[#812C84] text-[#812C84] hover:bg-[#1877F2] hover:text-white hover:border-[#1877F2] transition-all flex items-center justify-center shadow-sm"
                        title="Share on Facebook">
                        <i class="fa-brands fa-facebook-f text-sm"></i>
                    </a>
                </div>
            </div>

            <div
                class="mt-8 pt-8 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-6">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider mr-2">Tags:</span>
                    <a href="#"
                        class="px-3 py-1 bg-slate-100 hover:bg-[#812C84] hover:text-white rounded-lg text-xs font-semibold text-slate-600 transition-colors">Branding</a>
                    <a href="#"
                        class="px-3 py-1 bg-slate-100 hover:bg-[#812C84] hover:text-white rounded-lg text-xs font-semibold text-slate-600 transition-colors">Vehicle
                        Wraps</a>
                    <a href="#"
                        class="px-3 py-1 bg-slate-100 hover:bg-[#812C84] hover:text-white rounded-lg text-xs font-semibold text-slate-600 transition-colors">Kampala
                        Business</a>
                </div>
            </div>
        </div>

        <!-- Right Column: Sidebar -->
        <div class="lg:col-span-3">
            <div class="sticky top-32 space-y-8">
                <div class="p-8 rounded-3xl bg-[#812C84] text-white shadow-xl text-center relative overflow-hidden">
                    <div
                        class="absolute inset-0 bg-[url('https://raw.githubusercontent.com/prebuiltui/prebuiltui/main/assets/hero/dot-pattern-redical.svg')] opacity-20 bg-cover mix-blend-overlay">
                    </div>
                    <div class="relative z-10">
                        <h3 class="text-xl font-bold mb-3">Ready for our Service?</h3>
                        <p class="text-white/90 text-sm mb-6">Let our experts make your company visible and noticeble.
                        </p>
                        <a href="contact.php"
                            class="inline-block w-full py-3.5 bg-white text-[#812C84] font-bold shadow-lg hover:bg-slate-50 transition-all active:scale-95">
                            Get a Quote
                        </a>
                    </div>
                </div>

                <div class="p-6 rounded-3xl bg-slate-50 border border-[#812C84]">
                    <h4 class="text-sm font-bold text-[#812C84] uppercase tracking-widest mb-4">Categories</h4>
                    <ul class="space-y-3 text-sm font-semibold text-slate-600">
                        <li><a href="#"
                                class="flex justify-between items-center hover:text-[#812C84] transition-colors"><span
                                    class="text-[#812C84]">Signage</span><span
                                    class="px-2.5 py-0.5 rounded-full bg-slate-200 text-[#812C84] text-xs">4</span></a>
                        </li>
                        <li><a href="#"
                                class="flex justify-between items-center hover:text-[#812C84] transition-colors"><span
                                    class="text-[#812C84]">Vehicle Branding</span><span
                                    class="px-2.5 py-0.5 rounded-full bg-slate-200 text-[#812C84] text-xs">6</span></a>
                        </li>
                        <li><a href="#"
                                class="flex justify-between items-center hover:text-[#812C84] transition-colors"><span
                                    class="text-[#812C84]">Printing Services</span><span
                                    class="px-2.5 py-0.5 rounded-full bg-slate-200 text-[#812C84] text-xs">5</span></a>
                        </li>
                        <li><a href="#"
                                class="flex justify-between items-center hover:text-[#812C84] transition-colors"><span
                                    class="text-[#812C84]">Company News</span><span
                                    class="px-2.5 py-0.5 rounded-full bg-slate-200 text-[#812C84] text-xs">3</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>

<?php include 'includes/footer.php'; ?>