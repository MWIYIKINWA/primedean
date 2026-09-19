<?php
$page_title = "Contact Us – Primedean Limited";
$page_description = "Get in touch with Primedean Limited. We are ready to help you elevate your brand with premium signage, printing, and branding solutions in Kampala, Uganda.";
include 'includes/config.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>

<!-- Contact Hero Section -->
<section class="relative py-10 px-6 md:px-16 lg:px-10 xl:px-32 bg-[#812C84] overflow-hidden text-center text-white">
    <!-- Abstract Background Elements -->
    <div
        class="absolute inset-0 bg-[url('https://raw.githubusercontent.com/prebuiltui/prebuiltui/main/assets/hero/dot-pattern-redical.svg')] opacity-20 bg-cover mix-blend-overlay">
    </div>

    <div class="relative z-10 max-w-3xl mx-auto">
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold mb-6 tracking-tight">Get a Quote in 2 Mins.</h1>
        <p class="text-sm md:text-base text-white/90 leading-relaxed text-justify">
            Have a project in mind, need a quote, or just want to chat about your brand's visibility? Drop us a message
            and our creative team will get back to you shortly.
        </p>
    </div>
</section>

<!-- Contact Info & Form Section -->
<section class="py-20 text-[#812C84] px-6 md:px-16 lg:px-24 xl:px-32 bg-slate-50 relative">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8">

        <div class="lg:col-span-7">
            <div class="bg-white p-8 md:p-12 rounded-3xl shadow-xl shadow-slate-200/40 border border-slate-100">
                <form action="process_contact.php" method="POST" class="space-y-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- First Name -->
                        <div>
                            <label for="first_name" class="block text-sm font-semibold text-slate-700 mb-2">First Name
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="first_name" name="first_name" required
                                class="w-full px-5 py-3.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#812C84]/20 focus:border-[#812C84] transition-all bg-[#E0C1D7] text-white placeholder-slate-200"
                                placeholder="Kabuye">
                        </div>
                        <!-- Last Name -->
                        <div>
                            <label for="last_name" class="block text-sm font-semibold text-slate-700 mb-2">Last
                                Name</label>
                            <input type="text" id="last_name" name="last_name"
                                class="w-full px-5 py-3.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#812C84]/20 focus:border-[#812C84] transition-all bg-[#E0C1D7] text-white placeholder-slate-200"
                                placeholder="Brian">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Email Address
                                <span class="text-red-500">*</span></label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-5 py-3.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#812C84]/20 focus:border-[#812C84] transition-all bg-[#E0C1D7] text-white placeholder-slate-200"
                                placeholder="brian@example.com">
                        </div>
                        <!-- Phone -->
                        <div>
                            <label for="phone" class="block text-sm font-semibold text-slate-700 mb-2">Phone
                                Number</label>
                            <input type="tel" id="phone" name="phone"
                                class="w-full px-5 py-3.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#812C84]/20 focus:border-[#812C84] transition-all bg-[#E0C1D7] text-white placeholder-slate-200"
                                placeholder="+256 700 000 000">
                        </div>
                    </div>

                    <!-- Service Interest -->
                    <div>
                        <label for="service" class="block text-sm font-semibold text-slate-700 mb-2">What service are
                            you interested in?</label>
                        <select id="service" name="service"
                            class="w-full px-5 py-3.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#812C84]/20 focus:border-[#812C84] transition-all bg-[#E0C1D7] text-white placeholder-slate-200 appearance-none cursor-pointer">
                            <option value="Pull-Up, Teardrop or Display Banners">Pull-Up, Teardrop or Display Banners
                            </option>
                            <option value="Signage Services">Signage Services</option>
                            <option value="Promotional Items">Promotional Items</option>
                            <option value="Printing Services">Printing Services</option>
                            <option value="Events Branding">Events Branding</option>
                            <option value="Office Branding">Office Branding</option>
                            <option value="Vehicle & Motorcycle Branding">Vehicle & Motorcycle Branding</option>
                            <option value="Outdoor Banners">Outdoor Banners</option>
                            <option value="General Inquiry">General Inquiry</option>
                        </select>
                    </div>

                    <!-- Message -->
                    <div>
                        <label for="message" class="block text-sm font-semibold text-slate-700 mb-2">Your Message <span
                                class="text-red-500">*</span></label>
                        <textarea id="message" name="message" rows="4" required
                            class="w-full px-5 py-3.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#812C84]/20 focus:border-[#812C84] transition-all bg-[#E0C1D7] text-white placeholder-slate-200 resize-none"
                            placeholder="Tell us about your project..."></textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full py-4 text-white font-bold rounded-xl bg-[#812C84] hover:shadow-lg hover:shadow-violet-500/30 active:scale-[0.98] transition-all flex items-center justify-center gap-2">
                        Send Message
                    </button>
                </form>
            </div>
        </div>

        <div class="lg:col-span-5 flex flex-col justify-center">
            <!-- Main Heading -->
            <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-[#812C84] mb-2 md:mb-4">
                You want a quick response?
            </h2>
            <p class="text-[#812C84] mb-6 md:mb-10 text-sm md:text-base leading-relaxed">
                We’d love to hear from you. Reach out to us using the details below or fill out the form.
            </p>

            <div class="space-y-5 md:space-y-8 mb-8 md:mb-12">
                <!-- Address -->
                <div class="flex items-start gap-3.5 md:gap-5">
                    <div
                        class="w-10 h-10 md:w-14 md:h-14 rounded-xl md:rounded-2xl bg-white border border-slate-100 shadow-sm flex items-center justify-center shrink-0 group hover:border-[#812C84]/30 transition-colors">
                        <i
                            class="fa-solid fa-location-dot text-[#812C84] text-base md:text-xl group-hover:scale-110 transition-transform"></i>
                    </div>
                    <div>
                        <h4 class="text-sm md:text-lg font-bold text-[#812C84] mb-0.5 md:mb-1">Our Office</h4>
                        <p class="text-[#812C84] text-sm md:text-base leading-relaxed">
                            Kampala, Uganda<br>
                            <span class="text-[11px] md:text-sm">Kira Road-Kampala near Total Acacia</span>
                        </p>
                    </div>
                </div>

                <!-- Phone -->
                <div class="flex items-start gap-3.5 md:gap-5">
                    <div
                        class="w-10 h-10 md:w-14 md:h-14 rounded-xl md:rounded-2xl bg-white border border-slate-100 shadow-sm flex items-center justify-center shrink-0 group hover:border-[#812C84]/30 transition-colors">
                        <i
                            class="fa-solid fa-phone text-[#812C84] text-base md:text-xl group-hover:scale-110 transition-transform"></i>
                    </div>
                    <div>
                        <h4 class="text-sm md:text-lg font-bold text-[#812C84] mb-0.5 md:mb-1">Call / WhatsApp</h4>
                        <p class="text-[#812C84] text-sm md:text-base leading-relaxed">
                            <a href="tel:+256760249354" class="hover:text-[#812C84] transition-colors">0760 249 354</a>
                        </p>
                    </div>
                </div>

                <!-- Email -->
                <div class="flex items-start gap-3.5 md:gap-5">
                    <div
                        class="w-10 h-10 md:w-14 md:h-14 rounded-xl md:rounded-2xl bg-white border border-slate-100 shadow-sm flex items-center justify-center shrink-0 group hover:border-[#812C84]/30 transition-colors">
                        <i
                            class="fa-solid fa-envelope text-[#812C84] text-base md:text-xl group-hover:scale-110 transition-transform"></i>
                    </div>
                    <div>
                        <h4 class="text-sm md:text-lg font-bold text-[#812C84] mb-0.5 md:mb-1">Email Us</h4>
                        <p class="text-[#812C84] text-sm md:text-base leading-relaxed">
                            <a href="mailto:sales@primedean.com"
                                class="hover:text-[#812C84] transition-colors">sales@primedean.com</a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Social Media Block -->
            <div>
                <h4 class="text-sm md:text-sm font-bold text-[#812C84] uppercase tracking-widest mb-3 md:mb-4">Follow
                    Our Work</h4>
                <div class="flex flex-wrap items-center gap-2.5 md:gap-3">
                    <a href="https://ug.linkedin.com/company/primedeanug" target="_blank"
                        class="group flex items-center justify-center w-9 h-9 md:w-12 md:h-12 rounded-full bg-white border border-[#812C84]/30 text-[#812C84] hover:bg-[#0077b5] hover:text-white hover:border-[#0077b5] transition-all duration-300 shadow-sm hover:-translate-y-1">
                        <i class="fa-brands fa-linkedin-in text-sm md:text-lg"></i>
                    </a>
                    <a href="https://www.instagram.com/primedeanug/" target="_blank"
                        class="group flex items-center justify-center w-9 h-9 md:w-12 md:h-12 rounded-full bg-white border border-[#812C84]/30 text-[#812C84] hover:bg-gradient-to-tr hover:from-[#f09433] hover:via-[#dc2743] hover:to-[#bc1888] hover:text-white hover:border-transparent transition-all duration-300 shadow-sm hover:-translate-y-1">
                        <i class="fa-brands fa-instagram text-sm md:text-lg"></i>
                    </a>
                    <a href="https://x.com/primedeanug?s=21" target="_blank"
                        class="group flex items-center justify-center w-9 h-9 md:w-12 md:h-12 rounded-full bg-white border border-[#812C84]/30 text-[#812C84] hover:bg-black hover:text-white hover:border-black transition-all duration-300 shadow-sm hover:-translate-y-1">
                        <i class="fa-brands fa-x-twitter text-sm md:text-lg"></i>
                    </a>
                    <a href="https://www.facebook.com/primedeanug" target="_blank"
                        class="group flex items-center justify-center w-9 h-9 md:w-12 md:h-12 rounded-full bg-white border border-[#812C84]/30 text-[#812C84] hover:bg-[#1877F2] hover:text-white hover:border-[#1877F2] transition-all duration-300 shadow-sm hover:-translate-y-1">
                        <i class="fa-brands fa-facebook-f text-sm md:text-lg"></i>
                    </a>
                    <a href="https://www.tiktok.com/@primedeanug" target="_blank"
                        class="group flex items-center justify-center w-9 h-9 md:w-12 md:h-12 rounded-full bg-white border border-[#812C84]/30 text-[#812C84] hover:bg-black hover:text-white hover:border-black transition-all duration-300 shadow-sm hover:-translate-y-1">
                        <i class="fa-brands fa-tiktok text-sm md:text-lg"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Right Side: Contact Form -->


    </div>
</section>

<!-- Full Width Google Map Integration -->
<section class="h-96 w-full bg-slate-200 relative">
    <!-- Replace the src URL with your actual Google Maps embed link for Primedean's Kampala office -->
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127642.54411130636!2d32.49755105273117!3d0.313028308696879!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x177dbc0f9d74b39b%3A0x4538903dd96b6fec!2sKampala%2C%20Uganda!5e0!3m2!1sen!2sus!4v1714421132454!5m2!1sen!2sus"
        class="absolute inset-0 w-full h-full border-0" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</section>

<?php include 'includes/footer.php'; ?>