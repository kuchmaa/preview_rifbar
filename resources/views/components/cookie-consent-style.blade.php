<style>
#cookie-consent-banner {
    position: fixed;
    bottom: -100%;
    left: 0;
    right: 0;
    background-color: white;
    box-shadow: 0 -5px 20px rgba(0, 0, 0, 0.1);
    z-index: 9999;
    padding: 20px;
    transition: bottom 0.5s ease;
    font-family: var(--main-font);
}

#cookie-consent-banner.visible {
    bottom: 0;
}

.cookie-consent-container {
    max-width: var(--max-width);
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.cookie-consent-content {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.cookie-consent-title {
    font-family: var(--franklin);
    font-size: 24px;
    line-height: 30px;
    text-transform: uppercase;
    color: var(--font-color);
    margin: 0;
}

.cookie-consent-text {
    font-size: 16px;
    line-height: 22px;
    color: var(--font-color);
    margin: 0;
}

.cookie-consent-buttons {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
}

.cookie-btn {
    padding: 12px 24px;
    border-radius: 0;
    font-family: var(--main-font);
    font-size: 16px;
    font-weight: 400;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
    text-transform: uppercase;
    border: 2px solid transparent;
}

.cookie-btn-primary {
    background-color: var(--blue);
    color: white;
    border-color: var(--blue);
}

.cookie-btn-primary:hover {
    background-color: white;
    color: var(--blue);
}

.cookie-btn-secondary {
    background-color: white;
    color: var(--font-color);
    border-color: var(--font-color);
}

.cookie-btn-secondary:hover {
    background-color: var(--font-color);
    color: white;
}

.cookie-btn-tertiary {
    background-color: transparent;
    color: var(--orange);
    text-decoration: underline;
    padding: 12px 0;
}

.cookie-btn-tertiary:hover {
    color: var(--blue);
}

/* Modal styling */
#cookie-settings-modal {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 10000;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s;
}

#cookie-settings-modal.visible {
    opacity: 1;
    visibility: visible;
}

.cookie-modal-content {
    background-color: white;
    padding: 30px;
    max-width: 600px;
    width: 90%;
    max-height: 90vh;
    overflow-y: auto;
    position: relative;
}

.cookie-modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.cookie-modal-title {
    font-family: var(--franklin);
    font-size: 24px;
    text-transform: uppercase;
    margin: 0;
}

.cookie-close-button {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 24px;
    color: var(--font-color);
}

.cookie-option {
    display: flex;
    align-items: start;
    gap: 15px;
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-bottom: 1px solid #e0e0e0;
}

.cookie-option:last-child {
    border-bottom: none;
}

.cookie-option-content {
    flex: 1;
}

.cookie-option-title {
    font-weight: bold;
    margin-bottom: 5px;
    font-size: 18px;
}

.cookie-option-description {
    font-size: 14px;
    color: #555;
}

.cookie-checkbox-container {
    display: flex;
    align-items: center;
}

.cookie-modal-footer {
    margin-top: 30px;
    display: flex;
    justify-content: flex-end;
}

/* Responsive styles */
@media (max-width: 768px) {
    .cookie-consent-buttons {
        flex-direction: column;
    }
    
    .cookie-btn {
        width: 100%;
        text-align: center;
    }
}

@media (max-width: 425px) {
    .cookie-consent-title {
        font-size: 20px;
    }
    
    .cookie-consent-text {
        font-size: 14px;
    }
    
    .cookie-btn {
        font-size: 14px;
    }
}
</style> 