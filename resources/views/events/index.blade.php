<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Hari Unik Dunia</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f9fc;
            font-family: 'Poppins', sans-serif;
        }

        .header {
            background: linear-gradient(90deg, #1e3c72, #2a5298);
            color: #fff;
            padding: 40px 0;
            text-align: center;
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: 600;
        }

        .header p {
            font-size: 1.2rem;
            margin-top: 10px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .badge-custom {
            background-color: #27ae60;
            color: #fff;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .form-control {
            border: 1px solid #ddd;
            border-radius: 0.5rem;
        }

        .btn-primary {
            background-color: #2c3e50;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #34495e;
        }

        .footer {
            background-color: #2c3e50;
            color: #fff;
            text-align: center;
            padding: 15px 0;
        }
    </style>
</head>
<body>

    <header class="header">
        <h1>Selamat datang di Aplikasi Hari Unik Dunia</h1>
        <p>Jelajahi dan tambahkan perayaan unik dari seluruh dunia!</p>
    </header>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-8">
                <h2 class="mb-4">Daftar Hari Unik</h2>
                @if($events->isEmpty())
                    <p class="text-center text-muted fst-italic">Tidak ada event yang tersedia. Silakan tambahkan dengan formulir di sebelah kanan!</p>
                @else
                    <div class="row">
                        @foreach($events as $event)
                            <div class="col-md-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $event->name }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $event->date }}</h6>
                                        <p class="card-text">{{ $event->description }}</p>
                                        <span class="badge badge-custom">{{ $event->country }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="col-md-4">
                <div class="form-container">
                    <h2>Tambah Event Baru</h2>
                    <form action="/events" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Event</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Misalnya: Hari Kucing Internasional" required>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Tanggal Event</label>
                            <input type="date" name="date" id="date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" id="description" rows="3" class="form-control" placeholder="Tulis deskripsi singkat tentang event ini..." required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="country" class="form-label">Negara</label>
                            <input type="text" name="country" id="country" class="form-control" placeholder="Misalnya: Global" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Tambah Event</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2024 Aplikasi Hari Unik Dunia. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>