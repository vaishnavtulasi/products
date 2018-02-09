<a class="navbar-brand" href="{{ route('admin.home') }}">Amazon</a>
<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home">
            <a class="nav-link" href="{{ route('admin.home') }}">
                <i class="fa fa-fw fa-dashboard"></i>
                <span class="nav-link-text"> Home </span>
            </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Users List">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="fa fa-fw fa-users"></i>
                <span class="nav-link-text"> Users </span>
            </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="product">
            <a class="nav-link" href="{{ route('categories.index') }}">
                <i class="fab fa-product-hunt"></i>
                <span class="nav-link-text"> Category </span>
            </a>
        </li>
    </ul>

</div>