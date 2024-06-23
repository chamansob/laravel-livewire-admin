<div>
    <nav class="sidebar">
        <div class="sidebar-header">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
                Admin<span>Panel</span>
            </a>
            <div class="sidebar-toggler not-active">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="sidebar-body">

            <ul class="nav">
                <li class="nav-item nav-category">Main</li>
                <li class="nav-item " @class(['active' => request()->is('admin/dashboard')])>
                    <a wire:navigate href="/admin/dashboard" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item " @class(['active' => request()->is('/')])>
                    <a wire:navigate href="/" class="nav-link" target="_blank">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Home</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Menu</li>
                <li class="nav-item">
                    <a class="nav-link" @class(['collapsed' => request()->is('admin/blogs')]) data-bs-toggle="collapse" href="#blogs"
                        role="button" aria-expanded="{{ request()->is('admin/blogs') ? 'true' : 'false' }}"
                        aria-controls="emails">
                        <i class="link-icon" data-feather="inbox"></i>
                        <span class="link-title">Blog </span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ show_class('admin/blogs') }}" id="blogs">
                        <ul class="nav sub-menu">

                            <li class="nav-item">
                                <a wire:navigate href="/admin/blogs" class="nav-link" @class(['active' => request()->is('admin/blog')])>All
                                    Blog
                                </a>
                            </li>
                            <li class="nav-item">
                                <a wire:navigate href="/admin/blog/create" class="nav-link"
                                    @class(['active' => request()->is('admin/blog/create')])>Create
                                    Blog </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" @class(['active' => request()->is('admin/blogcategory')]) data-bs-toggle="collapse" href="#blogcat"
                        role="button" aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="inbox"></i>
                        <span class="link-title">Blog Category</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ show_class('admin/blogcategory') }}" id="blogcat">
                        <ul class="nav sub-menu">

                            <li class="nav-item">
                                <a wire:navigate href="/admin/blogcategory" class="nav-link"
                                    @class(['active' => request()->is('admin/blogcategory')])>All Blog
                                    Category</a>
                            </li>
                            <li class="nav-item">
                                <a wire:navigate href="/admin/blogcategory/create" class="nav-link"
                                    @class(['active' => request()->is('admin/blogcategory/create')])>Create
                                    Blog Category</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" @class(['active' => request()->is('admin/blogtags')]) data-bs-toggle="collapse" href="#blogtags"
                        role="button" aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="inbox"></i>
                        <span class="link-title">Blog Tags</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ show_class('admin/blogtags') }}" id="blogtags">
                        <ul class="nav sub-menu">

                            <li class="nav-item">
                                <a wire:navigate href="/admin/blogtags" class="nav-link"
                                    @class(['active' => request()->is('admin/blogtags')])>All Blog
                                    Tags</a>
                            </li>
                            <li class="nav-item">
                                <a wire:navigate href="/admin/blogcategory/create" class="nav-link"
                                    @class(['active' => request()->is('admin/blogtags/create')])>Create
                                    Blog Tags</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item nav-category">ROLE & PERMISSION</li>
                <li class="nav-item">
                    <a class="nav-link" @class(['active' => request()->is('admin/roles')]) data-bs-toggle="collapse" href="#roles"
                        role="button" aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="inbox"></i>
                        <span class="link-title">Role & Permission</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ show_class('admin/roles') }}" id="roles">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a wire:navigate href="/admin/permissions" class="nav-link"
                                    @class(['active' => request()->is('admin/permissions')])>All Permission</a>
                            </li>
                            <li class="nav-item">
                                <a wire:navigate href="/admin/roles" class="nav-link"
                                    @class(['active' => request()->is('admin/roles')])>All Roles</a>
                            </li>
                        </ul>
                    </div>

                </li>
                <li class="nav-item">
                    <a class="nav-link" @class(['active' => request()->is('admin/users')]) data-bs-toggle="collapse" href="#users"
                        role="button" aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="inbox"></i>
                        <span class="link-title">Manage Admin Users</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ show_class('admin/users') }}" id="users">
                        <ul class="nav sub-menu">

                            <li class="nav-item">
                                <a wire:navigate href="/admin/users" class="nav-link"
                                    @class(['active' => request()->is('admin/users')])>All Users</a>
                            </li>
                            <li class="nav-item">
                                <a wire:navigate href="/admin/blogcategory/create" class="nav-link"
                                    @class(['active' => request()->is('admin/users/create')])>Create
                                    User</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item nav-category">Other</li>
                @if (Auth::user()->can('site.index'))
                    <li class="nav-item">
                        <a wire:navigate href="/admin/site/setting" class="nav-link" @class(['active' => request()->is('admin/site/setting')])>
                            <i class="link-icon" data-feather="calendar"></i>
                            <span class="link-title">Site Setting </span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->can('smtp.index'))
                    <li class="nav-item">
                        <a wire:navigate href="/admin/smtp/setting" class="nav-link" @class(['active' => request()->is('admin/smtp/setting')])>
                            <i class="link-icon" data-feather="calendar"></i>
                            <span class="link-title">SMTP Setting </span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>

</div>
