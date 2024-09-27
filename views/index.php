<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card border-0 mx-auto w-50">
            <div class="card-header bg-white border-0">
                <h1 class="display-4 fw-bold text-center text-primary">LOGIN <i class="fa-solid fa-right-to-bracket"></i></h1>
            </div>
            <div class="card-body">
                <form action="../actions/user-actions.php" method="post" class="w-75 mx-auto">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
                </form>
                <div class="text-center mt-3">
                    <a href="registration.php">Register</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
