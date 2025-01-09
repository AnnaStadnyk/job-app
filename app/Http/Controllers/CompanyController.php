<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class CompanyController extends AbstractSearchController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Employer $employer)
    {
        $jobs = $employer->jobs()
            ->with(['employer', 'tags', 'type', 'location', 'currency', 'payment'])
            ->latest('id')
            ->cursorPaginate($this->perPage);

        $responce = $this->fetchCursor($request, $jobs);

        if ($responce instanceof JsonResponse) {
            return $responce;
        }

        return view('job.result', ['jobs' => $jobs, 'nextCursor' => $responce]);
    }
}
