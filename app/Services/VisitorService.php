<?php

namespace App\Services;

use App\Http\Requests\VisitorRequest;
use App\Models\Post;
use App\Models\Visitor;
use Exception;

class VisitorService {
    public function markViewed(VisitorRequest $request) {
        try {
            $visitorId = $request->input('visitor_id');
            $postId    = $request->input('post_id');

            $visitor       = Visitor::firstOrCreate(['id' => $visitorId]);
            $alreadyViewed = $visitor->posts()->where('post_id', $postId)->exists();

            if (! $alreadyViewed) {
                $visitor->posts()->attach($postId);
                Post::where('id', $postId)->increment('views_count');
            }

            return response()->json(['message' => 'View marked successfully']);
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }
}
