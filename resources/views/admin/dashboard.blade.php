INI HALAMAN ADMIN
<!-- Authentication -->
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button>logout</button>
</form>