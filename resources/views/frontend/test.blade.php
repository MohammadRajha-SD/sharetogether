<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Styled Amount Selector</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-select-wrapper {
            display: flex;
            align-items: center;
            max-width: 400px;
            margin: 20px auto;
        }
        .custom-select-wrapper select,
        .custom-select-wrapper input {
            margin: 0 5px;
        }
        .custom-select-wrapper input {
            display: none; /* Hide custom input by default */
        }
        .custom-select-wrapper.show-custom input {
            display: block; /* Show custom input when needed */
        }
        .custom-select-wrapper .form-control {
            width: 100%;
=======
    <title>Property Type Dropdown</title>
    <!-- Bootstrap 4.1 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .dropdown-menu-custom {
            padding: 20px;
            width: 300px; /* Custom width */
        }

        .property-option {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            cursor: pointer;
            border-radius: 5px;
        }

        .property-option:hover {
            background-color: #f0f0f0;
        }

        .property-option.active {
            background-color: #333;
            color: #fff;
>>>>>>> origin/main
        }
    </style>
</head>
<body>
<<<<<<< HEAD
<div class="container">
    <div class="custom-select-wrapper">
        <select id="amount-select" class="form-control">
            <option value="" disabled selected>Select amount</option>
            <!-- Options will be added by jQuery -->
        </select>
        <input type="number" id="custom-amount" class="form-control" placeholder="Enter amount">
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        // Populate the select options
        for (let amount = 60000; amount <= 500000; amount += 10000) {
            $('#amount-select').append(
                `<option value="${amount}">${amount.toLocaleString()}</option>`
            );
        }

        // Toggle custom input visibility based on selection
        $('#amount-select').on('change', function() {
            if ($(this).val() === "") {
                $('.custom-select-wrapper').addClass('show-custom');
                $('#custom-amount').focus();
            } else {
                $('.custom-select-wrapper').removeClass('show-custom');
                $('#custom-amount').val(''); // Clear custom input if option is selected
            }
=======
<div class="container my-5">
    <div class="dropdown">
        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
            Property Type
        </button>
        <div class="dropdown-menu dropdown-menu-custom" aria-labelledby="dropdownMenuButton">
            <div class="d-flex justify-content-between mb-3">
                <span>Property Type</span>
                <a href="#" id="doneBtn" class="text-primary">Done</a>
            </div>
            <div class="row">
                <div class="col-6 mb-2">
                    <div class="property-option active" data-value="Any">Any</div>
                </div>
                <div class="col-6 mb-2">
                    <div class="property-option" data-value="House">House</div>
                </div>
                <div class="col-6 mb-2">
                    <div class="property-option" data-value="Condo">Condo</div>
                </div>
                <div class="col-6 mb-2">
                    <div class="property-option" data-value="Townhome">Townhome</div>
                </div>
                <div class="col-6 mb-2">
                    <div class="property-option" data-value="Multi Family">Multi Family</div>
                </div>
                <div class="col-6 mb-2">
                    <div class="property-option" data-value="Mobile">Mobile</div>
                </div>
                <div class="col-6 mb-2">
                    <div class="property-option" data-value="Farm">Farm</div>
                </div>
                <div class="col-6 mb-2">
                    <div class="property-option" data-value="Land">Land</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 4.1 JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function () {
        var selectedProperty = 'Any'; // Default value

        // Handle click on property options
        $('.property-option').on('click', function () {
            // Remove active class from other options
            $('.property-option').removeClass('active');

            // Add active class to clicked option
            $(this).addClass('active');

            // Update selectedProperty value
            selectedProperty = $(this).data('value');
        });

        // Prevent dropdown from closing on property option click
        $('.dropdown-menu').on('click', function (e) {
            e.stopPropagation();
        });

        // Handle click on Done button
        $('#doneBtn').on('click', function (e) {
            e.preventDefault();

            // Update the dropdown text with the selected property type
            $('#dropdownMenuButton').text(selectedProperty);

            // Close the dropdown
            $('#dropdownMenuButton').dropdown('toggle');
>>>>>>> origin/main
        });
    });
</script>
</body>
</html>
