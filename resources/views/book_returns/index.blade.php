@extends('layouts.app')

@section('content')
<div class="">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<!-- ========== Breadcrumbs Start ========== -->
		<div class="card-header card-header-content-sm-between">
			<h1 class="card-header-title mb-2 mb-sm-0">
				<?= isset($title) ? '' . $title : null; ?>
				<small>List</small>
			</h1>
			<!-- Nav -->
			<ul class="nav nav-segment nav-fill">
				<li class="nav-item">
					<a class="nav-link " href="#" >Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active "><?= isset($title) ? '' . $title : null; ?></a>
				</li>
			</ul>
			<!-- End Nav -->
		</div>
		<!-- ========== Breadcrumbs End ========== -->
	</section>
	<section class="content">
		<div class="row"> 
			<div class="col-md-12">
				<div class="card card-info mb-3">
					<div class="card-header with-border">
						<h3 class="card-title">Filter Data <?= $title ?></h3>
					</div><!-- /.card-header -->
					<div class="card-body">
						<form id="searchForm" action="{{ route('book_returns.get_data') }}" method="GET">

						<div class="row mb-2">
							<label class="col-sm-3 col-form-label form-label">Periode</label>
							<div class="col-sm-4">
								<div class="d-flex align-items-center">									
									<select class="form-control form-select" name="n" id="th_ajar" >
										@foreach ($periods as $row): 
											<option <?= (isset($f['n']) AND $f['n'] == $row['period_id']) ? 'selected' : '' ?> 
                                                    value="<?= $row['period_id'] ?>"><?= $row['period_start'].'/'.$row['period_end'] ?>
                                            </option>
										@endforeach
									</select>
								</div>
							</div>
						</div>

						<div class="row mb-2">
							<label class="col-sm-3 col-form-label form-label">Member ID</label>
							<div class="col-sm-4">
								<div class="d-flex align-items-center">									
									<div class="input-group">
										<input type="text" id="memberID"
												class="form-control" 
												autofocus 
												name="r" <?= (isset($f['r'])) ? 'placeholder="'.$f['r'].'"' : 'placeholder="ID"' ?> 
												required>
										<span class="input-group-btn col-3">
											<button class="btn btn-primary" type="submit">Cari</button>
										</span>
										<span class="input-group-btn"></span>
										<span class="input-group-btn ">
											<button type="button" 
													class="btn btn-outline-dark" 
													data-bs-toggle="modal" 
													data-bs-target="#dataMember"><b>Data Anggota</b>
											</button>
										</span>
									</div>
								</div>
							</div>
						</div>

					</form>
				</div><!-- /.card-body -->
			</div><!-- /.card -->
			
			@php if($member_id){ @endphp
				
				<div class="card card-success mb-3">
					<div class="card-header with-border" style="padding-bottom:15px;">
						<h3 class="card-title">Informasi Anggota</h3>						
					</div>

					<div class="d-flex">
                        <div class="flex-shrink-0">
							<?php if (isset($f['n']) AND $f['r'] == $member['member_id']) { ?> 
								<?php if (!empty($member['member_img'])) { ?>
									<img src="<?= upload_url('member/'.$member['member_img']) ?>" class="img-thumbnail img-responsive">
								<?php } else { ?>
									<img src="<?= media_url('img/user.png') ?>" class="img-thumbnail img-responsive">
								<?php } 
							} ?>		
                        </div>

                        <div class="flex-grow-1 ms-3">
                          	<div class="row align-items-center">
							  	<div class="card-body">
									<table class="table table-striped">
										<tbody>
											<tr>
												<td width="200">Periode</td><td width="4">:</td>
												@foreach ($periods as $row) 
													<?= (isset($_GET['n']) AND $_GET['n'] == $row->period_id) ? 
													'<td><strong>'.$row->period_start.'/'.$row->period_end.'<strong></td>' : '' ?> 
												@endforeach
											</tr>
											<tr>
												<td>Member ID</td>
												<td>:</td>
												<?= (isset($_GET['r']) AND $_GET['r'] == $member->member_id) ? 
												'<td>'.$member->member_id.'</td>' : '' ?> 
											</tr>
											<tr>
												<td>Nama </td>
												<td>:</td>
													<?= (isset($_GET['n']) AND $_GET['r'] == $member->member_id) ? 
													'<td>'.$member->member_name.'</td>' : '' ?> 
											</tr>
											
										</tbody>
									</table>
								</div>	
                        	</div>
                      	</div>
					</div>

				</div>
				
				<div class="row mb-3" style="font-size:12px">
					<div class="col-md-8">
						<div class="card card-primary">
							<div class="card-header with-border">
								<h3 class="card-title">Transaksi Terakhir</h3>
							</div><!-- /.card-header -->
							<div class="card-body">
								<table class="table table-responsive table-bordered" style="white-space: nowrap;">
									<thead>
									<tr class="bg-soft-dark">
										<th>Request ID</th>
										<th>Nama Buku</th>
										<th>Tanggal Pinjam</th>
										<th>Tanggal Kembali</th>
										<th>Status</th>
									</tr>
									</thead>
									<tbody>
									 
                                    @foreach ($borrows as $row) 
									<tr>
										<td>{{ $row->book_request_id }}</td>
										<td>{{ $row->title }}</td>
										<td>{{ $row->borrow_date }}</td>
										<td>{{ $row->return_date }}</td>
										<td>
											<?php if($row['status']=='returned'){ ?>
												<span class="badge bg-soft-success text-success">
													<span class="legend-indicator bg-success"></span>returned
												</span>
											<?php }elseif($row['status']=='borrowed'){ ?>
												<span class="badge bg-soft-info text-info">
													<span class="legend-indicator bg-info"></span>borrowed
												</span>
											<?php }elseif($row['status']=='pending'){ ?>
												<span class="badge bg-soft-warning text-warning">
													<span class="legend-indicator bg-warning"></span>pending
												</span>
											<?php } ?>
										</td>
									</tr>
									@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
					

					<div class="col-md-4">
						<div class="card card-primary">
							<div class="card-header with-border">
								<h3 class="card-title">Cetak Riwayat Transaksi</h3>
							</div><!-- /.card-header -->
							<div class="card-body">
								<form action="<?//= site_url('manage/borrow/borrow_summary') ?>" method="GET" class="view-pdf">
									<input type="hidden" name="n" value="<?//= $f['n'] ?>">
									<input type="hidden" name="r" value="<?//= $f['r'] ?>">
									<div class="mb-4">
										<label class="h5">Tanggal Transaksi</label>										

										<div id="payoutFlatpickr" class="js-flatpickr flatpickr-custom input-group"
											data-hs-flatpickr-options='{
												"appendTo": "#payoutFlatpickr",
												"dateFormat": "Y-m-d",
												"wrap": true
											}'>
											<div class="input-group-prepend input-group-text" data-bs-toggle>
												<i class="bi-calendar-week"></i>
											</div>
											<input type="text" name="d" class="flatpickr-custom-form-control form-control" id="payoutFlatpickrLabel" placeholder="Select dates" data-input value="<?= date('Y-m-d') ?>" required>
										</div>

									</div>
									<button class="btn btn-primary btn-block" 
											formtarget="_blank" 
											type="submit">Cetak</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				
				<div class="" style="font-size:12px;">
					<!-- List Tagihan Bulanan --> 
					<div class="card card-primary">
						<div class="card-header with-border">
							<h3 class="card-title">List Pinjaman</h3>
						</div><!-- /.card-header -->
						<div class="card-body">
							<div class="">		
								<div class="card-body table-responsive">									
									<table class="table table-bordered" style="white-space: nowrap;">
										<thead>
											<tr class="bg-soft-dark">
												<th>No.</th>
												<th>Tanggal Pinjam</th>
												<th>Request ID</th>
												<th>Nama Buku</th>
												<th>Status</th>
												<th>Pengembalian</th>
											</tr>
										</thead>
										<tbody>
											<?php $no=1; ?> 
												@foreach ($borrowed as $row):												
											<tr>
												<td>{{ $no }}</td>
												<td>{{ $row->borrow_date }}</td>
												<td>{{ $row->book_request_id }}</td>
												<td>{{ $row->title }}</td>
												<td>	
													<?php if($row->status=='returned'){ ?>
														<span class="badge bg-soft-success text-success">
															<span class="legend-indicator bg-success"></span>returned
														</span>
													<?php }elseif($row->status=='borrowed'){ ?>
														<span class="badge bg-soft-info text-info">
															<span class="legend-indicator bg-info"></span>borrowed
														</span>
													<?php }elseif($row->status=='pending'){ ?>
														<span class="badge bg-soft-warning text-warning">
															<span class="legend-indicator bg-warning"></span>pending
														</span>
													<?php } ?>
												</td>
												<td>
													<button type="button" 
                                                        class="btn btn-success btn-xs" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#prosesReturned"
                                                        data-borrow_id="{{ $row->borrow_id }}"
														data-book_id="{{ $row->book_id }}"
                                                        id="prosesBtn{{ $row->borrow_id }}" 
                                                        title="Proses Returned"><i class="fa fa-check-circle"></i> Proses
                                                	</button>
												</td>
											</tr>    
												<?php $no++; ?>
												@endforeach                             	    			    				
										</tbody>
									</table>
								</div>								
							</div>
						</div>
					</div>
				</div>
																	
			@php } @endphp

		</div>
	</section>
