<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .card {
            border-radius: 1rem;
        }

        .card-title {
            font-size: 2rem;
            font-weight: 600;
        }

        .alert {
            font-size: 1.125rem;
            margin-bottom: 1rem;
        }

        .btn-lg {
            padding: 0.75rem 1.25rem;
            font-size: 1.125rem;
        }

        .form-control-lg {
            font-size: 1.125rem;
            padding: 0.75rem;
        }
    </style>
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow-lg border-0" style="width: 100%; max-width: 400px;">
        <div class="card-body p-4">
            <h1 class="card-title text-center mb-4">Payment Form</h1>

            <h4 class="text-center mb-4 text-muted">Total: ${{ number_format($price, 2) }}</h4>

            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger text-center">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('updatePaid') }}">
                @csrf
                <div class="mb-4">
                    <label for="payment_amount" class="form-label">Enter Payment Amount:</label>
                    <input type="number" id="payment_amount" name="payment_amount" class="form-control form-control-lg"
                        min="0.01" step="0.01" placeholder="Enter amount in USD" required>
                </div>

                <input type="hidden" id="price" name="price" value="{{ $price }}">

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Pay Now</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
