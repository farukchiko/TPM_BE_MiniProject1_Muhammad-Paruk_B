<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Event</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="max-w-4xl mx-auto bg-white p-8 mt-10 rounded-lg shadow-xl">
        <!-- Title Form -->
        <h1 class="text-3xl font-semibold text-center text-blue-600 mb-6">Tambah Event Baru</h1>

        <!-- Formulir Tambah Event -->
        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="flex flex-col">
                <label for="name" class="text-lg font-medium text-gray-700">Nama Event:</label>
                <input type="text" id="name" name="name" class="p-3 border border-gray-300 rounded-md" required>
            </div>

            <div class="flex flex-col">
                <label for="date" class="text-lg font-medium text-gray-700">Tanggal:</label>
                <input type="date" id="date" name="date" class="p-3 border border-gray-300 rounded-md" required>
            </div>

            <div class="flex flex-col">
                <label for="description" class="text-lg font-medium text-gray-700">Deskripsi:</label>
                <textarea id="description" name="description" class="p-3 border border-gray-300 rounded-md" required></textarea>
            </div>

            <div class="flex flex-col">
                <label for="country" class="text-lg font-medium text-gray-700">Negara:</label>
                <input type="text" id="country" name="country" class="p-3 border border-gray-300 rounded-md" required>
            </div>

            <div class="flex flex-col">
                <label for="image" class="text-lg font-medium text-gray-700">Gambar:</label>
                <input type="file" id="image" name="image" class="p-3 border border-gray-300 rounded-md" required>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white p-3 rounded-md hover:bg-blue-700 transition">Tambah Event</button>
        </form>
    </div>

    <!-- Daftar Event -->
    <div class="max-w-4xl mx-auto mt-10">
        <h2 class="text-2xl font-semibold text-center text-blue-600 mb-6">Daftar Event</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($events as $event)
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition">
                    <h3 class="text-xl font-semibold">{{ $event->name }}</h3>
                    <p class="text-gray-700">{{ $event->description }}</p>
                    <p class="text-sm text-gray-500">{{ $event->country }} - {{ $event->date }}</p>

                    @if($event->image)
                        <img src="{{ asset('storage/' . $event->image) }}" alt="Gambar {{ $event->name }}" class="mt-4 w-full h-48 object-cover rounded-md">
                    @endif

                    <div class="mt-4 flex justify-between items-center">
                        <a href="{{ route('events.edit', $event->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>

                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>
