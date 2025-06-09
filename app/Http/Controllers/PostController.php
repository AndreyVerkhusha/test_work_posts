<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller {

    public $postService;

    public function __construct(PostService $postService) {
        $this->postService = $postService;
    }

    public function index(Request $request) {
        return $this->postService->index($request);
    }
}
