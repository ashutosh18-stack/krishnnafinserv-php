<?php
header('Content-Type: application/json');
include 'config.php';

// Make sure cache folder exists
if (!is_dir(CACHE_DIR)) {
    mkdir(CACHE_DIR, 0755, true);
}

$cacheFile = CACHE_DIR . '/market.json';

// If cache exists and is fresh, return it
if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < CACHE_TIME)) {
    echo file_get_contents($cacheFile);
    exit;
}

// Otherwise fetch new data
$market_indices = [];
foreach ($tickers_dict as $name => $symbol) {
    $data = fetchYahooFinance($symbol);
    if ($data) {
        $market_indices[] = array_merge(["name" => $name], $data);
    }
}

// Save to cache
file_put_contents($cacheFile, json_encode($market_indices));

// Return JSON
echo json_encode($market_indices);
?>
