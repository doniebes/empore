@extends('layouts.member')

@section('content')
<div class="">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<!-- ========== Breadcrumbs Start ========== -->
		@include('layouts/breadcrumbs')
		<!-- ========== Breadcrumbs End ========== -->
	</section>

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
								<th>Tanggal Pinjam</th>
								<th>Tanggal Kembali</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
							</thead>
							<tbody>    

							<?php
							if (!empty($borrows)) {
								$i = 1;
								foreach ($borrows as $row):
							?>        

							<tr>
								<td><?= $i ?></td>
								<td class="table-column-ps-0">
								<a class="d-flex align-items-center" href="#">
									<div class="flex-shrink-0">
									<img class="avatar avatar-lg" src="<?= asset('front/assets/img/400x400/img22.jpg') ?>" alt="Image Description">
									</div>
									<div class="flex-grow-1 ms-3">
									<h5 class="text-inherit mb-0"><?= $row->title ?></h5>
									</div>
								</a>
								</td>
								<td><?= $row->borrow_date ?></td>
								<td><?= $row->return_date ?></td>								
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
									<?php }elseif($row->status=='rejected'){ ?>
										<span class="badge bg-soft-danger text-danger">
											<span class="legend-indicator bg-danger"></span>rejected
										</span>
									<?php } ?>
								</td>
								<td>
								<!--  -->
								<div class="btn-group" role="group">
									<a class="btn btn-white btn-sm" 
										data-bs-toggle="modal" 
										data-bs-target="#viewDetail"
										data-borrow_id="<?= $row->borrow_id ?>"
										data-book_title="<?= $row->title ?>"
										data-book_author="<?= $row->author ?>"
										data-book_code="<?= $row->code ?>"
										data-book_stock="<?= $row->stock ?>"
										data-borrow_date="<?= $row->borrow_date ?>"
										data-return_date="<?= $row->return_date ?>"
										data-status="<?= $row->status ?>"
										id="viewBtn<?= $row->borrow_id ?>" 
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
								<!--  -->
								
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
                        <h4 class="h2">Detail Peminjaman</h4>
                    </div>

                        <!-- Media -->
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                            <img class="avatar avatar-lg" src="<?= asset('') ?>front/assets/img/400x400/img22.jpg" alt="Image Description">
                            </div>

                            <div class="flex-grow-1 ms-4">
                            <h4 id="book_title"></h4>

                            <div class="row mb-2">
                                <label class="col-sm-6 col-form-label form-label">Kode Buku</label>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">									
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="book_code" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2" id="tanggal_pinjam">
                                <label class="col-sm-6 col-form-label form-label">Tanggal Pinjam</label>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">									
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="borrow_date" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

							<div class="row mb-2" id="tanggal_kembali">
                                <label class="col-sm-6 col-form-label form-label">Tanggal Kembali</label>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">									
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="return_date" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label class="col-sm-6 col-form-label form-label">Approval Status</label>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">									
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="status" readonly>
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

<script>
$(document).ready(function(){
	<?php foreach($borrows as $row): ?>
		$('#viewBtn<?= $row->borrow_id ?>').click(function(){
			var borrow_id = $(this).data('borrow_id');
			var book_title = $(this).data('book_title');	
            var book_author = $(this).data('book_author');	
            var book_stock = $(this).data('book_stock');	
            var book_code = $(this).data('book_code');	
            var borrow_date = $(this).data('borrow_date');	
			var return_date = $(this).data('return_date');	
            var status = $(this).data('status');	
			$('#borrow_id').val(borrow_id);
			$('#book_title').html(book_title);
            $('#book_author').val(book_author);
            $('#book_stock').val(book_stock);
            $('#book_code').val(book_code);
            $('#borrow_date').val(borrow_date);
			$('#return_date').val(return_date);
            $('#status').val(status);

			// Check if the value is empty
			if (borrow_date === "") {
				// Set the display property to none if the value is empty
				$("#tanggal_pinjam").css("display", "none");
			} else {
				// Set the display property to block if the value is not empty
				$("#tanggal_pinjam").css("display", "");
			}

			// Check if the value is empty
			if (return_date === "") {
				// Set the display property to none if the value is empty
				$("#tanggal_kembali").css("display", "none");
			} else {
				// Set the display property to block if the value is not empty
				$("#tanggal_kembali").css("display", "");
			}

		});
	<?php endforeach; ?>

	

});
</script>


@endsection