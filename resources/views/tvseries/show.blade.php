<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $series->name }}</title>
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
            padding: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: rgba(255, 255, 255, 0.2);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
            max-width: 700px;
            width: 100%;
        }

        .card {
            background: rgba(255, 255, 255, 0.95);
            color: black;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            padding: 20px;
        }

        .card-header {
            background: linear-gradient(135deg, #007bff, #00bfff); /* Gradient background */
            color: white;
            text-align: center;
            font-weight: bold;
            border-radius: 15px 15px 0 0;
            padding: 15px;
            font-size: 24px;
        }

        .card-body p {
            margin-bottom: 25px;
            font-size: 18px;
            line-height: 1.8;
        }

        .justified {
            text-align: justify;
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            font-weight: bold;
            width: 100%;
            margin-top: 12px;
            border-radius: 8px;
            font-size: 18px;
            padding: 10px;
            transition: all 0.3s ease;
        }

        .btn-secondary {
            background: #6c757d;
            border: none;
        }

        .btn-warning {
            background: #ffc107;
            border: none;
        }

        .btn-danger {
            background: #dc3545;
            border: none;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .wiki-imdb-container {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
            gap: 10px;
        }

        .wiki-imdb-container a {
            width: 48%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
            border-radius: 8px;
            background: white;
            box-shadow: 0 0 8px rgba(255, 255, 255, 0.5);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .wiki-imdb-container a:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .wiki-imdb-container img {
            width: 40px;
            height: 40px;
        }

        /* Full-width Wikipedia and IMDb icons */
        .wiki-imdb-container a.wiki-box {
            background: linear-gradient(135deg, #ffffff, #f0f0f0);
        }

        .wiki-imdb-container a.imdb-box {
            background: linear-gradient(135deg, #f5c518, #e2b616);
        }

        .wiki-imdb-container a.wiki-box img {
            width: 100%;
            max-width: 150px;
        }

        .wiki-imdb-container a.imdb-box img {
            width: 100%;
            max-width: 150px;
        }
    </style>
</head>
<body>
    <div class="overlay">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-warning">{{ $series->name }}</h2>
                </div>
                <div class="card-body">
                    <p><strong>Genre:</strong> {{ $series->genre }}</p>
                    <p><strong>Stream:</strong> {{ $series->stream }}</p>
                    <p><strong>Language:</strong> {{ $series->language }}</p>
                    <p><strong>Country:</strong> {{ $series->country }}</p>
                    <p class="justified"><strong>Short Introduction:</strong> {{ $series->short_intro }}</p>
                    <p><strong>Complete Seasons:</strong> {{ $series->complete_season }}</p>
                    <p><strong>Status:</strong> {{ $series->is_stream_over ? 'Over' : 'Renewed' }}</p>
                </div>
            </div>

            <div class="btn-container">
                <a href="{{ route('tvseries.index') }}" class="btn btn-secondary">Back to List</a>
                <a href="{{ route('tvseries.edit', $series->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('tvseries.destroy', $series->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>

                <div class="wiki-imdb-container">
                    <a href="https://en.wikipedia.org/wiki/{{ urlencode($series->name) }}" target="_blank" class="wiki-box">
                        <img src="https://e7.pngegg.com/pngimages/464/912/png-clipart-wikipedia-logo-wikipedia-logo-icons-logos-emojis-tech-companies.png" alt="Wikipedia Logo">
                    </a>
                    <a href="https://www.imdb.com/find?q={{ urlencode($series->name) }}" target="_blank" class="imdb-box">
                        <img src="https://e7.pngegg.com/pngimages/556/500/png-clipart-imdb-television-film-actor-actor-celebrities-television.png" alt="IMDB Logo">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>