<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    // Dashboard Route
    Volt::route('dashboard', 'pages.admin.dashboard')
        ->name('admin.dashboard');
    // Site Settings Route
    Volt::route('site/setting', 'pages.admin.setting.site')
        ->name('site.setting')->middleware('can:site.index');
    // SMTP Route
    Volt::route('smtp/setting', 'pages.admin.setting.smtp')
        ->name('smtp.setting')->middleware('can:smtp.index');

    // Blog Category Route
    Volt::route('blogcategory', 'pages.admin.blogcategory.showblogcategory')
        ->name('blogcategory.index');
    Volt::route('blogcategory/create', 'pages.admin.blogcategory.create')
        ->name('blogcategory.create');
    Volt::route('blogcategory/edit/{blogcategory}', 'pages.admin.blogcategory.edit')
        ->name('blogcategory.edit');


    // Blog Route
    Volt::route('blogs', 'pages.admin.blogs.showblog')
        ->name('blogs.index');
    Volt::route('blog/create', 'pages.admin.blogs.create')
        ->name('blog.create');
    Volt::route('blog/edit/{blog}', 'pages.admin.blogs.edit')
        ->name('blog.edit');

    // Blog Tag Route
    Volt::route('blogtags', 'pages.admin.blogtags.showblogtags')
        ->name('blogtags.index');
    Volt::route('blogtag/create', 'pages.admin.blogtags.create')
        ->name('blogtag.create');
    Volt::route('blogtag/edit/{blogtag}', 'pages.admin.blogtags.edit')
        ->name('blogtag.edit');

    // Users Route
    Volt::route('users','pages.admin.users.showusers')
        ->name('users.index');
    Volt::route('user/create', 'pages.admin.users.create')
        ->name('user.create');
    Volt::route('user/edit/{user}', 'pages.admin.users.edit')
        ->name('user.edit');
    // Roles Route
    Volt::route('roles','pages.admin.roles.showroles')
        ->name('roles.index');
    Volt::route('role/create','pages.admin.roles.create')
        ->name('role.create');
    Volt::route('role/edit/{id}', 'pages.admin.roles.edit')
        ->name('role.edit');

    // Permission Route
    Volt::route('permissions', 'pages.admin.permissions.showpermission')
    ->name('permissions.index');
    Volt::route('permission/create', 'pages.admin.permissions.create')
    ->name('permission.create');
    Volt::route('permission/edit/{id}', 'pages.admin.permissions.edit')
    ->name('permission.edit');
});
