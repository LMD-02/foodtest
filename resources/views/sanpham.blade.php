<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Project</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
      table {
          width: 100%;
          border-collapse: collapse;
      }

      th,
      td {
          border: 1px solid black;
          padding: 8px;
      }

      th {
          background-color: #f2f2f2;
      }

      .actions {
          /*display: flex;*/
          margin:0 4px;
          justify-content: space-around;
      }

      /* CSS cho modal */
      .modal {
          display: none;
          /* Ẩn modal mặc định */
          position: fixed;
          z-index: 1;
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
          overflow: auto;
          background-color: rgba(0, 0, 0, 0.4);
      }

      .modal-content {
          background-color: #fefefe;
          margin: 15% auto;
          padding: 20px;
          border: 1px solid #888;
          width: 80%;
      }

      .close {
          color: #aaa;
          float: right;
          font-size: 28px;
          font-weight: bold;
      }

      .close:hover,
      .close:focus {
          color: black;
          text-decoration: none;
          cursor: pointer;
      }
  </style>
</head>

<body>
    <!--START THE NAVBAR SECTION-->
    <div class="row">
        @include('includes.drop_quanly')
        <div class="col-md-10">
          <div class="container-fluid">
              <h1 class="display-4 my-4 text-info">Món ăn</h1>

              <button onclick="openModal()">Thêm</button>

              <input type="text" id="search" placeholder="Tìm kiếm">

              <table id="mytable" style="width: 100%;text-align: center">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Hình ảnh</th>
                          <th>Thông tin món ăn</th>
                          <th>Danh mục</th>
                          <th>Thành phần / nguyên liệu</th>
                          <th>Các bước nấu</th>
                          <th>Thao tác</th>
                      </tr>
                  </thead>
                  <tbody>

                  </tbody>
              </table>
          </div>
      </div>


        <!--START INFO SECTION-->

    </div>
    <div id="myModal" class="modal">
      <div class="modal-content" style="text-align: center">
          <span class="close" onclick="closeModal()">&times;</span>
          <form id="form" action="{{ route('add_products') }}" method="post">
              @csrf
              <input type="text" id="name" name="name" placeholder="Tên" required><br><br>
              <input type="text" id="image" name="image" placeholder="Hình ảnh" required><br><br>
              <input type="text" id="description" name="description" placeholder="Thông tin thêm " required><br><br>
              <input type="text" id="category" name="category" placeholder="Danh mục " required><br><br>
              <textarea style="width:256px;height: 200px" type="text" id="food_need" name="food_need" placeholder="Nguyên liệu " required></textarea><br><br>
              <textarea style="width:256px;height: 200px" type="text" id="food_step" name="food_step" placeholder="Các bước nấu " required></textarea><br><br>

              <button>Thêm</button>
          </form>
      </div>
  </div>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script>
      $(document).ready(function() {

          $('#search').on('keyup', function() {
              var value = $(this).val();
              var route = `${window.location.origin}/api/sanpham`;

              $.ajax({
                  url: route,
                  type: 'get',
                  data: {
                      id: value,
                  }
              }).done(function(ketqua) {
                  $("#mytable tbody").empty();

                  // Lặp qua dữ liệu từ API và tạo hàng mới cho mỗi mục
                  for (var i = 0; i < ketqua.products.length; i++) {
                      var product = ketqua.products[i];

                      var row = $("<tr></tr>");
                      let $image =   `<img src="${product.image}" style="width:50px !important; height:50px !important">`
                      $("<td></td>").text(product.id).appendTo(row);
                      $("<td></td>").html($image).appendTo(row);
                      let $info = `<span style="font-weight:bold">${product.name}<br>${product.description}</span>`
                      $("<td></td>").html($info).appendTo(row);
                      $("<td></td>").text(product.category).appendTo(row);
                      $("<td></td>").text(product.food_need).appendTo(row);
                      $("<td></td>").text(product.food_step).appendTo(row);

                      var actionsColumn = $("<td class='actions'></td>");

                      var route_delete = `${window.location.origin}/delete_products/` +
                          product
                          .id;
                      var route_update = `${window.location.origin}/update_products` + product
                          .id;

                      var deleteLink = $("<a></a>").attr("href", route_delete)
                          .addClass("btn btn-danger")
                          .text("Xóa");

                      actionsColumn.append(deleteLink);

                      var editButton = $("<button></button>").addClass("btn btn-dark edit")
                          .val(product.id)
                          .text("Sửa")
                          .click(function() {
                              var value = $(this).val();
                              var route = `${window.location.origin}/update/` + value;

                              $.ajax({
                                  url: route,
                                  type: 'get',
                                  data: {
                                      id: value,
                                  }
                              }).done(function(ketqua) {
                                  $('#form').attr('method', 'get');
                                  $('#form').attr('action', '/edit/' + ketqua
                                      .products[0].id);



                                  $("#name").val(ketqua.products[0].name);
                                  $("#image").val(ketqua.products[0].image);
                                  $("#description").val(ketqua.products[0].description);
                                  $("#category").val(ketqua.products[0].category);
                                  $("#food_need").val(ketqua.products[0].food_need);
                                  $("#food_step").val(ketqua.products[0].food_step);


                              });
                              openModal();
                          });

                      actionsColumn.append(editButton);

                      row.append(actionsColumn);

                      // Thêm hàng mới vào tbody
                      $("#mytable tbody").append(row);
                  }
              });
              // console.log(value);

          });
          var route = `${window.location.origin}/api/sanpham`;

          $.ajax({
              url: route,

          }).done(function(ketqua) {
              $("#mytable tbody").empty();

              // Lặp qua dữ liệu từ API và tạo hàng mới cho mỗi mục
              for (var i = 0; i < ketqua.products.length; i++) {
                  var product = ketqua.products[i];

                  var row = $("<tr></tr>");
                  let $image =   `<img src="${product.image}" style="width:50px !important; height:50px !important">`
                  $("<td></td>").text(product.id).appendTo(row);
                  $("<td></td>").html($image).appendTo(row);
                  let $info = `<span style="font-weight:bold">${product.name}<br>${product.description}</span>`
                  $("<td></td>").html($info).appendTo(row);
                  $("<td></td>").text(product.category).appendTo(row);
                  $("<td></td>").text(product.food_need).appendTo(row);
                  $("<td></td>").text(product.food_step).appendTo(row);

                  var actionsColumn = $("<td class='actions'></td>");

                  var route_delete = `${window.location.origin}/delete_products/` + product
                      .id;
                  var route_update = `${window.location.origin}/update_products` + product.id;

                  var deleteLink = $("<a></a>").attr("href", route_delete)
                      .addClass("btn btn-danger")
                      .text("Xóa");

                  actionsColumn.append(deleteLink);

                  var editButton = $("<button></button>").addClass("btn btn-dark edit")
                      .val(product.id)
                      .text("Sửa")
                      .click(function() {
                          var value = $(this).val();
                          var route = `${window.location.origin}/update/` + value;

                          $.ajax({
                              url: route,
                              type: 'get',
                              data: {
                                  id: value,
                              }
                          }).done(function(ketqua) {
                              $('#form').attr('method', 'get');
                              $('#form').attr('action', '/edit/' + ketqua
                                  .products[0].id);


                              $("#name").val(ketqua.products[0].name);
                              $("#image").val(ketqua.products[0].image);
                              $("#description").val(ketqua.products[0].description);
                              $("#category").val(ketqua.products[0].category);
                              $("#food_need").val(ketqua.products[0].food_need);
                              $("#food_step").val(ketqua.products[0].food_step);

                          });
                          openModal();
                      });

                  actionsColumn.append(editButton);

                  row.append(actionsColumn);

                  // Thêm hàng mới vào tbody
                  $("#mytable tbody").append(row);
              }
          });

      });

      var modal = document.getElementById("myModal");
      var btn = document.getElementsByTagName("button")[0];
      var span = document.getElementsByClassName("close")[0];

      function openModal() {
          modal.style.display = "block";
      }

      function closeModal() {
          $('#form').attr('method', 'post');
          $('#form').attr('action', 'add_products');
          $("#name").val('');
          $("#quantity").val('');
          $("#price").val('');
          modal.style.display = "none";
      }
      window.onclick = function(event) {
          if (event.target == modal) {
              closeModal();
          }
      }
  </script>
</body>

</html>
