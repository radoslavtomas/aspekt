<script>
    window.addEventListener('load', function () {

        // obtain plugin
        var cc = initCookieConsent();

        // run plugin with your configuration
        cc.run({
            current_lang: '{{ app()->getLocale() }}',
            languages: {
                'en': {
                    consent_modal: {
                        title: 'Our site uses cookies 🍪🍪🍪',
                        description: 'Information that we save to your device are used only to ensure our websites\'s proper operation, security and enhancement of your experience. We do not provide any of your information to any third parties. You can review the cookies we use <button type="button" data-cc="c-settings" class="cc-link">here</button>',
                        primary_btn: {
                            text: 'Continue',
                            role: 'accept_all'              // 'accept_selected' or 'accept_all'
                        },
                        // secondary_btn: {
                        //     text: 'Settings',
                        //     role: 'settings'        // 'settings' or 'accept_necessary'
                        // }
                    },
                    settings_modal: {
                        title: 'Information about our cookies',
                        save_settings_btn: 'Save settings',
                        accept_all_btn: 'Continue',
                        // reject_all_btn: 'Reject all',
                        // close_btn_label: 'Zavrieť',
                        cookie_table_headers: [
                            {col1: 'Name'},
                            {col2: 'Domain'},
                            {col3: 'Expiration'},
                            {col4: 'Description'}
                        ],
                        blocks: [
                            {
                                title: 'Necessary cookies',
                                description: 'This cookies are used only to ensure our websites\'s proper operation, security and enhancement of your experience',
                                toggle: {
                                    value: 'necessary',
                                    open: true,
                                    enabled: true,
                                    readonly: true          // cookie categories with readonly=true are all treated as "necessary cookies"
                                },
                                cookie_table: [             // list of all expected cookies
                                    {
                                        col1: 'XSRF-TOKEN',       // match all cookies starting with "_ga"
                                        col2: 'www.aspekt.sk',
                                        col3: '2 hours',
                                        col4: 'This cookie is written to help with site security in preventing Cross-Site Request Forgery attacks.',
                                    },
                                    {
                                        col1: 'aspekt_session',
                                        col2: 'www.aspekt.sk',
                                        col3: '2 hours',
                                        col4: 'Information our website uses to ensure data consistency between its pages.',
                                    },
                                    {
                                        col1: 'cc_cookie',
                                        col2: 'www.aspekt.sk',
                                        col3: '1 week',
                                        col4: 'Information on how long we hold your cookie consent.',
                                    }
                                ]
                            },
                            {
                                title: 'More information',
                                description: 'For more information how we deal with personal data protection click <a class="cc-link" href="{{ route('gdpr') }}">here</a>.',
                            }
                        ]
                    }
                },
                'sk': {
                    consent_modal: {
                        title: 'Naša stránka používa cookies 🍪🍪🍪',
                        description: 'Informácie, ktoré ukladáme do Vášho zariadenia, používame výhradne na správny chod našej stránky, jej zabezpečenie a spríjemnenie jej používania. Žiadne údaje neprenášame tretím stranám. Cookies, ktoré používame, si môžete pozrieť <button type="button" data-cc="c-settings" class="cc-link">tu</button>.',
                        primary_btn: {
                            text: 'Pokračovať',
                            role: 'accept_all'              // 'accept_selected' or 'accept_all'
                        },
                        // secondary_btn: {
                        //     text: 'Settings',
                        //     role: 'settings'        // 'settings' or 'accept_necessary'
                        // }
                    },
                    settings_modal: {
                        title: 'Informácie o cookies',
                        save_settings_btn: 'Uložiť nastavenia',
                        accept_all_btn: 'Pokračovať',
                        // reject_all_btn: 'Reject all',
                        // close_btn_label: 'Zavrieť',
                        cookie_table_headers: [
                            {col1: 'Názov'},
                            {col2: 'Doména'},
                            {col3: 'Expirácia'},
                            {col4: 'Popis'}
                        ],
                        blocks: [
                            {
                                title: 'Nevyhnutné cookies',
                                description: 'Tieto cookies používame výhradne na správny chod našej stránky, jej zabezpečenie a spríjemnenie jej používania.',
                                toggle: {
                                    value: 'necessary',
                                    enabled: true,
                                    readonly: true          // cookie categories with readonly=true are all treated as "necessary cookies"
                                },
                                cookie_table: [             // list of all expected cookies
                                    {
                                        col1: 'XSRF-TOKEN',       // match all cookies starting with "_ga"
                                        col2: 'www.aspekt.sk',
                                        col3: '2 hodiny',
                                        col4: 'Informácia potrebná na zamedzenie prenosu falošných žiadostí medzi stránkami (Cross-Site Request Forgery).',
                                    },
                                    {
                                        col1: 'aspekt_session',
                                        col2: 'www.aspekt.sk',
                                        col3: '2 hodiny',
                                        col4: 'Informácie, ktoré naša stránka používa na zachovanie správnych údajov medzi jednotlivými klikmi.',
                                    },
                                    {
                                        col1: 'cc_cookie',
                                        col2: 'www.aspekt.sk',
                                        col3: '1 týždeň',
                                        col4: 'Informácia, ako dlho uchovávame Váš súhlas o cookies.',
                                    }
                                ]
                            },
                            {
                                title: 'Viac informácii',
                                description: 'Pre viac informácii o tom, ako spracovávame Vaše údaje, kliknite <a class="cc-link" href="{{ route('gdpr') }}">tu</a>.',
                            }
                        ]
                    }
                }
            }
        });
    });
</script>
