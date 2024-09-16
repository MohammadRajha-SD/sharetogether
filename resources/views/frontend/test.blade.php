<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar with Categories and Pages</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Custom Sidebar Styling */
        #sidebar {
            background-color: #f8f9fa;
            height: 100vh; /* Full height */
            padding: 20px;
        }

        .list-group-item {
            border: none; /* Remove border */
            padding: 10px 15px;
            font-size: 16px;
        }

        .list-group-item a {
            color: #343a40;
            text-decoration: none;
        }

        .list-group-item a:hover {
            color: #007bff; /* Change link color on hover */
        }

        /* Category Styling */
        .collapse ul {
            padding-left: 20px; /* Indentation for subcategories */
        }

        /* Main content styling */
        .content-area {
            padding: 20px;
        }

        /* Styling the active page */
        .list-group-item.active > a {
            color: white !important;
        }

    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-3">
            <!-- Static Pages in Sidebar -->
            <ul class="list-group mb-3">
                <li class="list-group-item"><a href="#">Home</a></li>
                <li class="list-group-item"><a href="#">About</a></li>
                <li class="list-group-item"><a href="#">Contact</a></li>
                <li class="list-group-item"><a href="#">Community</a></li>
            </ul>

            <!-- Categories in Sidebar -->
            <ul class="list-group">
                <!-- Loop through categories -->
                @foreach (config('categories.categories') as $category)
                    <li class="list-group-item">
                        <a href="#category{{ $category['id'] }}Submenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">{{ $category['name'] }}</a>
                        <ul class="collapse list-unstyled" id="category{{ $category['id'] }}Submenu">
                            <!-- Loop through subcategories -->
                            @foreach ($category['subcategories'] as $subcategory)
                                <li><a href="#">{{ $subcategory['name'] }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="col-md-9 content-area">
            @yield('content')
        </div>
    </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
