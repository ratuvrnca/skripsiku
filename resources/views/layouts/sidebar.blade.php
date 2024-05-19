<?php

$user = auth()->user();
$items = [
    [
        'type' => 'link',
        'route' => 'home',
        'label' => 'Dashboard',
        'icon' => 'dashboard',
        'visible' => $user->role === 'admin' || $user->role === 'user',
    ],
    [
        'type' => 'link',
        'route' => 'kriteria.index',
        'label' => 'Data Kriteria',
        'icon' => 'table_view',
        'visible' => $user->role === 'admin' || $user->role === 'user',
    ],
    [
        'type' => 'link',
        'route' => 'roc.index',
        'label' => 'Nilai Bobot ROC',
        'icon' => 'receipt_long',
        'visible' => $user->role === 'admin' || $user->role === 'user',
    ],
    [
        'type' => 'link',
        'route' => 'rangenilai.index',
        'label' => 'Range Nilai',
        'icon' => 'view_in_ar',
        'visible' => $user->role === 'admin' || $user->role === 'user',
    ],
    [
        'type' => 'link',
        'route' => 'alternatif.index',
        'label' => 'Data Alterntif',
        'icon' => 'format_textdirection_r_to_l',
        'visible' => $user->role === 'admin' || $user->role === 'user',
    ],
    [
        'type' => 'link',
        'route' => 'matriks.index',
        'label' => 'Hitung Rata-Rata',
        'icon' => 'functions',
        'visible' => $user->role === 'admin' || $user->role === 'user',
    ],
    [
        'type' => 'link',
        'route' => 'result.index',
        'label' => 'Perhitungan MOORA',
        'icon' => 'notifications',
        'visible' => $user->role === 'admin' || $user->role === 'user',
    ],
    [
        'type' => 'title',
        'label' => 'Account pages',
        'visible' => $user->role === 'admin',
    ],
    [
        'type' => 'link',
        'route' => 'user.index',
        'label' => 'Data Pengguna',
        'icon' => 'person',
        'visible' => $user->role === 'admin',
    ],
];

?>
<ul class="navbar-nav">
    @foreach ($items as $item)
        @if (isset($item['visible']) && $item['visible'])
            @if ($item['type'] == 'link')
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::is($item['route']) ? 'text-info-emphasis active' : '' }}"
                        href="{{ route($item['route']) }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">{{ $item['icon'] }}</i>
                        </div>
                        <span class="nav-link-text ms-1">{{ $item['label'] }}</span>
                    </a>
                </li>
            @else
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                        {{ $item['label'] }}
                    </h6>
                </li>
            @endif
        @endif
    @endforeach
</ul>
