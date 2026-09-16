<?php
$page_title = "News & Updates – Primedean Limited";
$page_description = "Stay up to date with the latest news, branding tips, company milestones, and industry insights from Primedean Limited in Kampala.";
include 'includes/config.php';
include 'includes/functions.php';

$all_news = get_all_news();
$categories = get_news_categories(); // Fetch categories for the filter bar

// 1. Check if a category is selected in the URL
$selected_category = isset($_GET['category']) ? trim($_GET['category']) : '';

// 2. Filter news if a category is clicked
if (!empty($selected_category)) {
    $news_data = array_filter($all_news, function ($article) use ($selected_category) {
        return strtolower($article['category'] ?? '') === strtolower($selected_category);
    });
    $news_data = array_values($news_data); // Reset array keys after filtering
    $page_title = htmlspecialchars($selected_category) . " News – Primedean Limited";
} else {
    $news_data = $all_news;
}

// Extract newest article for Spotlight section, keep rest for the grid
$featured_article = !empty($news_data) ? array_shift($news_data) : null;
$grid_articles = $news_data;

include 'includes/header.php';
include 'includes/navbar.php';
?>

<section class="relative py-15 px-6 md:px-16 lg:px-15 xl:px-32 bg-[#812C84] overflow-hidden text-center text-white">
    <div class="relative z-10 max-w-3xl mx-auto">
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold mb-6 tracking-tight">
            <?= $selected_category ? htmlspecialchars($selected_category) . ' News' : 'Latest News & Updates' ?>
        </h1>
        <p class="text-md text-white/90 leading-relaxed">
            Discover expert tips on corporate branding, behind-the-scenes looks at our recent projects, and
            announcements straight from our Kampala workshop.
        </p>
    </div>
</section>



<?php if ($featured_article): ?>
<!-- Featured Article Section (Newest) -->
<section class="py-16 px-6 md:px-16 lg:px-24 xl:px-32 bg-white relative z-20">
    <div class="max-w-7xl mx-auto space-y-8">
        <div class="flex items-center justify-between">
            <span
                class="px-4 py-1.5 rounded-full bg-[#812C84]/10 text-[#812C84] font-semibold text-xs uppercase tracking-wider">Spotlight</span>
        </div>

        <a href="article.php?slug=<?= urlencode($featured_article['slug']) ?>"
            class="grid grid-cols-1 lg:grid-cols-12 gap-8 bg-slate-50 border border-slate-100 rounded-3xl overflow-hidden shadow-xl shadow-slate-200/40 group hover:shadow-2xl transition-all duration-300 block">
            <div class="lg:col-span-7 relative h-72 lg:h-auto overflow-hidden">
                <img src="<?= htmlspecialchars($featured_article['image_url'] ?? 'assets/images/default.jpg') ?>"
                    alt="<?= htmlspecialchars($featured_article['title']) ?>"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            </div>
            <div class="lg:col-span-5 p-8 md:p-12 flex flex-col justify-center">
                <div class="flex items-center gap-4 text-sm text-slate-500 mb-4">
                    <span class="text-[#812C84]"><i class="fa-regular fa-calendar text-[#812C84] mr-2"></i>
                        <?= htmlspecialchars($featured_article['published_at'] ?? '') ?>
                    </span>
                    <span class="px-3 py-1 bg-slate-200 text-[#812C84] text-xs font-bold rounded-full">
                        <?= htmlspecialchars($featured_article['category'] ?? 'General') ?>
                    </span>
                </div>
                <h3
                    class="text-2xl text-[#812C84] md:text-3xl font-bold mb-4 leading-snug group-hover:text-[#812C84] transition-colors">
                    <?= htmlspecialchars($featured_article['title']) ?>
                </h3>
                <p class="text-slate-600 text-sm leading-relaxed mb-8 line-clamp-3">
                    <?= strip_tags($featured_article['description'] ?? '') ?>
                </p>
                <div
                    class="inline-flex items-center gap-2 text-red-500 font-extrabold group-hover:text-[#E0724A] transition-colors">
                    <span>Read Full Article</span>
                    <i
                        class="fa-solid fa-arrow-right text-sm transform group-hover:translate-x-1 transition-transform"></i>
                </div>
            </div>
        </a>
    </div>
