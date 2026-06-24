<!DOCTYPE html>
<html>
<head>
    <title>Issue Tracker</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>

<div class="container mt-4">

    <nav class="mb-4">

        <a href="{{ route('projects.index') }}"
           class="btn btn-primary">
            Projects
        </a>

        <a href="{{ route('issues.index') }}"
           class="btn btn-secondary">
            Issues
        </a>

        <a href="{{ route('tags.index') }}"
           class="btn btn-info">
            Tags
        </a>

    </nav>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>
    @endif

    @yield('content')

</div>

</body>
</html>