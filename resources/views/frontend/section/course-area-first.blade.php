<section class="course-area pb-120px">
    <div class="container">
        <div class="section-heading text-center">
            <h5 class="ribbon ribbon-lg mb-2">Choose your desired courses</h5>
            <h2 class="section__title">The world's largest selection of courses</h2>
            <span class="section-divider"></span>
        </div>

        {{-- Tabs --}}
        <ul class="nav nav-tabs generic-tab justify-content-center pb-4" id="myTab" role="tablist">
            @foreach ($categories as $index => $item)
                <li class="nav-item">
                    <a class="nav-link {{ $index == 0 ? 'active' : '' }}" id="{{ $item->slug }}-tab" data-toggle="tab"
                        href="#{{ $item->slug }}" role="tab" aria-controls="{{ $item->slug }}"
                        aria-selected="true">
                        {{ $item->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Courses Tab Content --}}
    <div class="card-content-wrapper bg-gray pt-50px pb-120px">
        <div class="container">
            <div class="tab-content" id="myTabContent">
                @foreach ($course_category as $index => $data)
                    <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}" id="{{ $data->slug }}"
                        role="tabpanel" aria-labelledby="{{ $data->slug }}-tab">

                        <div class="row">
                            @foreach ($data->course as $course)
                                <div class="col-lg-4 responsive-column-half">
                                    <div class="card card-item card-preview"
                                        data-tooltip-content="#{{ $course->course_name_slug }}">
                                        {{-- Card Image --}}
                                        <div class="card-image">
                                            <a href="{{ route('course-details', ['slug' => $course->course_name_slug]) }}" class="d-block">
                                                <img class="card-img-top lazy" width="240" height="240"
                                                    src="{{ asset($course->course_image) }}"
                                                    data-src="{{ asset($course->course_image) }}"
                                                    alt="{{ $course->name }}">
                                            </a>

                                            {{-- Badges --}}
                                            <div class="course-badge-labels">
                                                <div class="course-badge">
                                                    @if ($course->bestseller == 'yes')
                                                        Bestseller
                                                    @elseif ($course->featured == 'yes')
                                                        Featured
                                                    @else
                                                        Highest Rated
                                                    @endif
                                                </div>
                                                <div class="course-badge blue">
                                                    -{{ round((($course->selling_price - $course->discount_price) / $course->selling_price) * 100) }}%
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Card Body --}}
                                        <div class="card-body">
                                            <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">
                                                {{ $course->label }}
                                            </h6>
                                            <h5 class="card-title">
                                                <a href="{{ route('course-details', $course->course_name_slug) }}">
                                                    {{ \Illuminate\Support\Str::limit($course->course_name, 50, '...') }}
                                                </a>
                                            </h5>
                                            <p class="card-text">
                                                <a href="teacher-detail.html">{{ $course['user']['name'] }}</a>
                                            </p>

                                            {{-- Rating --}}
                                            <div class="rating-wrap d-flex align-items-center py-2">
                                                <div class="review-stars">
                                                    <span class="rating-number">{{ $course->rating ?? '4.4' }}</span>
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= floor($course->rating ?? 4))
                                                            <span class="la la-star"></span>
                                                        @elseif ($i - ($course->rating ?? 4) < 1)
                                                            <span class="la la-star-half"></span>
                                                        @else
                                                            <span class="la la-star-o"></span>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <span
                                                    class="rating-total pl-1">({{ $course->reviews ?? '20,230' }})</span>
                                            </div>

                                            {{-- Price & Wishlist --}}
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="card-price text-black font-weight-bold">
                                                    ${{ $course->discount_price }}
                                                    @if ($course->discount_price < $course->selling_price)
                                                        <span
                                                            class="before-price font-weight-medium">${{ $course->selling_price }}</span>
                                                    @endif
                                                </p>
                                                <div class="icon-element icon-element-sm shadow-sm cursor-pointer"
                                                    title="Add to Wishlist">
                                                    <i class="la la-heart-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- End Card Body --}}
                                    </div>
                                    {{-- End Card --}}
                                </div>
                            @endforeach
                        </div>
                        {{-- End Row --}}
                    </div>
                @endforeach
            </div>
            {{-- End Tab Content --}}

            {{-- More Button --}}
            <div class="more-btn-box mt-4 text-center">
                <a href="course-grid.html" class="btn theme-btn">
                    Browse all Courses <i class="la la-arrow-right icon ml-1"></i>
                </a>
            </div>
        </div>
    </div>
</section>
