
@if(!empty($plugins))
        @foreach($plugins as $plugin)
            @if($plugin->status)
                <li><a href="{{ route(strtolower($plugin->name).'.index') }}">{{ __($plugin->name) }}</a></li>
            @endif
        @endforeach
    @endif