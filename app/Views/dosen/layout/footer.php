    </div>
    <!-- End Main Content -->

    <!-- Bootstrap Bundle JS (sudah termasuk Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Optional Custom Script -->
    <script>
        // Auto close alert setelah 3 detik
        setTimeout(function () {
            const alert = document.querySelector('.alert');
            if (alert) {
                alert.classList.remove('show');
                alert.classList.add('fade');
            }
        }, 3000);
    </script>

</body>
</html>