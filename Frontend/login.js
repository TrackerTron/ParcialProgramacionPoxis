const request = new XMLHttpRequest();
request.open("POST", "http://localhost:8000/oauth/token");
request.setRequestHeader("Content-Type", "application/json");

const data = {
  grant_type: "password",
  client_id: "3",
  client_secret: "kjoKqWVplxpzYX4QaXcnhrDFYGxUjpHD7Pf20vOe",
  username: "username@hotmail.com",
  password: "password"
};

request.send(JSON.stringify(data));

request.onload = function() {
  if (request.status === 200) {
    // Token obtenido correctamente
    const response = JSON.parse(request.responseText);
    localStorage.setItem("access_token", response.access_token);
    window.location.href = "home.html";
  } else {
    // Error al obtener el token
    console.log("Error al obtener el token:", request.responseText);
  }
};
