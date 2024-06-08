<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Test' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">

    {{-- NAVBAR mobile only --}}
    <x-mary-nav sticky full-width class="border-b-2">
        <x-slot:brand>
            <label for="main-drawer" class="mr-3 lg:hidden">
                <x-mary-icon name="o-bars-3" class="cursor-pointer" />
            </label>
            <div></div>
        </x-slot:brand>
        <x-slot:actions>
            <x-mary-button label="Đơn hàng" icon="o-shopping-cart" link="###" class="btn-ghost btn-sm" responsive />
            <x-mary-dropdown class="btn-ghost btn-sm" icon="o-user">
                <x-mary-menu-item title="Hồ sơ cá nhân" icon="o-user" />
                <x-mary-menu-item title="Chỉnh sửa tài khoản" icon="o-wrench" />
                <x-mary-menu-item title="Đăng xuất" icon="o-arrow-path" />
            </x-mary-dropdown>
        </x-slot:actions>
    </x-mary-nav>
    {{-- MAIN --}}
    <x-mary-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100">
            {{-- MENU --}}
            <x-mary-menu activate-by-route>
                {{-- User --}}
                <x-mary-menu-item title="Thống kê" icon="o-chart-bar-square" link="/dashboard" />
                <x-mary-menu-item title="Người dùng" icon="o-user" link="/users" />
                <x-mary-menu-sub title="Quản lý sản phẩm" icon="o-archive-box">
                    {{-- o-truck --}}
                    <x-mary-menu-item title="Nhà cung cấp" icon="" link="/suppliers" />
                    <x-mary-menu-item title="Danh mục" icon="" link="/categories" />
                    <x-mary-menu-item title="Thuộc tính" icon="" link="/attributes" />
                    <x-mary-menu-item title="Sản phẩm" icon="" link="####" />
                </x-mary-menu-sub>
                <x-mary-menu-sub title="Settings" icon="o-cog-6-tooth">
                    <x-mary-menu-item title="Wifi" icon="o-wifi" link="####" />
                    <x-mary-menu-item title="Archives" icon="o-archive-box" link="####" />
                </x-mary-menu-sub>
            </x-mary-menu>
        </x-slot:sidebar>
        {{-- The `$slot` goes here --}}
        <x-slot:content class="">
            {{ $slot }}
        </x-slot:content>
    </x-mary-main>
    {{-- Toast --}}
    <x-mary-toast />
</body>

</html>
