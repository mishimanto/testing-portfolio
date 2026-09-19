@foreach($socialLinks as $socialLink)
    <a href="{{ $socialLink->url }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $socialLink->platform }}">
        <i class="{{ $socialLink->icon }}" aria-hidden="true"></i>
    </a>
@endforeach
