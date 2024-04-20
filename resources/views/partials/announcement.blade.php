@if(count($announcements) > 0)
    <!-- START: Breadcrumbs-->
    <div class="Ticker">
        <marquee behavior direction="left" onmouseover="this.stop()" onmouseout="this.start()">
            <div class="customline">
                @foreach ($announcements as $news)
                    <div class="dot"></div>
                    <strong>{{$news->title}}! </strong>&nbsp;  {{ $news->description }}
                @endforeach
            </div>
        </marquee>
    </div>
        {{-- <div class="flex ">
            <div class="alert alert-warning alert-dismissible shadow-sm py-1" role="alert" style="height:35px">
                <div class="marquee" style="margin-top: -8px;">
                    <p>
                        @foreach($announcements as $news)
                            <strong>{{$news->title}}!</strong> {{ substr_replace(trim($news->description),"",strripos(trim($news->description),"."),1) . '. ' }}
                        @endforeach
                    </p>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: -2px;">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div> --}}
    <!-- END: Breadcrumbs-->
@endif
