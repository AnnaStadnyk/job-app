<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TagController extends AbstractSearchController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Tag $tag)
    {
        $jobs = $tag->jobs()
            ->with(['employer', 'tags', 'type', 'location', 'currency', 'payment'])
            ->latest('id')->cursorPaginate($this->perPage);

        $responce = $this->fetchCursor($request, $jobs);

        if ($responce instanceof JsonResponse) {
            return $responce;
        }

        return view('job.result', ['jobs' => $jobs, 'nextCursor' => $responce]);
    }
}
