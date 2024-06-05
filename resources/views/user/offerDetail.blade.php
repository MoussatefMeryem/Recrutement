@extends('layouts.user')
@section('page1')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.1/font/bootstrap-icons.min.css">
    <style>
        .social-links {
            position: relative;
        }

        .chat-window {
            display: none;
            position: absolute;
            bottom: 50px;
            right: 0;
            width: 300px;
            height: 300px;
            border: 1px solid #ccc;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            z-index: 1000;
            transition: width 0.3s, height 0.3s;
        }

        .chat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
        }

        .chat-body {
            padding: 10px;
            height: 200px;
            overflow-y: auto;
        }

        .chat-footer {
            display: flex;
            align-items: center;
            padding: 10px;
            background-color: #f1f1f1;
            justify-content: space-between;
        }

        .chat-footer input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            margin-right: 10px;
        }

        .chat-footer .send-btn {
            cursor: pointer;
        }
    </style>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="{{ asset('storage/' . $utilisateur->image) }}" alt="Profile" class="rounded-circle">
                            <h2>{{ $utilisateur->username }}</h2>
                            <h3>RH</h3>

                            <div class="social-links mt-2">
                                <a href="{{ route('chat') }}"><i class="bi bi-chat"></i></a>
                                <!-- Ajout de l'icône de chat -->
                            </div>

                            <div class="chat-window">
                                <div class="chat-header">
                                    Chat
                                    <i class="bi bi-arrows-fullscreen enlarge-btn" style="cursor: pointer;"></i>
                                    <!-- Icône pour agrandir -->
                                </div>
                                <div class="chat-body">
                                    <!-- Messages will appear here -->
                                </div>
                                <div class="chat-footer">
                                    <input type="text" placeholder="Type your message...">
                                    <i class="bi bi-cursor send-btn" style="cursor: pointer;"></i> <!-- Icône d'envoi -->
                                </div>
                            </div>

                            <script>
                                // Afficher ou masquer la fenêtre de chat
                                document.querySelector('.chat').addEventListener('click', function(event) {
                                    event.preventDefault();
                                    const chatWindow = document.querySelector('.chat-window');
                                    chatWindow.style.display = chatWindow.style.display === 'none' || chatWindow.style.display === '' ?
                                        'block' : 'none';
                                });

                                // Agrandir/réduire la fenêtre de chat
                                document.querySelector('.enlarge-btn').addEventListener('click', function() {
                                    const chatWindow = document.querySelector('.chat-window');
                                    if (chatWindow.style.width === '300px') {
                                        chatWindow.style.width = '500px';
                                        chatWindow.style.height = '500px';
                                    } else {
                                        chatWindow.style.width = '300px';
                                        chatWindow.style.height = '300px';
                                    }
                                    adjustInputPosition();
                                });

                                // Ajuster la position de l'entrée de message
                                function adjustInputPosition() {
                                    const chatFooter = document.querySelector('.chat-footer');
                                    const sendBtn = document.querySelector('.send-btn');
                                    const input = document.querySelector('.chat-footer input[type="text"]');
                                    if (chatFooter.clientHeight > 50) {
                                        input.style.marginBottom = '10px';
                                    } else {
                                        input.style.marginBottom = 'auto';
                                    }
                                }

                                // Envoyer un message
                                document.querySelector('.send-btn').addEventListener('click', function() {
                                    const messageInput = document.querySelector('.chat-footer input[type="text"]');
                                    const messageText = messageInput.value;
                                    if (messageText.trim() !== '') {
                                        const messageElement = document.createElement('div');
                                        messageElement.textContent = messageText;
                                        document.querySelector('.chat-body').appendChild(messageElement);
                                        messageInput.value = '';
                                    }
                                });
                            </script>
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">





                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">Description</h5>
                                    <p class="small fst-italic">{{ $offers->desc }}</p>

                                    <h5 class="card-title">Offer Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Title</div>
                                        <div class="col-lg-9 col-md-8">{{ $offers->titre }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Category</div>
                                        <div class="col-lg-9 col-md-8">{{ $offers->categorie->name }}</div>
                                    </div>






                                    <form method="POST" action="{{ route('saveCandidature') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Upload CV</div>
                                            <div class="col-lg-9 col-md-8">
                                                <input type="hidden" name="idO" value="{{ $offers->id }}">
                                                <input type="file" class="form-control" id="cvUpload" name="cvUpload"
                                                    accept=".pdf,.doc,.docx">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-9 col-md-8 offset-lg-3 offset-md-4">
                                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <form>
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                                Image</label>
                                            <div class="col-md-8 col-lg-9">
                                                <img src="assets/img/profile-img.jpg" alt="Profile">
                                                <div class="pt-2">
                                                    <a href="#" class="btn btn-primary btn-sm"
                                                        title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                                    <a href="#" class="btn btn-danger btn-sm"
                                                        title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="fullName" type="text" class="form-control" id="fullName"
                                                    value="Kevin Anderson">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea name="about" class="form-control" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="company" type="text" class="form-control" id="company"
                                                    value="Lueilwitz, Wisoky and Leuschke">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="job" type="text" class="form-control" id="Job"
                                                    value="Web Designer">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="country" type="text" class="form-control" id="Country"
                                                    value="USA">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="address" type="text" class="form-control" id="Address"
                                                    value="A108 Adam Street, New York, NY 535022">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="phone" type="text" class="form-control" id="Phone"
                                                    value="(436) 486-3538 x29071">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="email" class="form-control" id="Email"
                                                    value="k.anderson@example.com">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="twitter" type="text" class="form-control" id="Twitter"
                                                    value="https://twitter.com/#">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="facebook" type="text" class="form-control"
                                                    id="Facebook" value="https://facebook.com/#">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="instagram" type="text" class="form-control"
                                                    id="Instagram" value="https://instagram.com/#">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="linkedin" type="text" class="form-control"
                                                    id="Linkedin" value="https://linkedin.com/#">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form><!-- End Profile Edit Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-settings">

                                    <!-- Settings Form -->
                                    <form>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email
                                                Notifications</label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="changesMade"
                                                        checked>
                                                    <label class="form-check-label" for="changesMade">
                                                        Changes made to your account
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="newProducts"
                                                        checked>
                                                    <label class="form-check-label" for="newProducts">
                                                        Information on new products and services
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="proOffers">
                                                    <label class="form-check-label" for="proOffers">
                                                        Marketing and promo offers
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="securityNotify"
                                                        checked disabled>
                                                    <label class="form-check-label" for="securityNotify">
                                                        Security alerts
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form><!-- End settings Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form>

                                        <div class="row mb-3">
                                            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password" type="password" class="form-control"
                                                    id="currentPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="newpassword" type="password" class="form-control"
                                                    id="newPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter
                                                New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="renewpassword" type="password" class="form-control"
                                                    id="renewPassword">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </form><!-- End Change Password Form -->

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
@endsection
