<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="msapplication-tap-highlight" content="no">
    <title>Dalda Foundation</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    {{-- <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="/assets/vendors/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="/assets/vendors/jquery-ui/jquery-ui.theme.min.css">
    {{-- <link rel="stylesheet" href="/assets/vendors/simple-line-icons/css/simple-line-icons.css"> --}}
    {{-- <link rel="stylesheet" href="/assets/vendors/fontawesome/css/all.min.css"> --}}
    {{-- <link rel="stylesheet" href="/assets/vendors/flags-icon/css/flag-icon.min.css"> --}}
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/css/scroll-to-top.css">
    @stack('styles')
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        {{-- <div class="se-pre-con" style="display: none;">
            <div class="loader"></div>
        </div> --}}

        @include('frontend.layouts.top_bar')

        <div class="app-main content">

            @include('frontend.layouts.side_bar')

            <div class="app-main__outer">
                <div class="app-main__inner">
                    @include('partials.announcement')

                    @yield('content')

                    <button class="scroll-top scroll-to-target" data-target="html">
                        <span class="fa fa-arrow-up"></span>
                    </button>

                </div>
            </div>
        </div>
        @include('frontend.layouts.footer')
        <!-- jQuery  -->
            <script src="/assets/vendors/jquery/jquery-3.3.1.min.js"></script>
            <script src="/assets/vendors/jquery-ui/jquery-ui.min.js"></script>
            {{-- <script src="/assets/vendors/moment/moment.js"></script> --}}
            {{-- <script src="/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
            {{-- <script src="/assets/vendors/slimscroll/jquery.slimscroll.min.js"></script> --}}
            <script src="/assets/js/app.js"></script>
            {{-- <script src="/js/scroll-to-top.js"></script> --}}
            @stack('scripts')
            <script>
                (function() {
                    'use strict';
                    window.addEventListener('load', function() {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('needs-validation');
                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function(form) {
                            form.addEventListener('submit', function(event) {
                                if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }
                                form.classList.add('was-validated');
                            }, false);
                        });
                    }, false);
                })();
                window.laravel_echo_port = '{{ env('LARAVEL_ECHO_PORT') }}';
            </script>
            {{-- <script src="//{{ Request::getHost() }}:{{ env('LARAVEL_ECHO_PORT') }}/socket.io/socket.io.js"></script>
            <script src="{{ url('/js/laravel-echo-setup.js') }}" type="text/javascript"></script> --}}

            <script type="text/javascript">

                // console.clear();
                setInterval(function() {
                    if ($("div.alert-danger").length > 0 || $("div.alert-success").length > 0) {
                        setTimeout(function() {
                            $("div.alert-danger").remove();
                            $("div.alert-success").remove();
                        }, 10000);
                    }
                }, 10000);
                if (typeof(io) != 'undefined') {
                    window.Echo.channel("student-name.{{ \Illuminate\Support\Facades\Auth::id() }}")
                        .listen('.studentFormSubmitted', (data) => {
                            playAudio();
                            $("#adminNotification").prev().append(
                                `<span class="badge badge-default"> <span class="ring">
                                        </span><span class="ring-point">
                                        </span> </span>`
                            );
                            $("#adminNotification").prepend(
                                `<li>
                        <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0" href="/admin/notification-detail/${data.data.id}">
                                    <div class="media">
                                        <img src="" alt="" class="d-flex mr-3 img-fluid rounded-circle">
                                        <div class="media-body">
                                            <p class="mb-0 text-primary text-wrap text-break"> ${data.data.get_user.first_name} ${data.data.get_user.last_name} ${data.data.message}</p>
                                            ${data.minutes}
                                        </div>
                                    </div>
                                </a>
                            </li>
                          `
                            );
                        });
                }

                function playAudio() {
                    var audio = new Audio('/assets/media/success.mp3');
                    audio.play();
                }
            </script>
</body>

</html>
