@extends('layouts.member')

@section('content')
<div class="">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<!-- ========== Breadcrumbs Start ========== -->
		@include('layouts/breadcrumbs')
		<!-- ========== Breadcrumbs End ========== -->
	</section>

    <div class="mt-2">
		<div class="card-header">
            <button type="button" 
					class="btn btn-primary btn-sm" 
					data-bs-toggle="modal" 
					data-bs-target="#modalAddData">
					<i class="fa fa-plus"></i> Tambah
			</button>
		</div>
		<!-- /.card-header -->
	</div>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="card">		
					<div class="card-body table-responsive">
						<table id="dtable" class="table table-hover">
							<thead class="thead-light">
                            <tr>
                                <th>No</th>	
                                <th>Buku</th>
                                <th>Tanggal Request</th>
                                <th>Approval Status</th>
                                <th>Actions</th>
                            </tr>
							</thead>
							<tbody>    
							<?php
							if (!empty($book_requests)) {
								$i = 1;
								foreach ($book_requests as $row):
							?>        
							<tr>
								<td><?= $i ?></td>
								<td class="table-column-ps-0">
								<a class="d-flex align-items-center" href="#">
									<div class="flex-shrink-0">
									<img class="avatar avatar-lg" src="<?= asset('') ?>front/assets/img/400x400/img22.jpg" alt="Image Description">
									</div>
									<div class="flex-grow-1 ms-3">
									<h5 class="text-inherit mb-0"><?= $row->title ?></h5>
									</div>
								</a>
								</td>
								<td><?= $row->request_date ?></td>							
								<td>
									<?php if($row->approval_status=='approved'){ ?>
										<span class="badge bg-soft-success text-success">
											<span class="legend-indicator bg-success"></span>approved
										</span>
									<?php }elseif($row->approval_status=='rejected'){ ?>
										<span class="badge bg-soft-danger text-danger">
											<span class="legend-indicator bg-danger"></span>rejected
										</span>
									<?php }elseif($row->approval_status=='pending'){ ?>
										<span class="badge bg-soft-warning text-warning">
											<span class="legend-indicator bg-warning"></span>pending
										</span>
									<?php } ?>
								</td>
								<td>
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-white btn-sm" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#viewDetail"
                                            data-book_request_id="<?= $row->book_request_id ?>"
                                            data-book_title="<?= $row->title ?>"
                                            data-book_author="<?= $row->author ?>"
                                            data-book_code="<?= $row->code ?>"
                                            data-book_stock="<?= $row->stock ?>"
                                            data-request_date="<?= $row->request_date ?>"
                                            data-approval_status="<?= $row->approval_status ?>"
                                            id="viewBtn<?= $row->book_request_id ?>" 
                                            title="View">
                                            <i class="bi-eye"></i> View
                                        </a>
                                       
                                            <!-- Button Group -->
                                            <div class="btn-group">
                                            <button type="button" 
                                                    class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" 
                                                    id="editDropdownBorrow" 
                                                    data-bs-toggle="dropdown" 
                                                    aria-expanded="false">
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="editDropdownBorrow">
                                                <a class="dropdown-item view-pdf" 
                                                    href="#" data-href="<?= asset('manage/member/printPdf/' . $row->member_id) ?>" 
                                                    target="_blank"><i class="bi-printer dropdown-item-icon"></i> Print
                                                </a>															
                                            </div>
                                        </div>
                                        <!-- End Button Group -->														
                                    </div>
								</td>
							</tr>
							<?php
								$i++;
								endforeach;
								} else {
							?>
							<tr id="row">
								<td colspan="5" align="center">Data Kosong</td>
							</tr>
							<?php } ?>							
							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>

	</section>
</div>

        <!-- Modal View Detail-->
        <div class="modal fade" id="viewDetail" role="dialog">
			<div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <!-- Header -->
                    <div class="modal-close">
                    <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm" data-bs-dismiss="modal" aria-label="Close">
                        <i class="bi-x-lg"></i>
                    </button>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="modal-body p-sm-5">

                    <div class="mb-5">
                        <h4 class="h2">Detail Pengajuan Buku</h4>
                    </div>

                        <!-- Media -->
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                            <img class="avatar avatar-lg" src="<?= asset('') ?>front/assets/img/400x400/img22.jpg" alt="Image Description">
                            </div>

                            <div class="flex-grow-1 ms-4">
                            <h4 id="book_title"></h4>

                            <div class="row mb-2">
                                <label class="col-sm-6 col-form-label form-label">Book Code</label>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">									
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="book_code" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label class="col-sm-6 col-form-label form-label">Request Date</label>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">									
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="request_date" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label class="col-sm-6 col-form-label form-label">Approval Status</label>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">									
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="approval_status" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label class="col-sm-6 col-form-label form-label">Author</label>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">									
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="book_author" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label class="col-sm-6 col-form-label form-label">Stock</label>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">									
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="book_stock" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            </div>
                        </div>
                        <!-- End Media -->

                    </div>
                    <!-- End Body -->

                </div>

			</div>
		</div>
		<!-- end view detail -->

