<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">System Advertisement Website</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" href="<?= ROOT ?>/index.php">Home</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?= ROOT ?>/about-us.php">About</a>
		</li>
		<?php if (!login_check()): ?>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Registeration</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				<a class="dropdown-item" href="<?= ROOT ?>/registeration.php?type=developer">Developer</a>
				<a class="dropdown-item" href="<?= ROOT ?>/registeration.php?type=company">Company</a>
			</div>
		</li>
		<li class="nav-item">
		<a class="nav-link" data-toggle="modal" data-target="#LoginModal" style="cursor: pointer;">Sign in</a>
		</li>
		<?php else: ?>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				<a class="dropdown-item" href="<?= ROOT ?>/profile/index.php">My Profile</a>
				<a class="dropdown-item" href="<?= ROOT ?>/functions/logout.php">Logout</a>
			</div>
		</li>
		<?php endif; ?>
    </ul>
  </div>
</nav>