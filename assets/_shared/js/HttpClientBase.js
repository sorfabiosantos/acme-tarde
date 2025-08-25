export default class HttpClientBase {
    #baseUrl;
    #defaultHeaders;

    constructor(baseUrl = '') {
        this.#baseUrl = baseUrl;
        this.#defaultHeaders = {
            'Content-Type': 'application/json'
        };
    }

    // Método para configurar o token JWT
    setAuthToken(token) {
        this.#defaultHeaders['token'] = `${token}`;
    }

    // Método para limpar o token JWT
    clearAuthToken() {
        delete this.#defaultHeaders['token'];
    }

    // Método privado para construir a URL com parâmetros
    #buildUrl(endpoint, params = {}) {
        let url = `${this.#baseUrl}${endpoint}`;

        // Adiciona parâmetros na URL se existirem
        const queryParams = new URLSearchParams();
        for (const [key, value] of Object.entries(params)) {
            if (url.includes(`/:${key}`)) {
                url = url.replace(`:${key}`, value);
            } else {
                queryParams.append(key, value);
            }
        }

        const queryString = queryParams.toString();
        if (queryString) {
            url += `?${queryString}`;
        }

        return url;
    }

    // Método privado para realizar as requisições
    async #fetchWithConfig(endpoint, config, params = {}) {
        try {
            const url = this.#buildUrl(endpoint, params);
            //console.log(url); // para debug
            const response = await fetch(url, {
                ...config,
                headers: {
                    ...this.#defaultHeaders,
                    ...config.headers
                }
            });

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const contentType = response.headers.get('content-type');
            if (contentType && contentType.includes('application/json')) {
                return await response.json();
            }

            return await response.text();

        } catch (error) {
            throw new Error(`Request failed: ${error.message}`);
        }
    }

    // GET
    async get(endpoint, params = {}, headers = {}) {
        return this.#fetchWithConfig(endpoint, {
            method: 'GET',
            headers: headers
        }, params);
    }

    // POST
    async post(endpoint, data = null, params = {}) {
        const config = {
            method: 'POST',
            body: data instanceof FormData ? data : JSON.stringify(data)
        };

        // Se for FormData, remover o Content-Type para que o navegador defina automaticamente
        if (data instanceof FormData) {
            delete this.#defaultHeaders['Content-Type'];
        }

        return this.#fetchWithConfig(endpoint, config, params);
    }

    // PUT
    async put(endpoint, data = null, params = {}) {

        let config = {
            method: 'PUT',
            headers: {}
        };

        if (data instanceof FormData) {
            config.body = new URLSearchParams(data).toString();
            config.headers['Content-Type'] = 'application/x-www-form-urlencoded';
        } else {
            config.body = JSON.stringify(data);
            config.headers['Content-Type'] = 'application/json';
        }

        return this.#fetchWithConfig(endpoint, config, params);
    }

    // DELETE
    async delete(endpoint, params = {}) {
        return this.#fetchWithConfig(endpoint, {
            method: 'DELETE'
        }, params);
    }
}