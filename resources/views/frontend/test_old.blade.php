<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Layout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .category-list {
            background-color: #f8f9fa;
            height: 100vh;
            padding: 0;
            overflow-y: auto; /* Enables scrolling */
        }

        .category-list .list-group-item {
            cursor: pointer;
        }

        .category-list .list-group-item.active {
            background-color: #dc3545;
            color: white;
        }

        .content {
            padding: 20px;
            background-color: #ffffff;
            border-left: 1px solid #dee2e6;
            overflow-y: auto; /* Enables scrolling */
            max-height: 100vh;
        }

        .content h5 {
            margin-bottom: 10px;
            font-weight: bold;
        }

        .content ul {
            padding-left: 20px;
        }

        .content ul li {
            line-height: 1.8;
        }

    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar for Categories -->
        <div class="col-md-2">
            <ul class="list-group category-list">
                <li class="list-group-item active" id="mobile-phone">Mobile phone / digital</li>
                <li class="list-group-item">Home appliances</li>
                <li class="list-group-item">Computer / Office</li>
                <li class="list-group-item">Home Textiles / Home Furnishing</li>
                <li class="list-group-item">Furniture / Home Decoration</li>
                <li class="list-group-item">Underwear / Men's wear / Women's wear</li>
                <li class="list-group-item">Bags / Watches / Jewelry</li>
                <li class="list-group-item">Sports / Outdoor / Men's Shoes / Women's Shoes</li>
                <li class="list-group-item">Car Supplies / Car Electrical Appliances</li>
                <li class="list-group-item">Mother and baby / Nursing and feeding</li>
                <li class="list-group-item">Toys and musical instruments</li>
                <li class="list-group-item">Household cleaning / Personal care</li>
                <li class="list-group-item">Books / Children's Books / Literature</li>
            </ul>
        </div>

        <!-- Content for Subcategories -->
        <div class="col-md-10">
            <div class="content">
                <!-- Buttons for Subcategory Channels -->
                <div class="btn-group mb-3" role="group">
                    <button type="button" class="btn btn-dark">3C Channel</button>
                    <button type="button" class="btn btn-dark">Mobile Channel</button>
                    <button type="button" class="btn btn-dark">Accessories Selection Center</button>
                    <button type="button" class="btn btn-dark">Smart Digital</button>
                </div>

                <!-- Subcategories for Mobile Phone -->
                <div class="row">
                    <div class="col-md-3">
                        <h5>Mobile phone</h5>
                        <ul class="list-unstyled">
                            <li>All mobile phones</li>
                            <li>5G mobile phone</li>
                            <li>Gaming Phone</li>
                            <li>Camera Phone</li>
                            <li>Full screen mobile phone</li>
                            <li>Elderly phone</li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5>Mobile phone storage</h5>
                        <ul class="list-unstyled">
                            <li>32GB</li>
                            <li>64GB</li>
                            <li>128GB</li>
                            <li>256GB</li>
                            <li>512GB</li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5>Mobile phone recommendation</h5>
                        <ul class="list-unstyled">
                            <li>Face Recognition</li>
                            <li>Fast charging</li>
                            <li>Screen fingerprint</li>
                            <li>Wireless charging</li>
                            <li>Rugged Phone</li>
                            <li>Long battery life</li>
                            <li>Ultra-high screen-to-body ratio</li>
                            <li>NFC</li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5>Mobile phone accessories</h5>
                        <ul class="list-unstyled">
                            <li>Phone Case/Protective Cover</li>
                            <li>Mobile phone film</li>
                            <li>Data cable</li>
                            <li>charger</li>
                            <li>Mobile Phone Headset</li>
                            <li>Fashionable toys</li>
                            <li>Mobile phone batteries</li>
                            <li>Apple peripherals</li>
                            <li>Qi Wireless Charging</li>
                            <li>Bluetooth Headset</li>
                            <li>Photo accessories</li>
                            <li>Mobile phone memory card</li>
                            <li>Mobile phone holder</li>
                            <li>Gamepad</li>
                            <li>Car Accessories</li>
                        </ul>
                    </div>
                </div>

                <!-- Additional Subcategories (Photography, Accessories) -->
                <div class="row mt-4">
                    <div class="col-md-3">
                        <h5>Photography and Videography</h5>
                        <ul class="list-unstyled">
                            <li>digital camera</li>
                            <li>Mirrorless camera</li>
                            <li>SLR camera</li>
                            <li>Polaroid</li>
                            <li>Action Camera</li>
                            <li>Camera</li>
                            <li>Lenses</li>
                            <li>Studio Equipment</li>
                            <li>Outdoor equipment</li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5>Digital accessories</h5>
                        <ul class="list-unstyled">
                            <li>Handheld Stabilizer</li>
                            <li>Memory Card</li>
                            <li>Tripod/Pan Head</li>
                            <li>Camera Bags</li>
                            <li>Filters</li>
                            <li>Flash/handle</li>
                            <li>Battery/Charger</li>
                            <li>Body accessories</li>
                            <li>Card reader</li>
                            <li>Camera cleaning/film</li>
                            <li>Lens accessories</li>
                            <li>Digital Stand</li>
                        </ul>
                    </div>
                    <!-- Additional columns as needed -->
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('.list-group-item').hover(function() {
            // Remove active class from all list items
            $('.list-group-item').removeClass('active');
            // Add active class to the hovered list item
            $(this).addClass('active');

            // Get the target subcategory content ID
            var target = $(this).data('target');

            // Hide all subcategory contents
            $('.subcategory-content').removeClass('active');

            // Show the targeted subcategory content
            $('#' + target + '-content').addClass('active');
        });
    });

</script>
</body>
</html>
