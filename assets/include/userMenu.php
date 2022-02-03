<div class="dropdown">
    <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" class="rounded-circle me-2" width="32" height="32">
        <strong><?= $userInfo->firstname; ?></strong>
    </a>
    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">

        <li><a class="dropdown-item" href="<?= base_url('dashboardAdmin/editUser/' . $userInfo->id) ?>">Profile</a></li>

        <li>
            <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="<?= site_url('auth/logout'); ?>">Sign out</a></li>

    </ul>
</div>