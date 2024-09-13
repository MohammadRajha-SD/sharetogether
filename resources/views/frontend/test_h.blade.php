<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .category-icon {
            width: 24px;
            height: 24px;
        }
        .nav-item {
            margin-right: 15px;
        }
        .category-list {
            list-style-type: none;
            padding: 0;
        }
        .category-list li {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            cursor: pointer;
        }
        .category-list li i {
            margin-right: 10px;
        }
        .subcategories {
            padding-left: 30px;
            list-style-type: none;
        }
        .subcategories li {
            margin-bottom: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Left Sidebar: Categories -->
            <div class="col-md-3">
                <h4>Categories</h4>
                <ul class="category-list">
                    <li data-toggle="collapse" data-target="#foodSubcategories">
                        <i class="fas fa-utensils category-icon"></i> Food
                    </li>
                    <ul id="foodSubcategories" class="collapse subcategories">
                        <li>a. Home</li>
                        <li>b. Restaurant</li>
                        <li>c. Food Trucks</li>
                        <li>d. Grocery Store Community Delivery</li>
                    </ul>
                    <li data-toggle="collapse" data-target="#localServiceSubcategories">
                        <i class="fas fa-tools category-icon"></i> Local Service
                    </li>
                    <ul id="localServiceSubcategories" class="collapse subcategories">
                        <li>A. Daycare
                            <ul>
                                <li>1. Infant Daycare</li>
                                <li>2. Toddler Daycare</li>
                                <li>3. Preschools</li>
                                <li>4. School Age</li>
                                <li>5. Home School</li>
                                <li>6. Certified Teachers Summer Care, Holiday Care</li>
                            </ul>
                        </li>
                        <li>B. Cleaning</li>
                        <li>C. Moving</li>
                        <li>D. Shipping</li>
                        <li>E. Fixing</li>
                        <li>F. Car Rental</li>
                    </ul>
                    <li data-toggle="collapse" data-target="#realEstateSubcategories">
                        <i class="fas fa-home category-icon"></i> Real Estate
                    </li>
                    <ul id="realEstateSubcategories" class="collapse subcategories">
                        <li>Rent</li>
                        <li>Sale</li>
                        <li>Swap</li>
                        <li>Flip</li>
                        <li>Land</li>
                        <li>Farm</li>
                        <li>Event</li>
                    </ul>
                    <li data-toggle="collapse" data-target="#recruitmentSubcategories">
                        <i class="fas fa-briefcase category-icon"></i> Recruitment
                    </li>
                    <ul id="recruitmentSubcategories" class="collapse subcategories">
                        <li>All Recruitment Options</li>
                    </ul>
                    <li data-toggle="collapse" data-target="#trainingSubcategories">
                        <i class="fas fa-chalkboard-teacher category-icon"></i> Training
                    </li>
                    <ul id="trainingSubcategories" class="collapse subcategories">
                        <li>Piano</li>
                        <li>Dance</li>
                        <li>Etc.</li>
                    </ul>
                    <li>
                        <i class="fas fa-female category-icon"></i> Mom
                    </li>
                    <li>
                        <i class="fas fa-male category-icon"></i> Dad
                    </li>
                    <li>
                        <i class="fas fa-house-user category-icon"></i> Homeless
                    </li>
                </ul>
            </div>

            <!-- Right Sidebar: Navigation -->
            <div class="col-md-9">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Discover</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Exchange</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Home Business</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Help Hands</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Community</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Interests</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Chats</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Notifications</a></li>
                    </ul>
                </nav>

                <div class="content">
                    <!-- Add your content here -->
                    <h2>Welcome to the Community Platform</h2>
                    <p>Connect with your local community, discover new opportunities, and engage in meaningful exchanges.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and FontAwesome -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">Exchange Market Categories</h1>
    <div class="accordion" id="categoriesAccordion">
        @foreach(config('categories')['categories'] as $category)
            <div class="card">
                <div class="card-header" id="heading{{ $category['id'] }}">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $category['id'] }}" aria-expanded="true" aria-controls="collapse{{ $category['id'] }}">
                            {{ $category['name'] }}
                        </button>
                    </h2>
                </div>
                <div id="collapse{{ $category['id'] }}" class="collapse " aria-labelledby="heading{{ $category['id'] }}" data-parent="#categoriesAccordion">
                    <div class="card-body">
                        @if(isset($category['subcategories']))
                            @include('frontend.subcategories', ['subcategories' => $category['subcategories']])
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
