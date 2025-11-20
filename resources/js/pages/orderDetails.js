import { getElemById } from '../utils/DOM.js';
import {
    ratingEvent,
    resizeTextArea,
} from '../utils/event.js';

(() => {
    // Initialize rating functionality
    var ratings = document.getElementsByClassName('rating');
    if (ratings.length > 0) {
        ratingEvent(ratings);
    }
    
    // Initialize feedback form textarea
    var feedbackForm = document.getElementsByClassName('feedbackRatingForm')[0];
    if (feedbackForm) {
        var textArea = resizeTextArea(feedbackForm.querySelector('textarea'));
    }

    // Initialize map-related functionality
    initializeMapFeatures();
    
    // Initialize real-time updates
    initializeRealTimeUpdates();
})();

function initializeMapFeatures() {
    // Add map interaction features
    const mapContainer = document.getElementById('order-map-container');
    if (mapContainer) {
        // Add refresh button for map
        addMapRefreshButton();
        
        // Add fullscreen toggle
        addFullscreenToggle();
    }
}

function addMapRefreshButton() {
    const mapContainer = document.getElementById('order-map-container');
    if (!mapContainer) return;

    const refreshButton = document.createElement('button');
    refreshButton.innerHTML = `
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.65 6.35C16.2 4.9 14.21 4 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z" fill="currentColor"/>
        </svg>
        Refresh Map
    `;
    refreshButton.className = 'map-refresh-btn';
    refreshButton.style.cssText = `
        position: absolute;
        top: 10px;
        left: 10px;
        z-index: 10;
        background: white;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 8px 12px;
        font-size: 12px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 6px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    `;
    
    refreshButton.addEventListener('click', () => {
        // Trigger map refresh by dispatching a custom event
        const refreshEvent = new CustomEvent('refreshMap');
        document.getElementById('order-map').dispatchEvent(refreshEvent);
        
        // Add loading state
        refreshButton.innerHTML = `
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="animation: spin 1s linear infinite;">
                <path d="M17.65 6.35C16.2 4.9 14.21 4 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z" fill="currentColor"/>
            </svg>
            Refreshing...
        `;
        refreshButton.disabled = true;
        
        setTimeout(() => {
            refreshButton.innerHTML = `
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.65 6.35C16.2 4.9 14.21 4 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z" fill="currentColor"/>
                </svg>
                Refresh Map
            `;
            refreshButton.disabled = false;
        }, 2000);
    });
    
    mapContainer.appendChild(refreshButton);
}

function addFullscreenToggle() {
    const mapContainer = document.getElementById('order-map-container');
    if (!mapContainer) return;

    const fullscreenButton = document.createElement('button');
    fullscreenButton.innerHTML = `
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7 14H5v5h5v-2H7v-3zm-2-4h2V7h3V5H5v5zm12 7h-3v2h5v-5h-2v3zM14 5v2h3v3h2V5h-5z" fill="currentColor"/>
        </svg>
        Fullscreen
    `;
    fullscreenButton.className = 'map-fullscreen-btn';
    fullscreenButton.style.cssText = `
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 10;
        background: white;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 8px 12px;
        font-size: 12px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 6px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    `;
    
    fullscreenButton.addEventListener('click', () => {
        if (!document.fullscreenElement) {
            mapContainer.requestFullscreen().catch(err => {
                console.log('Error attempting to enable fullscreen:', err);
            });
        } else {
            document.exitFullscreen();
        }
    });
    
    mapContainer.appendChild(fullscreenButton);
}

function initializeRealTimeUpdates() {
    // Listen for driver location updates
    document.addEventListener('driverLocationUpdated', (event) => {
        console.log('Driver location updated:', event.detail);
        updateDriverStatus(event.detail);
    });
    
    // Listen for map refresh events
    document.addEventListener('refreshMap', () => {
        console.log('Map refresh requested');
        // The map component will handle the actual refresh
    });
}

function updateDriverStatus(locationData) {
    const lastUpdateElement = document.getElementById('last-update-time');
    if (lastUpdateElement) {
        lastUpdateElement.textContent = new Date(locationData.timestamp).toLocaleTimeString();
        lastUpdateElement.style.color = '#28a745';
        
        // Reset color after 5 seconds
        setTimeout(() => {
            lastUpdateElement.style.color = '#333';
        }, 5000);
    }
}

// Add CSS for animations
const style = document.createElement('style');
style.textContent = `
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    .map-refresh-btn:hover,
    .map-fullscreen-btn:hover {
        background: #f8f9fa !important;
        border-color: #304FFF !important;
    }
    
    .map-refresh-btn:disabled,
    .map-fullscreen-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }
`;
document.head.appendChild(style);
