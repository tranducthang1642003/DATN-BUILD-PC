</div>
</div>
</div>

<script>
function changeTab(element) {
    var lis = document.querySelectorAll("#menu li");
    for (var i = 0; i < lis.length; i++) {
        lis[i].classList.remove("bg-yellow-100", "border-l-4", "border-yellow-500");
    }
    element.classList.add("bg-yellow-100", "border-l-4", "border-yellow-500");

    
}
</script>
@include('public.footer.footer')