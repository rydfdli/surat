<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css?v=3.2.0') }}">
    {{-- <script nonce="c2f0fbbf-6097-4a33-832d-7b734abb2c09">
        try {
            (function(w, d) {
                ! function(c, d, e, f) {
                    if (c.zaraz) console.error("zaraz is loaded twice");
                    else {
                        c[e] = c[e] || {};
                        c[e].executed = [];
                        c.zaraz = {
                            deferred: [],
                            listeners: []
                        };
                        c.zaraz._v = "5714";
                        c.zaraz.q = [];
                        c.zaraz._f = function(g) {
                            return async function() {
                                var h = Array.prototype.slice.call(arguments);
                                c.zaraz.q.push({
                                    m: g,
                                    a: h
                                })
                            }
                        };
                        for (const i of ["track", "set", "debug"]) c.zaraz[i] = c.zaraz._f(i);
                        c.zaraz.init = () => {
                            var j = d.getElementsByTagName(f)[0],
                                k = d.createElement(f),
                                l = d.getElementsByTagName("title")[0];
                            l && (c[e].t = d.getElementsByTagName("title")[0].text);
                            c[e].x = Math.random();
                            c[e].w = c.screen.width;
                            c[e].h = c.screen.height;
                            c[e].j = c.innerHeight;
                            c[e].e = c.innerWidth;
                            c[e].l = c.location.href;
                            c[e].r = d.referrer;
                            c[e].k = c.screen.colorDepth;
                            c[e].n = d.characterSet;
                            c[e].o = (new Date).getTimezoneOffset();
                            if (c.dataLayer)
                                for (const p of Object.entries(Object.entries(dataLayer).reduce(((q, r) => ({
                                        ...q[1],
                                        ...r[1]
                                    })), {}))) zaraz.set(p[0], p[1], {
                                    scope: "page"
                                });
                            c[e].q = [];
                            for (; c.zaraz.q.length;) {
                                const s = c.zaraz.q.shift();
                                c[e].q.push(s)
                            }
                            k.defer = !0;
                            for (const t of [localStorage, sessionStorage]) Object.keys(t || {}).filter((v => v
                                .startsWith("_zaraz_"))).forEach((u => {
                                try {
                                    c[e]["z_" + u.slice(7)] = JSON.parse(t.getItem(u))
                                } catch {
                                    c[e]["z_" + u.slice(7)] = t.getItem(u)
                                }
                            }));
                            k.referrerPolicy = "origin";
                            k.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(c[e])));
                            j.parentNode.insertBefore(k, j)
                        };
                        ["complete", "interactive"].includes(d.readyState) ? zaraz.init() : c.addEventListener(
                            "DOMContentLoaded", zaraz.init)
                    }
                }(w, d, "zarazData", "script");
            })(window, document)
        } catch (e) {
            throw fetch("/cdn-cgi/zaraz/t"), e;
        };
    </script> --}}
    <style>
        body {
            background-image: url("{{ asset('adminlte/dist/img/bg.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        

        <div class="card">
            
            <div class="card-body login-card-body">
                <div class="login-logo">
                    <span><b>SIM</b>surat</span>
                </div>
                <hr>
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('login.action') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block">Log In</button>
                        </div>

                    </div>
                </form>

            </div>

        </div>
    </div>


    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('adminlte/dist/js/adminlte.min.js?v=3.2.0') }}"></script>
</body>

</html>
