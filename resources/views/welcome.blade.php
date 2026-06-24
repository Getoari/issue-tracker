<!DOCTYPE html>
<html>
<head>
    <title>Issue Tracker</title>

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h1>Issue Tracker</h1>

    <hr>

    @yield('content')

</div>

</body>
</html>