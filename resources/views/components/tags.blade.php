@props(['tags', 'small' => false])

<ul class="flex flex-wrap items-center {{ $small === false ? 'gap-x-6 gap-y-8' : 'gap-2' }}">
    @foreach($tags as $tag)
    <li>
        <a href="{{ route('tag', $tag->title) }}"
            class="block rounded-full px-3 py-1.5 font-medium transition-colors duration-300 {{ $small === false ? 'bg-gray-900 text-white hover:bg-gray-700' : 'bg-gray-50 text-xs text-gray-600 hover:bg-gray-100' }}">{{
                                ucwords($tag->title) }}</a>
    </li>
    @endforeach
</ul>