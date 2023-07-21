@extends('admin.admin_master')
@section('admin')


<!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->
		
		<!-- Main content -->
		<section class="content">
		  <div class="row">		

			

			


<!-- =================start add sesrch page ========================== -->
            <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Search By Date</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  
        <form method="post" action="{{route('search-by-date')}}" enctype="multipart/form-data">

            @csrf
					  	
            <div class="form-group">
                <h5>Select Date<span class="text-danger">*</span></h5>
                <input type="date" name="date" class="form-control" >
				@error('date')
				<span class="text-danger">{{ $message }}</span>
				@enderror
            </div>        
             
            <div class="text-xs-right">
                <input type="submit" class="btn btn-success btn-rounded mb-5 btn-block" value="Search">
            </div>                        

		</form>

					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			       
			</div>
			<!-- /.col -->

            <div class="col-4">

<div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">Search By Months</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">
         
<form method="post" action="{{route('search-by-month')}}" enctype="multipart/form-data">

@csrf
             
<div class="form-group">
   <h5>Select Month<span class="text-danger">*</span></h5>
   <select name="month" class="form-control" id="">
    <option label="Choose One"></option>
    <option value="January">January</option>
    <option value="February">February</option>
    <option value="March">March</option>
    <option value="April">April</option>
    <option value="May">May</option>
    <option value="June">June</option>
    <option value="July">July</option>
    <option value="August">August</option>
    <option value="September">September</option>
    <option value="October">October</option>
    <option value="November">November</option>
    <option value="December">December</option>
   </select>
   @error('month')
   <span class="text-danger">{{ $message }}</span>
   @enderror
</div>        

<div class="form-group">
   <h5>Select Year<span class="text-danger">*</span></h5>
   <select name="year_name" class="form-control" id="">
    <option label="Choose One"></option>
    <option value="2023">2023</option>
    <option value="2024">2024</option>
    <option value="2025">2025</option>
    <option value="2026">2026</option>
    <option value="2027">2027</option>
    <option value="2028">2028</option>
    <option value="2029">2029</option>
    <option value="2030">2030</option>
    <option value="2031">2031</option>
    <option value="2032">2032</option>
    <option value="2033">2033</option>
    <option value="2034">2034</option>
   </select>
   @error('year_name')
   <span class="text-danger">{{ $message }}</span>
   @enderror
</div>        


<div class="text-xs-right">
   <input type="submit" class="btn btn-success btn-rounded mb-5 btn-block" value="Search">
</div>                        

</form>

       </div>
   </div>
   <!-- /.box-body -->
 </div>
 <!-- /.box -->

      
</div>
<!-- /.col -->

<div class="col-4">

<div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">Search by Year</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">
         
<form method="post" action="{{route('search-by-year')}}" enctype="multipart/form-data">

@csrf
             
<div class="form-group">
   <h5>Select Year<span class="text-danger">*</span></h5>
   <select name="year" class="form-control" id="">
    <option label="Choose One"></option>
    <option value="2023">2023</option>
    <option value="2024">2024</option>
    <option value="2025">2025</option>
    <option value="2026">2026</option>
    <option value="2027">2027</option>
    <option value="2028">2028</option>
    <option value="2029">2029</option>
    <option value="2030">2030</option>
    <option value="2031">2031</option>
    <option value="2032">2032</option>
    <option value="2033">2033</option>
    <option value="2034">2034</option>
   </select>
   @error('year')
   <span class="text-danger">{{ $message }}</span>
   @enderror
</div>            

<div class="text-xs-right">
   <input type="submit" class="btn btn-success btn-rounded mb-5 btn-block" value="Search">
</div>                        

</form>

       </div>
   </div>
   <!-- /.box-body -->
 </div>
 <!-- /.box -->

      
</div>
<!-- /.col -->

<!-- --------------End search Page ---------------------- -->
            
		  </div>
          
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
 
  <!-- /.content-wrapper -->

@endsection



