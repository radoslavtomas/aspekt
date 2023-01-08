const state = {
    lang: {
        sk: {
            'infoPanel': 'Informácie o zákazníčke/zákazníkovi',
            'deliveryPanel': 'Adresa doručenia',
            'billingPanel': 'Fakturačná adresa',
            'basketPanel': 'Obsah tašky',
            'paymentMethod': 'Spôsob platby',
            'paymentMethodDelivery': 'Pri doručení',
            'notePanel': 'Komentár k objednávke',
            'billingPanelNote': 'Rovknaká ako adresa doručenia',
            'forwardButtonShipping': 'Skontrolovať objednávku',
            'backButtonShipping': 'Späť',
            'forwardButtonBasket': 'Dodacie údaje',
            'backButtonBasket': 'Pokračovať v nákupe',
            'orderConfirmationButton': 'Potvrdenie objednávky',
            'goHomeButton': 'Návrat na hlavnú stránku',
            'subtotal': 'Medzisúčet',
            'billingCheckbox': 'Moja fakturačná adresa je iná ako dodacia adresa',
            'emailPlaceholder': 'Tu Vám zašleme potvrdenie o objednávke',
            'phone': 'Telefónne číslo *',
            'phoneAlt': 'Telefónne číslo',
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
            'basketTitle': 'Nákupná taška',
            'shippingTitle': 'Dodacie údaje',
            'summaryTitle': 'Kontrola objednávky',
            'thankYouTitle': 'Objednávka ukončená',
            'thankYouNote': 'Ďakujeme za nákup.',
            'thankYouStatusNote': 'O stave objednávky Vás budeme informovať na Váš email',
            'basketEmpty': 'Nákupná taška je zatiaľ prázdna.',
            'basketEmptyButton': 'Knižná edícia',
            'booksTeaser': 'ASPEKT slovenskej literárnej verejnosti prinavrátil jej „stratené“ emigrované spisovateľky, objavil pre ňu nové postavy a ich autorky. Vydáva nielen kanonizované texty nositeliek Nobelovej ceny, ale aj provokujúce prózy žien, ktoré máju nálepky radšej na chladničke, než na obálkach kníh. Stačí si vybrať ヽ(•‿•)ノ',
            'postageNote': 'Objednané publikácie vám zašleme na dobierku. K cene objednaných kníh je potrebné pripočítať cenu poštovného, ktorá sa pohybuje v rozmedzí 1,65 € – 3,31 € v závislosti od hmotnosti posielaného balíka. (Za samotné knihy však platíte len 75 percent ich predajnej ceny.)',

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
            'supportUs': 'Páči sa vám naša práca? Tu ju môžete podporiť.',


        },
        en: {
            'infoPanel': 'Customer information',
            'deliveryPanel': 'Delivery address',
            'billingPanel': 'Billing address',
            'basketPanel': 'Items in basket',
            'paymentMethod': 'Payment method',
            'paymentMethodDelivery': 'At the delivery',
            'notePanel': 'Note to your order',
            'billingPanelNote': 'Same as delivery',
            'forwardButtonShipping': 'Order summary',
            'backButtonShipping': 'Back',
            'forwardButtonBasket': 'Delivery',
            'backButtonBasket': 'Continue shopping',
            'orderConfirmationButton': 'Confirm order',
            'goHomeButton': 'Back to the main page',
            'subtotal': 'Subtotal',
            'billingCheckbox': 'My billing address is different than my delivery address',
            'emailPlaceholder': 'We will send order confirmation to this email',
            'phone': 'Phone *',
            'phoneAlt': 'Phone',
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
            'addToBasket': 'Add to basket',
            'supportUs': 'Do you like what we do? Support us here.',
            'basketTitle': 'Shopping basket',
            'shippingTitle': 'Delivery',
            'summaryTitle': 'Order summary',
            'thankYouTitle': 'Order finished',
            'thankYouNote': 'Thank you for your order',
            'thankYouStatusNote': 'We will notify you about its status on your email',
            'basketEmpty': 'Shopping basket is empty.',
            'basketEmptyButton': 'Our books',
            'booksTeaser': 'ASPEKT brought back to slovak literature scene "lost" female writers, their novels, short stories and characters in them. It publishes not only established texts written by female Nobel prize winners but also provoking texts by women who prefer their "labels" be printed on the fridge magnets rather than on book covers. You only need to choose ヽ(•‿•)ノ',
            'postageNote': 'Ordered books will be sent to you by post. Please, be aware there will be additional postage cost added to the price of your book(s). This might be between 1.65€ and 3.31€ depending on the weight of your parcel. (Don\'t forget, by buying books with us you only pay 75% of their normal price elsewhere.)',

            'pages': 'Number of pages',
            'aspekt_price': 'ASPEKT price',
            'common_price': 'Common cena',
            'editors': 'Editors',
            'translation': 'Translation',
            'sample': 'Sample',
            'links': 'Related links',
            'files': 'Files to download',
            'downloads': 'Books to download',

        }
    }
};

const mutations = {
    setTranslations(state, payload) {
        state.lang = payload
    },

};

const actions = {
    setTranslations({ commit }, payload) {
        commit('setTranslations', payload);
    },
};

const getters = {
    lang(state) {
        return state.lang;
    },
};

export default {
    state,
    actions,
    mutations,
    getters
};
