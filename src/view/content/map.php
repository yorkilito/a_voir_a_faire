<div id="map">
    <script>
        var map = L.map('map').setView([0,0],1);
        L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=CIMHDkeAuE234cWtrWB4',{
            attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
        }).addTo(map); 
    </script>
</div>