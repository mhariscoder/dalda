<!-- Modal -->
<style>
    .modal-open {
        overflow: hidden;
    }
    .modal {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1050;
    display: none;
    overflow: hidden;
    -webkit-overflow-scrolling: touch;
    outline: 0;
    }
    .modal.fade .modal-dialog {
    -webkit-transform: translate(0, -25%);
    -ms-transform: translate(0, -25%);
    -o-transform: translate(0, -25%);
    transform: translate(0, -25%);
    -webkit-transition: -webkit-transform 0.3s ease-out;
    -o-transition: -o-transform 0.3s ease-out;
    transition: -webkit-transform 0.3s ease-out;
    transition: transform 0.3s ease-out;
    transition: transform 0.3s ease-out, -webkit-transform 0.3s ease-out, -o-transform 0.3s ease-out;
    }
    .modal.in .modal-dialog {
    -webkit-transform: translate(0, 0);
    -ms-transform: translate(0, 0);
    -o-transform: translate(0, 0);
    transform: translate(0, 0);
    }
    .modal-open .modal {
    overflow-x: hidden;
    overflow-y: auto;
    }
    .modal-dialog {
    position: relative;
    width: auto;
    margin: 10px;
    }
    .modal-content {
    position: relative;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #999;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 6px;
    -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
    box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
    outline: 0;
    }
    .modal-backdrop {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1040;
    background-color: #000;
    }
    .modal-backdrop.fade {
    filter: alpha(opacity=0);
    opacity: 0;
    }
    .modal-backdrop.in {
    filter: alpha(opacity=50);
    opacity: 0.5;
    }
    .modal-header {
    padding: 15px;
    border-bottom: 1px solid #e5e5e5;
    }
    .modal-header .close {
    margin-top: -2px;
    }
    .modal-title {
    margin: 0;
    line-height: 1.42857143;
    }
    .modal-body {
    position: relative;
    padding: 15px;
    }
    .modal-footer {
    padding: 15px;
    text-align: right;
    border-top: 1px solid #e5e5e5;
    }
    .modal-footer .btn + .btn {
    margin-bottom: 0;
    margin-left: 5px;
    }
    .modal-footer .btn-group .btn + .btn {
    margin-left: -1px;
    }
    .modal-footer .btn-block + .btn-block {
    margin-left: 0;
    }
    .modal-scrollbar-measure {
    position: absolute;
    top: -9999px;
    width: 50px;
    height: 50px;
    overflow: scroll;
    }
    .clearfix:before,
.clearfix:after,
.dl-horizontal dd:before,
.dl-horizontal dd:after,
.container:before,
.container:after,
.container-fluid:before,
.container-fluid:after,
.row:before,
.row:after,
.form-horizontal .form-group:before,
.form-horizontal .form-group:after,
.btn-toolbar:before,
.btn-toolbar:after,
.btn-group-vertical > .btn-group:before,
.btn-group-vertical > .btn-group:after,
.nav:before,
.nav:after,
.navbar:before,
.navbar:after,
.navbar-header:before,
.navbar-header:after,
.navbar-collapse:before,
.navbar-collapse:after,
.pager:before,
.pager:after,
.panel-body:before,
.panel-body:after,
.modal-header:before,
.modal-header:after,
.modal-footer:before,
.modal-footer:after {
  display: table;
  content: " ";
}
.clearfix:after,
.dl-horizontal dd:after,
.container:after,
.container-fluid:after,
.row:after,
.form-horizontal .form-group:after,
.btn-toolbar:after,
.btn-group-vertical > .btn-group:after,
.nav:after,
.navbar:after,
.navbar-header:after,
.navbar-collapse:after,
.pager:after,
.panel-body:after,
.modal-header:after,
.modal-footer:after {
  clear: both;
}
    @media (min-width: 768px) {
    .modal-dialog {
        width: 600px;
        margin: 30px auto;
    }
    .modal-content {
        -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
    }
    .modal-sm {
        width: 300px;
    }
    }
    @media (min-width: 992px) {
    .modal-lg {
        width: 900px;
    }
    }
</style>

<div class="modal fade" id="counsellingSectionModal" tabindex="-1" role="dialog" aria-labelledby="counsellingSectionTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header py-3" style="display:flex; align-items:center">
                <h5 class="modal-title text-white pl-3" id="counsellingSectionModalLongTitle" style="margin-right: auto;">Counselling Section</h5>
                <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-dark">
                <div class="card p-3">
                    <div class="d-flex flex-row justify-content-between text-align-center">
                        @if(count($counsellingSection) > 0)
                            @foreach($counsellingSection as $counselling)
                                <div id="counselling-{{ $counselling->id }}" class="alert" style="margin-bottom: 25px;">
                                    <div class="mb-2 d-flex" style="margin-bottom: 15px;">
                                        <div class="mr-auto">
                                            <b>Category: </b>{{ $counselling->counsellingCategory->title }}
                                        </div>
                                    </div>
                                    <div>
                                        <p class="mb-0"><b>Question: </b>{{ $counselling->question }}</p>
                                        <p class="mb-0"><b>Answer: </b>{{ $counselling->answer }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-danger">No record found</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <h5 class="modal-title text-white pl-3">Submit Query</h5>
                <form action="{{ route('counselling.customer-query') }}" method="POST">
                    @csrf
                    <div>
                        <textarea rows="5" class="form-control" style="width:100%" name="query"></textarea>
                        <button type="submit" class="close btn btn-primary">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>