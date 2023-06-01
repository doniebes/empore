@extends('layouts.app')

@section('content')
<div class="content container-fluid">

  <div class="page-header">
    <div class="row align-items-center">
      <div class="col-sm mb-2 mb-sm-0">
        <h1 class="page-header-title">{{-- 'greeting' --}} {{-- ,<?//= ucfirst($this->session->userdata('a_name')); ?>. --}}</h1>
        <p class="page-header-text">Berikut adalah statistik dashboard Anda hari ini.</p>
      </div>
      <!-- End Col -->
    </div>
  </div>

  <div class="card card-body mb-3 mb-lg-5">

    <div class="row" style="padding-top:25px;">
        <div class="card-body">
          <div class="row col-sm-divider">

          <div class="col-sm-3">
              <!-- Stats -->
              <div class="d-lg-flex align-items-lg-center">
                <div class="flex-shrink-0">
                  <i class="bi-clock-history fs-1"></i>
                </div>

                <div class="flex-grow-1 ms-lg-3">
                  <span class="d-block fs-6">Total Pengajuan</span>
                  <div class="d-flex align-items-center">
                    <h3 class="mb-0"><?//= $book_request ?></h3>
                  </div>
                </div>
              </div>
              <!-- End Stats -->
            </div>

            <div class="col-sm-3">
              <!-- Stats -->
              <div class="d-lg-flex align-items-lg-center">
                <div class="flex-shrink-0">
                  <i class="bi-plus fs-1"></i>
                </div>

                <div class="flex-grow-1 ms-lg-3">
                  <span class="d-block fs-6">Total Pengembalian</span>
                  <div class="d-flex align-items-center">
                    <h3 class="mb-0"><?//= $borrowings ?></h3>
                  </div>
                </div>
              </div>
              <!-- End Stats -->
            </div>

            <div class="col-sm-3">
              <!-- Stats -->
              <div class="d-lg-flex align-items-lg-center">
                <div class="flex-shrink-0">
                  <i class="bi-book fs-1"></i>
                </div>

                <div class="flex-grow-1 ms-lg-3">
                  <span class="d-block fs-6">Total Buku</span>
                  <div class="d-flex align-items-center">
                    <h3 class="mb-0"><?//= $books ?></h3>
                  </div>
                </div>
              </div>
              <!-- End Stats -->
            </div>

            <div class="col-sm-3">
              <!-- Stats -->
              <div class="d-lg-flex align-items-lg-center">
                <div class="flex-shrink-0">
                  <i class="bi-person fs-1"></i>
                </div>

                <div class="flex-grow-1 ms-lg-3">
                  <span class="d-block fs-6">Total Anggota</span>
                  <div class="d-flex align-items-center">
                    <h3 class="mb-0"><?//= $members ?></h3>
                  </div>
                </div>
              </div>
              <!-- End Stats -->
            </div>
          </div>
          <!-- End Row -->
        </div>
    </div>
</div>


<script>
 /*     
 * Add collapse and remove events to cardes
 */
$("[data-widget='collapse']").click(function() {
    //Find the card parent        
    var card = $(this).parents(".card").first();
    //Find the body and the footer
    var bf = card.find(".card-body, .card-footer");
    if (!card.hasClass("collapsed-card")) {
        card.addClass("collapsed-card");
        bf.slideUp();
    } else {
        card.removeClass("collapsed-card");
        bf.slideDown();
    }
});  
</script>

@endsection