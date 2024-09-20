<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keyword Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <!-- Keyword Search -->
    <div class="card p-3">
        <h5 class="card-title">Keyword search</h5>
        
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Select a keyword below or type here">
        </div>

        <!-- Keyword Buttons -->
        <div class="mb-3">
            <button class="btn btn-outline-secondary mb-2">+ Pool</button>
            <button class="btn btn-outline-secondary mb-2">+ Water front</button>
            <button class="btn btn-outline-secondary mb-2">+ Basement</button>
            <button class="btn btn-outline-secondary mb-2">+ Gated</button>
            <button class="btn btn-outline-secondary mb-2">+ Pond</button>
        </div>

        <small class="text-muted">
            Note: To increase accuracy, the keyword filter suggests the most commonly searched terms. Results may vary.
        </small>
    </div>

    <!-- Commute section (collapsible) -->
    <div class="mt-3">
        <div class="accordion" id="accordionCommute">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingCommute">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCommute" aria-expanded="false" aria-controls="collapseCommute">
                        Commute
                    </button>
                </h2>
                <div id="collapseCommute" class="accordion-collapse collapse" aria-labelledby="headingCommute" data-bs-parent="#accordionCommute">
                    <div class="accordion-body">
                        <!-- Commute content goes here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reset and View Results -->
    <div class="d-flex justify-content-between mt-4">
        <button class="btn btn-light">Reset</button>
        <button class="btn btn-dark">View 34 results</button>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
