<x-app-layout>
    <div id="bTicketsPage">
        <h1 id="passSectionTitle" class="text-center text-5xl my-9 text-white">
            Adquiere tu pase al festival
        </h1>
        @livewire('CreateTicketForm')
        @livewire('allTickets')
    </div>
</x-app-layout>