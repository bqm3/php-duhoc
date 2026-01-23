<?php

class LienheController
{
    public function index(): void
    {
        view('main', 'layouts/pages/lien-he/index', [
            'title' => 'Liên hệ',
            'pageCss' => ['about.css'],
        ]);
    }
}
