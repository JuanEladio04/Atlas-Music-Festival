<div>
    @foreach ($tickets as $ticket)
    <livewire:ticket :$ticket :key="$ticket->id"/>
    @endforeach
</div>
