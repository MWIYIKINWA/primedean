<?php
// Base URL of your Laravel CMS API
define('API_BASE_URL', 'https://dashboard.primedean.com/api');

$cms_storage_base = 'https://dashboard.primedean.com/storage/';

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
function get_all_news()
{
    return fetch_api_data('/news') ?? [];
}

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