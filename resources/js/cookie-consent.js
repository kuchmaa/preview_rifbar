document.addEventListener('DOMContentLoaded', function() {
    // Check if consent was already given
    if (!localStorage.getItem('cookieConsent')) {
        document.getElementById('cookie-consent-banner').classList.add('visible');
    }

    // Accept all cookies
    document.getElementById('accept-all-cookies').addEventListener('click', function() {
        setCookieConsent({
            analytical: true,
            functional: true
        });
    });

    // Accept only necessary cookies
    document.getElementById('accept-necessary-cookies').addEventListener('click', function() {
        setCookieConsent({
            analytical: false,
            functional: false
        });
    });

    // Custom settings button
    document.getElementById('customize-cookies').addEventListener('click', function() {
        document.getElementById('cookie-consent-banner').classList.remove('visible');
        document.getElementById('cookie-settings-modal').classList.add('visible');
    });

    // Save preferences from modal
    document.getElementById('save-preferences').addEventListener('click', function() {
        const analytical = document.getElementById('analytical-cookies').checked;
        const functional = document.getElementById('functional-cookies').checked;
        
        setCookieConsent({
            analytical: analytical,
            functional: functional
        });
        
        document.getElementById('cookie-settings-modal').classList.remove('visible');
    });

    // Close modal button
    document.getElementById('close-cookie-modal').addEventListener('click', function() {
        document.getElementById('cookie-settings-modal').classList.remove('visible');
    });

    // Function to set cookie consent
    function setCookieConsent(preferences) {
        localStorage.setItem('cookieConsent', JSON.stringify(preferences));
        document.getElementById('cookie-consent-banner').classList.remove('visible');
        
        // Here you would implement actual cookie setting/analytics initialization
        // based on user preferences
    }
}); 