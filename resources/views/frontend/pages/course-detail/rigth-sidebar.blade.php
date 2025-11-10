<div class="sidebar sidebar-negative">
    {{-- Rigthside Course Preview --}}
    @include('frontend.pages.course-detail.rigthside-course-preview')
    {{-- End Rigthside Course Preview --}}
    {{-- Rigthside Course Feature --}}
    @include('frontend.pages.course-detail.rigthside-course-feature')
    {{-- End Rigthside Course Feature --}}
    {{-- Rigthside Course Category --}}
    @include('frontend.pages.course-detail.rigthside-course-category')
    {{-- End Rigthside Course Category --}}
    {{-- Rigthside Related Courses --}}
    @include('frontend.pages.course-detail.rigthside-related-courses')
    {{-- End Rigthside Related Courses --}}

    <div class="card card-item">
        <div class="card-body">
            <h3 class="card-title fs-18 pb-2">Course Tags</h3>
            <div class="divider"><span></span></div>
            <ul class="generic-list-item generic-list-item-boxed d-flex flex-wrap fs-15">
                <li class="mr-2"><a href="#">Beginner</a></li>
                <li class="mr-2"><a href="#">Advanced</a></li>
                <li class="mr-2"><a href="#">Tips</a></li>
                <li class="mr-2"><a href="#">Photoshop</a></li>
                <li class="mr-2"><a href="#">Software</a></li>
                <li class="mr-2"><a href="#">Backend</a></li>
                <li class="mr-2"><a href="#">Freelance</a></li>
                <li class="mr-2"><a href="#">Frontend</a></li>
                <li class="mr-2"><a href="#">Technology</a></li>
            </ul>
        </div>
    </div><!-- end card -->
</div><!-- end sidebar -->
