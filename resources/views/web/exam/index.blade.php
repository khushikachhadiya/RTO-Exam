@extends('web.layouts.master')

@section('title', 'Exam')

@section('content')

    <!-- online exam section start -->
    <section class="sub-sections question-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="exam-test-content exam-change-position">
                        <h1 class="theme-color-fff">Online Driving Licence Computer Test Exam - RTO Exam</h1>
                        <p class="fs-20px fw-300 mb-0">Time and question bound test exactly same as actual RTO test</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- online exam section end -->


    <!-- quiz section start -->
    <section class="quiz-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="quiz-content-info">


                        {{-- question card --}}
                        @foreach ($questions as $index => $q)

                            <div class="card quiz-card mb-3" data-correct="{{ $q->answer }}">

                                <div class="card-body quiz-card-body">
                                    <form class="question-answer p-0" id="question-answer">
                                        <div class="easy-to-use d-flex gap-2 align-items-center">

                                            {{-- Timer --}}
                                            <span class="quiz-time fs-14px timer" id="timer-{{ $index }}">30s</span>

                                            <p class="card-text mb-0 theme-color-161616 fs-18px">
                                                {{ $loop->iteration }}. {{ $q->question }}
                                            </p>

                                            @if($q->image)
                                                <div class="my-3 text-center">
                                                    <img src="{{ asset('assets/image/ts-upload/ts-' . $q->image) }}"
                                                        alt="Question Image" class="img-fluid rounded"
                                                        style="max-width: 100px; max-height: 200px; object-fit: contain;">
                                                </div>
                                            @endif
                                        </div>

                                        {{-- Options --}}
                                        <label class="click-answer">
                                            <input type="radio" name="q{{ $index }}" value="{{ $q->option_a }}" class="d-none">
                                            <div class="select-answer d-flex align-items-center p-3">
                                                <div class="click-with fs-14px">A</div>
                                                <div class="option-texta">{{ $q->option_a }}</div>
                                            </div>
                                        </label>

                                        <label class="click-answer">
                                            <input type="radio" name="q{{ $index }}" value="{{ $q->option_b }}" class="d-none">
                                            <div class="select-answer d-flex align-items-center p-3">
                                                <div class="click-with fs-14px">B</div>
                                                <div class="option-texta">{{ $q->option_b }}</div>
                                            </div>
                                        </label>

                                        <label class="click-answer">
                                            <input type="radio" name="q{{ $index }}" value="{{ $q->option_c }}" class="d-none">
                                            <div class="select-answer d-flex align-items-center p-3">
                                                <div class="click-with fs-14px">C</div>
                                                <div class="option-texta">{{ $q->option_c }}</div>
                                            </div>
                                        </label>


                                        <div class="errorExam my-2" style="display:none"> You Have Not Select The Answer
                                        </div>

                                        <div class="question-number d-flex align-items-center justify-content-between">
                                            <p class="display-number mb-0 theme-color-161616 fw-600">
                                                Question {{ $loop->iteration }}/{{ $questions->count() }}</p>

                                            <div class="true-false-btn gap-2 d-flex">
                                                <a class="true-btn d-flex justify-content-between" data-bs-toggle="modal"
                                                    href="#">
                                                    <span class="true-answer"><i class="fa-solid fa-check"></i></span>
                                                    <span class="true-answer-counter">0</span>
                                                </a>

                                                <a class="false-btn d-flex justify-content-between" data-bs-toggle="modal"
                                                    href="#">
                                                    <span class="true-answer"><i class="fa-solid fa-xmark"></i></span>
                                                    <span class="wrong-answer-counter">0</span>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card quiz-card card-position"></div>
                        @endforeach
                    </div>

                    {{-- Next button --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="next-button text-center mt-4 pt-2">
                                <a type="submit" form='question-answer' class="next" id="next">Next
                                    <i class="fa-solid fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- quiz section end -->


    <!-- result section start -->
    <section class="result-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="quiz-content-info">
                        <div class="card quiz-card">
                            <div class="card-body quiz-card-body">
                                <div class="easy-to-use d-flex align-items-center center">
                                    <div>
                                        <p class="card-text" id="result-text"> Exam is Successfully Completed. </p>
                                        <h2 class="card-text" id="passed-text">Passed</h2>
                                        <h2 class="card-text" id="failed-text">Failed </h2>
                                        <p class="card-text" id="correct_answer">Correct Answers: </p>
                                        <p class="card-text" id="wrong_answer">Wrong Answers: </p>

                                        <div
                                            class="d-flex align-items-center justify-content-center gap-3 flex-column flex-ms-row">
                                            <a class="r-submit w-100 text-center fw-300" href="#">Home</a>
                                            <a class="r-submit w-100 text-center fw-300" href="#">ScoreBoard</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card quiz-card card-position"></div>
                    </div>
                </div>
            </div>
            <div class="next-question-btn">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-6">

                        <div
                            class="d-flex align-items-center justify-content-center flex-column flex-ms-row next-button gap-3">
                            
                            <a href="#" class="next text-center">
                                <p class="mb-0">Retake Exam </p> <i class="fa-solid fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- result section end -->

    <!--ScoreBoard Section start -->
    <!-- ScoreBoard Heading section start -->
    <section class="sub-sections ScoreBoard-section" id="ScoreBoard-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="exam-test-content exam-change-position ScoreBoard-main">
                        <h1 class="theme-color-fff">ScoreBoard</h1>
                        <!-- <img src="assets/image/rto-banner-image.png" alt="rto-banner-image" class="img-fluid"> -->
                        <p class="fs-20px fw-300 mb-0">Time and question bound test exactly same as actual RTO test</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ScoreBoard Heading section end -->
    <br>
    <!-- ScoreBoard Question&Answer section start -->
    <section class="ScoreBoard-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="quiz-content-info">
                        <div class="card quiz-card">
                            <div class="card-body quiz-card-body">
                                <div class="easy-to-use d-flex align-items-center">
                                    <div class="scoreboard-text" id="scoreboard-text">
                                        <p class="card-text" id="que-text"> </p>
                                        <p class="img-text" id="img-text"> </p>
                                        <p class="card-text" id="CAns-text"> </p>
                                        <p class="card-text" id="UAns-text"> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card quiz-card card-position"></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6 mt-4">
                    <div class="d-flex align-items-center flex-column flex-ms-row justify-content-center gap-3">
                        <a class="r-submit fw-300" href="#">Home</a>
                        <a class="r-submit fw-300" href="#">Try Again</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ScoreBoard Question&Anser section end -->
    <!--ScoreBoard Section end -->
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {

            let currentIndex = 0;
            let totalQuestions = $(".quiz-card[data-correct]").length;
            let correctCount = 0;
            let wrongCount = 0;
            let timer;
            let timeleft = 3;


            //show only first question
            $(".quiz-card[data-correct]").hide();
            $(".quiz-card[data-correct]").eq(currentIndex).show();


            function updateTimer() {
                $("#timer-" + currentIndex).text(timeleft + "s");
            }

            function startTimer() {
                timeleft = 3; //reset for each questions
                updateTimer();
                timer = setInterval(function () {
                    timeleft--;
                    updateTimer();
                    if (timeleft < 0) {
                        clearInterval(timer);
                        checkAnswer(true); //auto move when timer run out
                    }
                }, 1000);
            }

            function checkAnswer(auto = false) {
                let currentCard = $(".quiz-card[data-correct]").eq(currentIndex);
                let correctAnswer = currentCard.data("correct");
                let selected = currentCard.find("input[type=radio]:checked").val();

                if (!selected && !auto) {
                    currentCard.find(".errorExam").show();
                    return;
                } else {
                    currentCard.find(".errorExam").hide();
                }

                //counters
                if (selected == correctAnswer) {
                    correctCount++;
                    $(".true-answer-counter").text(correctCount);
                } else {
                    wrongCount++;
                    $(".wrong-answer-counter").text(wrongCount);
                }

                // Move to next
                clearInterval(timer);
                currentIndex++;
                if (currentIndex < totalQuestions) {
                    $(".quiz-card[data-correct]").hide();
                    $(".quiz-card[data-correct]").eq(currentIndex).show();
                    startTimer();
                } else {
                    showResult();
                }
            }

            // Next button
            $("#next").click(function (e) {
                e.preventDefault();
                checkAnswer();
            });

            function showResult() {
                $(".quiz-section").hide();
                $(".result-section").show();
                $("#correct_answer").text("Correct Answers: " + correctCount);
                $("#wrong_answer").text("Wrong Answers: " + wrongCount);

                if (correctCount >= (totalQuestions / 2)) {
                    $("#passed-text").show();
                    $("#failed-text").hide();
                } else {
                    $("#failed-text").show();
                    $("#passed-text").hide();
                }
            }
            // when user selects an option -> clear error
            $("input[type=radio]").on("change", function () {
                $(".errorExam").hide();
            });


            // Initially hide result
            $(".result-section").hide();
            $("#passed-text").hide();
            $("#failed-text").hide();

            startTimer();

        });
    </script>
@endpush