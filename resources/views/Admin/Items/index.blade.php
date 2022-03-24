@extends('layouts.admin_header')

@section('content')

	<!--begin::Content-->
	<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
		<!--begin::Subheader-->
		<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
			<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
				<!--begin::Info-->
				<div class="d-flex align-items-center flex-wrap mr-1">
					<!--begin::Page Heading-->
					<div class="d-flex align-items-baseline flex-wrap mr-5">
						<!--begin::Page Title-->
						<h5 class="text-dark font-weight-bold my-1 mr-5">All Items</h5>
						<!--end::Page Title-->
						<!--begin::Breadcrumb-->
						<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
							<li class="breadcrumb-item">
								<a href="{{ url('/dashboard') }}" class="text-muted">Dashboard</a>
							</li>
							<li class="breadcrumb-item">
								<a href="" class="text-muted">Items</a>
							</li>
						</ul>
						<!--end::Breadcrumb-->
					</div>
					<!--end::Page Heading-->
				</div>
				<!--end::Info-->
				
			</div>
		</div>
		<!--end::Subheader-->

		@if ($errors->any())
	        <div class="alert alert-danger alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	            <h5><i class="icon fas fa-ban"></i> <strong>Whoops!</strong><br><br>
	                There were some problems with your input.</h5>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </div>
	    @endif

	    @if ($message = Session::get('success'))
	        <div class="alert alert-success alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	            <h5><i class="icon fas fa-check"></i> Success!</h5>
	            <p id="success_message">{{ $message }}</p>
	        </div>
	    @elseif ($message = Session::get('error'))
	        <div class="alert alert-danger alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	            <h5><i class="icon fas fa-ban"></i> Error!</h5>
	            <p id="error_message">{{ $message }}</p>
	        </div>
	    @endif

		<!--begin::Entry-->
		<div class="d-flex flex-column-fluid">
			<!--begin::Container-->
			<div class="container">
				
				<!--begin::Card-->
				<div class="card card-custom">
					<div class="card-header flex-wrap border-0 pt-6 pb-0">
						<div class="card-title">
							<!--begin::Button-->
							<a href="#" role="button" class="btn btn-primary font-weight-bolder" data-toggle="modal" 
								data-target="#createItem">
							<span class="svg-icon svg-icon-md">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<circle fill="#000000" cx="9" cy="15" r="6" />
										<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>New Record</a>
							<!--end::Button-->
							<h3 class="card-label"></h3>
						</div>
						<div class="card-toolbar">
							<!--begin::Dropdown-->
							<div class="dropdown dropdown-inline mr-2">
								<button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="svg-icon svg-icon-md">
									<!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24" />
											<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
											<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>Export</button>
								<!--begin::Dropdown Menu-->
								<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
									<!--begin::Navigation-->
									<ul class="navi flex-column navi-hover py-2">
										<li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
										<li class="navi-item">
											<a href="#" class="navi-link">
												<span class="navi-icon">
													<i class="la la-print"></i>
												</span>
												<span class="navi-text">Print</span>
											</a>
										</li>
										<li class="navi-item">
											<a href="#" class="navi-link">
												<span class="navi-icon">
													<i class="la la-copy"></i>
												</span>
												<span class="navi-text">Copy</span>
											</a>
										</li>
										<li class="navi-item">
											<a href="#" class="navi-link">
												<span class="navi-icon">
													<i class="la la-file-excel-o"></i>
												</span>
												<span class="navi-text">Excel</span>
											</a>
										</li>
										<li class="navi-item">
											<a href="#" class="navi-link">
												<span class="navi-icon">
													<i class="la la-file-text-o"></i>
												</span>
												<span class="navi-text">CSV</span>
											</a>
										</li>
										<li class="navi-item">
											<a href="#" class="navi-link">
												<span class="navi-icon">
													<i class="la la-file-pdf-o"></i>
												</span>
												<span class="navi-text">PDF</span>
											</a>
										</li>
									</ul>
									<!--end::Navigation-->
								</div>
								<!--end::Dropdown Menu-->
							</div>
							<!--end::Dropdown-->
						</div>
					</div>
					<div class="card-body">
						<!--begin: Datatable-->
						<table class="table table-bordered table-hover table-checkable mt-10" id="kt_datatable">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Description</th>
									<th>Warehouse</th>
									<th>Created Date</th>
									<th>Status</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach($items as $item)
								<tr>
									<td>{{ ++$i }}</td>
									<td>{{ $item->item_name }}</td>
									<td>{{ $item->item_price }}</td>
									<td>{{ $item->item_quantity }}</td>
									<td>{{ $item->item_description }}</td>
									<td>{{ $item->warehouse_name }}</td>
									<td>{{ date_format(date_create($item->created_at), 'jS M Y') }}</td>
									<td>
										@if($item->item_status == "on")
										<span class="dtr-data">
											<span class="label label-lg font-weight-bold label-light-success label-inline">Active</span>
										</span>
										@else
										<span class="dtr-data">
											<span class="label label-lg font-weight-bold label-light-danger label-inline">InActive</span>
										</span>
										@endif
									</td>
									<td>
										<a href="javascript:;" data-toggle="modal" data-target="#editItem{{$item->id}}" 
											title="Edit details" class="btn btn-sm btn-clean btn-icon">
											<i class="la la-edit"></i>
										</a>
										<a href="javascript:;" data-toggle="modal" data-target="#deleteItem{{$item->id}}" 
											class="btn btn-sm btn-clean btn-icon" title="Delete">
											<i class="la la-trash"></i>
										</a>
									</td>
								</tr>

								<!-- Edit Warehouse Modal -->
								<div class="modal fade" id="editItem{{$item->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
								    <div class="modal-dialog modal-lg" role="document">
								        <div class="modal-content">
								            <div class="modal-header">
								                <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
								                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								                    <i aria-hidden="true" class="ki ki-close"></i>
								                </button>
								            </div>
								            <div class="modal-body">
								                <!--begin::Form-->
												<form class="form" method="POST" action="{{ route('items.update', $item->id) }}">
													@csrf
													@method('PUT')

													<div class="card-body">
														<div class="form-group row mt-3">
															<label class="col-lg-2 col-form-label text-lg-right"> Name:</label>
															<div class="col-sm-4">
																<input type="text" name="item_name" class="form-control" placeholder="Item name" value="{{$item->item_name}}" required />
															</div>
															<label class="col-lg-2 col-form-label text-lg-right"> Brand:</label>
															<div class="col-sm-4">
																<input type="text" name="item_brand" class="form-control" 
																placeholder="Item Brand" value="{{$item->item_brand}}" />
															</div>
														</div>
														<div class="form-group row">
															<label class="col-lg-2 col-form-label text-lg-right"> Price:</label>
															<div class="col-sm-4">
																<input type="number" min="0" name="item_price" class="form-control" placeholder="Item Price" required value="{{$item->item_price}}" />
															</div>
															<label class="col-lg-2 col-form-label text-lg-right"> Quantity:</label>
															<div class="col-sm-4">
																<input type="number" name="item_quantity" class="form-control" placeholder="Item Quantity" value="{{$item->item_quantity}}" required />
															</div>
														</div>
														<div class="form-group row">
															<label class="col-lg-2 col-form-label text-lg-right"> Warehouse:</label>
															<div class="col-sm-4">
																<select class="form-control" name="warehouse_id" id="exampleSelect1" style="width: 100%;" required>
																	@foreach($warehouses as $warehouse)
																	@if($item->warehouse_id == $warehouse->id)
																	<option value="{{$warehouse->id}}" selected>{{$warehouse->warehouse_name}}</option>
																	@else
																	<option value="{{$warehouse->id}}">{{$warehouse->warehouse_name}}</option>
																	@endif
																	@endforeach
																</select>
															</div>
															<label class="col-lg-2 col-form-label text-lg-right"> Type:</label>
															<div class="col-sm-4">
																<input type="text" name="item_type" class="form-control" 
																placeholder="Item Type" value="{{$item->item_type}}" />
															</div>
														</div>
														<div class="form-group row">
															<label class="col-lg-2 col-form-label text-lg-right"> Is Active:</label>
															<div class="col-sm-4">
																<span class="switch switch-primary switch-icon">
																    <label>
																    @if($item->item_status == "on")
																     <input type="checkbox" class="form-control" checked="checked" 
																     name="item_status"/>
																     @else
																     <input type="checkbox" class="form-control" name="item_status"/>
																     @endif
																     <span></span>
																    </label>
																   </span>
															</div>
															<label class="col-lg-2 col-form-label text-lg-right"> Description:</label>
															<div class="col-sm-4">
																<textarea class="form-control" name="item_description" placeholder="Item Description" id="exampleTextarea" rows="2" 
																	required>{{$item->item_description}}</textarea>
															</div>
														</div>
													</div>
													
													<div class="card-footer">
														<div class="row">
															<div class="col-lg-8">
																<button type="submit" class="btn btn-primary mr-2">Update</button>
															</div>
														</div>
													</div>
												</form>
												<!--end::Form-->
								            </div>
								        </div>
								    </div>
								</div>
								<!-- Modal End Here -->

								<!-- Delete Warehouse Modal -->
								<div class="modal fade" id="deleteItem{{$item->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
								    <div class="modal-dialog" role="document">
								        <div class="modal-content bg-danger">
								            <div class="modal-header">
								              <h4 class="modal-title">Are you sure you want to delete <br> 
							              	<strong>"{{ $item->item_name }}"</strong> ?
								              </h4>
								            </div>

								            <form action="{{ route('items.destroy',$item->id) }}" method="POST">
								                @csrf
								                @method('DELETE')
								            <div class="modal-footer justify-content-between">
								              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
								              <button type="submit" class="btn btn-outline-light">Delete</button>
								            </div>
								            </form>
								        </div>
								    </div>
								</div>
								<!-- Modal End Here -->
								@endforeach
								
							</tbody>
						</table>
						<!--end: Datatable-->
					</div>
				</div>
				<!--end::Card-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Entry-->
	</div>
	<!--end::Content-->


	<!-- Create new Warehouse Modal -->
	<div class="modal fade" id="createItem" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
	    <div class="modal-dialog modal-lg" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">Crate Item</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <i aria-hidden="true" class="ki ki-close"></i>
	                </button>
	            </div>
	            <div class="modal-body">
	                <!--begin::Form-->
					<form class="form" method="POST" action="{{ route('items.store') }}">
						@csrf
						<div class="card-body">
							<div class="form-group row mt-3">
								<label class="col-lg-2 col-form-label text-lg-right"> Name:</label>
								<div class="col-sm-4">
									<input type="text" name="item_name" class="form-control" placeholder="Item name" required />
								</div>
								<label class="col-lg-2 col-form-label text-lg-right"> Brand:</label>
								<div class="col-sm-4">
									<input type="text" name="item_brand" class="form-control" placeholder="Item Brand" />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-2 col-form-label text-lg-right"> Price:</label>
								<div class="col-sm-4">
									<input type="number" min="0" name="item_price" class="form-control" placeholder="Item Price" required />
								</div>
								<label class="col-lg-2 col-form-label text-lg-right"> Quantity:</label>
								<div class="col-sm-4">
									<input type="number" name="item_quantity" class="form-control" placeholder="Item Quantity" required />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-2 col-form-label text-lg-right"> Warehouse:</label>
								<div class="col-sm-4">
									<select class="form-control" name="warehouse_id" id="exampleSelect1" style="width: 100%;" required>
										<option selected disabled>Select Warehouse</option>
										@foreach($warehouses as $warehouse)
										<option value="{{$warehouse->id}}">{{$warehouse->warehouse_name}}</option>
										@endforeach
									</select>
								</div>
								<label class="col-lg-2 col-form-label text-lg-right"> Type:</label>
								<div class="col-sm-4">
									<input type="text" name="item_type" class="form-control" placeholder="Item Type" />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-2 col-form-label text-lg-right"> Is Active:</label>
								<div class="col-sm-4">
									<span class="switch switch-primary switch-icon">
									    <label>
									     <input type="checkbox" class="form-control" checked="checked" name="item_status"/>
									     <span></span>
									    </label>
									   </span>
								</div>
								<label class="col-lg-2 col-form-label text-lg-right"> Description:</label>
								<div class="col-sm-4">
									<textarea class="form-control" name="item_description" placeholder="Item Description" 
										id="exampleTextarea" rows="2"></textarea>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="row">
								<div class="col-lg-8">
									<button type="submit" class="btn btn-primary mr-2">Submit</button>
									<button type="reset" class="btn btn-secondary">Cancel</button>
								</div>
							</div>
						</div>
					</form>
					<!--end::Form-->
	            </div>
	        </div>
	    </div>
	</div>
	<!-- Modal End Here -->

@endsection
