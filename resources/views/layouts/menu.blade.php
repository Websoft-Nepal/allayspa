<!-- need to remove -->
<li class="nav-item">
    <a href="" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item menu-close">
    <a class="nav-link" style="cursor: pointer;">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Starter Pages
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Active Page</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Inactive Page</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="{{ route('admin.services.index') }}" class="nav-link ">
        <i class="nav-icon fas fa-home"></i>
        <p>Services</p>
    </a>
</li>
<li class="nav-item">
    <a href="" class="nav-link ">
        <i class="nav-icon fas fa-home"></i>
        <p>Clinic</p>
    </a>
</li>
<li class="nav-item menu-close">
    <a class="nav-link " style="cursor: pointer;">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Blog
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('admin.blog.index')}}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Index</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.blog.create')}}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Create</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item menu-close">
    <a class="nav-link " style="cursor: pointer;">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            About Us
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('admin.social.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Social Media</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.contact.index')}}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Contact Details</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Counter</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.aboutus.index')}}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>About Us</p>
            </a>
        </li>
    </ul>
</li>

{{-- Privacy Policy --}}
<li class="nav-item">
    <a href="{{route('admin.privacy.index')}}" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>Privacy Policy</p>
    </a>
</li>

{{-- Terms and Condition --}}
<li class="nav-item">
    <a href="{{route('admin.terms.index')}}" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>Terms and Condition</p>
    </a>
</li>

{{-- Gallery  --}}
<li class="nav-item">
    <a href="{{route('admin.gallery.index')}}" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>Gallery</p>
    </a>
</li>
