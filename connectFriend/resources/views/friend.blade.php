@extends('layout.navbar')

@section('title', 'Friends')
@section('activeFriend', 'active')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="container">
        <h3 class="my-4 text-primary">Your Friends</h3>
        <div class="row">
            @foreach ($dataFriend as $user)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-0 rounded-3">
                        <img src="{{ asset('storage/' . $user->profile_path) }}" alt="{{ $user->name }}'s profile"
                            class="card-img-top rounded-top-3 img-fluid" style="object-fit: cover; height: 250px;">
                        <div class="card-body d-flex flex-column bg-light rounded-bottom-3">
                            <h5 class="card-title text-center text-dark">{{ $user->name }}</h5>
                            <p class="card-text text-center text-muted">{{ $user->fields_of_work }}</p>
                            <a href="{{ route('message.show', $user->id) }}" class="btn btn-primary mt-auto w-100 rounded-3 d-flex align-items-center justify-content-center">
                                <i class="bi bi-chat-dots me-2"></i>Message
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
