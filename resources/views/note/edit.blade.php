<x-app-layout>
    <div>
        <h1>Edit Your note</h1>
        <form action="{{route('notes.update', $notes)}}" method="POST">
            @csrf
            @method('PUT')
            <textarea name="note" rows="10" placeholder="Enter Your Note"></textarea>
            <div>
                <a href="{{route('notes.index')}}">Cancel</a>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>
