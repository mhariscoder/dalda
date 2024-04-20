<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dalda Foundation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<h2 class="text-center">Dalda Foundation - Admit Card</h2>
<div class="container">
    <div class="row">
        <div class="row justify-content-center">
            <!-- form complex example -->
            <div class="card card-outline-secondary">
                <div class="card-body">
                    <div class="row mt-4">
                        <div class="col-md-6 pb-3 d-flex">
                            <label for="a">BOARD:
                            <span class="ml-3" style="font-size: 16px; text-decoration: underline;">{{$board}}</span> </label>
                        </div>
                        <div class="col-md-6 pb-3 d-flex">
                            <label for="b">MARKS IN MATRIC:
                            <span class="ml-3" style="font-size: 16px; text-decoration: underline;">{{$marks}}</span></label>
                        </div>
                        <div class="col-md-3 pb-3 d-flex">
                            <label for="c">YEAR/SESSION:
                            <span class="ml-3" style="font-size: 16px; text-decoration: underline;">{{$session}}</span></label>
                        </div>
                        <div class="col-md-3 pb-3 d-flex">
                            <label for="d">CLASS:
                            <span class="ml-3" style="font-size: 16px; text-decoration: underline;">{{$class}}</span></label>
                        </div>
                        <div class="col-md-3 pb-3 d-flex">
                            <label for="e">GROUP:
                            <span class="ml-3" style="font-size: 16px; text-decoration: underline;">{{$group}}</span></label>
                        </div>
                        <div class="col-md-6 pb-3 d-flex">
                            <label for="f">APPLICANT'S NAME:
                            <span class="ml-3" style="font-size: 16px; text-decoration: underline;">{{$name}}</span></label>
                        </div>
                        <div class="col-md-6 pb-3 d-flex">
                            <label for="k">FATHER NAME:
                            <span class="ml-3" style="font-size: 16px; text-decoration: underline;">{{$father_name}}</span></label>
                        </div>
                        <div class="col-md-6 pb-3 d-flex">
                            <label for="i">COLLEGE NAME:
                            <span class="ml-3" style="font-size: 16px; text-decoration: underline;">{{$college_name}}</span></label>
                        </div>
                        <div class="col-md-6 pb-3 d-flex">
                            <label for="l">ADDRESS:
                            <span class="ml-3" style="font-size: 16px; text-decoration: underline;">{{$address}}</span></label>
                        </div>
                    </div>
                </div>
            </div><!--/card-->
        </div><!--/row-->
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
