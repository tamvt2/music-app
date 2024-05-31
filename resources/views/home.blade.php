<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/Music_style.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts/topbar')
                <!-- End of Topbar -->

                <div class="player">
                    <!-- Dashboard -->
                    <div id="dashboard">
                        <!-- Header -->
                        <header>
                            <h4>Now playing:</h4>
                            <h2>String 57th & 9th</h2>
                        </header>

                        <!-- CD -->
                        <div class="cd">
                            <div class="cd-thumb" style="background-image: url('https://i.ytimg.com/vi/jTLhQf5KJSc/maxresdefault.jpg')">
                            </div>
                        </div>

                        <!-- Control -->
                        <div class="control">
                            <div class="btn btn-favorite btn-hover">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="btn btn-repeat btn-hover">
                                <i class="fas fa-redo"></i>
                            </div>
                            <div class="btn btn-prev btn-hover">
                                <i class="fas fa-step-backward"></i>
                            </div>
                            <div class="btn btn-toggle-play btn-hover">
                                <i class="fas fa-pause icon-pause"></i>
                                <i class="fas fa-play icon-play"></i>
                            </div>
                            <div class="btn btn-next btn-hover">
                                <i class="fas fa-step-forward"></i>
                            </div>
                            <div class="btn btn-random btn-hover">
                                <i class="fas fa-random"></i>
                            </div>
                            <div class="btn btn-download">
                                <i class="fas fa-download"></i>
                            </div>
                        </div>
                        <div class="time">
                            <p class="current-time">00:00</p>
                            <p class="duration-time">00:00</p>
                        </div>
                        <input id="progress" class="progress" type="range" value="0" step="1" min="0" max="100">

                        <audio id="audio" src=""></audio>
                        </div>

                        <!-- Playlist -->
                        <div class="playlist">
                        <div class="song">
                            <div class="thumb" style="background-image: url('https://i.ytimg.com/vi/jTLhQf5KJSc/maxresdefault.jpg')">
                            </div>
                            <div class="body">
                                <h3 class="title">Music name</h3>
                                <p class="author">Singer</p>
                            </div>
                            <div class="option">
                                <i class="fas fa-ellipsis-h"></i>
                            </div>
                        </div>
                        <div class="song">
                            <div class="thumb" style="background-image: url('https://i.ytimg.com/vi/jTLhQf5KJSc/maxresdefault.jpg')">
                            </div>
                            <div class="body">
                                <h3 class="title">Music name</h3>
                                <p class="author">Singer</p>
                            </div>
                            <div class="option">
                                <i class="fas fa-ellipsis-h"></i>
                            </div>
                        </div>
                        <div class="song">
                            <div class="thumb" style="background-image: url('https://i.ytimg.com/vi/jTLhQf5KJSc/maxresdefault.jpg')">
                            </div>
                            <div class="body">
                                <h3 class="title">Music name</h3>
                                <p class="author">Singer</p>
                            </div>
                            <div class="option">
                                <i class="fas fa-ellipsis-h"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/custom.js"></script>
    <script src="/js/Music.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
</body>
</html>
