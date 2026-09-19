<?php
// Include configuration and headers
include 'includes/config.php';
include 'includes/header.php';
include 'includes/navbar.php';

/**
 * Centralized dynamic service dataset mapped from the Primedean company document.
 */
$services = [
    "visibility-banners" => [
        "title" => "Visibility Display Banners",
        "tagline" => "Get your brand seen wherever your customers are.",
        "description" => "Primedean Limited provides professionally designed and produced visibility banners that help
businesses, organisations and events create a strong, consistent and professional brand presence.
Whether you are setting up for an exhibition, conference, product activation, corporate event, branch promotion, retail campaign or outdoor engagement, we provide visibility solutions tailored to your brand, space and communication needs. Let your brand stand out with professionally designed and produced teardrop banners, pull-up banners, X-stand, backdrop banners and vinyl banners.",
        "hero_image" => "assets/images/nsssf.jpg",
        "gallery" => ["assets/images/gg.jpg", "assets/images/22.jpg", "assets/images/27a.jpg", "assets/images/78.jpg"],
        "offerings" => [
            "Teardrop Banners – Portable and eye-catching banners ideal for outdoor promotions, entrances, activations, exhibitions and events.",
            "Pull-Up Banners – Professional, portable displays suitable for offices, conferences, exhibitions, presentations, launches and corporate events.",
            "X-Stands Banners – Lightweight and cost-effective display banners supported by an X-frame, ideal for exhibitions, retail promotions, conferences, offices and indoor activations.",
            "Backdrop Banners – Large-format branded backdrops designed for conferences, media engagements, photo opportunities, exhibitions, launches and corporate functions.",
            "Vinyl Banners – Durable and versatile banners suitable for indoor and outdoor advertising, promotions, campaigns, events and business visibility.",
            "Pop-Up Banners – Portable display solutions that are quick to set up and ideal for exhibitions, activations, sports events and promotional campaigns.",
            "Step-and-Repeat Banners – Branded media walls featuring repeated logos or messages, ideal for red-carpet events, press engagements, launches and photography areas.",
            "Hanging Banners – Suspended branded displays suitable for malls, exhibitions, retail spaces, conferences and other high-visibility indoor locations.",
            "Fence & Barrier Banners – Branded banners designed for event barriers, fences, sports grounds, construction sites and perimeter visibility.",
            "Table Banners & Table-Top Displays – Compact branding solutions for reception desks, exhibition tables, information points and promotional counters.",
            "Custom Large-Format Banners – Tailor-made banner solutions produced to specific sizes and requirements for events, campaigns, offices and promotional spaces."
        ]
    ],
    "printing-services" => [
        "title" => "Printing Services",
        "tagline" => "Quality printing that gives your brand a professional finish.",
        "description" => "Primedean Limited provides high-quality commercial and corporate printing services for businesses, organisations, institutions, projects and events. From everyday business stationery to reports, publications and promotional materials, we combine quality printing, professional finishing and reliable turnaround to ensure every printed item represents your brand well.",
        "hero_image" => "assets/images/new/4.jpg",
        "gallery" => ["assets/images/new/6.jpg", "assets/images/new/7.jpg"],
        "offerings" => [
            "Reports – Professionally printed annual reports, project reports, research reports, financial reports and corporate publications.",
            "Books – Quality printing and binding for books, publications, training materials and educational content.",
            "Manuals – Professionally printed operational, training, policy, product and user manuals.",
            "Workbooks – Well-designed and professionally bound participant, training and programme workbooks.",
            "Flyers – High-quality promotional flyers for campaigns, products, events and business promotions.",
            "Brochures – Professionally printed company profiles, product brochures and marketing materials.",
            "Posters – High-impact printing for campaigns, promotions, events, announcements and awareness activities.",
            "Table Talkers – Professionally printed tabletop displays for restaurants, hotels, events, exhibitions, reception areas and promotional campaigns.",
            "Business Cards – Professionally finished cards that create a strong first impression.",
            "Letterheads – Custom-printed corporate letterheads consistent with your brand identity.",
            "Envelopes – Branded envelopes for professional corporate communication.",
            "Notebooks & Notepads – Customised branded stationery for offices, conferences, trainings and corporate gifts.",
            "Diaries & Planners – Professionally branded diaries and planners for staff, customers and corporate gifting.",
            "Calendars – Custom wall, desk and corporate calendars that keep your brand visible throughout the year.",
            "Certificates – Professionally printed certificates for trainings, awards, recognition and corporate programmes.",
            "Folders – Branded presentation and document folders for meetings, proposals, conferences and corporate use.",
            "Receipt Books & Invoice Books – Customised business stationery for operational and transaction needs.",
            "Forms – Professionally printed application, registration, assessment and other business forms.",
            "Invitations & Event Materials – Invitations, programmes, name tags, table cards and other printed materials for corporate events.",
            "Stickers & Labels – Custom-printed product labels, promotional stickers, packaging labels and branded decals.",
            "Newsletters & Magazines – Professional printing for organisational newsletters, magazines and periodic publications.",
            "Catalogues – High-quality product and service catalogues designed to present your offering professionally."
        ]
    ],
    "promotional-items" => [
        "title" => "Visibility Promotional Items",
        "tagline" => "Get your brand into the hands of your customers.",
        "description" => "Primedean Limited provides customised promotional items that help businesses and organisations increase brand visibility, strengthen customer relationships and keep their brands memorable beyond the first interaction.",
        "hero_image" => "assets/images/ss4.jpg",
        "gallery" => ["assets/images/s8.jpg"],
        "offerings" => [
            "Branded Umbrellas – Practical and highly visible for outdoor promotions, corporate gifting and customer appreciation.",
            "T-Shirts & Polo Shirts – Custom-branded apparel for staff, campaigns, activations, events and promotional teams.",
            "Water Bottles – Reusable branded bottles ideal for corporate gifts, events, schools, sports activities and staff.",
            "Mugs – Customised ceramic and travel mugs for offices, customers, staff and corporate gifting.",
            "Thermal Flasks & Tumblers – Premium branded drinkware that keeps your brand visible every day.",
            "Tote Bags – Reusable branded bags ideal for exhibitions, conferences, shopping, campaigns and giveaways.",
            "Keyholders – Simple, practical promotional items that keep your brand close to customers.",
            "Caps & Hats – Branded headwear for outdoor events, activations, campaigns and staff teams.",
            "Notebooks & Diaries – Professional branded stationery for meetings, conferences, customers and corporate gifting.",
            "Pens – Cost-effective promotional items suitable for events, offices, campaigns and giveaways.",
            "Lanyards & ID Holders – Customised for corporate teams, conferences, exhibitions and events.",
            "Backpacks & Laptop Bags – Functional branded merchandise for staff, customers and premium corporate gifting.",
            "Hoodies & Jackets – Custom-branded apparel for staff, teams, events and corporate promotions.",
            "Wristbands – Ideal for events, campaigns, awareness programmes and brand activations.",
            "Corporate Gift Sets – Customised combinations of branded items packaged for clients, employees, partners and special occasions."
        ]
    ],
    "events-branding" => [
        "title" => "Events & Branding",
        "tagline" => "Turn every event into a professional and memorable brand experience.",
        "description" => "Primedean Limited provides complete event branding solutions that help businesses and organisations create strong, consistent and highly visible brand experiences at corporate events, conferences, exhibitions, product launches, activations and other engagements.",
        "hero_image" => "assets/images/4.jpg",
        "gallery" => ["assets/images/4.jpg"],
        "offerings" => [
            "Backdrop Banners – Professionally designed and printed backdrops for stages, media areas, conferences and photo opportunities.",
            "Pull-Up & Teardrop Banners – Portable branded displays strategically positioned around your event venue.",
            "Exhibition & Display Stands – Customised stands for exhibitions, conferences, activations and product showcases.",
            "Photo Booths & Photo Walls – Branded spaces that create memorable photo opportunities while extending your brand visibility.",
            "Speaker Podiums – Professionally branded podiums that keep your brand visible during speeches and presentations.",
            "Registration & Welcome Areas – Branded reception points that create a professional first impression.",
            "Directional & Event Signage – Clear, branded signage that guides guests while maintaining a consistent event identity.",
            "Stage & Venue Branding – Strategic branding of stages and key event spaces for maximum visibility."
        ]
    ],
    "office-branding" => [
        "title" => "Office Branding",
        "tagline" => "Turn your office into a space that speaks your brand.",
        "description" => "Primedean Limited transforms offices, branches, reception areas and customer-facing spaces into professional branded environments that reflect your organisation's identity and create the right impression for customers, employees and visitors.",
        "hero_image" => "assets/images/jubilee.jpg",
        "gallery" => ["assets/images/jubilee.jpg"],
        "offerings" => [
            "Brand Colour Painting – Interior and exterior painting aligned with your corporate brand colours.",
            "Wall Branding & Graphics – Professionally designed and installed graphics for reception areas, corridors, meeting rooms and other key spaces.",
            "Door Branding – Custom vinyl graphics, stickers and branded applications for office and entrance doors.",
            "Window Branding – Professionally printed and installed graphics that transform windows and glass surfaces into valuable branding spaces.",
            "Frosted Stickers – Professional frosting for glass doors, partitions and windows, combining branding, privacy and style.",
            "One-Way Vision Stickers – Branded window graphics that provide strong external visibility while maintaining visibility and privacy from inside.",
            "Vinyl Stickers & Wraps – Custom-designed vinyl applications for walls, windows, doors, counters and other suitable surfaces.",
            "Reception & Interior Branding – Strategic branding of customer-facing spaces to create a strong and consistent first impression.",
            "Directional & Office Signage – Professionally produced signage that improves navigation while reinforcing your corporate identity."
        ]
    ],
    "outdoor-banners" => [
        "title" => "Outdoor Banners",
        "tagline" => "Take your brand beyond your premises and put it where people can see it.",
        "description" => "Primedean Limited designs, prints and installs high-impact outdoor banners that help businesses, organisations and campaigns reach audiences in busy public spaces. We use quality materials, professional printing and durable finishing suitable for outdoor environments, helping your banners maintain their visibility through sunlight, rain, dust, wind and changing weather conditions.",
        "hero_image" => "assets/images/mtn.jpg",
        "gallery" => ["assets/images/hh.jpg",],
        "offerings" => [
            "Street Advertising Banners – Large, highly visible banners strategically placed along streets, roads and other high-traffic locations.",
            "Golf Club & Golf Course Banners – Professionally branded banners for tournaments, sponsorships, corporate golf days and brand promotions.",
            "Shopping Mall Banners – High-impact promotional banners for malls, shopping centres, retail environments and commercial spaces.",
            "Billboard Banners – Large-format printed advertising designed for maximum visibility from a distance.",
            "Event Promotion Banners – Outdoor banners for conferences, concerts, exhibitions, sports events, launches, festivals and corporate functions.",
            "Roadside Banners – Strategically positioned banners that promote businesses, products, services and campaigns to passing audiences.",
            "Fence & Perimeter Banners – Large-format branding installed along fences, construction hoarding, compounds and event perimeters.",
            "Building Banners – Large promotional graphics displayed on building exteriors and other prominent surfaces.",
            "Sports Venue Banners – Branding for stadiums, sports grounds, tournaments and sponsored sporting activities.",
            "Construction Site Banners – Durable branding for construction sites, project sites, property developments and perimeter fencing.",
            "Campaign & Awareness Banners – Outdoor visibility for public awareness campaigns, promotions, launches and community initiatives.",
            "Directional Event Banners – Branded banners that increase event visibility while directing guests to venues and activity areas."
        ]
    ],
    "signage-solutions" => [
        "title" => "Signage Solutions",
        "tagline" => "Make your business easier to find, recognise and remember.",
        "description" => "Primedean Limited designs, produces and professionally installs customised signage solutions that help businesses and organisations strengthen visibility, communicate clearly and create a professional brand presence. Our outdoor signage is produced using quality materials and appropriate finishing to withstand harsh weather conditions.",
        "hero_image" => "assets/images/global.webp",
        "gallery" => ["assets/images/d1.jpg", "assets/images/10.jpg",],
        "offerings" => [
            "Custom Signage – Bespoke signage designed and produced to match your brand identity, location and communication needs.",
            "Indoor Glass Signage – Professional signage mounted on glass surfaces for offices, meeting rooms, entrances and corporate spaces.",
            "Reception Signage – Branded logos, company names and feature signage that create a strong first impression at reception areas.",
            "Roadside Signage – Durable, highly visible signs designed to attract attention and help customers easily identify and locate your business.",
            "Pylon Signage – Strong, freestanding and high-visibility signage ideal for business premises, shopping centres, fuel stations, institutions and roadside locations.",
            "Directional Signage – Clear and durable signs that help customers and visitors navigate offices, compounds, buildings and facilities.",
            "Safety Signage – Professionally produced warning, mandatory, emergency and informational signs for workplaces and public spaces.",
            "Lightbox Signage – Illuminated signage that gives your brand strong visibility during both day and night.",
            "3D Signage – Raised letters, logos and dimensional signs that create a premium and distinctive brand appearance.",
            "2D Signage – Clean and professional flat signage for indoor and outdoor brand identification and communication.",
            "Building & Fascia Signage – Durable large-format signage for storefronts, offices, branches and commercial buildings."
        ]
    ],
    "vehicle-branding" => [
        "title" => "Vehicles & Motorcycle Branding",
        "tagline" => "Turn every journey into an opportunity to get your brand noticed.",
        "description" => "Primedean Limited provides professional vehicle and motorcycle branding solutions that transform your company fleet into moving brand visibility tools. Whether operating within the city, travelling upcountry or working in dusty and demanding environments, we use quality, durable materials and professional finishing to help your branding remain visible and presentable.",
        "hero_image" => "assets/images/wraps.jpg",
        "gallery" => ["assets/images/car.jpg", "assets/images/51.jpg", "assets/images/nico.jpg"],
        "offerings" => [
            "Company Motorcycles – Professional branding for delivery, sales, field and operational motorcycles.",
            "Pickups – Custom branding for company pickups used for field operations, distribution and business activities.",
            "Company Cars – Professional branding for corporate, operational and field vehicles.",
            "Saloon Cars – Clean and strategically positioned branding that maintains a professional corporate appearance.",
            "Vans & Minibuses – Full or partial branding designed to maximise visibility across larger vehicle surfaces.",
            "Trucks – Durable, high-impact branding for commercial, logistics and distribution fleets.",
            "Trailers – Large-format branding that turns trailers into highly visible mobile advertising spaces.",
            "Fleet Branding – Consistent branding across multiple vehicles to create a unified and recognisable company presence.",
            "Full & Partial Vehicle Wraps – Customised wrapping depending on your brand, vehicle type and desired level of visibility.",
            "Vehicle Logos, Graphics & Lettering – Professionally designed, produced and installed logos, contact details, messages and other brand elements."
        ]
    ]
];

