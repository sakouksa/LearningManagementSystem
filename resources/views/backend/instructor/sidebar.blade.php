  <div class="sidebar-wrapper" data-simplebar="true">
      <div class="sidebar-header">
          <div>
              <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
          </div>
          <div>
              <h4 class="logo-text">Instuctor</h4>
          </div>
          <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
          </div>
      </div>
      {{-- navigation --}}
      <ul class="metismenu" id="menu">
          <li>
              <a href="{{ route('instructor.dashboard') }}">
                  <div class="parent-icon"><i class='bx bx-home-alt'></i></div>
                  <div class="menu-title">Dashboard</div>
              </a>
          </li>
          @if (isApprovedUser())
              {{-- Manage Courses --}}
              <li class="{{ setSidebar(['instructor.course*', 'instructor.course-section*']) }}">
                  <a href="javascript:;" class="has-arrow">
                      <div class="parent-icon">
                          <i class="bx bx-chalkboard"></i> {{-- LMS-style icon --}}
                      </div>
                      <div class="menu-title">Manage Courses</div>
                  </a>
                  <ul>
                      <li class="{{ setSidebar(['instructor.course*']) }}">
                          <a href="{{ route('instructor.course.index') }}">
                              <i class="bx bx-list-ul"></i>All Courses
                          </a>
                      </li>
                  </ul>
              </li>
          @endif
      </ul>
      {{-- end navigation --}}
  </div>