<!-- Modal Add Data -->
<div class="modal fade" id="modalAddData" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Pengajuan Buku</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>						
            </div>
            <form action="{{ route('book_requests.add') }}" method="POST">
			@csrf
				@method('POST')
            <div class="modal-body">
                <input type="hidden" readonly name="member_id" class="form-control" value="<?= auth()->guard('member')->user()->member_id ?>">            
                <input type="hidden" readonly name="approval_status" class="form-control" value="pending">            
                
                <div id="p_scents_class">
                    <p>
                        <div class="form-group mb-3">
                            <label>Request Date</label>
                            <div id="payoutFlatpickr" class="js-flatpickr flatpickr-custom input-group"
                                data-hs-flatpickr-options='{
                                    "appendTo": "#payoutFlatpickr",
                                    "dateFormat": "Y-m-d",
                                    "wrap": true
                                }'>
                                <div class="input-group-prepend input-group-text" data-bs-toggle>
                                    <i class="bi-calendar-week"></i>
                                </div>
                                <input type="text" name="request_date" class="flatpickr-custom-form-control form-control" id="payoutFlatpickrLabel" placeholder="Select dates" data-input value="<?= date('Y-m-d') ?>" required>
                            </div>
                        </div> 
                        <div class="form-group mb-3">
                            <label>Nama Buku</label>
                            <div class="tom-select-custom tom-select-custom-with-tags">
                                <select class="js-select form-select" 
                                        name="book_id" 
                                        id="book_id"
                                        data-hs-tom-select-options='{
                                            "placeholder": "Select a book..."
                                        }'>
                                    <?php if (count($books)): ?>                                     
                                    <?php foreach ($books as $row) : ?>                                           
                                        <option value="<?= $row['book_id'] ?>" 
                                                data-icon="<?= $row['book_id'] ?>"
                                                data-option-template='<span class="d-flex align-items-center">
                                                <img class="avatar avatar-xss avatar-circle me-2" src="<?= asset('') ?>front/assets/img/400x400/img22.jpg" alt="<?= $row['title'] ?>" />
                                                                        <span class="text-truncate"> <?= $row['title'] ?></span>
                                                                    </span>'>
                                                <?= $row['title'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                    <?php endif; ?>  
                                </select>
                            </div>
                        </div>     
                        
                        <div class="form-group mb-3">
                            <label>Tanggal Pengembalian</label>
                            <div id="returnDateFlatpickr" class="js-flatpickr flatpickr-custom input-group"
                                data-hs-flatpickr-options='{
                                    "appendTo": "#returnDateFlatpickr",
                                    "dateFormat": "Y-m-d",
                                    "wrap": true
                                }'>
                                <div class="input-group-prepend input-group-text" data-bs-toggle>
                                    <i class="bi-calendar-week"></i>
                                </div>
                                <input type="text" 
                                    name="return_date" 
                                    class="flatpickr-custom-form-control form-control" 
                                    id="returnDateFlatpickrLabel" 
                                    placeholder="Select return date" 
                                    data-input value="" required>
                            </div>
                        </div> 
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
            </div>
		  </form>
        </div>
    </div>
</div>
<!-- End modal add data -->


<script>
$(document).ready(function(){
	<?php foreach($book_requests as $row): ?>
		$('#viewBtn<?= $row->book_request_id ?>').click(function(){
			var book_request_id = $(this).data('book_request_id');
			var book_title = $(this).data('book_title');	
            var book_author = $(this).data('book_author');	
            var book_stock = $(this).data('book_stock');	
            var book_code = $(this).data('book_code');	
            var request_date = $(this).data('request_date');	
            var approval_status = $(this).data('approval_status');	
			$('#book_request_id').val(book_request_id);
			$('#book_title').html(book_title);
            $('#book_author').val(book_author);
            $('#book_stock').val(book_stock);
            $('#book_code').val(book_code);
            $('#request_date').val(request_date);
            $('#approval_status').val(approval_status);
		});
	<?php endforeach; ?>
});
</script>
@endsection