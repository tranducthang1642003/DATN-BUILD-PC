</div>


</body>

</html>
<script src="js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.x.x/dist/alpine.min.js" defer></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.style.opacity = '0';
                setTimeout(() => {
                    alert.remove();
                }, 1000);
            }, 3000);
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const loader = document.getElementById('loader');
        setTimeout(() => {
            loader.style.opacity = 0;
            setTimeout(() => {
                loader.style.display = 'none';
            }, 500);
        }, 1000);
    });
</script>