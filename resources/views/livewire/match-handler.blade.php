<tr>
    <td>{{ $match->seat_1->player->player_name }}</td>
    @if($match->seat_2)
        <td><input type="number" wire:model="match.player_1_wins" min="0"></td>
    @endif
    <td>{{ $match->seat_2->player->player_name ?? 'BYE' }}</td>
    @if($match->seat_2)
        <td><input type="number" wire:model="match.player_2_wins" min="0"></td>
        <td><input type="number" wire:model="match.draws" min="0"></td>
        <td>
            <button wire:click="submitResults()">
                @if($match->is_submitted)
                    Update
                @else
                    Submit
                @endif
            </button>
        </td>
    @endif
</tr>
