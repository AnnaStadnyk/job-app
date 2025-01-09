@props(['jobs'])
@foreach($jobs as $job)
<x-job-card-wide :job="$job"></x-job-card-wide>
@endforeach