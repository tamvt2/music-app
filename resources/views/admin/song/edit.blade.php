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
                                    <label for="name" class="form-label ml-3">Tên bài hát</label>
                                    <input type="text" class="form-control form-control-user" name="name" placeholder="Nhập tên bài hát" value="{{ $value->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="artist" class="form-label ml-3">Nghệ sĩ</label>
                                    <input type="text" class="form-control form-control-user" name="artist" placeholder="Nhập nghệ sĩ" value="{{ $value->artist }}">
                                </div>
                                <div class="form-group">
                                    <label for="album" class="form-label ml-3">Album</label>
                                    <input type="text" class="form-control form-control-user" name="album" placeholder="Nhập album" value="{{ $value->album }}">
                                </div>
                                <div class="form-group">
                                    <label for="genre" class="form-label ml-3">Thể loại</label>
                                    <input type="text" class="form-control form-control-user" name="genre" placeholder="Nhập thể loại" value="{{ $value->genre }}">
                                </div>
                                <div class="form-group">
                                    <label for="path" class="form-label ml-3">Đường dẫn đến file bài hát</label>
                                    <input type="text" class="form-control form-control-user" name="path" placeholder="Nhập đường dẫn đến file bài hát" value="{{ $value->path }}">
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
