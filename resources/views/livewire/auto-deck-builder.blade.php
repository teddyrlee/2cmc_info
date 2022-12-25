<div x-data="{ open: @entangle('show') }">
    <button wire:click="toggle_scanner" x-show="!open">Automatic</button>
    <div x-show="open" x-cloak class="absolute inset-0 bg-opacity-80 bg-black">
        <div  class="absolute inset-8 rounded-lg border-black border-8 bg-slate-300 p-4 flex">
            <img src="{{ $this->most_recent_card->faces->first()->large_image_uri }}" alt="{{ $this->most_recent_card->name }}" class="h-full"/>
            <ul>
                <li>Main Deck</li>
                @foreach($this->main_deck_card_names as $card_name)
                    <li>{{ $card_name }}</li>
                @endforeach
            </ul>
            <ul>
                <li>Sideboard</li>
                @foreach($this->sideboard_card_names as $card_name)
                    <li>{{ $card_name }}</li>
                @endforeach
            </ul>
            <button class="absolute p-2 w-auto bottom-4 border-black bg-slate-500 rounded-lg m-auto">Submit</button>
        </div>
    </div>
</div>
