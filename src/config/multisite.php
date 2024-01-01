<?php

return [
    'default' => 'development',

   "development" => [
      "store_url" => "YOUR_STORE_URL",
      "consumer_key" => "YOUR_CONSUMER_KEY",
      "consumer_secret" => "YOUR_CONSUMER_SECRET",
   ],
   "staging" => [
      "store_url" => "YOUR_STORE_URL",
      "consumer_key" => "YOUR_CONSUMER_KEY",
      "consumer_secret" => "YOUR_CONSUMER_SECRET",
   ],
   "production" => [
      "store_url" => "YOUR_STORE_URL",
      "consumer_key" => "YOUR_CONSUMER_KEY",
      "consumer_secret" => "YOUR_CONSUMER_SECRET",
      "verify_ssl" => false,
      "api_version" => "v3",
      "wp_api" => true,
      "query_string_auth" => false,
      "timeout" => 100,
      "header_total" => "X-WP-Total",
      "header_total_pages" => "X-WP-TotalPages"
   ]
];
