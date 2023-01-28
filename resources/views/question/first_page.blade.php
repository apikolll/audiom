@extends('question.layout')

@section('questions')

<section class="pt-5 mb-3">
    <div class="container">
        <div class="mb-5">
            <div class="text-center">
                <p class="lead text-light display-5 fw-light">Patient is</p>
            </div>
        </div>
        <div class="d-flex gap-3 justify-content-center">
            <a href="{{ route('question.chidlform') }}" class="btn w-50 p-3 btn-primary fs-5">A Child</a>
            <a href="{{ route('question.adultform') }}" class="btn w-50 p-3 btn-primary fs-5">An Adult</a>
                      
        </div>

        <form action="{{ route('question.store') }}" method="post">
            @csrf
            <input type="text" name="question[]" class="form-check" placeholder="Question">
            <input type="text" name="answers[][nenen]" class="form-check" placeholder="Answers1">
            <input type="text" name="answers[][answer]" class="form-check" placeholder="Answers2">
            <input type="text" name="answers[][answer]" class="form-check" placeholder="Answers3">
            <input type="text" name="answers[][answer]" class="form-check" placeholder="Answers4">
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
</section>

@endsection