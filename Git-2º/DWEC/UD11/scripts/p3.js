document.addEventListener('DOMContentLoaded', () => {
  document.getElementById('form').addEventListener('submit', async (event) => {
    event.preventDefault();

    const apiKey = document.getElementById('apikey').value;
    const endpoint =
      'https://opendata.aemet.es/opendata/api/mapasygraficos/analisis';

    try {
      // Primera llamada para obtener la URL de la imagen del mapa
      const response = await fetch(`${endpoint}?apikey=${apiKey}`);
      if (!response.ok) {
        throw new Error(`Error en la petición inicial: ${response.status}`);
      }

      const data = await response.json();
      const mapURL = data.datos;

      // Segunda llamada para obtener la imagen
      const mapResponse = await fetch(mapURL);
      if (!mapResponse.ok) {
        throw new Error(
          `Error al obtener la imagen del mapa: ${response.status}`
        );
      }

      const mapBlob = await mapResponse.blob();
      const mapImageURL = URL.createObjectURL(mapBlob);

      // Mostrar mapa en pantalla
      const mapContainer = document.getElementById('map-container');
      const weatherMap = document.getElementById('weather-map');
      weatherMap.src = mapImageURL;
      mapContainer.style.display = 'block';

      // Ocultar el formulario
      document.getElementById('form').style.display = 'none';
    } catch (e) {
      console.error('Error:', e);
    }
  });
});
