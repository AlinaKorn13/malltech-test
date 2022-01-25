<?php

/**
 * @param string $url
 * @return string
 */
function parseUrl(string $url): string
{
    $parsedUrl = parse_url($url);
    $query = $parsedUrl['query'];

    parse_str($query, $result);

    foreach ($result as $key => $item) {
        if ($item == 10) {
            unset($result[$key]);
        }
    }

    uasort($result, function($a, $b) {
        return ($a <=> $b) ? 1 : -1;
    });

    $result['url'] = "/example/my_code.html";

    return http_build_query($result);
}

parseUrl("http://www.site.com/example/my_code.html?param_1=5&param_2=20&param_3=10&param_4=30");