// Determine requested slug safely (default to visibility-banners if missing)
$slug = isset($_GET['service']) && array_key_exists($_GET['service'], $services) ? $_GET['service'] : 'visibility-banners';
$service = $services[$slug];
?>

<section class="relative pt-12 pb-10 px-6 md:px-16 lg:px-24 xl:px-32 bg-slate-900 overflow-hidden text-white">
    <!-- Background Image -->
    <div
        class="absolute inset-0 bg-[url('<?= htmlspecialchars($service['hero_image']); ?>')] bg-cover bg-center opacity-40 mix-blend-luminosity">
    </div>

    <!-- Color Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-r from-[#822C84] via-[#822C84]/90 to-[#822C84]/70"></div>

    <!-- Content -->
    <div class="relative z-10 max-w-4xl">

        <h1 class="text-2xl md:text-4xl lg:text-5xl font-extrabold mb-2 md:-ml-2 tracking leading">
            <?= htmlspecialchars($service['title']); ?>
        </h1>
        <p class="text-sm md:text-lg text-white/90 font-medium">
            <?= htmlspecialchars($service['tagline']); ?>
        </p>
    </div>
</section>

<!-- Main Content Grid Layout -->
<section class="py-10 px-6 md:px-16 lg:px-24 xl:px-32 bg-white relative z-20">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12">

        <!-- Left Column: Detailed Service Breakdown -->
        <div class="lg:col-span-8 space-y-12">

            <!-- Featured Image Showcase -->
            <div class="rounded-xl overflow-hidden shadow-2xl shadow-[#812C84]/50 h-[350px] md:h-[450px]">
                <img src="<?= htmlspecialchars($service['hero_image']); ?>"
                    alt="<?= htmlspecialchars($service['title']); ?>" class="w-full h-full object-cover">
            </div>

            <!-- Overview Paragraphs -->
            <div class="prose text-sm md:text-base max-w-none text-[#812C84] space-y-6 leading text-justify">
                <p>
                    <?= htmlspecialchars($service['description']); ?>
                </p>
            </div>

            <!-- Service Offerings List Section -->
            <div class="pt-4">
                <h2 class="text-2xl md:text-3xl font-extrabold text-[#812C84] mb-6">Key solutions include</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <?php foreach ($service['offerings'] as $offering): ?>
                    <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100 shadow-sm flex items-start gap-3">
                        <i class="fa-solid fa-check text-[#812C84] mt-1 shrink-0"></i>
                        <span class="text-xs md:text-sm text-[#812C84] leading font-normal">
                            <?= htmlspecialchars($offering); ?>
                        </span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Gallery Images Grid -->
            <?php if (!empty($service['gallery'])): ?>
            <div class="pt-4">
                <h2 class="text-2xl md:text-3xl font-extrabold text-[#812C84] mb-6">Visual examples</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <?php foreach ($service['gallery'] as $img): ?>
                    <div class="overflow-hidden h-56 shadow-sm border border-slate-100">
                        <img src="<?= htmlspecialchars($img); ?>" alt="Gallery item"
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
                            <h4 class="text-lg font-bold text-[#812C84] mb-1">Consultation & Creative Design</h4>
                            <p class="text-slate-600 text-sm">We review your specifications, prepare custom branding
                                artwork, and align with your guidelines.</p>
                        </div>
                    </div>
                    <div class="flex gap-6 items-start p-6 rounded-2xl bg-slate-50 border border-[#812C84]/30">
                        <span
                            class="flex items-center justify-center w-10 h-10 rounded-xl bg-[#812C84] text-white font-bold shrink-0">2</span>
                        <div>
                            <h4 class="text-lg font-bold text-[#812C84] mb-1">Precision Production & Quality Control
                            </h4>
                            <p class="text-slate-600 text-sm">Utilizing advanced printing, fabrication, and finishing
                                equipment to produce clean, professional results.</p>
                        </div>
                    </div>
                    <div class="flex gap-6 items-start p-6 rounded-2xl bg-slate-50 border border-slate-100">
                        <span
                            class="flex items-center justify-center w-10 h-10 rounded-xl bg-[#812C84] text-white font-bold shrink-0">3</span>
                        <div>
                            <h4 class="text-lg font-bold text-[#812C84] mb-1">Professional Installation & Delivery</h4>
                            <p class="text-slate-600 text-sm">Our expert technical team handles safe on-site mounting,
                                setup, or quick dispatch fulfillment.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Right Column: Quick Inquiry Sidebar -->
        <div class="lg:col-span-4">
            <div class="sticky top-32 space-y-8">
                <div class="p-8 rounded-3xl bg-slate-50 border border-slate-100 shadow-xl shadow-[#812C84]/50">
                    <h3 class="text-xl font-bold text-[#812C84] mb-2">Book this Service</h3>
                    <p class="text-slate-600 text-sm mb-6">Fill out your details and our team will get back to you with
                        a custom quote.</p>

                    <form action="process-inquiry.php" method="POST" class="space-y-4">
                        <input type="hidden" name="service" value="<?= htmlspecialchars($service['title']); ?>">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Full
                                Name</label>
                            <input type="text" name="name" required
                                class="w-full px-5 py-3.5 border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#812C84]/20 focus:border-[#812C84] transition-all bg-[#E0C1D7] text-white placeholder-slate-200 resize-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Phone
                                Number / WhatsApp</label>
                            <input type="text" name="phone" required
                                class="w-full px-5 py-3.5  border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#812C84]/20 focus:border-[#812C84] transition-all bg-[#E0C1D7] text-white placeholder-slate-200 resize-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-[#812C84] uppercase tracking-wider mb-2">
                                Service Category
                            </label>
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