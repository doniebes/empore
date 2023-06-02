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