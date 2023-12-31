
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>FOOD</title>
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
<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Nấu ăn</h1>
            <p class="lead fw-normal text-white-50 mb-0">Thật là đơn giản</p>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <form action="/hms/accommodations" method="GET">
            <div class="row mb-5    ">
                <div class="col-xs-6 col-md-4">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tìm kiếm món ăn" id="txtSearch"/>
                        <div class="input-group-btn">
                            <button class="btn btn-primary js-search-food" type="button">
                                Tìm kiếm
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 list-item-food justify-content-center">
            @foreach($products as $product)
                <div class="col mb-5 js-item">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" style="width: 100%;height: 200px; object-fit: cover" src="{{$product->image}}" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder js-product-name">{{$product->name}}</h5>
                                <!-- Product price-->
                                {{$product->description}}
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route('food_detail',$product->id)}}">Xem chi tiết</a></div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<script>
    $('.js-search-food').click(function () {
        let search = $('#txtSearch').val();

            if (search.length >= 0) {
                $('.list-item-food .js-item').each((index, element) => {
                    let titleSearch = $(element).find('.js-product-name').html().toLowerCase();

                    if (titleSearch.indexOf(search.toLowerCase()) !== -1) {
                        $(element).removeClass('d-none');
                    } else {
                        $(element).addClass('d-none');
                    }

                });
            } else {
                $('.js-product-name').removeClass('d-none');
            }

    })
</script>
</body>
</html>
