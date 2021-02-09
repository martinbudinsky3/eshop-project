<section class="row row-m-b">
    <div class="col-12 center-box">
        <h2 class="section-heading center-text">{{ $heading }}</h2>
        <div id="{{ $carouselId }}" class="carousel slide d-none d-lg-block" data-ride="carousel">
            <div class="carousel-inner">
                @for($i = 0; $i < 3; $i++)
                <div class="carousel-item {{$i == 0 ? 'active' : '' }}">
                    <div class="row">
                        @for($j = 0; $j < 4; $j++)
                        <div class="col-lg-3 ">
                            <a href="/products/{{ $data[$i*4+$j]->id }}">
                                <img class="d-block w-100 img-responsive" srcset="{{asset($data[$i*4+$j]->images->first()->path.'_300x420.jpg')}} 300w,
                                    {{asset($data[$i*4+$j]->images->first()->path.'_520x728.jpg')}} 520w,
                                    {{asset($data[$i*4+$j]->images->first()->path.'_640x896.jpg')}} 640w" sizes="(max-width: 992px) 300px,
                                    (max-width: 1200px) 520px, 640px"
                                    src="{{asset($data[$i*4+$j]->images->first()->path.'_640x896.jpg')}}"
                                            alt="{{ $data[$i*4+$j]->name }}">
                            </a>
                            <div class="carousel-caption ">
                                <h4 class="carousel-product-name white-image-caption">{{ $data[$i*4+$j]->name }}</h4>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
                @endfor
            </div>

            <a class="carousel-control-prev" data-target="#{{ $carouselId }}" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" data-target="#{{ $carouselId }}" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


        <div id="{{ $carouselId }}-md" class="carousel slide d-none d-md-block d-lg-none" data-ride="carousel">
            <div class="carousel-inner">
                @for($i = 0; $i < 4; $i++)
                <div class="carousel-item {{$i == 0 ? 'active' : '' }}">
                    <div class="row">
                        @for($j = 0; $j < 3; $j++)
                        <div class="col-md-4 ">
                            <a href="/products/{{ $data[$i*3+$j]->id }}">
                                <img class="d-block w-100 img-responsive" srcset="{{asset($data[$i*3+$j]->images->first()->path.'_300x420.jpg')}} 300w,
                                    {{asset($data[$i*3+$j]->images->first()->path.'_520x728.jpg')}} 520w,
                                    {{asset($data[$i*3+$j]->images->first()->path.'_640x896.jpg')}} 640w" sizes="(max-width: 992px) 300px,
                                    (max-width: 1200px) 520px,
                                    640px" src="{{asset($data[$i*3+$j]->images->first()->path.'_640x896.jpg')}}"
                                    alt="{{ $data[$i*3+$j]->name }}">
                            </a>
                            <div class="carousel-caption ">
                                <h4 class="carousel-product-name white-image-caption">
                                    {{ $data[$i*3+$j]->name }}
                                </h4>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
                @endfor
            </div>

            <a class="carousel-control-prev" data-target="#{{ $carouselId }}-md" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" data-target="#{{ $carouselId }}-md" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


        <div id="{{ $carouselId }}-xs" class="carousel slide d-block d-md-none " data-ride="carousel">
            <div class="carousel-inner">
                 @for($i = 0; $i < 6; $i++)
                <div class="carousel-item {{$i == 0 ? 'active' : '' }}">
                    <div class="row">
                        @for($j = 0; $j < 2; $j++)
                        <div class="col-6">
                            <a href="/products/{{ $data[$i*2+$j]->id }}">
                                <img class="d-block w-100 img-responsive" srcset="{{asset($data[$i*2+$j]->images->first()->path.'_300x420.jpg')}} 300w,
                                    {{asset($data[$i*2+$j]->images->first()->path.'_520x728.jpg')}} 520w,
                                    {{asset($data[$i*2+$j]->images->first()->path.'_640x896.jpg')}} 640w" sizes="(max-width: 992px) 300px,
                                    (max-width: 1200px) 520px,
                                    640px" src="{{asset($data[$i*2+$j]->images->first()->path.'_640x896.jpg')}}"
                                    alt="{{ $data[$i*2+$j]->name }}">
                            </a>
                            <div class="carousel-caption ">
                                <h4 class="carousel-product-name white-image-caption">
                                    {{ $data[$i*2+$j]->name }}
                                </h4>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
                @endfor
            </div>

            <a class="carousel-control-prev" data-target="#{{ $carouselId }}-xs" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" data-target="#c{{ $carouselId }}-xs" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>
