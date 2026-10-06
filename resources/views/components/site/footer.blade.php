<footer class="bg-onyx text-ivory">
    <div class="site-wrap pt-[72px] pb-8">
        <div class="flex flex-wrap justify-between gap-12">
            <div class="max-w-[320px]">
                <a href="{{ route('home') }}" class="text-ivory no-underline hover:text-ivory" aria-label="Attestami, home">
                    <x-site.logo />
                </a>
                <p class="mt-4 text-[15px] leading-relaxed text-muted-dark">La piattaforma per erogare formazione obbligatoria e rilasciare attestati a norma.</p>
            </div>

            <div class="flex flex-wrap gap-x-16 gap-y-10">
                <div class="flex flex-col gap-2.5">
                    <span class="text-sm font-medium text-muted-dark">Prodotto</span>
                    <a href="{{ route('platform') }}" class="text-[15px] text-ivory no-underline hover:text-periwinkle">Piattaforma</a>
                    <a href="{{ route('verify') }}" class="text-[15px] text-ivory no-underline hover:text-periwinkle">Verifica attestato</a>
                    <a href="{{ route('contact') }}" class="text-[15px] text-ivory no-underline hover:text-periwinkle">Richiedi una demo</a>
                </div>
                <div class="flex flex-col gap-2.5">
                    <span class="text-sm font-medium text-muted-dark">Azienda</span>
                    <a href="{{ route('contact') }}" class="text-[15px] text-ivory no-underline hover:text-periwinkle">Contatti</a>
                    <a href="{{ url('/admin') }}" class="text-[15px] text-ivory no-underline hover:text-periwinkle">Accedi</a>
                </div>
                <div class="flex flex-col gap-2.5">
                    <span class="text-sm font-medium text-muted-dark">Legale</span>
                    <a href="#privacy" class="text-[15px] text-ivory no-underline hover:text-periwinkle">Privacy</a>
                    <a href="#cookie" class="text-[15px] text-ivory no-underline hover:text-periwinkle">Cookie</a>
                    <a href="#termini" class="text-[15px] text-ivory no-underline hover:text-periwinkle">Termini</a>
                </div>
            </div>
        </div>

        <div class="mt-14 flex flex-wrap justify-between gap-3 border-t border-line-dark pt-6 text-sm text-muted-dark">
            <span>© {{ date('Y') }} Attestami · [Ragione sociale] · P.IVA [—] · PEC [—]</span>
            <span>Fatto in Italia</span>
        </div>
    </div>
</footer>
