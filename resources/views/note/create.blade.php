<x-app-layout>
    <div>
        <h1>Create new Note</h1>
        <form action="{{ route('notes.store') }}" method="POST" class="note">
            @csrf
            <textarea name="note" rows="10" placeholder="Enter your note"></textarea>
            <div>
                <a href="{{ route('notes.index') }}">Cancel</a>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>
