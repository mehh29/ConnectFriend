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
        body {
            background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .card {
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 1.75rem;
            color: #333;
        }

        .form-control {
            border-radius: 10px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .form-check-input {
            border-radius: 50%;
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 10px;
            transition: background 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
        }

        .alert-danger {
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <div class="card shadow-sm" style="width: 100%; max-width: 600px;">
        <div class="card-body">
            <h1 class="card-title text-center mb-4">Register</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('/register') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}"
                        required autofocus>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                        required>
                </div>

                <div class="mb-3">
                    <label for="gender" class="form-label">Gender:</label>
                    <select id="gender" name="gender" class="form-select" required>
                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="linkedin_username" class="form-label">LinkedIn Username:</label>
                    <input type="text" id="linkedin_username" name="linkedin_username" class="form-control"
                        value="{{ old('linkedin_username') }}" required>
                </div>

                <div class="mb-3">
                    <label for="fields_of_work" class="form-label">Fields of Work:</label>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="fields_of_work[]" value="Technology"
                            {{ in_array('Technology', old('fields_of_work', [])) ? 'checked' : '' }}>
                        <label class="form-check-label">Technology</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="fields_of_work[]" value="Health"
                            {{ in_array('Health', old('fields_of_work', [])) ? 'checked' : '' }}>
                        <label class="form-check-label">Health</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="fields_of_work[]" value="Education"
                            {{ in_array('Education', old('fields_of_work', [])) ? 'checked' : '' }}>
                        <label class="form-check-label">Education</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="fields_of_work[]" value="Finance"
                            {{ in_array('Finance', old('fields_of_work', [])) ? 'checked' : '' }}>
                        <label class="form-check-label">Finance</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="fields_of_work[]" value="Art"
                            {{ in_array('Art', old('fields_of_work', [])) ? 'checked' : '' }}>
                        <label class="form-check-label">Art</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="mobile_number" class="form-label">Mobile Number:</label>
                    <input type="text" id="mobile_number" name="mobile_number" class="form-control"
                        value="{{ old('mobile_number') }}" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
