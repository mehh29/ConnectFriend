@extends('layout.navbar')

@section('title', 'Friend Requests')
@section('activeRequest', 'active')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="container">
        <h3 class="my-4 text-primary">Friend Requests</h3>
        <div class="row">
            @foreach ($friendRequest as $user)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-0 rounded-3">
                        <img src="{{ asset('storage/' . $user->profile_path) }}" alt="{{ $user->name }}'s profile"
                            class="card-img-top img-fluid rounded-top-3" style="object-fit: cover; height: 250px;">
                        <div class="card-body d-flex flex-column bg-light rounded-bottom-3">
                            <h5 class="card-title text-center text-primary">{{ $user->name }}</h5>
                            <p class="card-text text-center text-muted">{{ $user->fields_of_work }}</p>
                            <div class="mt-auto">
                                <form method="POST" action="{{ route('friend.store') }}" class="mb-2">
                                    @csrf
                                    <input type="hidden" name="request_id" value="{{ $user->request_id }}">
                                    <input type="hidden" name="friend_id" value="{{ $user->id }}">
                                    <button type="submit" class="btn btn-success w-100 rounded-3">Accept</button>
                                </form>
                                <form method="POST" action="{{ route('friend-request.destroy', $user->request_id) }}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger w-100 rounded-3">Decline</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
