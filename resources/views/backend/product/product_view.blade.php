@extends('admin.admin_master')
@section('admin')


<!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->
		
		<!-- Main content -->
		<section class="content">
		  <div class="row">		

			

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Product List
				  <span class="badge badge-pill badge-danger">{{ count($products) }}</span>
				  </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Image</th>
								<th>Product En</th>
								<th>Price</th>
								<th>Discount</th>
								<th>Quantity</th>
								<th>Status</th>
								<th>Action</th>								
							</tr>
						</thead>
						<tbody>
		@foreach($products as $item )
		<tr>
			<td><img src="{{asset($item->product_thumbnail)}}" style="width:60xp;height:60px"></td>
			<td style="width:20%" >{{ $item->product_name_en}}</td>
			<td>{{ $item->selling_prize}} $</td>
			<td>
				@if($item->discount_prize == NULL)
				<span class="badge badge-pill badge-success">No Data</span>
				@else
				@php
					$amount = $item->selling_prize - $item->discount_prize;
					$discount = ($amount/$item->selling_prize) * 100;
				@endphp
				<span class="badge badge-pill badge-success">{{ round($discount) }}%</span>
				@endif
			</td>
			<td>{{ $item->product_qty}} Pic</td>
            <td>
				@if($item->status == 1)
				<span class="badge badge-pill badge-success">Active</span>
				@else
				<span class="badge badge-pill badge-danger">InActive</span>
				@endif
			</td>
			
			<td class="text-center" style="width:20%" >
				<a href="{{route('product.details',$item->id)}}" class="btn btn-primary btn-sm" title="product details"><i class="fa fa-eye"></i></a>

				<a href="{{route('product.edit',$item->id)}}" class="btn btn-info btn-sm" title="Edit product"><i class="fa fa-pencil"></i></a>

				<a href="{{route('product.delete',$item->id)}}" class="btn btn-danger btn-sm" id="delete" title="Delete product"><i class="fa fa-trash"></i></a>
				@if($item->status == 1)
				<a href="{{route('product.inactive',$item->id)}}" class="btn btn-info btn-sm" title="Inactive Now"><i class="fa fa-arrow-down"></i></a>
				@else
				<a href="{{route('product.active',$item->id)}}" class="btn btn-success btn-sm" title="Active Now"><i class="fa fa-arrow-up"></i></a>
				@endif
			</td>								
		</tr>
		@endforeach
                        </tbody>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			       
			</div>




					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			       
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
 
  <!-- /.content-wrapper -->

@endsection



