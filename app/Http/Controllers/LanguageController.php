<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function switch(string $locale): RedirectResponse
    {
        if (! in_array($locale, ['en', 'vi'])) {
            abort(404);
        }

        session(['locale' => $locale]);

        App::setLocale($locale);

        return back();
    }
}
