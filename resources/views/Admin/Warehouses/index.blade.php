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
						<h5 class="text-dark font-weight-bold my-1 mr-5">Warehouse</h5>
						<!--end::Page Title-->
						<!--begin::Breadcrumb-->
						<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
							<li class="breadcrumb-item">
								<a href="" class="text-muted">Dashboard</a>
							</li>
							<li class="breadcrumb-item">
								<a href="" class="text-muted">Warehouse</a>
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
								data-target="#createWarehouse">
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
									<th>Country</th>
									<th>City</th>
									<th>Address</th>
									<th>Phone</th>
									<th>Email</th>
									<th>Created Date</th>
									<th>Status</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach($warehouses as $warehouse)
								<tr>
									<td>{{ ++$i }}</td>
									<td>{{ $warehouse->warehouse_name }}</td>
									<td>{{ $warehouse->warehouse_country }}</td>
									<td>{{ $warehouse->warehouse_city }}</td>
									<td>{{ $warehouse->warehouse_address }}</td>
									<td>{{ $warehouse->warehouse_phone }}</td>
									<td>{{ $warehouse->warehouse_email }}</td>
									<td>{{ date_format(date_create($warehouse->created_at), 'jS M Y') }}</td>
									<td>
										@if($warehouse->warehouse_status == "on")
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
										<a href="javascript:;" data-toggle="modal" data-target="#editWarehouse{{$warehouse->id}}" 
											title="Edit details" class="btn btn-sm btn-clean btn-icon">
											<i class="la la-edit"></i>
										</a>
										<a href="javascript:;" data-toggle="modal" data-target="#deleteWarehouse{{$warehouse->id}}" 
											class="btn btn-sm btn-clean btn-icon" title="Delete">
											<i class="la la-trash"></i>
										</a>
									</td>
								</tr>

								<!-- Edit Warehouse Modal -->
								<div class="modal fade" id="editWarehouse{{$warehouse->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
								    <div class="modal-dialog modal-lg" role="document">
								        <div class="modal-content">
								            <div class="modal-header">
								                <h5 class="modal-title" id="exampleModalLabel">Edit Warehouse</h5>
								                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								                    <i aria-hidden="true" class="ki ki-close"></i>
								                </button>
								            </div>
								            <div class="modal-body">
								                <!--begin::Form-->
												<form class="form" method="POST" action="{{ route('warehouse.update', $warehouse->id) }}">
													@csrf
													@method('PUT')

													<div class="card-body">
														<div class="form-group row mt-3">
															<label class="col-lg-2 col-form-label text-lg-right"> Name:</label>
															<div class="col-sm-4">
																<input type="text" name="warehouse_name" class="form-control" 
																placeholder="Warehouse name" value="{{$warehouse->warehouse_name}}" required />
															</div>
															<label class="col-lg-2 col-form-label text-lg-right"> Email:</label>
															<div class="col-sm-4">
																<input type="email" name="warehouse_email" class="form-control" placeholder="Warehouse Email" value="{{$warehouse->warehouse_email}}" required />
															</div>
														</div>
														<div class="form-group row">
															<label class="col-lg-2 col-form-label text-lg-right"> Phone:</label>
															<div class="col-sm-4">
																<input type="phone" name="warehouse_phone" class="form-control" placeholder="Enter Warehouse Phone number" 
																value="{{$warehouse->warehouse_phone}}" required />
															</div>
															<label class="col-lg-2 col-form-label text-lg-right"> Address:</label>
															<div class="col-sm-4">
																<input type="text" name="warehouse_address" class="form-control" placeholder="Warehouse Address" value="{{$warehouse->warehouse_address}}" required />
															</div>
														</div>
														<div class="form-group row">
															<label class="col-lg-2 col-form-label text-lg-right"> Country:</label>
															<div class="col-sm-4">
															    <select class="form-control" name="warehouse_country" id="exampleSelect1" style="width: 100%;">
																	<option value="{{$warehouse->warehouse_country}}" selected>{{$warehouse->warehouse_country}}</option>
																	<option value="Afghanistan">Afghanistan</option>
								                                    <option value="Albania">Albania</option>
								                                    <option value="Algeria">Algeria</option>
								                                    <option value="American Samoa">American Samoa</option>
								                                    <option value="Andorra">Andorra</option>
								                                    <option value="Angola">Angola</option>
								                                    <option value="Anguilla">Anguilla</option>
								                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
								                                    <option value="Argentina">Argentina</option>
								                                    <option value="Armenia">Armenia</option>
								                                    <option value="Aruba">Aruba</option>
								                                    <option value="Australia">Australia</option>
								                                    <option value="Austria">Austria</option>
								                                    <option value="Azerbaijan">Azerbaijan</option>
								                                    <option value="Bahamas">Bahamas</option>
								                                    <option value="Bahrain">Bahrain</option>
								                                    <option value="Bangladesh">Bangladesh</option>
								                                    <option value="Barbados">Barbados</option>
								                                    <option value="Belarus">Belarus</option>
								                                    <option value="Belgium">Belgium</option>
								                                    <option value="Belize">Belize</option>
								                                    <option value="Benin">Benin</option>
								                                    <option value="Bermuda">Bermuda</option>
								                                    <option value="Bhutan">Bhutan</option>
								                                    <option value="Bolivia">Bolivia</option>
								                                    <option value="Bonaire">Bonaire</option>
								                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
								                                    <option value="Botswana">Botswana</option>
								                                    <option value="Brazil">Brazil</option>
								                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
								                                    <option value="Brunei">Brunei</option>
								                                    <option value="Bulgaria">Bulgaria</option>
								                                    <option value="Burkina Faso">Burkina Faso</option>
								                                    <option value="Burundi">Burundi</option>
								                                    <option value="Cambodia">Cambodia</option>
								                                    <option value="Cameroon">Cameroon</option>
								                                    <option value="Canada">Canada</option>
								                                    <option value="Canary Islands">Canary Islands</option>
								                                    <option value="Cape Verde">Cape Verde</option>
								                                    <option value="Cayman Islands">Cayman Islands</option>
								                                    <option value="Central African Republic">Central African Republic</option>
								                                    <option value="Chad">Chad</option>
								                                    <option value="Channel Islands">Channel Islands</option>
								                                    <option value="Chile">Chile</option>
								                                    <option value="China">China</option>
								                                    <option value="Christmas Island">Christmas Island</option>
								                                    <option value="Cocos Island">Cocos Island</option>
								                                    <option value="Colombia">Colombia</option>
								                                    <option value="Comoros">Comoros</option>
								                                    <option value="Congo">Congo</option>
								                                    <option value="Cook Islands">Cook Islands</option>
								                                    <option value="Costa Rica">Costa Rica</option>
								                                    <option value="Cote DIvoire">Cote DIvoire</option>
								                                    <option value="Croatia">Croatia</option>
								                                    <option value="Cuba">Cuba</option>
								                                    <option value="Curaco">Curacao</option>
								                                    <option value="Cyprus">Cyprus</option>
								                                    <option value="Czech Republic">Czech Republic</option>
								                                    <option value="Denmark">Denmark</option>
								                                    <option value="Djibouti">Djibouti</option>
								                                    <option value="Dominica">Dominica</option>
								                                    <option value="Dominican Republic">Dominican Republic</option>
								                                    <option value="East Timor">East Timor</option>
								                                    <option value="Ecuador">Ecuador</option>
								                                    <option value="Egypt">Egypt</option>
								                                    <option value="El Salvador">El Salvador</option>
								                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
								                                    <option value="Eritrea">Eritrea</option>
								                                    <option value="Estonia">Estonia</option>
								                                    <option value="Ethiopia">Ethiopia</option>
								                                    <option value="Falkland Islands">Falkland Islands</option>
								                                    <option value="Faroe Islands">Faroe Islands</option>
								                                    <option value="Fiji">Fiji</option>
								                                    <option value="Finland">Finland</option>
								                                    <option value="France">France</option>
								                                    <option value="French Guiana">French Guiana</option>
								                                    <option value="French Polynesia">French Polynesia</option>
								                                    <option value="French Southern Ter">French Southern Ter</option>
								                                    <option value="Gabon">Gabon</option>
								                                    <option value="Gambia">Gambia</option>
								                                    <option value="Georgia">Georgia</option>
								                                    <option value="Germany">Germany</option>
								                                    <option value="Ghana">Ghana</option>
								                                    <option value="Gibraltar">Gibraltar</option>
								                                    <option value="Great Britain">Great Britain</option>
								                                    <option value="Greece">Greece</option>
								                                    <option value="Greenland">Greenland</option>
								                                    <option value="Grenada">Grenada</option>
								                                    <option value="Guadeloupe">Guadeloupe</option>
								                                    <option value="Guam">Guam</option>
								                                    <option value="Guatemala">Guatemala</option>
								                                    <option value="Guinea">Guinea</option>
								                                    <option value="Guyana">Guyana</option>
								                                    <option value="Haiti">Haiti</option>
								                                    <option value="Hawaii">Hawaii</option>
								                                    <option value="Honduras">Honduras</option>
								                                    <option value="Hong Kong">Hong Kong</option>
								                                    <option value="Hungary">Hungary</option>
								                                    <option value="Iceland">Iceland</option>
								                                    <option value="Indonesia">Indonesia</option>
								                                    <option value="India">India</option>
								                                    <option value="Iran">Iran</option>
								                                    <option value="Iraq">Iraq</option>
								                                    <option value="Ireland">Ireland</option>
								                                    <option value="Isle of Man">Isle of Man</option>
								                                    <option value="Israel">Israel</option>
								                                    <option value="Italy">Italy</option>
								                                    <option value="Jamaica">Jamaica</option>
								                                    <option value="Japan">Japan</option>
								                                    <option value="Jordan">Jordan</option>
								                                    <option value="Kazakhstan">Kazakhstan</option>
								                                    <option value="Kenya">Kenya</option>
								                                    <option value="Kiribati">Kiribati</option>
								                                    <option value="Korea North">Korea North</option>
								                                    <option value="Korea Sout">Korea South</option>
								                                    <option value="Kuwait">Kuwait</option>
								                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
								                                    <option value="Laos">Laos</option>
								                                    <option value="Latvia">Latvia</option>
								                                    <option value="Lebanon">Lebanon</option>
								                                    <option value="Lesotho">Lesotho</option>
								                                    <option value="Liberia">Liberia</option>
								                                    <option value="Libya">Libya</option>
								                                    <option value="Liechtenstein">Liechtenstein</option>
								                                    <option value="Lithuania">Lithuania</option>
								                                    <option value="Luxembourg">Luxembourg</option>
								                                    <option value="Macau">Macau</option>
								                                    <option value="Macedonia">Macedonia</option>
								                                    <option value="Madagascar">Madagascar</option>
								                                    <option value="Malaysia">Malaysia</option>
								                                    <option value="Malawi">Malawi</option>
								                                    <option value="Maldives">Maldives</option>
								                                    <option value="Mali">Mali</option>
								                                    <option value="Malta">Malta</option>
								                                    <option value="Marshall Islands">Marshall Islands</option>
								                                    <option value="Martinique">Martinique</option>
								                                    <option value="Mauritania">Mauritania</option>
								                                    <option value="Mauritius">Mauritius</option>
								                                    <option value="Mayotte">Mayotte</option>
								                                    <option value="Mexico">Mexico</option>
								                                    <option value="Midway Islands">Midway Islands</option>
								                                    <option value="Moldova">Moldova</option>
								                                    <option value="Monaco">Monaco</option>
								                                    <option value="Mongolia">Mongolia</option>
								                                    <option value="Montserrat">Montserrat</option>
								                                    <option value="Morocco">Morocco</option>
								                                    <option value="Mozambique">Mozambique</option>
								                                    <option value="Myanmar">Myanmar</option>
								                                    <option value="Nambia">Nambia</option>
								                                    <option value="Nauru">Nauru</option>
								                                    <option value="Nepal">Nepal</option>
								                                    <option value="Netherland Antilles">Netherland Antilles</option>
								                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
								                                    <option value="Nevis">Nevis</option>
								                                    <option value="New Caledonia">New Caledonia</option>
								                                    <option value="New Zealand">New Zealand</option>
								                                    <option value="Nicaragua">Nicaragua</option>
								                                    <option value="Niger">Niger</option>
								                                    <option value="Nigeria">Nigeria</option>
								                                    <option value="Niue">Niue</option>
								                                    <option value="Norfolk Island">Norfolk Island</option>
								                                    <option value="Norway">Norway</option>
								                                    <option value="Oman">Oman</option>
								                                    <option value="Pakistan">Pakistan</option>
								                                    <option value="Palau Island">Palau Island</option>
								                                    <option value="Palestine">Palestine</option>
								                                    <option value="Panama">Panama</option>
								                                    <option value="Papua New Guinea">Papua New Guinea</option>
								                                    <option value="Paraguay">Paraguay</option>
								                                    <option value="Peru">Peru</option>
								                                    <option value="Phillipines">Philippines</option>
								                                    <option value="Pitcairn Island">Pitcairn Island</option>
								                                    <option value="Poland">Poland</option>
								                                    <option value="Portugal">Portugal</option>
								                                    <option value="Puerto Rico">Puerto Rico</option>
								                                    <option value="Qatar">Qatar</option>
								                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
								                                    <option value="Republic of Serbia">Republic of Serbia</option>
								                                    <option value="Reunion">Reunion</option>
								                                    <option value="Romania">Romania</option>
								                                    <option value="Russia">Russia</option>
								                                    <option value="Rwanda">Rwanda</option>
								                                    <option value="St Barthelemy">St Barthelemy</option>
								                                    <option value="St Eustatius">St Eustatius</option>
								                                    <option value="St Helena">St Helena</option>
								                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
								                                    <option value="St Lucia">St Lucia</option>
								                                    <option value="St Maarten">St Maarten</option>
								                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
								                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
								                                    <option value="Saipan">Saipan</option>
								                                    <option value="Samoa">Samoa</option>
								                                    <option value="Samoa American">Samoa American</option>
								                                    <option value="San Marino">San Marino</option>
								                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
								                                    <option value="Saudi Arabia">Saudi Arabia</option>
								                                    <option value="Senegal">Senegal</option>
								                                    <option value="Seychelles">Seychelles</option>
								                                    <option value="Sierra Leone">Sierra Leone</option>
								                                    <option value="Singapore">Singapore</option>
								                                    <option value="Slovakia">Slovakia</option>
								                                    <option value="Slovenia">Slovenia</option>
								                                    <option value="Solomon Islands">Solomon Islands</option>
								                                    <option value="Somalia">Somalia</option>
								                                    <option value="South Africa">South Africa</option>
								                                    <option value="Spain">Spain</option>
								                                    <option value="Sri Lanka">Sri Lanka</option>
								                                    <option value="Sudan">Sudan</option>
								                                    <option value="Suriname">Suriname</option>
								                                    <option value="Swaziland">Swaziland</option>
								                                    <option value="Sweden">Sweden</option>
								                                    <option value="Switzerland">Switzerland</option>
								                                    <option value="Syria">Syria</option>
								                                    <option value="Tahiti">Tahiti</option>
								                                    <option value="Taiwan">Taiwan</option>
								                                    <option value="Tajikistan">Tajikistan</option>
								                                    <option value="Tanzania">Tanzania</option>
								                                    <option value="Thailand">Thailand</option>
								                                    <option value="Togo">Togo</option>
								                                    <option value="Tokelau">Tokelau</option>
								                                    <option value="Tonga">Tonga</option>
								                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
								                                    <option value="Tunisia">Tunisia</option>
								                                    <option value="Turkey">Turkey</option>
								                                    <option value="Turkmenistan">Turkmenistan</option>
								                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
								                                    <option value="Tuvalu">Tuvalu</option>
								                                    <option value="Uganda">Uganda</option>
								                                    <option value="United Kingdom">United Kingdom</option>
								                                    <option value="Ukraine">Ukraine</option>
								                                    <option value="United Arab Erimates">United Arab Emirates</option>
								                                    <option value="United States of America">United States of America</option>
								                                    <option value="Uraguay">Uruguay</option>
								                                    <option value="Uzbekistan">Uzbekistan</option>
								                                    <option value="Vanuatu">Vanuatu</option>
								                                    <option value="Vatican City State">Vatican City State</option>
								                                    <option value="Venezuela">Venezuela</option>
								                                    <option value="Vietnam">Vietnam</option>
								                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
								                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
								                                    <option value="Wake Island">Wake Island</option>
								                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
								                                    <option value="Yemen">Yemen</option>
								                                    <option value="Zaire">Zaire</option>
								                                    <option value="Zambia">Zambia</option>
								                                    <option value="Zimbabwe">Zimbabwe</option>
																</select>
															</div>
															<label class="col-lg-2 col-form-label text-lg-right"> City:</label>
															<div class="col-sm-4">
																<input type="text" name="warehouse_city" class="form-control" 
																placeholder="Warehouse City" value="{{$warehouse->warehouse_city}}" required />
															</div>
														</div>
														<div class="form-group row">
															<label class="col-lg-2 col-form-label text-lg-right"> Is Active:</label>
															<div class="col-sm-4">
																<span class="switch switch-primary switch-icon">
																    <label>
																    @if($warehouse->warehouse_city == "on")
																     <input type="checkbox" class="form-control" checked="checked" 
																     	name="warehouse_status"/>
																     @else
																     <input type="checkbox" class="form-control" name="warehouse_status"/>
																     @endif
																     <span></span>
																    </label>
																   </span>
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
								<div class="modal fade" id="deleteWarehouse{{$warehouse->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
								    <div class="modal-dialog" role="document">
								        <div class="modal-content bg-danger">
								            <div class="modal-header">
								              <h4 class="modal-title">Are you sure you want to delete <br> 
							              	<strong>"{{ $warehouse->warehouse_name }}/ {{ $warehouse->warehouse_address }}"</strong> ?
								              </h4>
								            </div>

								            <form action="{{ route('warehouse.destroy',$warehouse->id) }}" method="POST">
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
	<div class="modal fade" id="createWarehouse" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
	    <div class="modal-dialog modal-lg" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">Crate Warehouse</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <i aria-hidden="true" class="ki ki-close"></i>
	                </button>
	            </div>
	            <div class="modal-body">
	                <!--begin::Form-->
					<form class="form" method="POST" action="{{ route('warehouse.store') }}">
						@csrf
						<div class="card-body">
							<div class="form-group row mt-3">
								<label class="col-lg-2 col-form-label text-lg-right"> Name:</label>
								<div class="col-sm-4">
									<input type="text" name="warehouse_name" class="form-control" placeholder="Warehouse name" required />
								</div>
								<label class="col-lg-2 col-form-label text-lg-right"> Email:</label>
								<div class="col-sm-4">
									<input type="email" name="warehouse_email" class="form-control" placeholder="Warehouse Email" required />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-2 col-form-label text-lg-right"> Phone:</label>
								<div class="col-sm-4">
									<input type="phone" name="warehouse_phone" class="form-control" placeholder="Enter Warehouse Phone number" required />
								</div>
								<label class="col-lg-2 col-form-label text-lg-right"> Address:</label>
								<div class="col-sm-4">
									<input type="text" name="warehouse_address" class="form-control" placeholder="Warehouse Address" required />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-2 col-form-label text-lg-right"> Country:</label>
								<div class="col-sm-4">
									<select class="form-control" name="warehouse_country" id="exampleSelect1" style="width: 100%;">
										<option selected disabled>Select Country</option>
										<option value="Afghanistan">Afghanistan</option>
	                                    <option value="Albania">Albania</option>
	                                    <option value="Algeria">Algeria</option>
	                                    <option value="American Samoa">American Samoa</option>
	                                    <option value="Andorra">Andorra</option>
	                                    <option value="Angola">Angola</option>
	                                    <option value="Anguilla">Anguilla</option>
	                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
	                                    <option value="Argentina">Argentina</option>
	                                    <option value="Armenia">Armenia</option>
	                                    <option value="Aruba">Aruba</option>
	                                    <option value="Australia">Australia</option>
	                                    <option value="Austria">Austria</option>
	                                    <option value="Azerbaijan">Azerbaijan</option>
	                                    <option value="Bahamas">Bahamas</option>
	                                    <option value="Bahrain">Bahrain</option>
	                                    <option value="Bangladesh">Bangladesh</option>
	                                    <option value="Barbados">Barbados</option>
	                                    <option value="Belarus">Belarus</option>
	                                    <option value="Belgium">Belgium</option>
	                                    <option value="Belize">Belize</option>
	                                    <option value="Benin">Benin</option>
	                                    <option value="Bermuda">Bermuda</option>
	                                    <option value="Bhutan">Bhutan</option>
	                                    <option value="Bolivia">Bolivia</option>
	                                    <option value="Bonaire">Bonaire</option>
	                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
	                                    <option value="Botswana">Botswana</option>
	                                    <option value="Brazil">Brazil</option>
	                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
	                                    <option value="Brunei">Brunei</option>
	                                    <option value="Bulgaria">Bulgaria</option>
	                                    <option value="Burkina Faso">Burkina Faso</option>
	                                    <option value="Burundi">Burundi</option>
	                                    <option value="Cambodia">Cambodia</option>
	                                    <option value="Cameroon">Cameroon</option>
	                                    <option value="Canada">Canada</option>
	                                    <option value="Canary Islands">Canary Islands</option>
	                                    <option value="Cape Verde">Cape Verde</option>
	                                    <option value="Cayman Islands">Cayman Islands</option>
	                                    <option value="Central African Republic">Central African Republic</option>
	                                    <option value="Chad">Chad</option>
	                                    <option value="Channel Islands">Channel Islands</option>
	                                    <option value="Chile">Chile</option>
	                                    <option value="China">China</option>
	                                    <option value="Christmas Island">Christmas Island</option>
	                                    <option value="Cocos Island">Cocos Island</option>
	                                    <option value="Colombia">Colombia</option>
	                                    <option value="Comoros">Comoros</option>
	                                    <option value="Congo">Congo</option>
	                                    <option value="Cook Islands">Cook Islands</option>
	                                    <option value="Costa Rica">Costa Rica</option>
	                                    <option value="Cote DIvoire">Cote DIvoire</option>
	                                    <option value="Croatia">Croatia</option>
	                                    <option value="Cuba">Cuba</option>
	                                    <option value="Curaco">Curacao</option>
	                                    <option value="Cyprus">Cyprus</option>
	                                    <option value="Czech Republic">Czech Republic</option>
	                                    <option value="Denmark">Denmark</option>
	                                    <option value="Djibouti">Djibouti</option>
	                                    <option value="Dominica">Dominica</option>
	                                    <option value="Dominican Republic">Dominican Republic</option>
	                                    <option value="East Timor">East Timor</option>
	                                    <option value="Ecuador">Ecuador</option>
	                                    <option value="Egypt">Egypt</option>
	                                    <option value="El Salvador">El Salvador</option>
	                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
	                                    <option value="Eritrea">Eritrea</option>
	                                    <option value="Estonia">Estonia</option>
	                                    <option value="Ethiopia">Ethiopia</option>
	                                    <option value="Falkland Islands">Falkland Islands</option>
	                                    <option value="Faroe Islands">Faroe Islands</option>
	                                    <option value="Fiji">Fiji</option>
	                                    <option value="Finland">Finland</option>
	                                    <option value="France">France</option>
	                                    <option value="French Guiana">French Guiana</option>
	                                    <option value="French Polynesia">French Polynesia</option>
	                                    <option value="French Southern Ter">French Southern Ter</option>
	                                    <option value="Gabon">Gabon</option>
	                                    <option value="Gambia">Gambia</option>
	                                    <option value="Georgia">Georgia</option>
	                                    <option value="Germany">Germany</option>
	                                    <option value="Ghana">Ghana</option>
	                                    <option value="Gibraltar">Gibraltar</option>
	                                    <option value="Great Britain">Great Britain</option>
	                                    <option value="Greece">Greece</option>
	                                    <option value="Greenland">Greenland</option>
	                                    <option value="Grenada">Grenada</option>
	                                    <option value="Guadeloupe">Guadeloupe</option>
	                                    <option value="Guam">Guam</option>
	                                    <option value="Guatemala">Guatemala</option>
	                                    <option value="Guinea">Guinea</option>
	                                    <option value="Guyana">Guyana</option>
	                                    <option value="Haiti">Haiti</option>
	                                    <option value="Hawaii">Hawaii</option>
	                                    <option value="Honduras">Honduras</option>
	                                    <option value="Hong Kong">Hong Kong</option>
	                                    <option value="Hungary">Hungary</option>
	                                    <option value="Iceland">Iceland</option>
	                                    <option value="Indonesia">Indonesia</option>
	                                    <option value="India">India</option>
	                                    <option value="Iran">Iran</option>
	                                    <option value="Iraq">Iraq</option>
	                                    <option value="Ireland">Ireland</option>
	                                    <option value="Isle of Man">Isle of Man</option>
	                                    <option value="Israel">Israel</option>
	                                    <option value="Italy">Italy</option>
	                                    <option value="Jamaica">Jamaica</option>
	                                    <option value="Japan">Japan</option>
	                                    <option value="Jordan">Jordan</option>
	                                    <option value="Kazakhstan">Kazakhstan</option>
	                                    <option value="Kenya">Kenya</option>
	                                    <option value="Kiribati">Kiribati</option>
	                                    <option value="Korea North">Korea North</option>
	                                    <option value="Korea Sout">Korea South</option>
	                                    <option value="Kuwait">Kuwait</option>
	                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
	                                    <option value="Laos">Laos</option>
	                                    <option value="Latvia">Latvia</option>
	                                    <option value="Lebanon">Lebanon</option>
	                                    <option value="Lesotho">Lesotho</option>
	                                    <option value="Liberia">Liberia</option>
	                                    <option value="Libya">Libya</option>
	                                    <option value="Liechtenstein">Liechtenstein</option>
	                                    <option value="Lithuania">Lithuania</option>
	                                    <option value="Luxembourg">Luxembourg</option>
	                                    <option value="Macau">Macau</option>
	                                    <option value="Macedonia">Macedonia</option>
	                                    <option value="Madagascar">Madagascar</option>
	                                    <option value="Malaysia">Malaysia</option>
	                                    <option value="Malawi">Malawi</option>
	                                    <option value="Maldives">Maldives</option>
	                                    <option value="Mali">Mali</option>
	                                    <option value="Malta">Malta</option>
	                                    <option value="Marshall Islands">Marshall Islands</option>
	                                    <option value="Martinique">Martinique</option>
	                                    <option value="Mauritania">Mauritania</option>
	                                    <option value="Mauritius">Mauritius</option>
	                                    <option value="Mayotte">Mayotte</option>
	                                    <option value="Mexico">Mexico</option>
	                                    <option value="Midway Islands">Midway Islands</option>
	                                    <option value="Moldova">Moldova</option>
	                                    <option value="Monaco">Monaco</option>
	                                    <option value="Mongolia">Mongolia</option>
	                                    <option value="Montserrat">Montserrat</option>
	                                    <option value="Morocco">Morocco</option>
	                                    <option value="Mozambique">Mozambique</option>
	                                    <option value="Myanmar">Myanmar</option>
	                                    <option value="Nambia">Nambia</option>
	                                    <option value="Nauru">Nauru</option>
	                                    <option value="Nepal">Nepal</option>
	                                    <option value="Netherland Antilles">Netherland Antilles</option>
	                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
	                                    <option value="Nevis">Nevis</option>
	                                    <option value="New Caledonia">New Caledonia</option>
	                                    <option value="New Zealand">New Zealand</option>
	                                    <option value="Nicaragua">Nicaragua</option>
	                                    <option value="Niger">Niger</option>
	                                    <option value="Nigeria">Nigeria</option>
	                                    <option value="Niue">Niue</option>
	                                    <option value="Norfolk Island">Norfolk Island</option>
	                                    <option value="Norway">Norway</option>
	                                    <option value="Oman">Oman</option>
	                                    <option value="Pakistan">Pakistan</option>
	                                    <option value="Palau Island">Palau Island</option>
	                                    <option value="Palestine">Palestine</option>
	                                    <option value="Panama">Panama</option>
	                                    <option value="Papua New Guinea">Papua New Guinea</option>
	                                    <option value="Paraguay">Paraguay</option>
	                                    <option value="Peru">Peru</option>
	                                    <option value="Phillipines">Philippines</option>
	                                    <option value="Pitcairn Island">Pitcairn Island</option>
	                                    <option value="Poland">Poland</option>
	                                    <option value="Portugal">Portugal</option>
	                                    <option value="Puerto Rico">Puerto Rico</option>
	                                    <option value="Qatar">Qatar</option>
	                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
	                                    <option value="Republic of Serbia">Republic of Serbia</option>
	                                    <option value="Reunion">Reunion</option>
	                                    <option value="Romania">Romania</option>
	                                    <option value="Russia">Russia</option>
	                                    <option value="Rwanda">Rwanda</option>
	                                    <option value="St Barthelemy">St Barthelemy</option>
	                                    <option value="St Eustatius">St Eustatius</option>
	                                    <option value="St Helena">St Helena</option>
	                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
	                                    <option value="St Lucia">St Lucia</option>
	                                    <option value="St Maarten">St Maarten</option>
	                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
	                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
	                                    <option value="Saipan">Saipan</option>
	                                    <option value="Samoa">Samoa</option>
	                                    <option value="Samoa American">Samoa American</option>
	                                    <option value="San Marino">San Marino</option>
	                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
	                                    <option value="Saudi Arabia">Saudi Arabia</option>
	                                    <option value="Senegal">Senegal</option>
	                                    <option value="Seychelles">Seychelles</option>
	                                    <option value="Sierra Leone">Sierra Leone</option>
	                                    <option value="Singapore">Singapore</option>
	                                    <option value="Slovakia">Slovakia</option>
	                                    <option value="Slovenia">Slovenia</option>
	                                    <option value="Solomon Islands">Solomon Islands</option>
	                                    <option value="Somalia">Somalia</option>
	                                    <option value="South Africa">South Africa</option>
	                                    <option value="Spain">Spain</option>
	                                    <option value="Sri Lanka">Sri Lanka</option>
	                                    <option value="Sudan">Sudan</option>
	                                    <option value="Suriname">Suriname</option>
	                                    <option value="Swaziland">Swaziland</option>
	                                    <option value="Sweden">Sweden</option>
	                                    <option value="Switzerland">Switzerland</option>
	                                    <option value="Syria">Syria</option>
	                                    <option value="Tahiti">Tahiti</option>
	                                    <option value="Taiwan">Taiwan</option>
	                                    <option value="Tajikistan">Tajikistan</option>
	                                    <option value="Tanzania">Tanzania</option>
	                                    <option value="Thailand">Thailand</option>
	                                    <option value="Togo">Togo</option>
	                                    <option value="Tokelau">Tokelau</option>
	                                    <option value="Tonga">Tonga</option>
	                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
	                                    <option value="Tunisia">Tunisia</option>
	                                    <option value="Turkey">Turkey</option>
	                                    <option value="Turkmenistan">Turkmenistan</option>
	                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
	                                    <option value="Tuvalu">Tuvalu</option>
	                                    <option value="Uganda">Uganda</option>
	                                    <option value="United Kingdom">United Kingdom</option>
	                                    <option value="Ukraine">Ukraine</option>
	                                    <option value="United Arab Erimates">United Arab Emirates</option>
	                                    <option value="United States of America">United States of America</option>
	                                    <option value="Uraguay">Uruguay</option>
	                                    <option value="Uzbekistan">Uzbekistan</option>
	                                    <option value="Vanuatu">Vanuatu</option>
	                                    <option value="Vatican City State">Vatican City State</option>
	                                    <option value="Venezuela">Venezuela</option>
	                                    <option value="Vietnam">Vietnam</option>
	                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
	                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
	                                    <option value="Wake Island">Wake Island</option>
	                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
	                                    <option value="Yemen">Yemen</option>
	                                    <option value="Zaire">Zaire</option>
	                                    <option value="Zambia">Zambia</option>
	                                    <option value="Zimbabwe">Zimbabwe</option>
									</select>
								</div>
								<label class="col-lg-2 col-form-label text-lg-right"> City:</label>
								<div class="col-sm-4">
									<input type="text" name="warehouse_city" class="form-control" placeholder="Warehouse City" required />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-2 col-form-label text-lg-right"> Is Active:</label>
								<div class="col-sm-4">
									<span class="switch switch-primary switch-icon">
									    <label>
									     <input type="checkbox" class="form-control" checked="checked" name="warehouse_status"/>
									     <span></span>
									    </label>
									   </span>
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
