@extends('staff.sidebar')

@section('content1')

<style>
    label{
        font-weight: 600;
        font-size: 16px;

    }
</style>

<div class="text-center text-light">
    <h3 class="display-3 fw-bold">Change password</h3>
</div>
<a href="{{ URL::previous() }}" class="btn btn-primary mb-3"><i class="bi bi-chevron-left"></i> Back</a>

<section class="p-5 text-dark fs-5 shadow-lg bg-light border border-dark rounded-4 border-opacity-10">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @elseif (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif
    <form action="{{ route('update.password') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md">
                <div class="form-group">
                    <label class="mb-2">Old Password:</label>
                    <input class="form-control bg-light" type="password" name="old_password" required>
                    @error('old_password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md">
                <div class="form-group">
                    <label class="mb-2">New Password:</label>
                    <input class="form-control bg-light" type="password" name="new_password" required>
                </div>
                @error('new_password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md">
                <div class="form-group">
                    <label class="mb-2">Confirm New Password:</label>
                    <input class="form-control bg-light" type="password" name="new_password_confirmation" required>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <button class="btn btn-success mt-3 px-4 shadow">Change password</button>
        </div>
    </form>
</section>
@endsection