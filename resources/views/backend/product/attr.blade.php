@extends('backend.layout.main')
@section('tittle',"Thuộc Tính")
@section('content')

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Danh mục</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lý thuộc tính</h1>

			</div>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
                            @if (session('thongbao'))
                            <p class="text-danger">{{ session('thongbao') }}</p>
                            @endif
							@foreach ($attrs as $attr)
                            <div class="row magrin-attr">
                                <div class="col-md-2 panel-blue widget-left">
                                    <strong class="large">{{ $attr->name }}</strong>
                                    <a class="delete-attr" href="/admin/product/del-attr/{{ $attr->id }}"><i class="fas fa-times"></i></a>
                                    <a class="edit-attr" href="/admin/product/edit-attr/{{  $attr->id  }}"><i class="fas fa-edit"></i></a>
                                </div>
                                <div class="col-md-10 widget-right boxattr">

                                    @foreach ($attr->values as $value)
                                    <div class="text-attr">{{ $value->value }}
                                        <a href="/admin/product/edit-attr" class="edit-value"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="del-value"><i class="fas fa-times"></i></a>
                                    </div>
                                    @endforeach

                                    <div class="text-attr"><a href="#" class="add-value"><i class="fas fa-plus-circle"></i></i></a></div>

                                </div>
                        </div>
                            @endforeach



					</div>
				</div>
			</div>
			<!--/.col-->
		</div>
		<!--/.row-->
	</div>
	<!--/.main-->

    @endsection
