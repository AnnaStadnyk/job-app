<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class AbstractSearchController extends Controller
{
    protected $perPage = 5;

    protected function fetchCursor(Request $request, $jobs)
    {
        $nextCursor = $jobs->hasMorePages() ?
            $jobs->nextCursor()->encode()
            : null;

        if ($request->ajax()) {
            $returnHTML = view('job.results')->with('jobs', $jobs)->render();

            return response()->json([
                'success' => true,
                'html' => $returnHTML,
                'nextCursor' => $nextCursor ?? '',
            ]);
        }

        return $nextCursor ?? '';
    }
}
