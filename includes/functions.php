<?php
// Base URL of your Laravel CMS API
// define('API_BASE_URL', 'https://dashboard.primedean.com/api');

// $cms_storage_base = 'https://dashboard.primedean.com/storage/';

define('API_BASE_URL', 'http://127.0.0.1:8000/api');

$cms_storage_base = 'http://127.0.0.1:8000/storage/';

function fetch_api_data($endpoint)
{
    $url = API_BASE_URL . $endpoint;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Accept: application/json',
        'Content-Type: application/json'
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode === 200 && $response) {
        $decoded = json_decode($response, true);
        return $decoded['data'] ?? null;
    }

    return null;
}


/**
 * Fetch a paginated endpoint. Returns ['data' => [...], 'meta' => [...]].
 */
function fetch_api_paginated($endpoint)
{
    $url = API_BASE_URL . $endpoint;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Accept: application/json',
        'Content-Type: application/json',
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $defaultMeta = [
        'current_page' => 1,
        'last_page' => 1,
        'per_page' => 6,
        'total' => 0,
        'featured' => null,
    ];

    if ($httpCode === 200 && $response) {
        $decoded = json_decode($response, true);
        if (is_array($decoded)) {
            return [
                'data' => $decoded['data'] ?? [],
                'meta' => array_merge($defaultMeta, $decoded['meta'] ?? []),
            ];
        }
    }

    return ['data' => [], 'meta' => $defaultMeta];
}

/**
 * Get a page of news. $category may be a name or slug (or empty).
 */
function get_news_paginated($page = 1, $perPage = 6, $category = '')
{
    $params = [
        'page' => max(1, (int) $page),
        'per_page' => max(1, (int) $perPage),
    ];

    if (!empty($category)) {
        $params['category'] = $category;
    }

    return fetch_api_paginated('/news?' . http_build_query($params));
}

/**
 * Backward-compatible "give me everything" helper.
 * (Uses the ?all=1 flag on the API.)
 */
function get_all_news()
{
    return fetch_api_data('/news?all=1') ?? [];
}
/**
 * Service API Wrappers
 */
function get_services()
{
    return fetch_api_data('/services') ?? [];
}

function get_service_by_slug($slug)
{
    return fetch_api_data('/services/' . urlencode($slug));
}

/**
 * News API Wrappers
 */
// function get_all_news()
// {
//     return fetch_api_data('/news') ?? [];
// }

function get_news_by_slug($slug)
{
    return fetch_api_data('/news/' . urlencode($slug));
}

/**
 * Portfolio & About API Wrappers
 */
function get_portfolios()
{
    return fetch_api_data('/portfolios') ?? [];
}



function get_news_categories()
{
    return fetch_api_data('/news-categories') ?? [];
}

function get_about()
{

    $url = API_BASE_URL . '/about';
    $response = @file_get_contents($url);
    if ($response) {
        $data = json_decode($response, true);
        return $data['data'] ?? [];
    }
    return [];
}

/**
 * Hero Sliders API Wrapper
 */
function get_hero_sliders()
{
    return fetch_api_data('/hero-sliders') ?? [];
}