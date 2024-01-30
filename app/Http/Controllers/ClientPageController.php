<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Http\Request;

class ClientPageController extends Controller
{
    //
    public function __construct(
        protected Pages $pages
    ) {
    }

    public function getPageContentBySlug(
        string $slug
    ) {
        $slugParts = explode('/', $slug);
        $searchableSlug = count($slugParts) <= 1 ? $slug : $slugParts[count($slugParts) - 1];
        $rootPage = $this->pages::where('slug', $searchableSlug);
        $dt = $rootPage->get()->first();
        if ($dt) {
            return view('client', ["data" => $rootPage->get()->first()]);
        }
        return abort(404);
    }
}
