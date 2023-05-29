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
					class="btn btn-primary btn-sm" 
					data-bs-toggle="modal" 
					data-bs-target="#addClass">
					<i class="fa fa-plus"></i> Tambah
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
									<th>Kode Buku</th>
									<th>Judul Buku</th>									
									<th>Tahun Terbit</th>
									<th>Penulis</th>
									<th>Stock</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>

                            @if ($books->isEmpty())
                            <tr id="row">
                                <td colspan="7" align="center">Data Kosong</td>
                            </tr>
                            @else
                                    @foreach ($books as $book)
										<tr>
											<td></td>
											<td></td>
											<td>{{ $book->title }}</td>											
											<td>{{ $book->publication_year }}</td>
											<td>{{ $book->author }}</td>
											<td></td>
											<td>
												<button type="button" 
                                                        class="btn btn-warning btn-xs" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#addClass"
                                                        data-book_id="{{ $book->book_id }}"
														data-title="{{ $book->title }}"
														data-publication_year="{{ $book->publication_year }}"
														data-author="{{ $book->author }}"														
                                                        id="editBtn{{ $book->book_id }}" 
                                                        title="Edit Kelas"><i class="fa fa-pencil"></i>
                                                </button>
												<button type="button" 
														class="btn btn-danger btn-xs" 
														data-bs-toggle="modal" 
														data-bs-target="#delModal"
														onclick="return getId({{ $book->book_id }})"
														title="Hapus"><i class="fa fa-trash"></i>
												</button>
												<button type="button" 
													class="btn btn-info btn-xs" 
													data-bs-toggle="modal" 
													data-bs-target="#viewDetail"
													data-book_id="{{ $book->book_id }}"
													data-book_title="{{ $book->title }}"
													data-book_author="{{ $book->author }}"
													id="viewBtn{{ $book->book_id }}" 
													title="View"><i class="fa fa-eye"></i>
												</a>
											</td>	
										</tr>
											
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
						<h4 class="modal-title">{{ isset($book) ? 'Edit Buku' : 'Tambah Buku Baru' }}</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>						
					</div>
					<form action="{{ isset($book) ? route('books.update', $book->book_id) : route('books.store') }}" method="POST">
					@csrf

					@if (isset($book))
						@method('PUT')
					@endif
					<div class="modal-body">
						<input type="hidden" name="book_id" id="book_id" class="form-control" readonly>
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
								<input type="text" name="publication_year" id="publication_year" class="form-control" placeholder="Tahun Terbit" required>
							</div>
							<div class="form-group mb-3">	
								<label>Penulis</label>
								<input type="text" name="author" id="author" class="form-control" placeholder="Penulis" required>
							</div>
							<div class="form-group mb-3">	
								<label>Stock</label>
								<input type="number" name="stock" id="stock" class="form-control number" placeholder="Number Only">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">{{ isset($book) ? 'Update' : 'Simpan' }}</button>
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
					<form action="#" method="POST">
						<div class="modal-body">
							<p>Apakah anda akan menghapus data ini ?</p>
							<input type="hidden" name="book_id" id="bookID">
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
	function getId(id) {
		$('#bookID').val(id)
	}
</script>

@endsection