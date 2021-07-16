<ul class="c-header-nav d-md-down-none">
  <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Dashboard</a></li>
  <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Users</a></li>
  <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Settings</a></li>
</ul>
        <ul class="c-header-nav ml-auto mr-4">
          <li class="c-header-nav-item dropdown d-md-down-none mx-2"><a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <div class="c-avatar"><img class="c-avatar-img" src="assets/img/avatars/6.jpg" alt="user@email.com"></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right pt-0">
              <div class="dropdown-divider"></div><a class="dropdown-item" href="#">
                <svg class="c-icon mr-2">
                  <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-account-logout"></use>
                </svg> 
                <form method="POST" action="{{ route('admin.logout') }}" accept-charset="UTF-8" name="logout-form" id="logout-form">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-light">Log Out</button>
                </form></a>
            </div>
          </li>
        </ul>