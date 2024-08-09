@extends('admin.head')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Xin Chào!') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Bạn Đã Đăng Nhập Vào Trang Quản Trị - NguyenTuanStore') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
