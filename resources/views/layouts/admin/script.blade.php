<!-- Custom scripts for all pages-->
<script src="admin/js/sb-admin-2.min.js"></script>



<!-- Core plugin JavaScript-->
<script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>


<!-- Page level plugins -->
<!-- <script src="admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="admin/vendor/datatables/dataTables.bootstrap4.min.js"></script> -->


<script>
    $(document).ready(function () {
        $('input[id^="date"]').each(function () {
            $(this).datepicker({
                minDate: 0,
                dateFormat: "dd-mm-yy",
                maxDate: "+2W"
            });
        });
    });



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


    $(document).ready(function () {
        var semuaTabel = $('.table').DataTable({
            "language": {
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ Data",
                "infoEmpty": "Menampilkan 0 sampai 0 dari 0 Data",
                "lengthMenu": "Tampilkan _MENU_ Data",
                "search": "Pencarian:",
                "zeroRecords": "Tidak ditemukan data yang sesuai",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Berikutnya",
                    "previous": "Sebelumnya"
                },
            }
        })
        var tabelPenumpang = $('#tabelPenumpang').DataTable();
        var tabelSpeedboat = $('#tabelSpeedboat').DataTable();
        var tabelJadwal = $('#tabelJadwal').DataTable();
        var tabelTransaksiTerima = $('#tabelTransaksiTerima').DataTable();
        var tabelTransaksiPending = $('#tabelTransaksiPending').DataTable();
        var tabelPembayaran = $('#tabelPembayaran').DataTable();

        $('.dataTables_filter input').on('keyup change', function () {
            tabelPenumpang
                .column(1) // kolom nama
                .search(this.value)
                .draw();
        });

        $('.dataTables_filter input').on('keyup change', function () {
            tabelSpeedboat
                .column(0) //Kolom nama speedboat
                .search(this.value)
                .draw();
        });

        $('.dataTables_filter input').on('keyup change', function () {
            tabelJadwal
                .column(0) //Kolom nama speedboat
                .search(this.value)
                .draw();
        });

        $('.dataTables_filter input').on('keyup change', function () {
            tabelPembayaran
                .column(1) //Kolom nama bank
                .search(this.value)
                .draw();
        });


    });

</script>
