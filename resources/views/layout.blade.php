<!-- resources/views/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel CRUD</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel = "stylesheet" href="/css/style.css">
    <style>
    .task-item {
        cursor: pointer;
        position: relative;
    }
    .edit-button {
        position: absolute;
        top: 10px; /* Adjust as needed */
        right: 10px; /* Adjust as needed */
    }
    .task-icon {
        top: 50%;
        right: 15px;
        transform: translateY(-50%);
        display: none;
        color: #E97432;
        font-size: 1.25rem; /* Adjust the icon size if needed */
    }
    .task-item:hover .task-icon {
        display: block;
    }

    .btn-custom {
        background-color: #E97432;
      border-color: #E97432;
    }

    .btn-custom:hover {
        background: black;
    }

    .container-layout {
        width: 100%;
        min-height: 100vh;
        background: linear-gradient(135deg, #153677, #4e085f);
        padding: 50px;
    }
    </style>
</head>
<body>
    <div class="container-layout ">
        @yield('content')
    </div>
</body>
</html>
