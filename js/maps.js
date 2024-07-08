const axios = require('axios');

const apiKey = 'b4e87cb29ba644fa8044f415a02ad57f';
const latitude = '41.204633';
const longitude = '-8.553485';
const url = `https://api.opencagedata.com/geocode/v1/json?q=${latitude}+${longitude}&key=${apiKey}`;

axios.get(url)
    .then(response => {
        const data = response.data;
        if (data.results.length > 0) {
            const address = data.results[0].formatted;
            console.log('Endereço:', address);
        } else {
            console.log('Localização não encontrada');
        }
    })
    .catch(error => console.error('Erro:', error));