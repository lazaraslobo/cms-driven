<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct(
        protected Pages $pages
    )
    {
    }

    public function getAllPagesList()
    {
        $page = $this->pages::with('children')->whereNull('parent_id')->get();
        return response()->json(['data' => $page]);
    }
}
