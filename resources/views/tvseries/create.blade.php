<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New TV Series</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center text-success">Add New TV Series</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tvseries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Stream</label>
                <input type="text" name="stream" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Language</label>
                <input type="text" name="language" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Country</label>
                <input type="text" name="country" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Genre</label>
                <input type="text" name="genre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Upload Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Short Introduction</label>
                <textarea name="short_intro" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Complete Season</label>
                <input type="number" name="complete_season" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="is_stream_over" class="form-control" required>
                    <option value="0">Renewed</option>
                    <option value="1">Over</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</body>
</html>
