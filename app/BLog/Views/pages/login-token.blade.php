@extends("admin::main")

@section("content")
    <div class="container">
        <form action="{{route("blog.token-login")}}" class="vh-100 d-flex align-items-center justify-content-center" method="POST">
            @csrf
            <div class="col-lg-4">
                <div id="login-form" class="border border-primary-subtle p-3 rounded">
                    <div class="mb-3">
                        <label for="token" class="form-label">Confirm Token</label>
                        <input type="text" name="token" class="form-control @error('token') is-invalid @enderror" id="token">
                    </div>
                    @error("token")
                    <div class="mb-3">
                        {{ $message  }}
                    </div>
                    @enderror
                    <div class="mb-3 d-flex align-items-center justify-content-end">
                        <button class="btn btn-primary">Confirm</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

