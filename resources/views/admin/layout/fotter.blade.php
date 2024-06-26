<div class="fixed top-4 left-4">
        <button @click="sidebarOpen = !sidebarOpen" 
                :class="{ 'hidden': sidebarOpen, 'block': !sidebarOpen }"
                class="text-3xl"><ion-icon name="menu-outline"></ion-icon></button>
    </div>
</div>


</body>

</html>
<script src="js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.x.x/dist/alpine.min.js" defer></script>