</div>


	<!-- proses pengembalian buku -->
	<div class="modal fade" id="prosesReturned" role="dialog">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">																			
					<h4 class="modal-title">Proses Pengembalian Buku</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="{{ route('book_returns.proses') }}" method="POST">
				@csrf
					@method('POST')
				<div class="modal-body">

					<input type="hidden" class="form-control" name="period_id" value="<?= isset($_GET['n']) ? $_GET['n'] : '' ?>" readonly>
					<input type="hidden" class="form-control" name="member_id" value="<?= isset($_GET['r']) ? $_GET['r'] : '' ?>" readonly>							
					
					<div class="form-group mb-3" style="display:none">
						<label>Borrow ID</label>
						<input type="text" class="form-control" name="borrow_id" id="borrowID" readonly>
					</div>

					<div class="form-group mb-3" style="display:none">
						<label>Book ID</label>
						<input type="text" class="form-control" name="book_id" id="book_id" readonly>
					</div>

					<div class="form-group mb-3">
						<label>Tanggal Pengembalian</label>
						<div id="returnedFlatpickr" class="js-flatpickr flatpickr-custom input-group"
							data-hs-flatpickr-options='{
								"appendTo": "#returnedFlatpickr",
								"dateFormat": "Y-m-d",
								"wrap": true
							}'>
							<div class="input-group-prepend input-group-text" data-bs-toggle>
								<i class="bi-calendar-week"></i>
							</div>
							<input type="text" name="return_date" 
								class="flatpickr-custom-form-control form-control" 
								id="returnedFlatpickrLabel" 
								placeholder="Select dates" data-input value="<?= date('Y-m-d') ?>" required>
						</div>
					</div>
					
					<div class="form-group mb-3">
						<label>Keterangan *</label>
						<input type="text" name="borrow_note" id="borrow_note" class="form-control" placeholder="Keterangan">
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Proses</button>
				</div>
                </form>
			</div>
		</div>
	</div>
	<!-- end proses pengembalian buku -->

