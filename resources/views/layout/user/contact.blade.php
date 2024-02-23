@extends('welcome')
@section('contant')
    <div class="col-12">
        <h1 class="te text-center">View Contact</h1>
        <div class="row">
            <div class="col">
                {{-- @foreach ($translatedTexts as $item)
                    @if (isset($item['description']))
                        @php
                            $translator = new Stichoza\GoogleTranslate\GoogleTranslate('fr');
                        @endphp

                        @if (is_array($item['description']))
                            @foreach ($item['description'] as $desc)
                                <p>{{ $translator->translate($desc, 'en', 'en') }}</p>
                            @endforeach
                        @else
                            <p>{{ $translator->translate($item['description'], 'en', 'en') }}</p>
                    @endif
                    @else
                        <p>No description available</p>
                    @endif
                @endforeach --}}
            </div>
            <div class="col">
                {{-- @foreach ($translatedTexts as $item)
                    @if (isset($item['description']))
                        @php
                            $translator = new Stichoza\GoogleTranslate\GoogleTranslate('en');
                        @endphp

                        @if (is_array($item['description']))
                            @foreach ($item['description'] as $desc)
                                <p>{{ $translator->translate($desc, 'en', 'en') }}</p>
                            @endforeach
                        @else
                            <p>{{ $translator->translate($item['description'], 'en', 'en') }}</p>
                    @endif
                    @else
                        <p>No description available</p>
                    @endif
                @endforeach --}}
            </div>
            <div class="col">
                {{-- @foreach ($translatedTexts as $item)
                    @if (isset($item['description']))
                        @php
                            $translator = new Stichoza\GoogleTranslate\GoogleTranslate('km');
                        @endphp

                        @if (is_array($item['description']))
                            @foreach ($item['description'] as $desc)
                                <p>{{ $translator->translate($desc, 'en', 'en') }}</p>
                            @endforeach
                        @else
                            <p>{{ $translator->translate($item['description'], 'en', 'en') }}</p>
                    @endif
                    @else
                        <p>No description available</p>
                    @endif
                @endforeach --}}
            </div>
        </div>
    </div>
@endsection