<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow-lg border-0 rounded-4" style="width: 100%; max-width: 500px;">
        <div class="card-body text-center p-5">
            <!-- Updated icon -->
            <div class="mb-4">
                <i class="bi bi-exclamation-triangle" style="font-size: 4rem; color: #ffc107;"></i>
            </div>

            <h1 class="card-title mb-3 fs-4 fw-bold">Overpayment Detected</h1>
            <p class="mb-4 fs-5 text-muted">You have overpaid <strong>${{ number_format($amount, 2) }}</strong>. Would you like to apply this amount to your wallet?</p>

            <form method="POST" action="{{ route('process.overpayment') }}">
                @csrf
                <input type="hidden" name="amount" value="{{ $amount }}">
                <input type="hidden" name="payment_amount" value="{{ $payment_amount }}">
                <input type="hidden" name="price" value="{{ $price }}">

                <div class="d-grid gap-3">
                    <button type="submit" name="action" value="accept" class="btn btn-success btn-lg">Yes, add to wallet</button>
                    <button type="submit" name="action" value="decline" class="btn btn-outline-warning btn-lg">No, correct amount</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
