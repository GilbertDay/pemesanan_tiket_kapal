<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
</head>



@yield('content')




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script>
    $(function () {
        $("#datepicker").datepicker({
            minDate: 0,
            dateFormat: "yy-mm-dd",
            maxDate: "+1M"
        });
    });

</script>
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


    function setTujuan() {
        var asal = document.getElementById('pelabuhan-asal').value;
        var tujuan = document.getElementById('pelabuhan-tujuan');

        if (asal === 'Pelabuhan Laut Jailolo') {
            tujuan.value = 'Pelabuhan Bastion Ternate';
        } else if (asal === 'Pelabuhan Bastion Ternate') {
            tujuan.value = 'Pelabuhan Laut Jailolo';
        } else {
            tujuan.value = '';
        }
    }

</script>

</html>
