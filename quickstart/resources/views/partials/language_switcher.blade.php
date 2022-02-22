@foreach($available_locales as $locale_name => $available_locale)
    @if ($available_locale === $current_locale)
        <span class="ml-2 mr-2 text-gray-700 btn btn-success">{{ $locale_name }}</span>
    @else
            <a class="ml-1 underline ml-2 mr-2 btn  " href="{{ route('lang', ['locale' => $available_locale]) }}">
                <span>{{ $locale_name }}</span>
            </a>
    @endif
@endforeach
