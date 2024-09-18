<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Card Layout with Full-Height Body</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    html, body {
      height: 100%; /* Ensures the page takes up full height */
    }
    .container {
      height: 100%; /* Ensures the container takes up full height */
    }
    .custom-card {
      margin-top: 70px;
      display: flex;
      flex-direction: column;
      height: calc(100vh - 70px); /* Full height minus the margin */
    }
    .card-header, .card-footer {
      height: 40px; /* Fixed height for header and footer */
      line-height: 40px; /* Aligns text vertically */
    }
    .card-body {
      flex-grow: 1; /* Allows the body to take up the remaining space */
      overflow-y: auto; /* Enables vertical scroll if content exceeds the body */
    }
  </style>
</head>
<body>

<div class="container">
  <div class="card custom-card">
    <div class="card-header d-flex justify-content-between">
      <h5 class="card-title">Card Title</h5>
      <button class="btn btn-primary">Action</button>
    </div>
    <div class="card-body">
      <p>This is some text inside the card body. This content will scroll if it overflows the height.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
      <p>Another paragraph of text to simulate scrolling. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <p>More content to ensure scrolling functionality works. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
      <p>More text to fill the card body for scrolling.</p>
    </div>
    <div class="card-footer">
      Footer Content
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
