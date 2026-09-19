<?php
include 'includes/config.php';
include 'includes/functions.php'; // Includes your cURL helper functions

$slug = isset($_GET['slug']) ? trim($_GET['slug']) : '';

$article_data = !empty($slug) ? get_news_by_slug($slug) : null;

$categories = get_news_categories();

// Handle 404 Not Found
if (!$article_data) {
    header("HTTP/1.0 404 Not Found");
    $page_title = "Article Not Found – Primedean Limited";
    include 'includes/header.php';
    include 'includes/navbar.php';
    echo '<div class="py-32 px-6 text-center max-w-xl mx-auto"><h1 class="text-3xl font-bold text-[#812C84] mb-4">Article Not Found</h1><p class="text-slate-600 mb-8">The article you are looking for might have been removed or the link is incorrect.</p><a href="news.php" class="inline-block px-6 py-3 bg-[#812C84] text-white font-semibold rounded-xl shadow-md">Back to News</a></div>';
    include 'includes/footer.php';
    exit;
}

// Metadata
$page_title = $article_data['title'] . " – Primedean Limited";

$clean_content = trim(preg_replace('/\s+/', ' ', strip_tags($article_data['content'] ?? '')));
$page_description = htmlspecialchars(mb_substr($clean_content, 0, 160)) . '...';

$page_image = !empty($article_data['image_url']) ? $article_data['image_url'] : null;

$current_url = SITE_URL . $_SERVER['REQUEST_URI'];
$encoded_url = urlencode($current_url);
$encoded_title = urlencode($article_data['title']);

include 'includes/header.php';
include 'includes/navbar.php';

?>

<style>
    /* Styling for CKEditor output */

    .article-content {
        color: #4b5563;
        line-height: 1.5;
    }

    .article-content p {
        margin-bottom: 0.0rem;
        color: #4b5563;
    }

    .article-content h1,
    .article-content h2,
    .article-content h3,
    .article-content h4 {
        color: #4b5563;
        font-weight: 700;
        line-height: 1.0;
    }

    .article-content h1 {
        font-size: 1.875rem;
    }

    .article-content h2 {
        font-size: 1.5rem;
    }

    .article-content h3 {
        font-size: 1.25rem;
    }

    .article-content ul {
        list-style-type: disc !important;
        margin-left: 1.5rem !important;
        margin-bottom: 0.0em !important;
    }

    .article-content ol {
        list-style-type: decimal !important;
        margin-left: 1.5rem !important;
        margin-bottom: 0rem !important;
    }

    .article-content li {
        margin-bottom: 0.0rem;
    }

    .article-content strong,
    .article-content b {
        font-weight: 700;
        color: #4b5563;
    }

    .article-content em,
    .article-content i {
        font-style: italic;
    }

    .article-content blockquote {
        border-left: 4px solid #812C84;
        padding-left: 1rem;
        font-style: italic;
        color: #4b5563;
        margin: 1.5rem 0;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
    }

    .article-content a {
        color: #db3444;
        text-decoration: underline;
    }
