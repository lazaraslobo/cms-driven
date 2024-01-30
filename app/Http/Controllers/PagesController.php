<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    public function __construct(
        protected Pages $pages
    ) {
    }

    public function getAllPagesList()
    {
        $page = $this->pages::with('children')->whereNull('parent_id')->get();
        return response()->json(['data' => $page]);
    }

    public function updateOrCreatePageContent(
        Request $request
    ) {
        //        $rules = [
        //            'title' => 'required|string|max:255',
        //            'content' => 'required|string',
        //            'slug' => 'required|string|max:255',
        //            'parent_id' => 'required|number',
        //            'id' => ''
        //        ];
        //
        //        $messages = [
        //            'title.required' => 'The title field is required.',
        //            'content.required' => 'The content field is required.',
        //            'slug.required' => 'The slug field is required.',
        //            'parent_id.required' => 'The parent_id field is required.',
        //        ];
        //
        //        $validator = Validator::make($request->all(), $rules, $messages);
        //
        //        if ($validator->fails()) {
        //            return response()->json(['errors' => $validator->errors()], 422);
        //        }
        $attr = $request->only(['title', 'content', 'parent_id']);
        $attr['slug'] = Str::slug($request->get('slug'));
         $this->pages::updateOrCreate(
             ['id' => $request->only(['id'])],
             $attr
         );

        return response()->json(['data' => []]);
    }
}
