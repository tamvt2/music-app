@extends('layouts/index')

@section('content')
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    @include('layouts/sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            @include('layouts/topbar')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container">

                <!-- Outer Row -->
                <div class="row justify-content-center mt-5">
                    <div class="col-xl-10 col-lg-12 col-md-9">
                        <div class="card-body p-0">
                            @include('layouts/alert')
                            <form class="user" method="post" action="{{ url('admin/playlist_song/add') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="form-label ml-3">Tên playlist</label>
                                    <select name="playlist_id" class="form-control">
                                        <option value="0">Tên playlist</option>
                                        @foreach($playlists as $playlist)
                                            <option value="{{ $playlist->id }}">{{ $playlist->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="form-label ml-3">Tên bài hát</label>
                                    <select name="song_id" class="form-control">
                                        <option value="0">Tên bài hát</option>
                                        @foreach($songs as $song)
                                            <option value="{{ $song->id }}">{{ $song->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button class="btn btn-primary btn-user btn-block">
                                    Thêm
                                </button>
                            </form>
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
@endsection
