<?php

namespace App\Services;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostService {
    public function index(Request $request) {
        $visitorId = $request->header('Visitor-Id');

        if (!$visitorId) {
            return response()->json(['message' => 'Visitor ID header missing'], 400);
        }

        $viewedPostIds = DB::table('post_visitor')
            ->where("visitor_id", $visitorId)
            ->pluck('post_id');

        $posts = Post::whereNotIn('id', $viewedPostIds)
            ->where('views_count', '<=', 1000)
            ->orderByDesc('hotness')
            ->get();

        return response()->json(PostResource::collection($posts));
    }
}
