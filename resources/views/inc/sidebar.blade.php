 <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <ul class="nav">
         <li class="nav-item">
             <a class="nav-link" href="{{ route('content.dashboard') }}">
                 <i class="icon-grid menu-icon"></i>
                 <span class="menu-title">Dashboard</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="{{ route('service.index') }}">
                 <i class="icon-grid menu-icon"></i>
                 <span class="menu-title">Service</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                 <i class="icon-layout menu-icon"></i>
                 <span class="menu-title">UI Elements</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="ui-basic">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="{{ route('customer.index') }}">Customer</a></li>
                     <li class="nav-item"> <a class="nav-link" href="{{ route('order.index') }}">Order</a>
                     </li>
                     <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
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
                     <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                     <li class="nav-item"> <a class="nav-link" href="{{ route('user.index') }}"> Register </a></li>
                     <li class="nav-item"> <a class="nav-link" href="{{ route('level.index') }}"> Role </a></li>
                 </ul>
             </div>
         </li>
     </ul>
 </nav>
