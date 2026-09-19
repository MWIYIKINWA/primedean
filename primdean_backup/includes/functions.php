<?php

define('API_BASE_URL', 'http://127.0.0.1:8000/api');
$storageBaseUrl = 'http://127.0.0.1:8000/storage/';


/**
 * Reusable function to make GET requests to the CMS API
 */
function fetchFromApi($endpoint)
{
    $ch = curl_init();
    $url = API_BASE_URL . $endpoint;

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10); // 10 second timeout
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Accept: application/json',
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // if (curl_errno($ch) || $httpCode !== 200) {
    //     // Log error or handle gracefully in production
    //     curl_close($ch);
    //     return null;
    // }
    if (curl_errno($ch) || $httpCode !== 200) {
        // TEMPORARY DEBUG: Print the actual error code to the screen
        echo "<h3>API Error! HTTP Code: " . $httpCode . "</h3>";
        if (curl_errno($ch)) {
            echo "<p>cURL Error: " . curl_error($ch) . "</p>";
        }

        curl_close($ch);
        return null;
    }

    curl_close($ch);
    return json_decode($response, true);
}

/**
 * Fetch all services
 */
function getServices()
{
    $response = fetchFromApi('/services');
    return $response['data'] ?? [];
}

/**
 * Fetch a single service by slug
 */
function getServiceDetails($slug)
{
    $response = fetchFromApi('/services/' . urlencode($slug));
    return $response['data'] ?? null;
}

/**
 * Fetch all news articles
 */
function getNews()
{
    $response = fetchFromApi('/news');
    return $response['data'] ?? [];
}

/**
 * Fetch single article by slug
 */
function getNewsArticle($slug)
{
    $response = fetchFromApi('/news/' . urlencode($slug));
    return $response['data'] ?? null;
}

/**
 * Fetch all portfolio items ordered by sort_order
 */
function getPortfolios()
{
    $response = fetchFromApi('/portfolios');
    return $response['data'] ?? [];
}

/**
 * Fetch About section data
 */
function getAboutData()
{
    $response = fetchFromApi('/about');
    return $response['data'] ?? null;
}


?>