@extends('backend.layout.main')
@section('tittle',"Thêm sản phẩm")
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">


        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa sản phẩm</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <form method="POST" enctype="multipart/form-data">
                @csrf
            <div class="col-xs-6 col-md-12 col-lg-12">

                    <div class="panel panel-primary">
                <div class="panel-heading">{{ $product->name }} ({{ $product->code }})</div>
                        <div class="panel-body">
                            <div class="row" style="margin-bottom:40px">
                                <div class="col-xs-8">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Danh mục</label>
                                                <select name="category" class="form-control">
                                                    {{ GetCategory($category,0,'',$product->category_id) }}
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Mã sản phẩm</label>
                                                <input required type="text" name="product_code" class="form-control"
                                                    value="{{ $product->code }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Tên sản phẩm</label>
                                                <input required type="text" name="product_name" class="form-control"
                                                    value="{{ $product->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Giá sản phẩm (Giá chung)</label> <a href="/admin/product/add-variant/{{ $product->id }}"><span
                                                        class="glyphicon glyphicon-chevron-right"></span>
                                                    Giá theo biến thể</a>
                                                <input required type="number" name="product_price" class="form-control"
                                                    value="150000">
                                            </div>

                                            <div class="form-group">
                                                <label>Trạng thái</label>
                                                <select required name="product_state" class="form-control">
                                                    <option @if ($product->state==1)

                                                    @endif selected value="1">Còn hàng</option>
                                                    <option  @if ($product->state==0)

                                                        @endif selected  value="0">Hết hàng</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                    <label>Nổi bật</label>
                                                    <select required name="product_feature" class="form-control">
                                                        <option @if ($product->product_featured==1)

                                                        @endif selected value="1">Có</option>
                                                        <option  @if ($product->product_featured==0)

                                                            @endif selected  value="0">Không</option>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Ảnh sản phẩm</label>
                                                <input id="img" type="file" name="product_img" class="form-control hidden"
                                                    onchange="changeImg(this)">
                                                <img id="avatar" class="thumbnail" width="100%" height="350px" src="/backend/img/{{ $product->img }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Thông tin</label>
                        <textarea required name="info" style="width: 100%;height: 100px;">{{ $product->info }}</textarea>
                                    </div>


            </div>
            <div class="col-xs-4">

                <div class="panel panel-default">
                    <div class="panel-body tabs">
                        <label>Các thuộc Tính <a href="/admin/product/detail-attr"><span class="glyphicon glyphicon-cog"></span>
                                Tuỳ chọn</a></label>
                                @if ($errors->has('attr_name'))
                                <p class="text-danger">{{ $errors->first('attr_name') }}</p>
                                 @endif
                                 @if ($errors->has('value_name'))
                                 <p class="text-danger">{{ $errors->first('value_name') }}</p>
                                  @endif
                                  @if (session('thongbao'))
                                  <div class="alert bg-success" role="alert">
                                        <svg class="glyph stroked checkmark">
                                            <use xlink:href="#stroked-checkmark"></use>
                                        </svg>{{session('thongbao') }}<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                                    </div>
                                  @endif
                        <ul class="nav nav-tabs">
                                @foreach ($attribute as $attr)
                                <li @if ($attr->id==1)
                                        class='active'
                                @endif ><a href="#{{ $attr->id  }}" data-toggle="tab">{{ $attr->name }}</a></li>
                                @endforeach


                            <li><a href="#tab-add" data-toggle="tab">+</a></li>
                        </ul>
                        <div class="tab-content">
                            @foreach ($attribute as $attr)
                            <div
                            @if ($attr->id==1)
                            class="tab-pane fade  active  in"
                            @else
                            class="tab-pane fade  in"
                            @endif
                             id="{{ $attr->id }}">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                @foreach ($attr->values as $item)
                                                <th>{{ $item->value }}</th>
                                                @endforeach



                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr> @foreach ($attr->values as $item)
                                                <td> <input @if (check_value($product,$item->id))
                                                    checked
                                                @endif class="form-check-input" type="checkbox" name="attr[{{ $attr->id}}][]"
                                                        value="{{  $item->id }}"> </td>
                                                        @endforeach

                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                    {{--  <form method="POST" action="/admin/product/add-value">
                                        @csrf
                                    <div class="form-group">
                                        <label for="">Thêm biến thể cho thuộc tính</label>
                                        <input type="hidden" name="attr_id" value="{{ $attr->id }}">
                                        <input name="value_name" type="text" class="form-control"
                                            aria-describedby="helpId" placeholder="">
                                        <div> <button name="add_val" type="submit">Thêm</button></div>
                                    </div>
                                    </form>  --}}
                                </div>
                            @endforeach




                              <div class="tab-pane fade" id="tab-add">
                                <form action="/admin/product/add-attr" method="POST" >
                                    @csrf
                                <div class="form-group">
                                    <label for="">Tên thuộc tính mới</label>
                                    <input type="text" class="form-control" name="attr_name"
                                        aria-describedby="helpId" placeholder="">
                                </div>

                                <button type="submit"  class="btn btn-success"> <span
                                        class="glyphicon glyphicon-plus"></span>
                                    Thêm thuộc tính</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="form-group">

                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <p></p>

                        </label>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Miêu tả</label>
                            <textarea id="editor" required name="description" style="width: 100%;height: 100px;">{{ $product->describe }}</textarea>

                        </div>


                        <button class="btn btn-success" name="add-product" type="submit">Sửa sản phẩm</button>
                        <button class="btn btn-danger" type="reset">Huỷ bỏ</button>

                    </div>

                </div>
            </div>



            </form>
        </div>

        <div class="clearfix"></div>
    </div>
    </div>
    </div>
    </div>

    <!--/.row-->

    </div>
    <!--end main-->

@endsection
    @section('script')
    @parent
    <script>

        function changeImg(input) {
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function (e) {
                    //Thay đổi đường dẫn ảnh
                    $('#avatar').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function () {
            $('#avatar').click(function () {
                $('#img').click();
            });
        });

    </script>
   @endsection
