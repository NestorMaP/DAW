const BASE_URL = 'https://reqres.in/api/users/';
const POSTMAN_URL = 'https://httpbin.org/post';

//Código principal dentro del evento load
// para asegurar la carga de los componentes
window.addEventListener('load', (ev) => {
  let numsecs = document.getElementById('numsecs');
  let user = document.getElementById('user');
  let boton = document.querySelector('button');

  boton.addEventListener('click', (ev) => {
    ev.preventDefault();
    clearFields();
    procesarFetch(numsecs.value, user.value);
  });
});

function clearFields() {
  document.querySelectorAll('span').forEach((element) => {
    element.innerHTML = '';
    console.log(element);
  });
}

async function procesarFetch(numsecs, user) {
  try {
    // PARTE 1 //
    /////////////

    // Validación usuario y segundos
    if (isNaN(numsecs) || isNaN(user) || user < 1 || user > 12) {
      throw new Error(
        'ERROR: Número de usuario no comprendido entre 1 y 12 y/o segundos indicados con número'
      );
    }

    // Llamada a la API con el retraso indicado
    const userUrl = `${BASE_URL}${user}?delay=${numsecs}`;
    const userResponse = await fetch(userUrl);

    if (!userResponse.ok) {
      document.getElementById('status').innerText = userResponse;
      throw new Error(
        `Error en la obtención del usuario: ${userResponse.status}`
      );
    }

    const userData = await userResponse.json();

    // Completar campos ID y Email
    document.getElementById('id').innerText = userData.data.id;
    document.getElementById('email').innerText = userData.data.email;

    // PARTE 2 //
    /////////////

    // Preparamos POST
    const postData = {
      id: userData.data.id,
      email: userData.data.email,
      first_name: userData.data.first_name,
    };

    const postResponse = await fetch(POSTMAN_URL, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(postData),
    });

    if (!postResponse.ok) {
      document.getElementById('status').innerText = postResponse.status;
      throw new Error(
        `Error en la creación del nuevo usuario: ${postResponse.status}`
      );
    }

    const postResult = await postResponse.json();
    console.log(postResult);

    // Rellenar el campo name con first_name
    document.getElementById('name').innerText = postResult.json.first_name;

    // Campo status
    document.getElementById('status').innerText = 200;
  } catch (e) {
    console.error('Error:', e);
    document.getElementById('status').innerText = e.message;
  }
}
