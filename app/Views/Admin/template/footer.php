<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>

<script>
    document.getElementById('logout').addEventListener('click', function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Anda yakin ingin keluar?',
            text: "Anda akan keluar dari sistem.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, keluar',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= base_url('/admin/logout'); ?>";
            }
        });
    });
</script>
</body>

</html>