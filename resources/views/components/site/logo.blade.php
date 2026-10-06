@props(['size' => 26])

<span {{ $attributes->class('inline-flex items-center gap-2.5') }}>
    <svg width="{{ $size }}" height="{{ $size }}" viewBox="0 0 26 26" fill="none" aria-hidden="true">
        <circle cx="13" cy="13" r="11.25" stroke="currentColor" stroke-width="1.5"></circle>
        <path d="M8.5 13.4l3 3 6-6.4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path>
    </svg>
    <span class="font-brand text-[21px] font-[520] tracking-[0.01em] [font-variation-settings:'FLAR'_100]">Attestami</span>
</span>
