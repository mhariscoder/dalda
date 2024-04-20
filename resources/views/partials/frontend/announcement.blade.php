@if (count($announcements) > 0)
    @foreach ($announcements as $key => $val)
        <div class="card-title mt-3">
            {{ \Carbon\Carbon::parse($val->created_at)->isoFormat('dddd MMMM Do YYYY') }}</div>
        <div class="card border">
            <div id="announcement{{ $val->id . ucfirst($val->type) }}" class="card-header border-0">
                <button type="button" data-toggle="collapse" data-target="#announcement{{ $val->id }}"
                    aria-expanded="true" aria-controls="announcement{{ $val->id }}"
                    class="text-left btn btn-light btn-block">
                    <h2 class="m-0 p-0">{{ Str::words($val->title, 10) }}</h2>
                </button>
            </div>
            <div data-parent="#accordionAnnouncement" id="announcement{{ $val->id }}"
                aria-labelledby="announcement{{ $val->id . ucfirst($val->type) }}" class="collapse">
                <div class="card-body pt-0">{{ $val->description }}.
                </div>
            </div>
        </div>
    @endforeach
    {{-- @foreach ($announcements as $key => $val)
        <div class="text-dark py-2">{{ \Carbon\Carbon::parse($val->created_at)->isoFormat('dddd MMMM Do YYYY') }}</div>
        <div class="card border-bottom">
            <div class="card-header border-0" id="announcement{{ $val->id . ucfirst($val->type) }}">
                <h2 class="mb-0">
                    <button class="btn btn-light btn-block text-left shadow-none" type="button" data-toggle="collapse"
                        data-target="#announcement{{ $val->id }}" aria-expanded="true"
                        aria-controls="announcement{{ $val->id }}">
                        {{ Str::words($val->title, 10) }}
                    </button>
                </h2>
            </div>

            <div id="announcement{{ $val->id }}" class="collapse"
                aria-labelledby="announcement{{ $val->id . ucfirst($val->type) }}" data-parent="#accordionAnnouncement">
                <div class="card-body">
                    {{ $val->description }}.
                </div>
            </div>
        </div>
    @endforeach --}}
@endif