<script>
	function ambil_data(id){
        var memberId    = id;
        // Set value to the input field
        $("#memberID").val(memberId);
        // Submit the form
        $("#searchForm").submit();
    }
</script>

		
<!-- ========== Popup Data Student Start ========== -->
<div class="modal fade" id="dataMember" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cari Data Siswa</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                    <div class="card-body table-responsive">
                        <table id="dtable" class="table table-hover">
                            <thead class="thead-light">						
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($members)) {
                                    $i = 1;
                                    foreach ($members as $row):
                                        ?>
                                        <tr>													
                                            <td><?= $i; ?></td>
                                            <td><?= $row['member_id']; ?></td>
                                            <td><?= $row['member_name']; ?></td>
                                            <td><label class="label <?= ($row['is_active']==1) ? 'label-success' : 'label-danger' ?>"><?php echo ($row['is_active']==1) ? 'Aktif' : 'Tidak Aktif' ?></label></td>
                                            <td align="center">
                                                <button type="button" 
                                                        data-bs-dismiss="modal" 
                                                        class="btn btn-primary btn-xs" 
                                                        onclick="ambil_data('<?= $row['member_id']; ?>')">Pilih
                                                </button>
                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                    endforeach;
                                } else {
                                    ?>
                                    <tr id="row">
                                        <td colspan="8" align="center">Data Kosong</td>
                                    </tr>
                                    <?php } ?>
                            </tbody>
                        </table>	
                    </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Tutup</button>
                </div>

            </div>
        </div>
    </div>
