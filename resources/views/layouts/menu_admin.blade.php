<span class="dropdown-header mt-4">Menu</span>
<small class="bi-three-dots nav-subtitle-replacer"></small>

    <div class="nav-item">
        <a class="nav-link <?= (request()->segment(2)=='dashboard') ? 'active' : '' ?>" 
            href="{{ route('dashboard.admin') }}" role="button" 
            data-bs-toggle="" 
            data-bs-target="#navbarVerticalMenudashboard" 
            aria-expanded="false" 
            aria-controls="navbarVerticalMenudashboard">
            <i class="fa fa-th nav-icon"></i>
            <span class="nav-link-title">Dashboard</span>
        </a>
        
    </div>

    <div class="nav-item">
        <a class="nav-link dropdown-toggle collapsed <?= (request()->segment(2)=='book-requests' OR request()->segment(2)=='book-returns') ? '  active' : '' ?>" 
            href="#keuangan" role="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#navbarVerticalMenukeuangan" 
            aria-expanded="false" 
            aria-controls="navbarVerticalMenukeuangan">
            <i class="fa fa-exchange text-stock nav-icon"></i>
            <span class="nav-link-title">Transaksi</span>
        </a>
        <div id="navbarVerticalMenukeuangan"
            class="nav-collapse collapse <?= (request()->segment(2)=='book-requests' OR request()->segment(2)=='book-returns') ? 'show' : '' ?>" 
            data-bs-parent="#navbarVerticalMenu">
            <div id="navbarVerticalMenukeuanganMenu">
                <div class="nav-item">
                    <a class="nav-link <?= (request()->segment(2)=='book-requests') ? 'active' : '' ?>" 
                        href="{{ route('book_requests.index') }}" 
                        role="button"  
                        data-bs-target="#navbarVerticalMenupayout" 
                        aria-expanded="false" 
                        aria-controls="navbarVerticalMenupayout">
                        Pengajuan Buku
                    </a>
                    
                </div>
                <div class="nav-item">
                    <a class="nav-link <?= (request()->segment(2)=='book-returns') ? 'active' : '' ?>" 
                        href="{{ route('book_returns.index') }}" 
                        role="button"  
                        data-bs-target="#navbarVerticalMenupayout" 
                        aria-expanded="false" 
                        aria-controls="navbarVerticalMenupayout">
                        Pengembalian Buku
                    </a>
                    
                </div>
            </div>
        </div>
    </div>
    
    <div class="nav-item">
        <a class="nav-link dropdown-toggle collapsed <?= (request()->segment(2)=='books' OR request()->segment(2)=='members') ? '  active' : '' ?>" 
            href="#kepegawaian" role="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#navbarVerticalMenukepegawaian" 
            aria-expanded="false" 
            aria-controls="navbarVerticalMenukepegawaian">
            <i class="fa fa-table text-stock nav-icon"></i>
            <span class="nav-link-title">Master Data</span>
        </a>
        <div id="navbarVerticalMenukepegawaian" 
            class="nav-collapse collapse <?= (request()->segment(2)=='books' OR request()->segment(2)=='members') ? '  show' : '' ?>" 
            data-bs-parent="#navbarVerticalMenu">
            <div id="navbarVerticalMenukepegawaianMenu">
                <div class="nav-item">
                    <a class="nav-link <?= (request()->segment(2)=='books') ? 'active' : '' ?>" 
                        href="{{ route('books.index') }}" 
                        role="button"  
                        data-bs-target="#navbarVerticalMenujabatan" 
                        aria-expanded="false" 
                        aria-controls="navbarVerticalMenujabatan">
                        Buku
                    </a>
                
            </div>
            <div class="nav-item">
                <a class="nav-link <?= (request()->segment(2)=='members') ? 'active' : '' ?>" 
                    href="{{ route('members.index') }}" 
                    role="button"  
                    data-bs-target="#navbarVerticalMenugolongan" 
                    aria-expanded="false" 
                    aria-controls="navbarVerticalMenugolongan">
                    Anggota
                </a>
                
            </div>
        </div>
    </div>
</div>

<div class="nav-item">
    <a class="nav-link dropdown-toggle collapsed " 
            href="#pengaturan" role="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#navbarVerticalMenupengaturan" 
            aria-expanded="false" 
            aria-controls="navbarVerticalMenupengaturan">
            <i class="fa fa-gear text-stock nav-icon"></i>
            <span class="nav-link-title">Pengaturan</span>
        </a>
        <div id="navbarVerticalMenupengaturan" 
            class="nav-collapse collapse " 
            data-bs-parent="#navbarVerticalMenu">
            <div id="navbarVerticalMenupengaturanMenu">
                <div class="nav-item">
                    <a class="nav-link  " 
                        href="https://gomahad.dsbstudio.web.id/manage/information" 
                        role="button"  
                        data-bs-target="#navbarVerticalMenuinformation" 
                        aria-expanded="false" 
                        aria-controls="navbarVerticalMenuinformation">
                        Information
                    </a>
            </div>
        </div>
    </div>
</div>    
