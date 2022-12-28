<form wire:submit.prevent="createDraft">
    @csrf
{{--  Todo Move team draft and round timer to bottom of the page!  --}}
    <table class="mx-auto">
        <tr>
            <th class="mx-16">Player</th>
            <th class="mx-16">Assigned Seat</th>
            <th class="mx-16">Remove Player</th>
        </tr>

    @foreach($draft_seats as $key => $draft_seat)
            <tr>
                <td>{{ $draft_seat["player"]["player_name"]}}</td>
                <td><select wire:model="draft_seats.{{ $key }}.seat_number">
                        <option value=""></option>
                    @foreach(range(1,$player_count, 1) as $i)

                            <option value="{{ $i }}">{{ $i }}</option>
                        @endforeach
                    </select></td>
                <td><button wire:click.prevent="removePlayer({{ $draft_seat['player']['player_id'] }})">Remove</button></td>
            </tr>
        @endforeach
    </table>
    <div class="absolute bottom-24 left-0 right-64 w-80 mx-auto text-center">
        <label for="team">Team Draft:</label><input type="checkbox" id="team" name="team" wire:model="is_team_draft"><br />
        <label for="round-time">Round Timer (mins):</label> <input type="text" id="round-time" wire:model="round_time"><br />
        <button wire:click.prevent="addPlayer()">Add Player</button>
        <input class="bg-slate-300" type="text" list="previous-players" value="" wire:model="new_player_name"><br />
        <datalist id="previous-players">
            @foreach($remaining_previous_players as $previous_player)
                <option value="{{ $previous_player->player_name }}"></option>
            @endforeach
        </datalist>
        <button type="submit" value="createDraft()" class="mx-auto">Create New Draft</button>
    </div>
</form>
