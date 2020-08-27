const axios = require('axios');
const baseUrl = "http://127.0.0.1:8000";

const RequestHandler = {

    fizzbuzz() {
        return axios(urlBuilder('/api/fizzbuzz'));
    },

    reversed(inputValue) {
        return axios.post(urlBuilder('/api/reversal'), {
            inputValue: inputValue
        })
    },

    getUser(name) {
        return axios(urlBuilder(`/api/users/${name}`))
    },

    updatePassword(name, currentPassword, newPassword) {
        return axios.post(urlBuilder('/api/users/reset-password'), {
            user: {
                name: name,
                currentPassword: currentPassword,
                newPassword: newPassword
            }
        })
    }
}
export default RequestHandler;

function urlBuilder(path) {
    return `${baseUrl}${path}`;
}