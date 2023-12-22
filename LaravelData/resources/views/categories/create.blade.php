<form method="POST" action="{{ route('categories.store') }}">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" required>
    <button type="submit">Create Category</button>
</form>