</style>
<!-- Service Hero Section -->
<section class="relative pt-12 pb-10 px-6 md:px-16 lg:px-24 xl:px-32 bg-slate-900 overflow-hidden text-white">
    <div
        class="absolute inset-0 bg-[url('assets/images/new/7.jpg')] bg-cover bg-center opacity-40 mix-blend-luminosity">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-[#822C84] via-[#822C84]/90 to-[#822C84]/70"></div>

    <div class="relative z-10 max-w-4xl">
        <span
            class="inline-block px-4 py-1.5 rounded-full bg-gray-900 text-white font-semibold text-xs uppercase tracking-wider mb-6 shadow-md">
            <?= htmlspecialchars($article_data['category'] ?? 'General') ?>
        </span>
        <h1 class="text-3xl md:text-4xl lg:text-4xl font-extrabold mb-6 tracking-tight leading-tight">
            <?= htmlspecialchars($article_data['title']) ?>
        </h1>
        <p class="text-slate-300 text-sm">
            Published on <?= htmlspecialchars($article_data['published_at'] ?? '') ?> by <span
                class="font-semibold text-white"><?= htmlspecialchars($article_data['author'] ?? 'Admin') ?></span>
        </p>
    </div>
</section>

<!-- Main Content & Sidebar Layout -->
<section class="py-20 px-6 md:px-16 lg:px-24 xl:px-32 bg-white relative z-20">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12">

        <!-- Left Column: Dynamic Share Icons -->
        <div class="hidden lg:block lg:col-span-1 font-medium">
            <div class="sticky top-32 flex flex-col items-center gap-4">
                <span
                    class="text-xs font-bold text-[#812C84] uppercase tracking-widest writing-mode-vertical mb-2">Share</span>

                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= $encoded_url ?>" target="_blank"
                    rel="noopener noreferrer"
                    class="w-12 h-12 rounded-full bg-slate-50 border border-[#812C84] text-[#812C84] hover:bg-[#0077b5] hover:text-white hover:border-[#0077b5] transition-all flex items-center justify-center shadow-sm"
                    title="Share on LinkedIn">
                    <i class="fa-brands fa-linkedin-in"></i>
                </a>

                <a href="https://api.whatsapp.com/send?text=<?= $encoded_title ?>%20<?= $encoded_url ?>" target="_blank"
                    rel="noopener noreferrer"
                    class="w-12 h-12 rounded-full bg-slate-50 border border-[#812C84] text-[#812C84] hover:bg-[#25D366] hover:text-white hover:border-[#25D366] transition-all flex items-center justify-center shadow-sm"
                    title="Share on WhatsApp">
                    <i class="fa-brands fa-whatsapp"></i>
                </a>

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
                <img src="<?= htmlspecialchars($article_data['image_url'] ?? 'assets/images/default.jpg') ?>"
                    alt="<?= htmlspecialchars($article_data['title']) ?>" class="w-full h-full object-cover">
            </div>

            <!-- Dynamic Body Content -->
            <div
                class="prose prose-sm md:prose-lg font-medium max-w-none text-gray-600 space-y-6 leading-relaxed text-justify">
                <!-- <div class="prose max-w-none text-slate-700">
                    {!! $article['content'] !!}
                </div> -->
                <!-- Dynamic Body Content -->
                <div class="article-content max-w-none">
                    <?= $article_data['content'] ?? '' ?>
                </div>
            </div>

            <!-- Dynamic Tags -->
            <?php if (!empty($article_data['tags'])): ?>
                <div
                    class="mt-12 pt-8 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-6">
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="text-xs font-bold text-[#812C84] uppercase tracking-wider mr-2">Tags:</span>
                        <?php foreach ($article_data['tags'] as $tag): ?>
                            <a href="#"
                                class="px-3 py-1 bg-slate-100 hover:bg-[#812C84] hover:text-white rounded-lg text-xs font-semibold text-slate-600 transition-colors">
                                <?= htmlspecialchars($tag) ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Right Column: Sidebar -->
        <div class="lg:col-span-3">
            <div class="sticky top-32 space-y-8">
                <div class="p-8 rounded-3xl bg-[#812C84] text-white shadow-xl text-center relative overflow-hidden">
                    <div class="relative z-10">
                        <h3 class="text-xl font-bold mb-3">Ready for our Service?</h3>
                        <p class="text-white/90 text-sm mb-6">Let our experts make your company visible and noticeable.
                        </p>
                        <a href="contact.php"
                            class="inline-block w-full py-3.5 bg-white text-[#812C84] font-bold shadow-lg hover:bg-slate-50 transition-all active:scale-95 rounded-xl">
                            Get a Quote
                        </a>
                    </div>
                </div>

                <!-- Dynamic Categories List with Counts -->
                <div class="p-6 rounded-3xl bg-slate-50 border border-[#812C84]/20">
                    <h4 class="text-sm font-bold text-[#812C84] uppercase tracking-widest mb-4">Categories</h4>
                    <ul class="space-y-3 text-sm font-semibold text-slate-600">
                        <?php if (!empty($categories)): ?>
                            <?php foreach ($categories as $cat): ?>
                                <li>
                                    <a href="news.php?category=<?= urlencode($cat['name']) ?>"
                                        class="flex justify-between items-center hover:text-[#812C84] transition-colors">
                                        <span class="text-[#812C84]">
                                            <?= htmlspecialchars($cat['name']) ?>
                                        </span>
                                        <span class="px-2.5 py-0.5 rounded-full bg-slate-200 text-[#812C84] text-xs">
                                            <?= (int) ($cat['article_count'] ?? 0) ?>
                                        </span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="text-xs text-slate-400">No categories found</li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>

<?php include 'includes/footer.php'; ?>