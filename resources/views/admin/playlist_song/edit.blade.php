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
                            <form class="user" method="post" action="">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="form-label ml-3">Tên Playlist</label>
                                    <select name="playlist_id" class="form-control">
                                        <option value="0" {{ $value->playlist_id == 0 ? 'selected' : '' }}>Tên Playlist</option>
                                        @foreach($playlists as $playlist)
                                            <option value="{{ $playlist->id }}" {{ $value->playlist_id == $playlist->id ? 'selected' : '' }}>
                                                {{ $playlist->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="form-label ml-3">Tên bài hát</label>
                                    <select name="song_id" class="form-control">
                                        <option value="0" {{ $value->song_id == 0 ? 'selected' : '' }}>Tên bài hát</option>
                                        @foreach($songs as $song)
                                            <option value="{{ $song->id }}" {{ $value->song_id == $song->id ? 'selected' : '' }}>
                                                {{ $song->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Lưu
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
