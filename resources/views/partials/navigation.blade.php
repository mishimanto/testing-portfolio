@foreach($navigationItems as $item)
    <li @class(['has-dropdown' => $item->children->isNotEmpty()])>
        <a href="{{ $item->url }}" target="{{ $item->target }}" @if($item->target === '_blank') rel="noopener noreferrer" @endif>
            {{ $item->label }}
            @if($item->children->isNotEmpty())
                <i class="fa-regular fa-chevron-down"></i>
            @endif
        </a>
        @if($item->children->isNotEmpty())
            <ul class="submenu">
                @foreach($item->children as $child)
                    <li><a href="{{ $child->url }}" target="{{ $child->target }}" @if($child->target === '_blank') rel="noopener noreferrer" @endif>{{ $child->label }}</a></li>
                @endforeach
            </ul>
        @endif
    </li>
@endforeach
