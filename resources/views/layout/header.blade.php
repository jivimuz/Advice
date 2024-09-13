<?php
use App\Models\Lang;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

$langs = Lang::get();

?>
<nav class="navbar top-navbar col-lg-12 col-12 p-0">
    <div class="container-fluid">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="logo-head" href="{{ url('') }}">
                    <img src="{{ url('') }}/assets/images/LeeyinGroup.png" style="width:150px">
                </a>
                <a class="logo-head-mini" href="/">
                    <img src="{{ url('') }}/assets/images/icon.png" style="width:50px">
                </a>
            </div>
            <ul class="navbar-nav navbar-nav-left">
            </ul>
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">

                <select id="cur_lang" class="form-control" style="width: 100px;" disabled onchange="setLang()">
                    @foreach ($langs as $i)
                        <option
                            value="{{ $i->id }}"{{ (Session::has('lang_id') ? Session::get('lang_id') : 1) == $i->id ? 'selected' : '' }}>
                            {{ $i->code }} - {{ $i->name }}</option>
                    @endforeach
                </select>
            </div>



            <ul class="navbar-nav navbar-nav-right">
                @if (auth()->user())
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            id="profileDropdown">
                            <span class="nav-profile-name">{{ auth()->user()->name }}</span>
                            <span class="online-status"></span>
                            <img src="{{ url('') }}/assets/images/faces/face28.png" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                                <i class="mdi mdi-settings text-primary"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" onclick="logoutProcess()">
                                <i class="mdi mdi-logout text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                @else
                    <a class="btn btn-outline-primary btn-rounded" href="{{ url('') }}/login">Login</a>
                @endif
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="horizontal-menu-toggle">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </div>
</nav>

<script>
    function logoutProcess() {
        Swal.fire({
            title: "Do you want to logout?",
            showCancelButton: true,
            confirmButtonText: "Yes",
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Logout Success",
                    text: "Redirecting..",
                    showConfirmButton: false,
                    timer: 2000
                }).then(() => {
                    location.href = "{{ route('logout') }}"
                })
            }
        });
    }

    function setLang() {
        $.ajax({
            url: "{{ url('lang/setLang') }}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                cur_lang: $('#cur_lang').val()
            },
            success: function(data) {
                location.reload()
            },
            error: function(xhr, status, error) {
                Toast.fire({
                    icon: "error",
                    title: JSON.parse(xhr.responseText).error
                });

            }
        });
    }
</script>
