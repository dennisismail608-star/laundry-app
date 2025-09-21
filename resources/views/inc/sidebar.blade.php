 <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <ul class="nav">
         <li class="nav-item">
             <a class="nav-link" href="{{ route('content.dashboard') }}">
                 <i class="icon-grid menu-icon"></i>
                 <span class="menu-title">Dashboard</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="{{ route('order.index') }}">
                 <i class="icon-grid menu-icon"></i>
                 <span class="menu-title">Order</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                 <i class="icon-layout menu-icon"></i>
                 <span class="menu-title">Master Data</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="ui-basic">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="{{ route('customer.index') }}">Customer</a></li>
                     <li class="nav-item"> <a class="nav-link" href="{{ route('service.index') }}">Service</a>
                     </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                 <i class="icon-head menu-icon"></i>
                 <span class="menu-title">User Pages</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="auth">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="{{ route('user.index') }}"> Register </a></li>
                     <li class="nav-item"> <a class="nav-link" href="{{ route('level.index') }}"> Role </a></li>
                 </ul>
             </div>
         </li>
     </ul>
 </nav>
