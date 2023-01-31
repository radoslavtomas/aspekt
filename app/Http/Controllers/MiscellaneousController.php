<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MiscellaneousController extends Controller
{
    public function gdpr()
    {
        $page = Page::where('id', 10)->get();

        if (!$page) {
            abort(404);
        }

        return Inertia::render('Page', [
            'page' => $page[0],
            'breadcrumbs_id' => 'books'
        ]);
    }
}
