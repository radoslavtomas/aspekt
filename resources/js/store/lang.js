const state = {
    lang: {
        sk: {
            'infoPanel': 'Informácie o zákazníčke/zákazníkovi',
            'deliveryPanel': 'Adresa doručenia',
            'billingPanel': 'Fakturačné údaje',
            'notePanel': 'Komentár k objednávke',
            'forwardButtonShipping': 'Skontrolovať objednávku',
            'backButtonShipping': 'Späť',
            'forwardButtonBasket': 'Dodacie údaje',
            'backButtonBasket': 'Pokračovať v nákupe',
            'subtotal': 'Medzisúčet',
            'billingCheckbox': 'Moja fakturačná adresa je iná ako dodacia adresa',
            'emailPlaceholder': 'Tu Vám zašleme potvrdenie o objednávke',
            'phone': 'Telefónne číslo *',
            'name': 'Meno *',
            'surname': 'Priezvisko *',
            'company': 'Spoločnosť',
            'street': 'Ulica *',
            'city': 'Mesto *',
            'postcode': 'PSČ *',
            'country': 'Štát *',
            'required': 'Údaj je povinný',
            'email': 'Neplatný email',
            'maxLength': 'Obsah poľa prekročil maximálnu povolenú veľkosť',
            'pages': 'Počet strán',
            'aspekt_price': 'ASPEKT cena',
            'common_price': 'Bežná cena',
            'editors': 'Editorstvo',
            'translation': 'Preklad',
            'sample': 'Ukážka z knihy',
            'links': 'Súvisiace odkazy',
            'files': 'Súbory na stiahnutie',
            'downloads': 'Knihy na stiahnutie',
            'addToBasket': 'Pridaj do tašky',
            'supportUs': 'Páči sa vám naša práca? Tu ju môžete podporiť.'
        },
        en: {
            'infoPanel': 'Customer information',
            'deliveryPanel': 'Delivery address',
            'billingPanel': 'Billing address',
            'notePanel': 'Note to your order',
            'forwardButtonShipping': 'Order summary',
            'backButtonShipping': 'Back',
            'forwardButtonBasket': 'Delivery',
            'backButtonBasket': 'Continue shopping',
            'subtotal': 'Subtotal',
            'billingCheckbox': 'My billing address is different than my delivery address',
            'emailPlaceholder': 'We will send order confirmation to this email',
            'phone': 'Phone *',
            'name': 'Name *',
            'surname': 'Surname *',
            'company': 'Company',
            'street': 'Street *',
            'city': 'City *',
            'postcode': 'Postal code *',
            'country': 'Country *',
            'required': 'The value is required',
            'email': 'The value is not a valid email',
            'maxLength': 'The value exceeded maximum length allowed',
            'pages': 'Number of pages',
            'aspekt_price': 'ASPEKT price',
            'common_price': 'Common cena',
            'editors': 'Editors',
            'translation': 'Translation',
            'sample': 'Sample',
            'links': 'Related links',
            'files': 'Files to download',
            'downloads': 'Books to download',
            'addToBasket': 'Add to basket',
            'supportUs': 'Do you like what we do? Support us here.'
        }
    }
};

const getters = {
    lang(state) {
        return state.lang;
    },
};

export default {
    state,
    getters
};
