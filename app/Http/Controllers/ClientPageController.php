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
    ){
        $slugParts = explode('/', $slug);
        $searchableSlug = count($slugParts) <= 1 ? $slug : $slugParts[0];
        $rootPage = $this->pages::where('slug', $searchableSlug);
        if(count($slugParts) > 1){
            $rootPage = $rootPage->with('children')->first();
            if ($rootPage->children->isNotEmpty()) {
                $matched = $rootPage->children->first();
                if($slug === $matched->slug){
                    return view('client', ["data" => $matched]);
                }
            }
            return abort(404);
        }
        if($rootPage->first()){
            return view('client', ["data" => $rootPage->first()]);
        }
        return abort(404);
    }
}
