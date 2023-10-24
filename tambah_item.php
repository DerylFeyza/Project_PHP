<?php
include "header.php";
?>
<div class="container" id="tambah-item-form" style="padding-top: 6rem;">
    <div class="text-center">
        <h3>ADD ITEMS</h3>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <form id="myForm" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="startprice" class="form-label">Harga Awal:</label>
                    <input type="number" id="startprice" name="startprice" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi:</label>
                    <input type="text" id="deskripsi" name="deskripsi" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto:</label>
                    <input type="file" id="foto" name="foto" class="form-control" required>
                </div>
                <button type="button" class="btn btn-primary w-25" style="margin-left: 40%" onclick="submitForm()">Tambah Buku</button>
            </form>
        </div>
    </div>
    <div id="response"></div>
</div>


<script>
    function submitForm() {
        var form = document.getElementById("myForm");
        var name = form.elements.name.value;
        var startprice = form.elements.startprice.value;
        var deskripsi = form.elements.deskripsi.value;
        var responseContainer = document.getElementById("response");
        if (!name || !startprice || !deskripsi) {
            responseContainer.innerHTML = '<div class="alert alert-danger">' + "all fields are required!" + '</div>';
            return;
        }
        var formData = new FormData(form);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "tambah_item_proses2.php", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    responseContainer.innerHTML = '<div class="alert alert-success">' + response.message + '</div>';
                    form.reset();
                } else {
                    responseContainer.innerHTML = '<div class="alert alert-danger">' + response.message + '</div>';
                }
                responseContainer.style.display = "block";
            }
        };

        xhr.send(formData);
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
    crossorigin="anonymous"></script>
</body>

</html>