<?php

use Livewire\Volt\Component;

new class extends Component {
    public function with(): array
    {
        return [
            'notes' => Auth::user()->notes()->orderBy('send_date', 'asc')->get(),
        ];

    }
}; ?>

<div>
    <div class="space-y-2">
        @if($notes->isEmpty())
            <div class="text-center">
                <p class="text-xl font0bold">No notes found</p>
                <p class="text-sm">Let's create your first note to send.</p>
                <x-button primary icon-righ="plus" class="mt-6" href="{{ route('notes.create') }}" wire:navigate>Create Note</x-button>
            </div>
        @else
        <div class="grid grid-cols-3 gap-4">
            @foreach ($notes as $note)
                <x-card wire:key='{{ $note->id }}'>
                    <div class="flex justify-between">
                        <div>

                            <p class="mt-2 text-xs">{{ Str::limit($note->body, 50) }}</p>
                        </div>
                        <div class="text-xs text-gray-500">
                            {{ \Carbon\Carbon::parse($note->send_date)->format('M-d-Y') }}
                        </div>
                    </div>
                    <div class="flex items-end justify-between mt-4 space-x-1">
                        <p class="text-xs">Recipient: <span class="font-semibold">{{ $note->recipient }}</span></p>
                        <div>
                            <x-button.circle icon="eye"
                                href=""></x-button.circle>
                            <x-button.circle icon="trash"
                                wire:click=""></x-button.circle>
                        </div>
                    </div>
                </x-card>
            @endforeach
        </div>
        @endif
    </div>
</div>
