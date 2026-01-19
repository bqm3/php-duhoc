<?php

class AboutController
{
    public function index(): void
    {
        view('main', 'layouts/pages/about/index', [
            'title' => 'Giới thiệu',
            'pageCss' => ['about.css'],
        ]);
    }
}
