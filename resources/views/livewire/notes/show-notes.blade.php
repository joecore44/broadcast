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
    @foreach($notes as $note)
        {{ $note->title }}
    @endforeach
</div>
