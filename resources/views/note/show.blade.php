<x-app-layout>
    <div>
        <div>
            <a href="{{route('notes.index')}}">Back</a>
            <a href="{{route('notes.edit', $notes)}}">Edit</a>
            <form action="{{route('notes.destroy', $notes)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="note-delete-button">Delete</button>
            </form>
            <div>
                <h1>Note: {{ $notes->created_at }}</h1>
                <p>{{ $notes->note }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
