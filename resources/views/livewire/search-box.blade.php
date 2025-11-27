<div class="input-group w-100 p-2">
    <input
        type="text"
        wire:model.live.debounce.500ms="search"
        class="form-control"
        placeholder="جستجو ..."
        aria-label="Search"
    >
    <div class="input-group-text btn btn-primary">
        <i class="fe fe-search" aria-hidden="true"></i>
    </div>
</div>
