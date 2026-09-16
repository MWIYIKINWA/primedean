<?php
// Set the correct header so browsers and search engines read this as XML
header("Content-Type: application/xml; charset=utf-8");

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";

    $baseUrl = 'https://primedean.com/';
    $currentDate = date('c'); // Generates current timestamp in ISO 8601 format

    // 1. Array of Static Pages
    $staticPages = [
    '' => '1.0000',
    'index.php' => '0.8000',
    'about.php' => '0.8000',
    'services.php' => '0.8000',
    'news.php' => '0.8000',
    'contact.php' => '0.8000',
    'assets/profile.pdf' => '0.8000'
    ];

    foreach ($staticPages as $page => $priority) {
    echo " <url>\n";
        echo " <loc>" . $baseUrl . $page . "</loc>\n";
        echo " <lastmod>" . $currentDate . "</lastmod>\n";
        echo " <changefreq>daily</changefreq>\n";
        echo " <priority>" . $priority . "</priority>\n";
        echo " </url>\n";
    }

    // 2. Fetch Dynamic Services from API
    $servicesApiUrl = 'https://dashboard.primedean.com/api/services';
    $servicesResponse = @file_get_contents($servicesApiUrl);

    if ($servicesResponse) {
    $servicesData = json_decode($servicesResponse, true);
    $services = $servicesData['data'] ?? [];

    foreach ($services as $service) {
    if (!empty($service['slug'])) {
    echo " <url>\n";
        echo " <loc>" . htmlspecialchars($baseUrl . "service-detail.php?service=" . $service['slug']) . "</loc>\n";
        echo " <lastmod>" . $currentDate . "</lastmod>\n";
        echo " <changefreq>weekly</changefreq>\n";
        echo " <priority>0.8000</priority>\n";
        echo " </url>\n";
    }
    }
    }

    // 3. Fetch Dynamic News Articles from API
    $newsApiUrl = 'https://dashboard.primedean.com/api/news';
    $newsResponse = @file_get_contents($newsApiUrl);

    if ($newsResponse) {
    $newsData = json_decode($newsResponse, true);
    $articles = $newsData['data'] ?? [];

    foreach ($articles as $article) {
    if (!empty($article['slug'])) {
    // Using the actual published date if available
    $articleDate = !empty($article['published_at']) ? date('c', strtotime($article['published_at'])) : $currentDate;

    echo " <url>\n";
        // Ensure your article.php actually accepts a slug parameter for SEO!
        echo " <loc>" . htmlspecialchars($baseUrl . "article.php?slug=" . $article['slug']) . "</loc>\n";
        echo " <lastmod>" . $articleDate . "</lastmod>\n";
        echo " <changefreq>weekly</changefreq>\n";
        echo " <priority>0.6400</priority>\n";
        echo " </url>\n";
    }
    }
    }

    echo '</urlset>';
?>