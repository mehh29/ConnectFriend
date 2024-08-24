@extends('layout.navbar')

@section('title', 'Messages')
@section('activeMessage', 'active')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card chat-room shadow-sm border-0 rounded-4">
                    <div class="card-body p-3">
                        <div class="chat-messages" style="height: 400px; overflow-y: auto;">
                            @foreach ($messages as $msg)
                                <div class="d-flex {{ $msg->sender_id === auth()->user()->id ? 'justify-content-end' : 'justify-content-start' }} mb-3">
                                    <div class="message p-3 rounded-4 {{ $msg->sender_id === auth()->user()->id ? 'bg-primary text-white' : 'bg-light text-dark' }}" style="max-width: 75%;">
                                        <p class="mb-1">{{ $msg->message }}</p>
                                        <small class="text-muted d-block text-end">{{ $msg->created_at ? $msg->created_at->format('H:i') : '--' }}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('message.store') }}" class="mt-3">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="new_message" class="form-control rounded-start border-0 shadow-sm" placeholder="Type a message..." required>
                        <input type="hidden" name="friend_id" value="{{ $friend->id }}">
                        <button type="submit" class="btn btn-primary rounded-end d-flex align-items-center">
                            <i class="bi bi-send me-2"></i> Send
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
