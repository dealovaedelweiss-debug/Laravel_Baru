<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Point Of Sales </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="login-wrapper mt-5">
        <div class="container">
            {{-- row tidak mempunyai ukuran
            sedangkan container mempunyai ukuran
            row untuk menggaturr --}}
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-lg-6">
                    <div class="card shadow-lg rounded-4">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="text-center mb-5">Login - Point Of Sales</h3>
                            <form action="{{ route('actionlogin') }}" method="post">
                                @csrf
                                {{-- csrf adalah token --}}
                                <div class="mb-3">
                                    <label for="" class="form-label fw-semibold">Email</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Enter Your Email" required value="{{ old('email') }}">

                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label fw-semibold">Password</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid
                                    @enderror"
                                        placeholder="Enter Your Password" required>

                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button class="btn btn-primary w-100 fw-semibold" type="submit">
                                    Sign in
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
