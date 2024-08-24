@extends('layout.navbar')

@section('title', 'Home')
@section('activeHome', 'active')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="container">
        <h3 class="my-4 text-primary">Notifications</h3>
        <div class="alert alert-light p-4 shadow-sm" style="border-left: 5px solid #007bff;">
            <ul class="list-unstyled mb-0">
                @forelse (Auth::user()->notifications as $notification)
                    <li class="mb-3 d-flex align-items-center">
                        <span class="me-3">{{ $notification->data['message'] }}</span>
                        <a href="{{ route('notifications.destroy', $notification->id) }}"
                            class="btn btn-danger btn-sm ms-auto"
                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $notification->id }}').submit();">
                            <i class="bi bi-x-circle"></i>
                        </a>

                        <form id="delete-form-{{ $notification->id }}"
                            action="{{ route('notifications.destroy', $notification->id) }}" method="POST"
                            style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </li>
                @empty
                    <li class="text-center">No new notifications</li>
                @endforelse
            </ul>
        </div>

        <div class="row mt-5">
            <!-- Search Form -->
            <form method="GET" action="{{ route('user.index') }}" class="mb-5 w-100">
                <div class="input-group">
                    <input type="text" name="search" class="form-control rounded-start border-secondary" placeholder="Search by name"
                        value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary rounded-end">Search</button>
                </div>
            </form>

            @foreach ($dataUser as $user)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-0 rounded-4">
                        <img src="{{ asset('storage/' . $user->profile_path) }}" alt="{{ $user->name }}'s profile"
                            class="card-img-top rounded-top-4 img-fluid" style="object-fit: cover; height: 250px;">
                        <div class="card-body d-flex flex-column bg-light">
                            <h5 class="card-title text-primary">{{ $user->name }}</h5>
                            <p class="card-text text-muted">{{ $user->fields_of_work }}</p>
                            <form method="POST" action="{{ route('friend-request.store') }}" class="mt-auto">
                                @csrf
                                <input type="hidden" name="receiver_id" value="{{ $user->id }}">
                                <button type="submit" class="btn btn-success w-100">Send Request</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
