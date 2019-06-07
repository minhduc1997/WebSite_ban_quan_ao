@extends('backend.layout.main')
@section('tittle',"Thêm Biến thể")
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li class="active">Biến thể</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Biến thể</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="col-md-12">
            <div class="panel panel-default">
                <form method="POST">
                    @csrf
                    @if (session('thongbao'))
                    <div class="alert bg-success" role="alert">
                            <svg class="glyph stroked checkmark">
                                <use xlink:href="#stroked-checkmark"></use>
                            </svg>Đã xóa thành công<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                        </div>
                    @endif
                    <div class="panel-heading" align='center'>
                        Giá cho từng biến thể sản phẩm : {{ $product->name }} ({{ $product->code }})
                    </div>
                    <div class="panel-body" align='center'>
                        <table class="panel-body">
                            <thead>
                                <tr>
                                    <th width='33%'>Biến thể</th>
                                    <th width='33%'>Giá (có thể trống)</th>
                                    <th width='33%'>Tuỳ chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product->variant as $variants)
                                <tr>

                                        <td scope="row">
                                            @foreach ($variants->values as $item)
                                            <b>{{ $item->attribute->name }}</b> : {{ $item->value }}<br>
                                            @endforeach

                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input name="variant[{{ $variants->id }}]" class="form-control" placeholder="Giá cho biến thể" value="{{ $variants->price }}">
                                            </div>
                                        </td>
                                        <td>
                                            <a onclick="return del_variant()" id="" class="btn btn-warning" href="/admin/product/del-variant/{{ $variants->id }}" role="button">Xoá</a>

                                        </td>

                                    </tr>
                                @endforeach


                            </tbody>
                        </table>

                    </div>
                    <div align='right'><button class="btn btn-success" type="submit"> Cập nhật </button> <a class="btn btn-warning"
                            href="admin/product" role="button">Bỏ qua</a></div>
                </form>
            </div>
        </div>

    </div>
    <!--/.main-->
    <script>
        function del_variant(){
            return confirm("Xóa sản phẩm này");
        }
    </script>
    @endsection
