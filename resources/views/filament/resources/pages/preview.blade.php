@php
    use Illuminate\Support\Facades\Storage;
    
    $record = $getRecord();
    $logoUrl = $record->logo ? Storage::url($record->logo) : null;
@endphp

<div
    class="w-full max-w-md rounded-md flex flex-col items-center justify-center p-4 space-y-2"
    x-bind:style="{'background-color': data.background_color, 'color': data.text_color}"
    x-data="{
        data: $wire.$entangle('data'),
    }"
>
    <div>
        <img
            class="w-24 h-24 rounded-full"
            x-bind:src="document.querySelector('.filepond--image-bitmap canvas')?.toDataURL() ?? @js($logoUrl) ?? null"
            x-bind:alt="data.title"
            x-bind:style="{'display': (!! $el.getAttribute('src')) ? 'block' : 'none'}"
        >
    </div>

    <div>
        <h1 class="text-2xl font-bold text-center" x-text="data.title"></h1>
        <p class="mt-2 text-sm text-center" x-text="data.description"></p>
    </div>

    <ul class="w-full space-y-3 text-center">
        <template x-for="(link, index) in data.links" :key="index">
            <li
                x-bind:style="{'background-color': link.background_color ?? data.link_background_color, 'color': link.text_color ?? data.link_text_color, 'border-radius': link.border_radius ?? data.link_border_radius}"
            >
                <a class="p-4 block font-bold text-center" x-bind:href="link.url" target="_blank">
                    <span class="f" x-text="link.title"></span>
                </a>
            </li>
        </template>
    </ul>
</div>