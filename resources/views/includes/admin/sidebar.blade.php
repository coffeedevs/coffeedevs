<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">NAVEGACIÓN PRINCIPAL</li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-newspaper-o"></i> <span>Proyectos</span> <i
                            class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active">
                        <a href="{{ route('admin.projects.index') }}"><i class="fa fa-circle-o"></i> Listar</a>
                    </li>
                    <li><a href="{{ route('admin.projects.create') }}"><i class="fa fa-circle-o"></i> Añadir nuevo</a>
                    </li>
                </ul>
            </li>
            <li><a href="{{ route('admin.password.change') }}"><i class="fa fa-key"></i>
                    <span>Cambiar contraseña</span></a>
            <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out"></i> <span>Cerrar Sesión</span></a>
        </ul>
    </section>
</aside>