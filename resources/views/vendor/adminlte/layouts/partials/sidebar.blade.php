@if (Auth::user()->valido == 1)<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            
            @if (Auth::user()->tipo == 1)
           
            <li><a href="{{ URL::to('asignar')}}"><i class='fa fa-link'></i> <span>Asignar</span></a></li>
            <li><a href="{{ URL::to('reserva')}}"><i class='fa fa-link'></i> <span>Reservas</span></a></li>
            <li><a href="{{ URL::to('instituto')}}"><i class='fa fa-link'></i> <span>Institutos</span></a></li>
             <li><a href="{{ URL::to('espacio')}}"><i class='fa fa-link'></i> <span>Espacios</span></a></li>
             <li><a href="{{ URL::to('taller')}}"><i class='fa fa-link'></i> <span>Talleres</span></a></li>
             <li><a href="{{ URL::to('exhibicion')}}"><i class='fa fa-link'></i> <span>Exhibiciones</span></a></li>
             <li><a href="{{ URL::to('paquete')}}"><i class='fa fa-link'></i> <span>Paquetes</span></a></li>
             <li><a href="{{ URL::to('hora')}}"><i class='fa fa-link'></i> <span>Horas</span></a></li>
             <li><a href="{{ URL::to('horario')}}"><i class='fa fa-link'></i> <span>Horarios</span></a></li>
            <!-- <li><a href="{{ URL::to('grafica')}}"><i class='fa fa-link'></i> <span>Graficas</span></a></li>-->
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Graficas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    
                    <li><a href="{{ URL::to('chart')}}"><i class="fa fa-circle-o"></i>Primera</a></li>
                    <li><a href="{{ URL::to('insti')}}"><i class="fa fa-circle-o"></i>Instituto</a></li>
                    <li><a href="{{ URL::to('usua')}}"><i class="fa fa-circle-o"></i>Usuarios</a></li>
                    <li><a href="{{ URL::to('cantiRes')}}"><i class="fa fa-circle-o"></i>Cantidad Reservaciones</a></li>
                    
                </ul>
            </li>
              @endif
             @if (Auth::user()->tipo == 2)   
             <li><a href="{{ URL::to('instituto')}}"><i class='fa fa-link'></i> <span>Institutos</span></a></li>    
                 <li><a href="{{ URL::to('reserva')}}"><i class='fa fa-link'></i> <span>Reservas</span></a></li>

             @endif
             @if (Auth::user()->tipo == 3)
             <li><a href="{{ URL::to('reserva')}}"><i class='fa fa-link'></i> <span>Reservas</span></a></li>  
             <li><a href="{{ URL::to('instituto')}}"><i class='fa fa-link'></i> <span>Institutos</span></a></li>     
                 

             @endif
             @if (Auth::user()->tipo == 4)
             <li><a href="{{ URL::to('reserva')}}"><i class='fa fa-link'></i> <span>Reservas</span></a></li>
             <li><a href="{{ URL::to('instituto')}}"><i class='fa fa-link'></i> <span>Institutos</span></a></li>       
                 

             @endif



        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
@endif
