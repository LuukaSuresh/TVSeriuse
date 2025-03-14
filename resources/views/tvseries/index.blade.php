<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TV Series List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom Styles */
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298); /* Gradient background */
            color: #fff; /* White text for better contrast */
            font-family: 'Arial', sans-serif;
        }

        .container {
            background: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
            border-radius: 15px; /* Rounded corners */
            padding: 20px;
            margin-top: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3); /* Shadow for depth */
        }

        h2 {
            color: #333; /* Dark text for the heading */
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1); /* Subtle text shadow */
        }

        .table {
            background: rgba(255, 255, 255, 0.95); /* Semi-transparent white table background */
            border-radius: 10px; /* Rounded corners for the table */
            overflow: hidden; /* Ensures rounded corners are visible */
        }

        .table thead {
            background: #2a5298; /* Dark blue header */
            color: #fff; /* White text for header */
        }

        .table th, .table td {
            vertical-align: middle; /* Center-align table content */
        }

        .table tbody tr:hover {
            background: rgba(0, 123, 255, 0.1); /* Light blue hover effect */
            transition: background 0.3s ease;
        }

        .btn-success, .btn-warning, .btn-info, .btn-danger {
            margin: 2px; /* Spacing between buttons */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Button shadows */
        }

        .btn-success {
            background: #28a745; /* Green for success button */
            border: none;
        }

        .btn-warning {
            background: #ffc107; /* Yellow for warning button */
            border: none;
        }

        .btn-info {
            background: #17a2b8; /* Teal for info button */
            border: none;
        }

        .btn-danger {
            background: #dc3545; /* Red for danger button */
            border: none;
        }

        .badge {
            font-size: 0.9em; /* Slightly larger badges */
            padding: 0.5em 0.75em; /* Better padding */
        }

        .badge.bg-danger {
            background: #dc3545; /* Red for "Over" status */
        }

        .badge.bg-success {
            background: #28a745; /* Green for "Renewed" status */
        }

        .img-thumbnail {
            border: 2px solid #ddd; /* Light border for images */
            border-radius: 10px; /* Rounded corners for images */
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <h2 class="text-center mb-4">TV Series List</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('tvseries.create') }}" class="btn btn-success mb-3">➕ Add New Series</a>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Stream</th>
                    <th>Language</th>
                    <th>Country</th>
                    <th>Genre</th>
                    <th>Complete Season</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tvseries as $series)
                    <tr>
                        <td class="text-center"><img src="{{asset('uploads/tvseries/'.$series->image)}}" class="img-thumbnail" width="80" alt="TV Series Image"></td>
                        <td>{{ $series->name }}</td>
                        <td>{{ $series->stream }}</td>
                        <td>{{ $series->language }}</td>
                        <td>{{ $series->country }}</td>
                        <td>{{ $series->genre }}</td>
                        <td>{{ $series->complete_season }}</td>
                        <td>
                            <span class="badge bg-{{ $series->is_stream_over ? 'danger' : 'success' }}">
                                {{ $series->is_stream_over ? 'Over' : 'Renewed' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('tvseries.edit', $series->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ route('tvseries.show', $series->id) }}" class="btn btn-info btn-sm">View</a>
                            <form action="{{ route('tvseries.destroy', $series->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>