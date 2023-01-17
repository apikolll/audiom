@extends('staff.sidebar')

@section('content1')
    <div class="p-5">
        <img src="{{ Storage::url(auth()->user()->staff->image) }}" style="width:100px;height:100px;" alt="IDK">
        {{-- <h4>{{ $staff->image }}</h4> --}}
    </div>
@endsection

{{-- storage/images/COuXPN4CP1kEStb1zJQp1AEmdnl4tRvPzWVXlh0R.jpg --}}