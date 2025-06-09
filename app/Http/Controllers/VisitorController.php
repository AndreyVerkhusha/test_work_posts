<?php

namespace App\Http\Controllers;

use App\Http\Requests\VisitorRequest;
use App\Services\VisitorService;

class VisitorController extends Controller {
    public $visitorService;

    public function __construct(VisitorService $visitorService) {
        $this->visitorService = $visitorService;
    }

    public function markViewed(VisitorRequest $request) {
        return $this->visitorService->markViewed($request);
    }
}
