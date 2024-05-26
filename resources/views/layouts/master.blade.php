<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>



@yield('content')




<!-- <script type="text/javascript" src="{{asset('js/frontend.js')}}"></script> -->
<script></script>
<script>
    function togglePenumpangInput() {
        var layanan = document.getElementById("layanan").value;
        var jumlahPenumpang = document.getElementById("jumlahPenumpang");
        if (layanan === "pesanan_pribadi") {
            jumlahPenumpang.classList.remove("hidden");
        } else {
            jumlahPenumpang.classList.add("hidden");
        }
    }

    function changePenumpang(amount) {
        var penumpangCount = document.getElementById("penumpangCount");
        var penumpangInput = document.getElementById("penumpang");
        var currentCount = parseInt(penumpangCount.textContent);
        var newCount = currentCount + amount;
        if (newCount < 1) newCount = 1; // Minismum 1 penumpang
        if (newCount > 3) newCount = 3; // Maximum 3 penumpang
        penumpangCount.textContent = newCount;
        penumpangInput.value = newCount;
    }

    var selected = 0;

    function handlePilihKapal(id) {
        var btnLanjutNoLink = document.getElementById("btn-lanjut-no-link");
        var btnLanjutLink = document.getElementById("btn-lanjut-link");
        var formList = document.getElementById("form-list");
        if (selected != 0) {
            var jbPrev = document.getElementById(`jb-${selected}`);
            var jtPrev = document.getElementById(`jt-${selected}`);
            var hargaPrev = document.getElementById(`tarif-${selected}`);
            var btnPrev = document.getElementById(`btn-pilih-${selected}`);
            var checkTruePrev = document.getElementById(`check-true-${selected}`);
            var checkFalsePrev = document.getElementById(`check-false-${selected}`);

            jbPrev.classList.remove("text-orange-600");
            jtPrev.classList.remove("text-orange-600");
            hargaPrev.classList.remove("text-orange-600");
            btnPrev.classList.remove("bg-orange-600");
            btnPrev.classList.add("bg-[#151F57]");
            checkTruePrev.classList.add("hidden");
            checkFalsePrev.classList.remove("hidden");
        }

        if (selected == id) {
            selected = 0;
        } else {
            var jb = document.getElementById(`jb-${id}`);
            var jt = document.getElementById(`jt-${id}`);
            var harga = document.getElementById(`tarif-${id}`);
            var btn = document.getElementById(`btn-pilih-${id}`);
            var checkTrue = document.getElementById(`check-true-${id}`);
            var checkFalse = document.getElementById(`check-false-${id}`);

            jb.classList.add("text-orange-600");
            jt.classList.add("text-orange-600");
            harga.classList.add("text-orange-600");
            btn.classList.remove("bg-[#151F57]");
            btn.classList.add("bg-orange-600");
            checkTrue.classList.remove("hidden");
            checkFalse.classList.add("hidden");

            selected = id;
        }

        // Untuk Button Lanjut
        if (selected != 0) {
            btnLanjutLink.classList.remove("hidden");
            btnLanjutNoLink.classList.add("hidden");
            formList.action = `/pesan/${selected}`;
        } else {
            btnLanjutLink.classList.add("hidden");
            btnLanjutNoLink.classList.remove("hidden");
        }
    }

</script>

</html>
