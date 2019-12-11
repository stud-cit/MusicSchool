<div class=" bg-dark wrapper" id="page-top" >
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
		<a class="navbar-brand" href="/admin">
			<span> Адміністрування </span>
		</a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"  >
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse sidenav" id="navbarResponsive">

			<ul class="navbar-nav navbar-sidenav" id="Accordion">
				<li class="nav-item" title="Історії">
					<a class="nav-link" href="/admin/story">
						<i class="fa fa-fw fa-history"></i>
						<span class="nav-link-text">Історії</span>
					</a>
				</li>
				<li class="nav-item" title="Новини">
					<a class="nav-link" href="/admin/news">
						<i class="fa fa-fw fa-newspaper-o"></i>
						<span class="nav-link-text">Новини</span>
					</a>
				</li>
				<li class="nav-item" title="Відділи">
					<a class="nav-link" href="/admin/department">
						<i class="fa fa-fw fa-university"></i>
						<span class="nav-link-text">Відділи</span>
					</a>
				</li>
				<li class="nav-item" title="Вчителі">
					<a class="nav-link" href="/admin/teacher">
						<i class="fa fa-fw fa-users"></i>
						<span class="nav-link-text">Вчителі</span>
					</a>
				</li>
				<li class="nav-item" title="Інструменти">
					<a class="nav-link" href="/admin/instrument">
						<i class="fa fa-fw fa-music"></i>
						<span class="nav-link-text">Інструменти</span>
					</a>
				</li>
				<li class="nav-item" title="Досягнення">
					<a class="nav-link" href="/admin/achieve">
						<i class="fa fa-fw fa-bar-chart"></i>
						<span class="nav-link-text">Досягнення</span>
					</a>
				</li>
				<li class="nav-item" title="Вступ">
					<a class="nav-link" href="/admin/intro">
						<i class="fa fa-fw fa-yelp"></i>
						<span class="nav-link-text">Вступ</span>
					</a>
				</li>
				<li class="nav-item" title="Галерея">
					<a class="nav-link" href="/admin/gallery">
						<i class="fa fa-fw fa-picture-o"></i>
						<span class="nav-link-text">Галерея</span>
					</a>
				</li>
				<li class="nav-item" title="Загальна інформація">
					<a class="nav-link" href="/admin/info">
						<i class="fa fa-fw fa-info-circle"></i>
						<span class="nav-link-text">Загальна інформація</span>
					</a>
				</li>
			</ul>

			<ul class="navbar-nav sidenav-toggler">
				<li class="nav-item">
					<a class="nav-link text-center" id="sidenavToggler">
						<i class="fa fa-fw fa-angle-left"></i>
					</a>
				</li>
			</ul>

			<ul class="navbar-nav mr-auto">
				<li class="nav-item ">
					<a class="nav-link mr-lg-2" id="siteLink" href="/" title="До сайту">
						<i class="fa fa-fw fa-sign-in"></i>
						До сайту
					</a>
				</li>
			</ul>
			<div class="user-block">
				<div class="user-content d-none d-lg-flex">
					<img src="{{ url('/') }}/img/user.png">
					<div class="welcome"><a style="color:#868e96" href="/admin/profile/1">User</a> (role)</div>
				</div>
				<a class="logout" data-toggle="modal" data-target="#modalLogout">
					<i class="fa fa-fw fa-sign-out"></i>Вихід
				</a>
			</div>
		</div>
	</nav>
</div>