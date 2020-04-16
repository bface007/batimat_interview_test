export const Auth = {
    setCSRF: function () {
        return window.axios.get('/sanctum/csrf-cookie')
    },
    login: function (email, password) {
        return window.axios.post('/login', {email, password});
    }
};

export const User = {
    getMe() {
        return window.axios.get('/api/me')
    }
};

export const Client = {
    getClients() {
        return window.axios.get('/api/clients')
    },
    addClient(name, phone) {
        return window.axios.post('/api/clients', {name, phone})
    }
};

export function handleUnexpectedError(error) {
    if(error.request) {
        console.log('request error', error.request)
    } else {
        console.log('request error', error.message);
    }
    alert('Erreur innatendue. Consultez les logs consoles du navigateur.')
}
