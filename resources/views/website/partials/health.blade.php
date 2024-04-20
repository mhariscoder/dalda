@forelse($hospitals as $key=> $val)
    <div class="card accordion-card">
        <div id="heading{{$val->type.$val->id}}" class="card-header  shadow-sm border-0">
            <h6 class="mb-0 font-weight-bold"><a href="#" data-toggle="collapse"
                                                 data-target="#{{$val->id}}"
                                                 aria-expanded="false"
                                                 aria-controls="{{$val->id}}"
                                                 class="d-block position-relative text-uppercase collapsible-link py-2 collapsed">{{$val->hospital_name}}</a>
            </h6>
        </div>
        <div id="{{$val->id}}" aria-labelledby="heading{{$val->type.$val->id}}"
             data-parent="#accordionExample"
             class="collapse">
            <div class="card-body p-3">
                <p class="font-weight-light m-0">{{$val->description}}.</p>
                <p><a href="{{$val->web_url}}" target="_blank">{{$val->web_url}}</a></p>
            </div>
        </div>
    </div>
@empty
    <p>No Records yet. Please check back later.</p>
@endforelse