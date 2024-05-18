 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      {{-- <li class="nav-item">
        <a class="nav-link " href="{{ route('homeAdmin') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav --> --}}

      <li class="nav-item">
        <a class="nav-link {{ request()->is('berat*') ? '' : 'collapsed' }}" href="{{ route('berat.index') }}">
          <i class="bi bi-card-list"></i>
          <span>Berat</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link {{ request()->is('cookies*') ? '' : 'collapsed' }}" href="{{ route('cookies.index') }}">
          <i class="bi bi-card-list"></i>
          <span>Snack</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link {{ request()->is('payment*') ? '' : 'collapsed' }}" href="{{ route('payment.index') }}">
          <i class="bi bi-card-list"></i>
          <span>Payment</span>
        </a>
      </li>






    </ul>

  </aside><!-- End Sidebar-->
