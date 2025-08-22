import HttpClientBase from './HttpClientBase.js';

export class HttpUser extends HttpClientBase {
    constructor() {
        super(`http://localhost:8080/acme-tarde/api/users`);
    }

    async createUser(userData) {
        return this.post('/add', userData);
    }

    async loginUser(loginData) {
        return this.get('/login', loginData);
    }

    async listById(id) {
        return this.get(`/id/:id`, { id });
    }

}