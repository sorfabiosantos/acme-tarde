import {
    HttpUser
} from "../../_shared/js/HttpUser.js";

const api = new HttpUser();

console.log("API inicializada...", api);

const formLogin = document.querySelector("#formLogin");

formLogin.addEventListener("submit", async (event) => {
    event.preventDefault();
    const loginData = new FormData(formLogin);
    // parametrizando o FormData para um objeto simples
    const loginResponse = {};
    let formObj = {};
    loginData.forEach((value, key) => {
        formObj[key] = value;
    });


    try {
        const loginResponse = await api.loginUser(formObj);
        console.log("Resposta do login:", loginResponse);
    } catch (error) {
        console.error("Erro ao fazer login:", error);
        console.log(loginResponse);
    }
});

document.querySelector("#getUser").addEventListener("click", async () => {
    const user = await api.listById(38);
    console.log("Usuário obtido:", user);
});