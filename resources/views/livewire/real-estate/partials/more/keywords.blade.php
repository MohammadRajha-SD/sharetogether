<div class="col-12 border-bottom">

    <h5 class="card-title">Keyword search</h5>
    @if(!empty($keywords))
    <div class="d-flex flex-wrap align-items-center mt-2 p-2" style="border: 1px solid #ddd; border-radius: 5px;">
        @foreach ($keywords as $keyword)
        <span class="badge m-1 d-flex align-items-center" style=" border: 1px solid #ddd; border-radius: 5px;">
            {{ ucwords($keyword) }}
            <i class="bi bi-x ml-1" wire:click="removeKeyword('{{ $keyword }}')" style="font-size:20px"></i>
        </span>
        @endforeach
    </div>
    @endif

    <div class="mb-2 mt-2">
        <input type="text" class="form-control" placeholder="Select a keyword below or type here"
            wire:model.live='keyword' @keydown.enter="$wire.keywordInputUpdated" />

    </div>

    <div class="mb-3">
        <button class="btn btn-sm btn-secondary mb-2" wire:click="keywordChanged('pool')">+
            Pool</button>
        <button class="btn btn-sm btn-secondary mb-2" wire:click="keywordChanged('water front')">+ Water
            front</button>
        <button class="btn btn-sm btn-secondary mb-2" wire:click="keywordChanged('basement')">+
            Basement</button>
        <button class="btn btn-sm btn-secondary mb-2" wire:click="keywordChanged('gated')">+
            Gated</button>
        <button class="btn btn-sm btn-secondary mb-2" wire:click="keywordChanged('pond')">+
            Pond</button>
    </div>
</div>