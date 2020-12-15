<div>
    <div class="row">
        <div class="col-md-6">
            {!! $some !!}
        </div>
        <div class="col-md-6">
            <form wire:submit.prevent="submit">
            start x
            <input type="number" wire:model="start.x" class="form-control">
            start y
            <input type="number" wire:model="start.y" class="form-control">
            end x
            <input type="number" wire:model="end.x" class="form-control">
            end y
            <input type="number" wire:model="end.y" class="form-control">
                <input type="submit">
            </form>
        </div>
    </div>
</div>
