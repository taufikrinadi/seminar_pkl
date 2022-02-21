 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

   <ul class="sidebar-nav" id="sidebar-nav">

     <li class="nav-item">
       <a class="nav-link " href="<?php echo base_url('dashboard') ?>">
         <i class="bi bi-grid"></i>
         <span>Dashboard</span>
       </a>
     </li><!-- End Dashboard Nav -->

     <li class="nav-item">
       <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
         <i class="bi bi-journal-text"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
       </a>
       <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
         <li>
           <a href="<?php echo base_url('perencanaan/manajer') ?>">
             <i class="bi bi-circle"></i><span>Perencanaan</span>
           </a>
         </li>
       </ul>
     </li><!-- End Forms Nav -->

     <li class="nav-item">
       <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
         <i class="bi bi-layout-text-window-reverse"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
       </a>
       <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
         <li>
           <a href="<?php echo base_url('laporan/perencanaan') ?>">
             <i class="bi bi-circle"></i><span> Laporan Perencanaan</span>
           </a>
         </li>
         <li>
           <a href="<?php echo base_url('laporan/pengadaan') ?>">
             <i class="bi bi-circle"></i><span>Laporan Pengadaan</span>
           </a>
         </li>
         <li>
           <a href="<?php echo base_url('laporan/asset') ?>">
             <i class="bi bi-circle"></i><span>Laporan Asset</span>
           </a>
         </li>
         <li>
           <a href="<?php echo base_url('laporan/pengelolaan') ?>">
             <i class="bi bi-circle"></i><span>Laporan Pengelolaan</span>
           </a>
         </li>
         <li>
           <a href="<?php echo base_url('laporan/penghapusan') ?>">
             <i class="bi bi-circle"></i><span>Laporan Penghapusan</span>
           </a>
         </li>
       </ul>
     </li><!-- End Tables Nav -->

     <li class="nav-heading">Pages</li>

     </li><!-- End Profile Page Nav -->
     <li class="nav-item">
       <a class="nav-link collapsed" href="<?php echo base_url('auth/ubah_password') ?>">
         <i class="bi bi-card-list"></i>
         <span>Change Password</span>
       </a>
     </li><!-- End Register Page Nav -->
   </ul>

 </aside><!-- End Sidebar-->
 <main id="main" class="main">

   <body>
     <div class="pagetitle">
       <h1><?= $pagetitle; ?></h1>
       <nav>
         <ol class="breadcrumb">
           <li class="breadcrumb-item"><a href="<?php echo ('dashboard') ?>">Home</a></li>
           <li class="breadcrumb-item active"><?= $page; ?></li>
         </ol>
       </nav>