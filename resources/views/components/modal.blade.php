@props(['id','title','action','is_edit'])
    <!-- Modal -->
    <div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $id }}Label">{{ $title }}</h5>
                    <button @click="$dispatch('{{ $action }}-close')" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ $slot }}
                </div>
                <div class="modal-footer">
                    @if ($is_edit)
                        <button @click="$dispatch('{{ $action }}-close')" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button @click="$dispatch('{{ $action }}')" type="button" class="btn btn-primary">UPDATE</button>
                    @else
                        <button @click="$dispatch('{{ $action }}-close')" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button @click="$dispatch('{{ $action }}')" type="button" class="btn btn-primary">CREATE</button>
                    @endif
                </div>
            </div>
        </div>
    </div>