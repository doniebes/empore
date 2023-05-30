@extends('layouts.app')

@section('content')
<script type="text/javascript" src="{{ asset('js/jquery-migrate-3.0.0.min.js')}}"></script>
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
	<div class="mt-2">
		<div class="">
			<button type="button" 
					id="addBtn" 
					class="btn btn-primary btn-sm" 
					data-bs-toggle="modal" 
					data-bs-target="#addClass">
					<i class="fa fa-plus"></i> Tambah Data
			</button>
		</div>
		<!-- /.card-header -->
	</div>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="card">					
					<div class="card-body table-responsive">
						<table id="dtable" class="table table-hover">
							<thead class="bg-soft-dark">
								<tr>
									<th>No</th>
									<th>Member ID#</th>
									<th>Nama</th>									
									<th>Alamat</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>

								@if ($members->isEmpty())
								<tr id="row">
									<td colspan="6" align="center">Data Kosong</td>
								</tr>
								@else
									<?php $i=1 ?>
                                    @foreach ($members as $member)									
										<tr>
											<td><?= $i ?></td>
											<td>{{ $member->member_id }}</td>
											<td>{{ $member->member_name }}</td>											
											<td>{{ Illuminate\Support\Str::limit($member->member_address,15) }}</td>
											<td>{{ $member->is_active }}</td>
											<td>
												<button type="button" 
                                                        class="btn btn-warning btn-xs" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#addClass"
                                                        data-member_id="{{ $member->member_id }}"
														data-member_name="{{ $member->member_name }}"
														data-member_address="{{ $member->member_address }}"
														data-is_active="{{ $member->is_active }}"												
                                                        id="editBtn{{ $member->member_id }}" 
                                                        title="Edit Kelas"><i class="fa fa-pencil"></i>
                                                </button>
												<button type="button" 
														class="btn btn-danger btn-xs" 
														data-bs-toggle="modal" 
														data-bs-target="#delModal"
														onclick="return getId({{ $member->member_id }})"
														title="Hapus"><i class="fa fa-trash"></i>
												</button>
												<button type="button" 
													class="btn btn-info btn-xs" 
													data-bs-toggle="modal" 
													data-bs-target="#viewDetail"
													data-member_id="{{ $member->member_id }}"
													data-member_name="{{ $member->member_name }}"
													data-member_address="{{ $member->member_address }}"
													data-is_active="{{ $member->is_active }}"													
													id="viewBtn{{ $member->member_id }}" 
													title="View"><i class="fa fa-eye"></i>
												</a>
											</td>	
										</tr>
											<?php $i++ ?>
                                    @endforeach
								@endif 
									</tbody>
								</table>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
				</div>
			</section>
			<!-- /.content -->
		</div>

		<!-- Modal Add & Update Data-->
		<div class="modal fade" id="addClass" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="titleBookForm">Tambah Data</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>						
					</div>
					<form action="{{ route('members.store') }}" method="POST">
					@csrf
						@method('POST')
				
					<div class="modal-body">
						<input type="hidden" name="member_id" id="member_id" class="form-control" readonly>
						<div id="p_scents_class">
							<div class="form-group mb-3">	
								<label>Kode Buku</label>
								<input type="text" name="code" id="code" class="form-control" placeholder="Contoh: B001" required>
							</div>
							<div class="form-group mb-3">	
								<label>Judul Buku</label>
								<input type="text" name="title" id="title" class="form-control" placeholder="Judul Buku" required>
							</div>
							<div class="form-group mb-3">	
								<label>Tahun Terbit</label>
								<input type="number" name="publication_year" id="publication_year" class="form-control" placeholder="Tahun Terbit" required>
							</div>
							<div class="form-group mb-3">	
								<label>Penulis</label>
								<input type="text" name="author" id="author" class="form-control" placeholder="Penulis" required>
							</div>
							<div class="form-group mb-3">	
								<label>Stock</label>
								<input type="number" name="stock" id="stock" class="form-control number" placeholder="Number Only" required>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" id="btnBookForm">Tambah Data</button>
						<button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		<!-- End Modal Add & Update Data -->


		<!-- Delete Data -->
		<div class="modal fade" id="delModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">				
						<h4 class="modal-title"><span class="fa fa-warning"></span> Konfirmasi Hapus</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form action="{{ route('members.destroy', $member->member_id) }}" method="POST">
						@csrf
						@method('DELETE')
						<div class="modal-body">
							<p>Apakah anda akan menghapus data ini ?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-dark pull-left" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-danger">Hapus</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- End Delete Data -->


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
                        <h4 class="h2">Book Detail</h4>
                    </div>

                        <!-- Media -->
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                            <img class="avatar avatar-lg" src="{{ asset('front/assets/img/400x400/img22.jpg') }}" alt="Image Description">
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
		
	</div>

<script>
$(document).ready(function(){
	$('#addBtn').click(function(){
		$('#titleBookForm').text('Tambah Data'); // Set judul modal
		$('#btnBookForm').text('Tambah Data');
		$('#member_id').val('');
		$('#code').val('');
		$('#title').val('');
		$('#publication_year').val('');
		$('#author').val('');
		$('#stock').val('');
	});
});
</script>

<script>
$(document).ready(function(){
	<?php foreach($members as $row): ?>
		$('#editBtn<?= $row['member_id'];?>').click(function(){
			$('#titleBookForm').text('Edit Data'); // Set judul modal
			$('#btnBookForm').text('Edit Data');
			var member_id = $(this).data('member_id');
			var code = $(this).data('code');	
			var title = $(this).data('title');	
			var publication_year = $(this).data('publication_year');	
			var author = $(this).data('author');	
			var stock = $(this).data('stock');	
			$('#member_id').val(member_id);
			$('#code').val(code);
			$('#title').val(title);
			$('#publication_year').val(publication_year);
			$('#author').val(author);
			$('#stock').val(stock);
		});
	<?php endforeach; ?>
});
</script>

<script>
$(document).ready(function(){
	<?php foreach($members as $row): ?>
		$('#viewBtn<?= $row['member_id'];?>').click(function(){
			var member_id = $(this).data('member_id');
			var book_title = $(this).data('book_title');	
            var book_author = $(this).data('book_author');	
            var book_stock = $(this).data('book_stock');	
            var book_code = $(this).data('book_code');	
			$('#member_id').val(member_id);
			$('#book_title').html(book_title);
            $('#book_author').val(book_author);
            $('#book_stock').val(book_stock);
            $('#book_code').val(book_code);
		});
	<?php endforeach; ?>
});
</script>

@endsection