<div class="col-md-3">
    <div class="panel panel-default panel-flush">
        <div class="panel-heading">
            Menu
        </div>

        <div class="panel-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ route('admin.users.index') }}">
                        Pengguna
                    </a>
                    <a href="{{ route('admin.categories.index') }}">
                        Kategori Produk
                    </a>
                    <a href="{{ route('admin.products.index') }}">
                        Daftar Produk
                    </a>
                    <a href="{{ route('admin.orders.index') }}">
                        Daftar Pesanan
                    </a>
                    <a href="{{ route('admin.promotions.index') }}">
                        Daftar Promo
                    </a>
                    <a href="{{ route('admin.reviews.index') }}">
                        Ulasan Produk
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
