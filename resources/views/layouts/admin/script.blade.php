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

</script>
