@extends('patient.sidebar-patient')

@section('content1')

<div class="text-center text-light">
    <h3 class="display-3 fw-bold">Change password</h3>
</div>
<a href="{{ URL::previous() }}" class="btn btn-primary mb-3"><i class="bi bi-chevron-left"></i> Back</a>

<section class="p-5 text-dark shadow-lg bg-light border border-dark rounded-4 border-opacity-10 fs-6">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @elseif (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif
    <form action="{{ route('update.patient.password') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md">
                <div class="form-group">
                    <label class="form-label">Old password</label>
                    <input class="form-control" type="password" name="old_password" required>
                    @error('old_password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md">
                <div class="form-group">
                    <label class="form-label">New password</label>
                    <input class="form-control" type="password" name="new_password" required>
                </div>
                @error('new_password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md">
                <div class="form-group">
                    <label class="form-label">Confirm new password</label>
                    <input class="form-control" type="password" name="new_password_confirmation" required>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <button class="btn btn-outline-primary mt-3 px-4">Change password</button>
        </div>
    </form>
</section>
@endsection