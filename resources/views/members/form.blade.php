@extends('layouts.app')

@section('content')
<div class=""> 
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<!-- ========== Breadcrumbs Start ========== -->
		<div class="card-header card-header-content-sm-between">
			<h1 class="card-header-title mb-2 mb-sm-0">
				<?= isset($title) ? '' . $title : null; ?>
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

	<!-- Main content -->
	<section class="">

    <form action="{{ isset($member) ? route('members.update', $member->member_id) : route('members.store') }}" method="POST">
        @csrf

        @if (isset($member))
            @method('PUT')
        @endif
		<!-- Small cardes (Stat card) -->
		<div class="row">
			<div class="col-md-9">
				<div class="card">
					<!-- /.card-header -->
					<div class="card-body">
								
								<div class="mb-3">
									<label>Nama lengkap <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
									<input name="member_name" type="text" class="form-control" value="{{ isset($member) ? $member->member_name : old('member_name') }}" placeholder="Nama lengkap" required>
								</div>
																	
								<div class="mb-3">
									<label>Jenis Kelamin</label>										
									<div class="form-check">
										<input type="radio" id="laki_laki" name="member_gender" {{ ((isset($member) AND $member->member_gender == 'L')) ? 'checked' : ''; }} class="form-check-input">
										<label class="form-check-label" for="laki_laki">Laki-laki</label>
									</div>
									<div class="form-check">
										<input type="radio" id="perempuan" name="member_gender" {{ ((isset($member) AND $member->member_gender == 'P')) ? 'checked' : ''; }} class="form-check-input">
										<label class="form-check-label" for="perempuan">Perempuan</label>
									</div>										
								</div>								
								
								<div class="mb-3">
									<label>No. Handphone <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
									<input name="member_phone" type="text" class="form-control" value="{{ isset($member) ? $member->member_phone : old('member_phone') }}" placeholder="No Handphone" required>
								</div>

								<div class="mb-3">
									<label>Email <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
									<input name="member_email" type="email" class="form-control" value="{{ isset($member) ? $member->member_email : old('member_email') }}" placeholder="Email" required>
								</div>

								<div class="mb-3">
									<label>Password <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
									<input name="member_password" type="password" class="form-control" placeholder="Password" required>
								</div>            

								<div class="mb-3">
									<label>Konfirmasi Password <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
									<input name="passconf" type="password" class="form-control" placeholder="Konfirmasi Password">
								</div>      

								<div class="mb-3">
									<label>Alamat</label>
									<textarea class="form-control" name="member_address" placeholder="Alamat Tempat Tinggal">{{ isset($member) ? $member->member_address : old('member_address') }}</textarea>
								</div>
						
							<p class="text-muted">*) Kolom wajib diisi.</p>
					</div>
					<!-- /.card-body -->
				</div>
			</div>

			<div class="col-md-3">
				<div class="card card-primary">
					<!-- /.card-header -->
					<div class="card-body">
						<div class="form-group">
							<label>Status</label>
							<div class="radio">
								<label>
									<input type="radio" name="is_active" value="1" {{ (isset($member) AND $member->is_active == 1) ? 'checked' : ''; }}> Aktif
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="is_active" value="0" {{ (isset($member) AND $member->is_active == 0) ? 'checked' : ''; }}> Tidak Aktif
								</label>
							</div>
						</div>
						<label >Foto</label>
						<a href="#" class="thumbnail">
							<?php if (isset($member->member_img) != NULL) { ?>
								<img src="{{ asset('member/' . $member->member_img) }}" class="img-responsive avatar">
							<?php } else { ?>
								<img src="{{ asset('img/missing.png') }}" id="target" class="avatar" alt="Choose image to upload">
							<?php } ?>
						</a>
						                                                   
						<div class="mb-3">
							<input type='file' id="member_img" name="member_img">
						</div>						
						<button type="submit" class="btn btn-block btn-primary">{{ isset($book) ? 'Update' : 'Simpan' }}</button>
						<a href="{{ route('members.index'); }}" class="btn btn-block btn-danger">Batal</a>
						<?php if (isset($member)) { ?>
							<button type="button" 
									onclick="getId({{ $member->member_id }})" 
									class="btn btn-danger btn-block" 
									data-bs-toggle="modal" 
									data-bs-target="#deleteMember">Hapus
							</button>
						<?php } ?>
					</div>
					<!-- /.card-body -->
				</div>
			</div>
		</div>
		</form>

    </section>
</div>


<script>
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#target').attr('src', e.target.result);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#member_img").change(function() {
		readURL(this);
	});

</script>

@endsection