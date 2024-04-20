<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <title>Test</title>
</head>

<body id="main-container" class="default horizontal-menu semi-dark">

<script>
    window.laravel_echo_port = '{{env("LARAVEL_ECHO_PORT")}}';
</script>
<script src="//{{ Request::getHost() }}:{{env('LARAVEL_ECHO_PORT')}}/socket.io/socket.io.js"></script>
<script src="{{ url('/js/laravel-echo-setup.js') }}" type="text/javascript"></script>

<script type="text/javascript">
    if(typeof(io) != 'undefined'){
        window.Echo.channel("test-event."+1).listen('.testEvent', (data) => {
                console.log(data.msg);
                alert(123);

        });
    }
</script>
</body>
</html>
