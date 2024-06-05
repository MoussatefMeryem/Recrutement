<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>JOBLINK</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block" style="color:#28a745">JobLink</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">

                {{-- @if (auth()->check()) --}}
                {{-- <span class="badge bg-primary badge-number">0</span> --}}


                @if (session()->has('loginId'))

                <div class="nav-icon">
                    <i class="bi bi-bell"></i>
                    <span class="badge bg-primary badge-number">{{ $unreadNotificationCount }}</span>
                </div>
               @endif


            </a><!-- End Notification Icon -->



          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">

            <li>
              <hr class="dropdown-divider">
            </li>
       @foreach ($notifications as $notification)


            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>{{ $notification->contenu }}</h4>

                <p>{{ $notification->dateN }}</p>
              </div>
            </li>
            @endforeach






            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->
        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="{{ asset('storage/'.$client->image) }}" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('storage/'.$client->image) }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ $client->username}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ $client->username}}</h6>
              <span>{{ $client->email }}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout')}}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>

              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->



  <main id="main" class="main">



    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->


            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">



                <div class="card-body">
                  <h5 class="card-title">offers<span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $offersCount}}</h6>
                      <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

        @foreach ($offers as $offer)


            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">
                <div class="card info-card customers-card" style="border: 1px solid #e9ecef; border-radius: 8px; overflow: hidden;">
                    <div class="filter" style="position: absolute; top: 15px; right: 15px;">
                        <a class="icon" href="#" data-bs-toggle="dropdown" style="text-decoration: none; color: #000;"><i class="bi bi-three-dots"></i></a>
                    </div>

                    <div class="card-body" style="padding: 20px;">
                        <h5 class="card-title" style="font-size: 1.25rem; font-weight: bold;">{{ $offer->utilisateur->username}}<span style="font-size: 1rem; font-weight: normal; color: #888;">| This Year</span></h5>

                        <div class="d-flex align-items-center" style="margin-bottom: 20px;">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; background-color: #f0f0f0;">
                                {{-- <i class="bi bi-people" style="font-size: 24px; color: #000;"></i> --}}
                                <img src="{{ asset('storage/'.$offer->utilisateur->image) }}" style="width: 50px; height: 50px; border-radius: 50%;">
                            </div>
                            <div class="ps-3" style="padding-left: 15px;">
                                <h6 style="margin: 0; font-size: 1.25rem; font-weight: bold;">{{ $offer->titre}}</h6>
                                <span class="text-danger small pt-1 fw-bold" style="color: #dc3545; font-weight: bold;"></span> <span class="text-muted small pt-2 ps-1" style="color: #888; padding-left: 5px;">{{ $offer->date}}</span>
                            </div>
                        </div>

                        <!-- Ajouter le bouton Détails -->
                        <div class="mt-3" style="margin-top: 20px;">
                          <form method="POST" action="{{ route('offerDetail')}}" class="d-inline">
                            @csrf
                            <input type="hidden" name="idR" value="{{ $offer->utilisateur->id}}">
                            <input type="hidden" name="idO" value="{{ $offer->id}}">
                              <button type="submit" class="btn btn-success" style="padding: 10px 20px; border-radius: 4px;">
                                  Détails
                              </button>
                          </form>
                          <form method="POST" action="{{ route('offerDetail')}}" class="d-inline">
                            @csrf
                            <input type="hidden" name="idR" value="{{ $offer->utilisateur->id}}">
                            <input type="hidden" name="idO" value="{{ $offer->id}}">
                              <button type="submit" class="btn btn-success" style="padding: 10px 20px; border-radius: 4px;">
                                  Postuler
                              </button>
                          </form>
                      </div>


                        <!-- Ajouter le champ de commentaire -->
                        <div class="mt-3" style="margin-top: 20px;">
                            <form action="{{ route('postComment') }}" method="POST">
                                @csrf
                                <label for="commentaire" class="form-label" style="display: block; margin-bottom: 5px;">Commentaire :</label>
                                <textarea id="commentaire" name="commentaire" class="form-control" rows="3" placeholder="Écrivez votre commentaire ici..." style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px;"></textarea>
                                <input type="hidden" name="idO" value="{{ $offer->id}}">
                                <button type="submit" class="btn btn-primary" style="background-color: #28a745; border: none; padding: 10px 20px; color: white; border-radius: 4px; margin-top: 10px;">Publier</button>
                            </form>
                        </div>

                        <!-- Ajouter la section de visualisation des commentaires -->
                        <div class="mt-3" style="margin-top: 20px;">
                            <h6 style="margin-bottom: 10px;">Commentaires</h6>
                            @if ($offer->commentaires->isEmpty())
                <p>Aucun commentaire.</p>
            @else

                <div id="commentaire-list" style="max-height: 200px; overflow-y: auto; padding: 0; border: 1px solid #e9ecef; border-radius: 5px;">
                    @foreach ($offer->commentaires as $commentaire)
                        <div class="comment-item" style="display: flex; align-items: start; padding: 10px; border-bottom: 1px solid #e9ecef; margin-bottom: 10px;">
                            <img src="{{ asset('storage/'.$commentaire->utilisateur->image) }}" alt="User Image" width="40" height="40" style="border-radius: 50%; margin-right: 10px;">
                            <div class="ms-2" style="margin-left: 10px;">
                                <div class="fw-bold" style="font-weight: bold; margin-bottom: 5px;">{{ $commentaire->utilisateur->username }}</div>
                                <div>{{ $commentaire->contenu }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>

                            @endif
                        </div>
                    </div>
                </div>
            </div>


 @endforeach

            <!-- Reports -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>


