import {
    HttpUser
} from "../../_shared/HttpUser.js";

const api = new HttpUser();

console.log("API inicializada", api);

const formRegister = document.querySelector("#formRegister");

formRegister.addEventListener("submit", async (event) => {
    event.preventDefault();
    const userData = new FormData(formRegister);
    try {
        const userCreated = await api.createUser(userData);
        console.log("Usuário criado com sucesso:", userCreated);
    } catch (error) {
        console.error("Erro ao criar usuário:", error);
    }
});