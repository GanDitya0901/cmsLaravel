<x-guest-layout>
    {{-- Dynamic Section Start --}}
    @foreach ($page->sections as $section)
        @if ($section->type === 'hero')
            <section class="mx-auto max-w-full mb-10 px-30">
                <div class="md:flex md:items-center md:gap-3">
                    <div class="text-center mb-5 md:text-left">
                        <h1 class="font-bold text-lg mb-2 capitalize">{{ $section->content['heading'] ?? '' }}</h1>
                        <p class="">{{ $section->content['body'] ?? '' }}</p>
                    </div>
                    <div class="md:shrink-0">
                        <div class="flex justify-center">
                            <img src="{{ asset($section->content['file'] ?? '') }}" alt="{{ $section->content['alt'] ?? '' }}"
                                class="rounded-md">
                        </div>
                    </div>
                </div>
            </section>

        @elseif ($section->type === 'text_block')
            <section class="mx-auto max-w-full mb-10 px-30">
                <div class="md:flex md:items-center md:gap-3">
                    <div class="text-right mb-5 md:text-right">
                        <h1 class="font-bold text-lg mb-2 capitalize">
                            {{ $section->content['title'] ?? '' }}
                        </h1>
                        <p>{{ $section->content['paragraph'] ?? '' }}</p>
                    </div>
                </div>
            </section>
        @endif
    @endforeach
    {{-- Dynamic Section End --}}
</x-guest-layout>