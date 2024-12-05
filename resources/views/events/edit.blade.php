<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="max-w-4xl mx-auto bg-white p-8 mt-10 rounded-lg shadow-xl">
        <h1 class="text-3xl font-semibold text-center text-blue-600 mb-6">Edit Event</h1>

        <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="flex flex-col">
                <label for="name" class="text-lg font-medium text-gray-700">Nama Event:</label>
                <input type="text" id="name" name="name" class="p-3 border border-gray-300 rounded-md" value="{{ $event->name }}" required>
            </div>

            <div class="flex flex-col">
                <label for="date" class="text-lg font-medium text-gray-700">Tanggal:</label>
                <input type="date" id="date" name="date" class="p-3 border border-gray-300 rounded-md" value="{{ $event->date }}" required>
            </div>

            <div class="flex flex-col">
                <label for="description" class="text-lg font-medium text-gray-700">Deskripsi:</label>
                <textarea id="description" name="description" class="p-3 border border-gray-300 rounded-md" required>{{ $event->description }}</textarea>
            </div>

            <div class="flex flex-col">
                <label for="country" class="text-lg font-medium text-gray-700">Negara:</label>
                <input type="text" id="country" name="country" class="p-3 border border-gray-300 rounded-md" value="{{ $event->country }}" required>
            </div>

            <div class="flex flex-col">
                <label for="image" class="text-lg font-medium text-gray-700">Gambar:</label>
                <input type="file" id="image" name="image" class="p-3 border border-gray-300 rounded-md">
                @if($event->image)
                    <img src="{{ asset('storage/' . $event->image) }}" alt="Gambar {{ $event->name }}" class="mt-4 w-full h-48 object-cover rounded-md">
                @endif
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white p-3 rounded-md hover:bg-blue-700 transition">Perbarui Event</button>
        </form>
    </div>

</body>
</html>
