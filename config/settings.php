<?php
return [
    'theme' => env('THEME','pink'),
    'slider_path' => 'slider-cycle',
    'home_portfolio_count' => 5,
    'home_articles_count' => 3,
    'pagination' => 8,
    'blog_portfolio_count' => 4,
    'blog_comments_count' => 3,
    'portfolio_recent_projects_count' => 5,
    'articles_img' => [
        'max' => ['width'=>816,'height'=>282],
        'mini' => ['width'=>55,'height'=>55]

    ],
    'portfolio_img' => [
        'max' => ['width'=>640,'height'=>480],
        'mini' => ['width'=>364,'height'=>192]

    ],
    'team_img' => [

        'mini' => ['width'=>129,'height'=>176]

    ],
    'image' => [
        'width'=>1024,
        'height'=>768
    ],


];