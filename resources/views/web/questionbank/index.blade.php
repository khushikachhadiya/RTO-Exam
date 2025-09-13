@extends('web.layouts.master')

@section('title', 'Question Bank')

@section('content')

    <!-- question answer section start -->
    <section class="sub-sections question-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="exam-test-content">
                        <h1 class="theme-color-fff">{{ __('questionbank.title') }}</h1>
                        <!-- <img src="assets/image/rto-banner-image.png" alt="rto-banner-image" class="img-fluid"> -->
                        <p class="fs-20px fw-300 mb-0">{{ __('questionbank.description') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sub-section">
        <div class="container">
            <div class="row g-3">
                <div class="col-12">
                    <ul class="nav nav-pills nav-fill gap-3 mb-5 question-nav" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active fw-700" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="pills-home" aria-selected="true">{{__('questionbank.questions')}}</button>
                        </li>
                        <li class="nav-item nav-secont-item" role="presentation">
                            <button class="nav-link sign-link traffic-content-space" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="true">{{__('questionbank.trafficSign')}}</button>
                        </li>
                    </ul>

                    <div class="tab-content question-tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active question-tab-info" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                            <div class="scroll-container" style="height:650px; overflow-y:auto;">
                                <div class="row g-4" id="questionContainer">
                                    <!-- Questions will be loaded dynamically here -->
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane traffic-sign-tab fade" id="profile" role="tabpanel"
                            aria-labelledby="profile-tab">
                            <div class="scroll-container-signs" style="height:650px; overflow-y:auto;">
                                <div class="row g-4" id="signContainer">
                                    <!-- Signs will be loaded dynamically here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- question answer section end -->


@endsection



@push('scripts')
    <script>
        $(document).ready(function () {

            // CSRF token globally for all AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });

            let offset = 0;
            let loading = false;
            let endReached = false;
            let language = $("#langselect").val();

            function loadQuestions() {
                if (loading || endReached) return;

                $.ajax({
                    url: "{{ route('loadQuestions') }}",
                    method: "POST",
                    data: { offset: offset, lang: language },
                    dataType: "json",
                    beforeSend: function () {
                        loading = true;
                    },
                    success: function (res) {
                        
                        if (res.count > 0) {
                            $("#questionContainer").append(res.html);
                            offset += res.count;
                        } else {

                            endReached = true;


                            // show message temporarily
                            let msg = $('<div class="col-12 text-center my-3 temp-msg"><i>{{__('questionbank.no_more_questions')}}</i></div>');
                            $("#questionContainer").append(msg);
                            setTimeout(function () {
                                msg.fadeOut(500, function () {
                                    $(this).remove();
                                });
                            }, 1000); // 1 sec

                        }

                        loading = false;
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX error:", error);
                        loading = false;
                    }
                });
            }

            loadQuestions();

            // Scroll event inside the container
            $(".scroll-container").on("scroll", function () {
                let $this = $(this);
                if ($this.scrollTop() + $this.innerHeight() >= this.scrollHeight - 20) {
                    loadQuestions();
                }
            });

            //  Signs 
            let signOffset = 0;
            let signLoading = false;
            let signEndReached = false;

            function loadSigns() {
                if (signLoading || signEndReached) return;

                $.ajax({
                    url: "{{ route('loadSigns') }}",
                    method: "POST",
                    data: { offset: signOffset, lang: language },
                    dataType: "json",
                    beforeSend: function () {
                        signLoading = true;
                    },
                    success: function (res) {
                        if (res.count > 0) {
                            $("#signContainer").append(res.html);
                            signOffset += res.count;
                        } else {
                            signEndReached = true;

                            // show message temporarily
                            let msg = $('<div class="col-12 text-center my-3 temp-msg"><i>{{__('questionbank.no_more_signs')}}</i></div>');
                            $("#signContainer").append(msg);
                            setTimeout(function () {
                                msg.fadeOut(500, function () {
                                    $(this).remove();
                                });
                            }, 3000); // 3 sec

                        }
                        signLoading = false;
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX error:", error);
                        signLoading = false;
                    }
                });
            }

            // Initial load
            loadSigns();

            // Scroll event inside sign container
            $(".scroll-container-signs").on("scroll", function () {
                let $this = $(this);
                if ($this.scrollTop() + $this.innerHeight() >= this.scrollHeight - 20) {
                    loadSigns();
                }
            });

        });
    </script>
@endpush