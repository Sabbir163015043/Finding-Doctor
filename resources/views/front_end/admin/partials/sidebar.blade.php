<div class="col-md-2">
    <!-- left -->
    <a href="#"><strong><i class="glyphicon glyphicon-briefcase"></i> Toolbox</strong></a>
    <hr>
    @if(Auth::user()->role == "admin")
    <ul class="nav nav-pills nav-stacked">
        <li><a href="{{route('user.profile',Auth::user()->id)}}"><i class="glyphicon glyphicon-link"></i> Profile</a></li>
        <li><a class="{{ Request::is('/prescription-category') ? 'text-danger' : '' }}" href="{{ route('index.type') }}"><i class="glyphicon glyphicon-flash"></i> Testing Category</a></li>
        <li><a href="{{route('index.userdata')}}"><i class="glyphicon glyphicon-link"></i> User Data</a></li>
        <li><a href="{{route('index.receiveitem')}}"><i class="glyphicon glyphicon-link"></i> Receive Data</a></li>
        <li><a href="{{route('index.city')}}"><i class="glyphicon glyphicon-link"></i> City</a></li>
        <li><a href="{{route('index.category')}}"><i class="glyphicon glyphicon-link"></i> Category</a></li>
        <li><a href="{{route('index.doctortype')}}"><i class="glyphicon glyphicon-link"></i> Doctor Type</a></li>
        <li><a href="{{route('index.doctorhospital')}}"><i class="glyphicon glyphicon-link"></i> Hospita & Doctor</a></li>
        <li><a href="{{route('index.doctorhospital.information')}}"><i class="glyphicon glyphicon-link"></i> View Hospita & Doctor </a></li>
    </ul>
    @endif
    @if(Auth::user()->role == "user")
        <li><a href="{{route('index.userdata')}}"><i class="glyphicon glyphicon-link"></i> User Data</a></li>
        <li><a href="{{route('index.receiveitem')}}"><i class="glyphicon glyphicon-link"></i> Receive Data</a></li>
        <li><a href="{{route('user.profile',Auth::user()->id)}}"><i class="glyphicon glyphicon-link"></i> Profile</a></li>

    @endif

    <hr>

</div><!-- /span-3 -->
