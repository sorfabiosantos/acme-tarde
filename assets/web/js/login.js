import {
    HttpUser
} from "../../_shared/HttpUser.js";

const api = new HttpUser();

console.log("API inicializada", api);

const formLogin = document.querySelector("#formLogin");

formLogin.addEventListener("submit", async (event) => {
    event.preventDefault();
    const loginData = new FormData(formLogin);

    //try {
        const loginResponse = await api.post('/login', loginData);
        console.log("Resposta do login:", loginResponse);
    //} catch (error) {
    //    console.error("Erro ao fazer login:", error);
    //    console.log(loginResponse);
    //}
});