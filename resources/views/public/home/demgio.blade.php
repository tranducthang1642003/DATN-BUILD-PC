
<div id="countdown" class="text-xl font-bold text-white"></div>
    <script >
const endTime = new Date();
endTime.setHours(endTime.getHours() + 2);

function updateCountdown() {
    const currentTime = new Date();
    const difference = endTime - currentTime;

    const hours = Math.floor(difference / (1000 * 60 * 60));
    const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((difference % (1000 * 60)) / 1000);

    const countdownElement = document.getElementById('countdown');
    countdownElement.textContent = `${hours}:${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;

    if (difference <= 0) {
        clearInterval(interval);
        countdownElement.textContent = 'Hết giờ!';
    }
}

updateCountdown();
const interval = setInterval(updateCountdown, 1000);

    </script>
</body>
</html>
