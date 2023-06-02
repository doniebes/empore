<div class="nav-item">
    <a class="nav-link " href="{{ route('dashboard.member') }}" 
        role="button" data-bs-target="#navbarVerticalMenudashboard" 
        aria-expanded="false" aria-controls="navbarVerticalMenudashboard">
        <i class="fa fa-th nav-icon"></i>
        <span class="nav-link-title">Dashboard</span>
    </a>
</div>

<div class="nav-item">
        <a class="nav-link " 
        href="{{ route('member.profile', auth()->guard('member')->user()->member_id) }}" 
        role="button" data-bs-target="#navbarVerticalMenudashboard" 
        aria-expanded="false" aria-controls="navbarVerticalMenudashboard">
        <i class="fa fa-user nav-icon"></i>
        <span class="nav-link-title">Data Profil</span>
        </a>
</div>

<div class="nav-item">
        <a class="nav-link" 
        href="{{ route('book_requests.member') }}" 
        role="button" data-bs-target="#navbarVerticalMenuBookRequest" 
        aria-expanded="false" aria-controls="navbarVerticalMenuBookRequest">
        <i class="fa fa-paper-plane nav-icon"></i>
        <span class="nav-link-title">Pengajuan Buku</span>
        </a>
</div>

<div class="nav-item">
        <a class="nav-link" 
        href="{{ route('borrows.member') }}" 
        role="button" data-bs-target="#navbarVerticalMenuborrow" 
        aria-expanded="false" aria-controls="navbarVerticalMenuborrow">
        <i class="fa fa-book nav-icon"></i>
        <span class="nav-link-title">List Peminjaman</span>
        </a>
</div>

