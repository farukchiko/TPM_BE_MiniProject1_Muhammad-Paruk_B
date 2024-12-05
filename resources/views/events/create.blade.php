<form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" placeholder="Nama Event" required>
    <input type="date" name="date" required>
    <textarea name="description" placeholder="Deskripsi Event" required></textarea>
    <input type="text" name="country" placeholder="Negara" required>
    <input type="file" name="image">
    <button type="submit">Tambah Event</button>
</form>
