@extends("admin::main")

@section("content")
    <div class="container">
        <form action="{{route("blog.login")}}" class="vh-100 d-flex align-items-center justify-content-center" method="POST">
            @csrf
            <div class="col-lg-4">
                <div id="login-form" class="border border-primary-subtle p-3 rounded">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="admin@gmail.com">
                    </div>
                    @error("email")
                    <div class="mb-3">
                        {{ $message  }}
                    </div>
                    @enderror
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" value="password">
                    </div>
                    <div class="mb-3 d-flex align-items-center justify-content-end">
                        <button class="btn btn-primary">Login</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section("script")
    <script>
        (function($) {
            "use strict";
            $("#email").on("focus", function () {
                $(this).val("");
            });
            $("#password").on("focus", function () {
                $(this).val("");
            });
            $(".toggle-password").click(function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        })(jQuery);
    </script>
@endsection