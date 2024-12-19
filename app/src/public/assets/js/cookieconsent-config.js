import "https://cdn.jsdelivr.net/gh/orestbida/cookieconsent@3.0.1/dist/cookieconsent.umd.js";

// Function to get seasonal emoji related to tree and leaves
// Usable in the footer of the consent modal
function getSeasonalEmoji() {
    const date = new Date();
    const month = date.getMonth() + 1;

    // spring runs from March 1 to May 31;
    if (month >= 3 && month <= 5) {
        return "🌸";
    }
    // summer runs from June 1 to August 31;
    else if (month >= 6 && month <= 8) {
        return "🌳";
    }
    // fall (autumn) runs from September 1 to November 30;
    else if (month >= 9 && month <= 11) {
        return "🍂";
    }
    // and winter runs from December 1 to February 28 (February 29 in a leap year).
    else if (month >= 12 || month <= 2) {
        return "🎄";
    }
    // default emoji if none of the conditions are met
    return "🌲";
}

// Enable dark mode
document.documentElement.classList.add("cc--darkmode");

CookieConsent.run({
    guiOptions: {
        consentModal: {
            layout: "box",
            position: "bottom left",
            equalWeightButtons: true,
            flipButtons: false,
        },
        preferencesModal: {
            layout: "box",
            position: "right",
            equalWeightButtons: true,
            flipButtons: false,
        },
    },
    categories: {
        necessary: {
            readOnly: true,
        },
    },
    language: {
        default: "es",
        autoDetect: "browser",
        translations: {
            en: {
                consentModal: {
                    title: "Hello traveller, it's cookie time!",
                    description:
                        "We use cookies to enhance your browsing experience. By continuing to use our site, you consent to our use of cookies. For more details, please review our <a href='/cookie-policy'>Cookie Policy</a>.",
                    acceptAllBtn: "Accept all",
                    acceptNecessaryBtn: "Accept only necessary",
                    showPreferencesBtn: "Manage preferences",
                    footer: `${getSeasonalEmoji()} ${new Date().getFullYear()} Urban Tree 5.0`,
                },
                preferencesModal: {
                    title: "Consent Preferences Center",
                    acceptAllBtn: "Accept all",
                    acceptNecessaryBtn: "Accept only necessary",
                    savePreferencesBtn: "Save preferences",
                    closeIconLabel: "Close modal",
                    serviceCounterLabel: "Service|Services",
                    sections: [
                        {
                            title: "Cookie Usage",
                            description:
                                "We use cookies to enhance your browsing experience. By continuing to use our site, you consent to our use of cookies. For more details, please review our <a href='/cookie-policy'>Cookie Policy</a>.",
                        },
                        {
                            title: 'Strictly Necessary Cookies <span class="pm__badge">Always Enabled</span>',
                            description:
                                "Strictly necessary cookies are essential for the basic functioning of the website and cannot be disabled in our systems. These cookies enable functions such as access to secure areas of the website, like user accounts, remembering essential settings such as privacy or language preferences, and ensuring the secure and proper operation of the site.",
                            linkedCategory: "necessary",
                        },
                        {
                            title: "More information",
                            description:
                                'For any query in relation to our policy on cookies and your choices, please <a class="cc__link" href="mailto:urbantree@iesmonsia.org" target="_blank">contact us</a>.',
                        },
                    ],
                },
            },
            es: {
                consentModal: {
                    title: "Hola viajero, es la hora de las galletas!",
                    description:
                        "Utilizamos cookies para mejorar tu experiencia de navegación. Al continuar navegando en este sitio, aceptas el uso de cookies. Para más información, consulta nuestra <a href='/cookie-policy'>Política de Cookies</a>.",
                    acceptAllBtn: "Aceptar todo",
                    acceptNecessaryBtn: "Aceptar solo las necesarias",
                    showPreferencesBtn: "Gestionar preferencias",
                    footer: `${getSeasonalEmoji()} ${new Date().getFullYear()} Urban Tree 5.0`,
                },
                preferencesModal: {
                    title: "Preferencias de Consentimiento",
                    acceptAllBtn: "Aceptar todo",
                    acceptNecessaryBtn: "Aceptar solo las necesarias",
                    savePreferencesBtn: "Guardar preferencias",
                    closeIconLabel: "Cerrar modal",
                    serviceCounterLabel: "Servicio|Servicios",
                    sections: [
                        {
                            title: "Uso de Cookies",
                            description:
                                "Utilizamos cookies para mejorar tu experiencia de navegación. Al continuar navegando en este sitio, aceptas el uso de cookies. Para más información, consulta nuestra <a href='/cookie-policy'>Política de Cookies</a>.",
                        },
                        {
                            title: 'Cookies Estrictamente Necesarias <span class="pm__badge">Siempre Habilitado</span>',
                            description:
                                "Las cookies estrictamente necesarias son esenciales para el funcionamiento básico del sitio web y no pueden ser desactivadas en nuestros sistemas. Estas cookies permiten funciones como acceso a áreas seguras del sitio web, como cuentas de usuario. Recordar configuraciones esenciales, como preferencias de privacidad o idioma y garantizar el funcionamiento seguro y correcto de la página.",
                            linkedCategory: "necessary",
                        },
                        {
                            title: "Más información",
                            description:
                                'Para cualquier consulta en relación con nuestra política sobre cookies y sus opciones, por favor, <a class="cc__link" href="mailto:urbantree@iesmonsia.org" target="_blank">póngase en contacto con nosotros</a>.',
                        },
                    ],
                },
            },
        },
    },
});
