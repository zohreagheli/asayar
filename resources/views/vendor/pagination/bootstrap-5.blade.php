@if ($paginator->hasPages())
    <div class="d-flex align-items-center justify-content-between flex-wrap">

        {{-- Pages --}}
        <ul class="pagination mb-0">

            {{-- Previous --}}
            <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" wire:click="previousPage" wire:loading.attr="disabled">
                    <i class="ki-outline ki-arrow-left fs-5"></i>
                </a>
            </li>

            {{-- Numbers --}}
            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                            <a class="page-link" wire:click="gotoPage({{ $page }})">
                                {{ $page }}
                            </a>
                        </li>
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            <li class="page-item {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
                <a class="page-link" wire:click="nextPage" wire:loading.attr="disabled">
                    <i class="ki-outline ki-arrow-right fs-5"></i>
                </a>
            </li>
        </ul>

        {{-- Page size --}}
        <div class="ms-3">
            <select class="form-select form-select-sm w-auto">
                <option>10</option>
                <option>20</option>
                <option>50</option>
            </select>
        </div>

    </div>
@endif
