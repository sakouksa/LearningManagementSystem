  <div class="sidebar-wrapper" data-simplebar="true">
      <div class="sidebar-header">
          <div>
              <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
          </div>
          <div>
              <h4 class="logo-text">Admins</h4>
          </div>
          <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
          </div>
      </div>
      {{-- navigation --}}
      {{-- All categories --}}
<ul class="metismenu" id="menu">
    {{-- Dashboard --}}
    <li class="{{ setSidebar(['admin.dashboard']) }}">
        <a href="{{ route('admin.dashboard') }}">
            <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
            <div class="menu-title">Dashboard</div>
        </a>
    </li>

    {{-- Manage Category --}}
    <li class="{{ setSidebar(['admin.category*', 'admin.subcategory*']) }}">
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bx bx-category-alt"></i></div>
            <div class="menu-title">Manage Category</div>
        </a>
        <ul>
            <li class="{{ setSidebar(['admin.category*']) }}">
                <a href="{{ route('admin.category.index') }}">
                    <i class='bx bx-grid'></i>Category
                </a>
            </li>
            <li class="{{ setSidebar(['admin.subcategory*']) }}">
                <a href="{{ route('admin.subcategory.index') }}">
                    <i class='bx bx-layer'></i>Sub Category
                </a>
            </li>
        </ul>
    </li>

    {{-- Manage Instructor --}}
    <li class="{{ setSidebar(['admin.instructor.index', 'admin.instructor.active']) }}">
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bx bx-user-voice"></i></div>
            <div class="menu-title">Manage Instructor</div>
        </a>
        <ul>
            <li class="{{ setSidebar(['admin.instructor.index*']) }}">
                <a href="{{ route('admin.instructor.index') }}">
                    <i class='bx bx-group'></i>All Instructor
                </a>
            </li>
            <li class="{{ setSidebar(['admin.instructor.active']) }}">
                <a href="{{ route('admin.instructor.active') }}">
                    <i class='bx bx-check-shield'></i>Active Instructor
                </a>
            </li>
        </ul>
    </li>

    {{-- Application Settings --}}
    <li class="{{ setSidebar(['admin.slider*', 'admin.info*']) }}">
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bx bx-cog"></i></div>
            <div class="menu-title">Application Settings</div>
        </a>
        <ul>
            <li class="{{ setSidebar(['admin.slider*']) }}">
                <a href="{{ route('admin.slider.index') }}">
                    <i class='bx bx-slideshow'></i>Manage Sliders
                </a>
            </li>
            <li class="{{ setSidebar(['admin.info*']) }}">
                <a href="{{ route('admin.info.index') }}">
                    <i class='bx bx-info-circle'></i>Manage InfoBox
                </a>
            </li>
        </ul>
    </li>
</ul>


  </div>
