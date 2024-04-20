<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <title>Dalda Foundation</title>
</head>

<body>
    <section style="background-color: #44a136;  background-size: cover; height: 100%;">

        <div class="">
            <div
                style="max-width: 600px;  background-color: #fff;  box-shadow: 0px 0px 1px 1px #c6c6c6;  width: 100%;  margin: auto; position: relative;  top: 100px; z-index: 1;">
                <table>
                    <thead>
                        <tr>
                            <th style="padding: 15px;">&nbsp;</th>
                            <th rowspan="4" style="padding: 15px;"><img
                                    src="{{ asset('assets/images/dalda_logo.png') }}"
                                    style="margin: 40px auto; display: flex; width: 60%;" class="img-fluid"
                                    alt="" /></th>
                            <th style="padding: 15px;">&nbsp;</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td style="padding: 15px;">&nbsp;</td>
                            <td style="padding: 15px;" rowspan="4" style="text-align:center;">
                                <h1
                                    style="font-size: 46px;font-weight: 400; text-align:center; letter-spacing: 8px; display: block;">
                                    User Inquiry!</h1>
                            </td>
                            <td style="padding: 15px;">&nbsp;</td>
                        </tr>
                    </tbody>
                    {{-- <tbody>

                        <tr>
                            <td style="padding: 15px;">&nbsp;</td>
                            <td style="padding: 15px;" rowspan="4"><img
                                    src="{{ asset('assets/frontend/img/welcome.png') }}"
                                    style="margin: 20px auto; display: flex;" class="img-fluid" alt="" /></td>
                            <td style="padding: 15px;">&nbsp;</td>
                        </tr>

                    </tbody> --}}

                    <tbody>
                        <thead>
                            <tr >
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                @if (isset($data['organization']))
                                    <th>Organization</th>
                                @endif
                            </tr>
                        </thead>
                        <tr>
                            <td>
                                {{ $data['name'] }}
                            </td>
                            <td>
                                {{ $data['email'] }}
                            </td>
                            <td>
                                {{ $data['message'] }}
                            </td>
                            @if (isset($data['organization']))
                                <td>{{ $data['organization'] }}</td>
                            @endif
                        </tr>
                    </tbody>
                    @if (isset($data['student_data']))

                    <thead>
                        <tr>
                            <th colspan="4" border="" style="padding: 15px;">Student Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <thead>
                            <tr style="border-top: 1px solid #ddd;">
                                @if (isset($data['student_fullname']))
                                    <th>Full Name</th>
                                @endif
                                @if (isset($data['student_email']))
                                    <th>Email</th>
                                @endif
                                @if (isset($data['student_contact']))
                                    <th>Contact</th>
                                @endif
                                @if (isset($data['student_percentage']))
                                    <th>Grade</th>
                                @endif
                            </tr>
                        </thead>
                        <tr>
                            @if (isset($data['student_fullname']))
                                <td>
                                    {{ $data['student_fullname'] }}
                                </td>
                            @endif
                            @if (isset($data['student_email']))
                                <td>
                                    {{ $data['student_email'] }}
                                </td>
                            @endif
                            @if (isset($data['student_contact']))
                                <td>
                                    {{ $data['student_contact'] }}
                                </td>
                            @endif
                            @if (isset($data['student_percentage']))
                                <td>
                                    {{ $data['student_percentage'] }} %
                                </td>
                            @endif
                        </tr>
                    </tbody>
                    @endif

                    <tbody>

                        <tr>
                            <td>&nbsp;</td>
                            <td rowspan="4">
                                <p style="color: #666668; font-size: 16px; font-weight: 500;">Cheers <br> Team Dalda</p>
                            </td>
                            <td>&nbsp;</td>
                        </tr>

                    </tbody>

                    <tbody
                        style="background: #cde6c8; position: absolute; width: 100%; bottom: -107px;">

                        <tr>
                            <td>&nbsp;</td>
                            <td rowspan="4">
                                <p
                                    style="text-align: center; padding: 30px 0px 0px; margin-bottom: 0; font-size: 16px;  font-weight: 500;">
                                    Need More help ?</p>
                                <span
                                    style=" display: flex; justify-content: center; padding-bottom: 20px;  color: #44a136;  font-size: 15px; font-weight: 400; ">We're
                                    here to help you out</span>
                            </td>
                            <td>&nbsp;</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>

</html>
