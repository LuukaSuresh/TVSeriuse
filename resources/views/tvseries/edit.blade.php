<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update - "{{ $series->name }}"</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Set background image */
        body {
            background: url("{{asset('uploads/tvseries/'.$series->image)}}") no-repeat center center fixed;
            background-size: cover;
            color: white;
            font-family: 'Arial', sans-serif;
        }

        /* Overlay for readability */
        .overlay {
            background: rgba(0, 0, 0, 0.7);
            min-height: 100vh;
            padding: 50px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(255, 255, 255, 0.5); /* Enhanced shadow */
            max-width: 800px;
            width: 100%;
            backdrop-filter: blur(10px); /* Blur effect for a modern look */
        }

        h1 {
            text-align: center;
            font-weight: bold;
            color: #FFD700; /* Gold */
            margin-bottom: 40px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Text shadow */
        }

        .form-label {
            font-weight: bold;
            color: #FFD700; /* Gold */
            margin-bottom: 10px;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.9);
            color: black;
            border-radius: 8px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            padding: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 1);
            border-color: #007bff;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
        }

        .btn-primary {
            background: linear-gradient(135deg, #28a745, #218838); /* Gradient background */
            border: none;
            font-weight: bold;
            width: 100%;
            padding: 15px;
            font-size: 18px;
            margin-top: 20px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        img.thumbnail {
            display: block;
            margin: 20px auto;
            border: 3px solid white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.5);
            max-width: 100%;
            transition: all 0.3s ease;
        }

        img.thumbnail:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.8);
        }

        .text-muted {
            color: #ccc !important;
        }

        /* Custom select styling */
        .form-select {
            background: rgba(255, 255, 255, 0.9);
            color: black;
            border-radius: 8px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            padding: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-select:focus {
            background: rgba(255, 255, 255, 1);
            border-color: #007bff;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
        }
    </style>
</head>
<body>
    <div class="overlay">
        <div class="container">
            <h1>Update - "{{ $series->name }}"</h1>

            <form action="{{ route('tvseries.update', $series->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $series->name }}" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Stream</label>
                    <input type="text" name="stream" class="form-control" value="{{ $series->stream }}" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Language</label>
                    <input type="text" name="language" class="form-control" value="{{ $series->language }}" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Country</label>
                    <input type="text" name="country" class="form-control" value="{{ $series->country }}" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Genre</label>
                    <input type="text" name="genre" class="form-control" value="{{ $series->genre }}" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Upload Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                    @if ($series->image)
                        <img src="{{asset('uploads/tvseries/'.$series->image)}}" class="thumbnail">
                    @else
                        <p class="text-muted mt-2">No image uploaded</p>
                    @endif
                </div>

                <div class="mb-4">
                    <label class="form-label">Short Introduction</label>
                    <textarea name="short_intro" class="form-control" rows="6" required>{{ $series->short_intro }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label">Complete Seasons</label>
                    <input type="number" name="complete_season" class="form-control" value="{{ $series->complete_season }}" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Status</label>
                    <select name="is_stream_over" class="form-select" required>
                        <option value="0" {{ $series->is_stream_over == 0 ? 'selected' : '' }}>Renewed</option>
                        <option value="1" {{ $series->is_stream_over == 1 ? 'selected' : '' }}>Over</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>