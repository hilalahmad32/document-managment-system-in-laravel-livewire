@if ($paginator->hasPages())
    <div class="d-flex justify-content-center">
        @if ($paginator->onFirstPage())
            <button disabled="disabled" class='btn btn-success ml-1'>Prev</button>
        @else
            <button class="btn btn-success ml-1" wire:click='previousPage'>Prev</button>
        @endif

        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <buttton class="btn btn-secondary ml-1" wire:click='gotoPage({{ $page }})'>
                            {{ $page }}</buttton>
                    @else
                        <buttton class="btn btn-success ml-1" wire:click='gotoPage({{ $page }})'>
                            {{ $page }}</buttton>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <buttton class="btn btn-success ml-1" wire:click='nextPage'>Next</buttton>
        @else
            <buttton class="btn btn-success ml-1" disabled>Next</buttton>
        @endif
    </div>
@endif
