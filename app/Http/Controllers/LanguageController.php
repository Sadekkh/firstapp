<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function switch($locale)
    {
        if (!in_array($locale, ['en', 'ar'])) {
            abort(400);
        }

        App::setLocale($locale);

        return redirect()->back(); // Redirect back to the previous page
    }
}
