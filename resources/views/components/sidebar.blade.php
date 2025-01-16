<style>
    @keyframes shake {

        0%,
        100% {
            transform: translateX(0);
        }

        25% {
            transform: translateX(-5px);
        }

        75% {
            transform: translateX(5px);
        }
    }

    .shake {
        animation: shake 0.5s ease-in-out;
    }
</style>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">HPP
                <img src="{{ asset('img/kedai.png') }}" alt="logo" width="70">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <br>
        <hr>
        <ul class="sidebar-menu">
            <!-- Dashboard Menu -->
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home"></i>
                    <b><span>Dashboard</span></b>
                </a>
            </li>

            <!-- Pangan Dropdown Menu -->
            <li class="nav-item dropdown {{ Request::is('kategori*') || Request::is('produk*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-bread-slice"></i>
                    <span>Pangan</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('kategori*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('kategori.index') }}">Kategori</a>
                    </li>
                    <li class="{{ Request::is('produk*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('produk.index') }}">Produk</a>
                    </li>
                </ul>
            </li>

            <!-- Produksi Dropdown Menu -->
            <li
                class="nav-item dropdown {{ Request::is('biaya_variabel*') || Request::is('biaya_penyusutan*') || Request::is('biaya_tetap*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cogs"></i>
                    <span>Produksi</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('biaya_variabel*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('biaya_variabel.index') }}">Biaya Variabel</a>
                    </li>
                    <li class="{{ Request::is('biaya_penyusutan*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('biaya_penyusutan.index') }}">Biaya Penyusutan</a>
                    </li>
                    <li class="{{ Request::is('biaya_tetap*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('biaya_tetap.index') }}">Biaya Tetap</a>
                    </li>
                </ul>
            </li>

            <!-- Bahan Baku Menu -->
            <li class="{{ Request::is('bahan_baku*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('bahan_baku.index') }}"><i class="fas fa-boxes"></i>
                    <span>Bahan Baku</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuItems = document.querySelectorAll('.sidebar-menu li a');

        menuItems.forEach(menu => {
            menu.addEventListener('mouseenter', () => {
                menu.classList.add('shake');

                setTimeout(() => {
                    menu.classList.remove('shake');
                }, 500); 
            });
        });
    });
</script>
