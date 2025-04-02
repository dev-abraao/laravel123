<x-app-layout>
    <div class="note-container">
        <a href="{{ route('notes.create') }}" class="new-note-btn">
            New Note
        </a>
        <div class="notes">
            @foreach ($notes as $note)
            <div class="note">
                <div class="note-body">
                    {{ $note->note }}
                </div>
                <div class="note-buttons">
                    <a href="{{ route('notes.show', $note) }}" class="note-edit-button">View</a>
                    <a href="{{ route('notes.edit', $note) }}" class="note-edit-button">Edit</a>
                    <form action="{{route('notes.destroy', $note)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="note-delete-button">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
            @endforeach
            {{ $notes->links()}}
</x-app-layout>
