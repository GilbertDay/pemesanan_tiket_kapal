<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>



@yield('content')





<script>
    function togglePenumpangInput() {
        var layanan = document.getElementById('layanan').value;
        var jumlahPenumpang = document.getElementById('jumlahPenumpang');
        if (layanan === 'pesanan_pribadi') {
            jumlahPenumpang.classList.remove('hidden');
        } else {
            jumlahPenumpang.classList.add('hidden');
        }
    }

    function changePenumpang(amount) {
        var penumpangCount = document.getElementById('penumpangCount');
        var penumpangInput = document.getElementById('penumpang');
        var currentCount = parseInt(penumpangCount.textContent);
        var newCount = currentCount + amount;
        if (newCount < 1) newCount = 1; // Minismum 1 penumpang
        if (newCount > 3) newCount = 3; // Maximum 3 penumpang
        penumpangCount.textContent = newCount;
        penumpangInput.value = newCount;
    }

</script>

</html>
