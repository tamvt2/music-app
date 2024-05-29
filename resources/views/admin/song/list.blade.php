@extends('layouts.index')

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

                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 50px">ID</th>
                            <th>Tên playlist</th>
                            <th>Người dùng</th>
                            <th style="width: 100px">&nbsp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($values as $key => $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->username }}</td>
                                <td>
                                    <a type="button" class="btn btn-warning btn-sm mb-1" href="/admin/song/edit/{{ $value->id }}">
                                        Sửa
                                    </a>
                                    <a class="btn btn-danger btn-sm removeRow" data-id="{{ $value->id }}" data-url="/admin/song/destroy" href="">
                                        Xóa
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="card-footer clearfix">
                    {!! $values->links() !!}
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
