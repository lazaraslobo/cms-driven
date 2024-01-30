<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function updatePageContent(
        Request $request,
        string $pageId
    ){
        $rules = [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'slug' => 'required|string|max:255',
        ];

        $messages = [
            'title.required' => 'The title field is required.',
            'content.required' => 'The content field is required.',
            'slug.required' => 'The slug field is required.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $this->pages::updateOrCreate(
            ['id' => $pageId],
            $request->only(['title', 'content', 'slug'])
        );

        return response()->json(['data' => $pageId]);
    }
}
