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
                            <form class="user" method="post" action="{{ url('admin/song/add') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="form-label ml-3">Tên bài hát</label>
                                    <input type="text" class="form-control form-control-user"
                                        name="name"
                                        placeholder="Nhập tên bài hát">
                                </div>
                                <div class="form-group">
                                    <label for="artist" class="form-label ml-3">Nghệ sĩ</label>
                                    <input type="text" class="form-control form-control-user"
                                        name="artist"
                                        placeholder="Nhập nghệ sĩ">
                                </div>
                                <div class="form-group">
                                    <label class="form-label ml-3">Ảnh</label>
                                    <input type="file" name="file" class="form-control mb-3" id="upload">
                                    <div id="image_show"></div>
                                    <input type="hidden" name="url_img" id="url_img">
                                </div>
                                <div class="form-group">
                                    <label for="album" class="form-label ml-2">Album</label>
                                    <input type="text" class="form-control form-control-user"
                                        name="album"
                                        placeholder="Nhập album">
                                </div>
                                <div class="form-group">
                                    <label for="genre" class="form-label ml-3">Thể loại</label>
                                    <input type="text" class="form-control form-control-user"
                                        name="genre"
                                        placeholder="Nhập thể loại">
                                </div>
                                <div class="form-group">
                                    <label for="path" class="form-label ml-3">Đường dẫn đến file bài hát</label>
                                    <input type="text" class="form-control form-control-user"
                                        name="path"
                                        placeholder="Nhập đường dẫn đến file bài hát">
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
