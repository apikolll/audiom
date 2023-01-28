@extends('question.layout')

@section('questions')

<style>
    .unactive {
        display: none;
    }
</style>

<section class="pt-5">
    <div class="container">
        <div class="card fs-5" style="width: 100%;max-width:800px;margin:auto;">
            <div class="card-body">
                <div class="card-body">
                    <div class="card-title"><span class="fw-bold">Question 1</span></div>
                    <div class="card-text">
                        <label class="form-label"></label>
                        <label for="exampleFormControlTextarea1" class="form-label">The main problem or reason you were
                            referred to the hearing clinic:</label>
                        <textarea class="form-control border-primary" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>
                </div>

                <div class="card-body">
                    <div class="card-title">Question 2</div>
                    <div class="card-text">
                        <label class="form-label"></label>
                        <label for="exampleFormControlTextarea1" class="form-label">Does your child having hearing
                            problem
                            ?</label>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="yes"
                                    value="Yes">
                                <label class="form-check-label" for="yes">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="no" value="No">
                                <label class="form-check-label" for="no">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="card-body unactive" id="ques">
                    <div class="card-text">
                        <label class="form-label"></label>
                        <label for="exampleFormControlTextarea1" class="form-label">Since when ?</label>
                        <textarea class="form-control border-primary" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                        <label class="form-label"></label>
                        <label for="exampleFormControlTextarea1" class="form-label">Effect in daily life</label>
                        <textarea class="form-control border-primary" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>
                </div> --}}
                <div class="card-body">
                    <div class="card-title">Question 3</div>
                    <div class="card-text">
                        <label class="form-label"></label>
                        <label for="exampleFormControlTextarea1" class="form-label">Have your child done a test
                            before?</label>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="yes"
                                    value="Yes">
                                <label class="form-check-label" for="yes">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="no" value="No">
                                <label class="form-check-label" for="no">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-title">Question 4</div>
                    <div class="card-text">
                        <label class="form-label"></label>
                        <label for="exampleFormControlTextarea1" class="form-label">Does your child have any symtoms as
                            below?</label>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="yes"
                                    value="Yes">
                                <label class="form-check-label" for="yes">
                                    A
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="no" value="No">
                                <label class="form-check-label" for="no">
                                    B
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="no" value="No">
                                <label class="form-check-label" for="no">
                                    C
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="no" value="No">
                                <label class="form-check-label" for="no">
                                    D
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="card-title">Question 5</div>
                <div class="card-text">
                    <label class="form-label"></label>
                    <label for="exampleFormControlTextarea1" class="form-label">Have you ever had health problem before
                        as below?</label>
                    <div class="d-flex gap-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="no" value="No">
                            <label class="form-check-label" for="no">
                                Brain infection
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="no" value="No">
                            <label class="form-check-label" for="no">
                                Sawan
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="no" value="No">
                            <label class="form-check-label" for="no">
                                Jaundice
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="no" value="No">
                            <label class="form-check-label" for="no">
                                Head/neck trauma
                            </label>
                        </div>
                        
                    </div>
                    <textarea class="form-control border-primary" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
            <div class="card-body">
                <div class="card-title">Question 6</div>
                <div class="card-text">
                    <label class="form-label"></label>
                    <label for="exampleFormControlTextarea1" class="form-label">The main problem or reason you were
                        referred to the hearing clinic:</label>
                    <textarea class="form-control border-primary" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
            <div class="card-body">
                <div class="card-title">Question 7</div>
                <div class="card-text">
                    <label class="form-label"></label>
                    <label for="exampleFormControlTextarea1" class="form-label">The main problem or reason you were
                        referred to the hearing clinic:</label>
                    <textarea class="form-control border-primary" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
            <div class="card-body">
                <div class="card-title">Question 8</div>
                <div class="card-text">
                    <label class="form-label"></label>
                    <label for="exampleFormControlTextarea1" class="form-label">The main problem or reason you were
                        referred to the hearing clinic:</label>
                    <textarea class="form-control border-primary" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
            <div class="card-body">
                <div class="card-title">Question 9</div>
                <div class="card-text">
                    <label class="form-label"></label>
                    <label for="exampleFormControlTextarea1" class="form-label">The main problem or reason you were
                        referred to the hearing clinic:</label>
                    <textarea class="form-control border-primary" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
            <div class="card-body">
                <div class="card-title">Question 10</div>
                <div class="card-text">
                    <label class="form-label"></label>
                    <label for="exampleFormControlTextarea1" class="form-label">The main problem or reason you were
                        referred to the hearing clinic:</label>
                    <textarea class="form-control border-primary" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
            <div class="card-body">
                <div class="card-title">Question 11</div>
                <div class="card-text">
                    <label class="form-label"></label>
                    <label for="exampleFormControlTextarea1" class="form-label">The main problem or reason you were
                        referred to the hearing clinic:</label>
                    <textarea class="form-control border-primary" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $('#yes').on('click', function(){
            $('#ques').removeClass('unactive')
        })
        $('#no').on('click', function(){
            $('#ques').addClass('unactive')
        })
    });
</script>

@endsection