</div>
<!--end popup data santri  -->

<!-- set default pageLength: 5 -->
<script>
    $(document).ready( function () {
        var table = $('#dtable').DataTable( {
            pageLength : 5,
            lengthMenu: [[5, 10, 20, 100, -1], [5, 10, 20, 100, 'All']]
        } )
    } );
</script>
<!-- ========== Popup Data Student End ========== -->

<script>
$(document).ready(function() {
	$("#selectall").change(function() {
		$(".checkbox").prop('checked', $(this).prop("checked"));
	});

    // function ambil_data(){
    //     window.location.href = "{{ route('book_returns.get_data') }}";    
    // }
});
</script>

<script type="text/javascript">
(function(a){
	a.createModal=function(b){
		defaults={
			title:"",message:"Your Message Goes Here!",closeButton:true,scrollable:false
		};
		var b=a.extend({},defaults,b);
		var c=(b.scrollable===true)?'style="max-height: 420px;overflow-y: auto;"':"";
		html='<div class="modal fade" id="myModal">';
		html+='<div class="modal-dialog">';
		html+='<div class="modal-content">';
		html+='<div class="modal-header">';
		html+='<button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">x</button>';
		if(b.title.length>0){
			html+='<h4 class="modal-title">'+b.title+"</h4>"
		}
		html+="</div>";
		html+='<div class="modal-body" '+c+">";
		html+=b.message;
		html+="</div>";
		html+='<div class="modal-footer">';
		if(b.closeButton===true){
			html+='<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>'
		}
		html+="</div>";
		html+="</div>";
		html+="</div>";
		html+="</div>";a("body").prepend(html);a("#myModal").modal().on("hidden.bs.modal",function(){
			a(this).remove()})}})(jQuery);

/*
* Here is how you use it
*/
$(function(){    
	$('.view-cicilan').on('click',function(){
		var link = $(this).attr('href');      
		var iframe = '<object type="text/html" data="'+link+'" width="100%" height="350">No Support</object>'
		$.createModal({
			title:'Lihat Pembayaran/Ciiclan',
			message: iframe,
			closeButton:true,
			scrollable:false
		});
		return false;        
	});    
});

	$(document).ready(function(){
		@foreach($borrows as $row) 
			$('#prosesBtn{{ $row->borrow_id }}').click(function(){
				var borrow_id = $(this).data('borrow_id');
				var book_id = $(this).data('book_id');
				$('#borrowID').val(borrow_id);
				$('#book_id').val(book_id);
			});
		@endforeach
	
	});

/**
 * set search on select data Siswa
 */
	

</script>

@endsection
