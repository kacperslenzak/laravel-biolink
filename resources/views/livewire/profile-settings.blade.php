<div>
    <form wire:submit="create">
        {{ $this->form }}

        <button type="submit" class="fi-btn p-3" style="border-radius: 10px; margin-top: 10px;">
            Submit
        </button>
    </form>

    <x-filament-actions::modals />
</div>
