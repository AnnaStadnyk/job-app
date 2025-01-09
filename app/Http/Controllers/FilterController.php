<?php

namespace App\Http\Controllers;

use App\Models\Jobs\Job;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FilterController extends AbstractSearchController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $query = Job::with(['employer', 'tags', 'type', 'location', 'currency', 'payment']);

        if ($request->has('type')) {
            $query->where('type_id', '=', $request->input('type'));
        }

        if ($request->has('location')) {
            $query->whereIn('location_id', $request->input('location'));
        }

        if ($request->has('payment')) {
            $query->where('payment_id', '=', $request->input('payment'));
        }

        if ($request->has('salary_beg') && ! empty($request->input('salary_beg'))) {
            $query->where('salary', '>=', $request->input('salary_beg'));
        }

        if ($request->has('salary_end') && ! empty($request->input('salary_end'))) {
            $query->where('salary', '<=', $request->input('salary_end'));
        }

        if ($request->has('currency') && ($request->has('salary_beg') && ! empty($request->input('salary_beg')) || $request->has('salary_end') && ! empty($request->input('salary_end')))) {
            $query->where('currency_id', '=', $request->input('currency'));
        }

        $jobs = $query->latest('id')
            ->cursorPaginate(5);

        $responce = $this->fetchCursor($request, $jobs);

        if ($responce instanceof JsonResponse) {
            return $responce;
        }

        return view('job.result', ['jobs' => $jobs, 'nextCursor' => $responce]);
    }
}