</section>
<?php endif; ?>

<!-- Remaining News Articles Grid -->
<?php if (!empty($grid_articles)): ?>
<section class="pb-20 px-6 md:px-16 lg:px-24 xl:px-32 bg-white relative z-20">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-2xl font-bold text-[#812C84] mb-8 pb-3 border-b border-slate-200">More Articles</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($grid_articles as $article): ?>
            <a href="article.php?slug=<?= urlencode($article['slug']) ?>"
                class="bg-slate-50 border border-slate-100 rounded-2xl overflow-hidden shadow-lg shadow-slate-200/40 group hover:shadow-xl transition-all duration-300 flex flex-col">
                <div class="relative h-48 overflow-hidden">
                    <img src="<?= htmlspecialchars($article['image_url'] ?? 'assets/images/default.jpg') ?>"
                        alt="<?= htmlspecialchars($article['title']) ?>"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <div class="flex items-center justify-between text-xs text-slate-500 mb-3">
                        <span class="text-[#812C84] font-semibold"><i class="fa-regular fa-calendar mr-1"></i>
                            <?= htmlspecialchars($article['published_at'] ?? '') ?>
                        </span>
                        <span class="px-2.5 py-0.5 bg-slate-200 text-[#812C84] font-bold rounded-full">
                            <?= htmlspecialchars($article['category'] ?? 'General') ?>
                        </span>
                    </div>
                    <h3
                        class="text-lg font-bold text-[#812C84] mb-3 line-clamp-2 group-hover:text-[#E0724A] transition-colors">
                        <?= htmlspecialchars($article['title']) ?>
                    </h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6 line-clamp-3 flex-grow">
                        <?= strip_tags($article['description'] ?? '') ?>
                    </p>
                    <div
                        class="inline-flex items-center gap-2 text-red-500 font-bold text-sm group-hover:text-[#E0724A] transition-colors mt-auto">
                        <span>Read Article</span>
                        <i
                            class="fa-solid fa-arrow-right text-xs transform group-hover:translate-x-1 transition-transform"></i>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if (empty($featured_article) && empty($grid_articles)): ?>
<section class="py-20 px-6 bg-white">
    <div class="max-w-7xl mx-auto text-center">
        <svg class="mx-auto h-16 w-16 text-slate-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
            </path>
        </svg>
        <p class="text-slate-500 text-lg">No articles available in this category yet.</p>
        <a href="news.php" class="inline-block mt-4 text-[#812C84] font-bold hover:underline">View all news</a>
    </div>
</section>
<?php endif; ?>

<!-- Category Filter Navigation -->
<section class="py-6 px-6 md:px-16 lg:px-24 xl:px-32 bg-slate-50 border-b border-slate-200">
    <div class="max-w-7xl mx-auto flex flex-wrap gap-3 items-center justify-center">
        <a href="news.php"
            class="px-5 py-2.5 rounded-full text-sm font-bold transition-all shadow-sm <?= empty($selected_category) ? 'bg-[#812C84] text-white shadow-[#812C84]/30' : 'bg-white text-slate-600 border border-slate-200 hover:border-[#812C84] hover:text-[#812C84]' ?>">
            All News
        </a>

        <?php if (!empty($categories)): ?>
        <?php foreach ($categories as $cat): ?>
        <?php $is_active = (strtolower($cat['name']) === strtolower($selected_category)); ?>
        <a href="news.php?category=<?= urlencode($cat['name']) ?>"
            class="px-5 py-2.5 rounded-full text-sm font-bold transition-all shadow-sm <?= $is_active ? 'bg-[#812C84] text-white shadow-[#812C84]/30' : 'bg-white text-slate-600 border border-slate-200 hover:border-[#812C84] hover:text-[#812C84]' ?>">
            <?= htmlspecialchars($cat['name']) ?>
        </a>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>