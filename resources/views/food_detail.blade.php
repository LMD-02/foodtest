
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Item - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{url('assets/css/index.css')}}" rel="stylesheet" />
</head>
<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!">Trang chủ</a>
    </div>
</nav>
<!-- Product section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{$productDt->image}}" alt="..." /></div>
            <div class="col-md-6">
                <div class="small mb-1">{{$productDt->category}}</div>
                <h1 class="display-5 fw-bolder">{{$productDt->name}}</h1>
                <p>{{$productDt->description}}</p>
                <h4>Nguyên liệu </h4>
                <p class="lead">{{$productDt->food_need}}</p>
                <h4>Các bước chế biến </h4>
                <p class="lead">{{$productDt->food_step}}</p>
                <h4>Đánh giá </h4>
                <p class="lead">4/5 điểm</p>

            </div>
        </div>
    </div>
</section>
<!-- Related items section-->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Các món khác</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach($products as $product)
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" style="width: 100%;height: 200px; object-fit: cover" src="{{$product->image}}" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{$product->name}}</h5>
                                <!-- Product price-->
                                {{$product->description}}
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Xem chi tiết</a></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>
