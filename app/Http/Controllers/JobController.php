<?php

namespace App\Http\Controllers;

use App\Events\JobPostedEvent;
use App\Http\Requests\JobRequest;
use App\Models\Jobs\Distionaries\Currency;
use App\Models\Jobs\Distionaries\Location;
use App\Models\Jobs\Distionaries\Payment;
use App\Models\Jobs\Distionaries\Type;
use App\Models\Jobs\Job;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    private function getDictionaries(): array
    {
        return [
            'type' => Type::all(),
            'location' => Location::all(),
            'payment' => Payment::all(),
            'currency' => Currency::all()
        ];
    }

    public function index(Request $request)
    {
        $jobs['featured'] = Job::query()
            ->with(['employer', 'tags', 'currency', 'payment'])
            ->where('featured', '=', 1)
            ->where('closed', '=', 0)
            ->latest('id')
            ->take(3)
            ->get();
        $jobs['recent'] = Job::query()
            ->with(['employer', 'tags', 'type', 'location', 'currency', 'payment'])
            ->where('closed', '=', 0)
            ->latest('id')
            ->cursorPaginate(5);

        $dictionaries = $this->getDictionaries();

        $tags = Tag::all();

        $nextCursor = $jobs['recent']->hasMorePages() ?
            $jobs['recent']->nextCursor()->encode() :
            null;

        if ($request->ajax()) {
            $returnHTML = view('job.results', ['jobs' => $jobs['recent']])->render();

            return response()->json([
                'success' => true,
                'html' => $returnHTML,
                'nextCursor' => $nextCursor ?? '',
            ]);
        }

        return view('job.index', ['jobs' => $jobs, 'tags' => $tags, 'dictionaries' => $dictionaries, 'nextCursor' => $nextCursor]);
    }

    public function show(Job $job)
    {
        return view('job.show', ['job' => $job]);
    }

    public function create()
    {
        $dictionaries = $this->getDictionaries();
        $tags = Tag::all();

        return view('job.create', ['tags' => $tags, 'dictionaries' => $dictionaries]);
    }

    public function store(JobRequest $request)
    {
        $attributes = $request->validated();

        $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, 'tags'));

        foreach (explode(',', $request->input('tags')) as $tag) {
            $job->tag($tag);
        }

        event(new JobPostedEvent($job));

        return redirect()->route('job.show', $job->id);
    }

    public function edit(Job $job)
    {
        $dictionaries = $this->getDictionaries();

        return view('job.edit', ['job' => $job, 'dictionaries' => $dictionaries]);
    }

    public function update(JobRequest $request, Job $job)
    {
        $attributes = $request->validated();

        $job->update(Arr::except($attributes, 'tags'));

        $job->tags()->detach();

        foreach (explode(',', $request->input('tags')) as $tag) {
            $job->tag($tag);
        }

        return redirect()->route('job.show', $job->id);
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect()->route('job.index');
    }
}
