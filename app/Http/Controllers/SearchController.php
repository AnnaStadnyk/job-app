<?php

namespace App\Http\Controllers;

use App\Models\Jobs\Job;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SearchController extends AbstractSearchController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $jobs = Job::with(['employer', 'tags', 'type', 'location', 'currency', 'payment'])
            ->where('title', 'LIKE', '%' . $request->input('q') . '%')
            ->latest('id')
            ->cursorPaginate($this->perPage);

        $responce = $this->fetchCursor($request, $jobs);

        if ($responce instanceof JsonResponse) {
            return $responce;
        }

        return view('job.result', ['jobs' => $jobs, 'nextCursor' => $responce]);
    }
}
