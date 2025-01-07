const mainDiv = document.getElementById('main');
      function showData() {
        fetch('https://randomuser.me/api/')
          .then((response) => response.json())
          .then((data) => {
            console.log(data.results[0]);
            mainDiv.innerHTML = `
              <img src="${data.results[0].picture.large}" width="100px"/>
              <p>${data.results[0].name.first} ${data.results[0].name.last}</p>
              <p>Email: ${data.results[0].email}</p>
              <p>${data.results[0].location.street.number} ${
              data.results[0].location.street.name
            }</p>
              <p>${data.results[0].location.city} 
                ${data.results[0].location.postcode} 
                ${data.results[0].location.state} 
                (${data.results[0].location.country.toUpperCase()})</p>
            `;
          });
      }
      showData();