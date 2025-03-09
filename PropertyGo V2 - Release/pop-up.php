<?php
/**
 * Material Design Popup Notification System
 * This file can be included in any PHP script to display a styled popup notification.
 */

function showPopup($message = "Notification", $title = "Information", $icon = "fas fa-info-circle", $duration = 5000)
{
    // Generate a unique ID
    $popupId = 'popup_' . uniqid();
    
    // Output the HTML structure for the notification
    echo <<<HTML
    <div id="notificationContainer" class="notification-container"></div>
    <template id="materialTemplate">
        <div class="notification material-notification slide-in-right">
            <div class="icon">
                <i class="$icon"></i>
            </div>
            <div class="content">
                <div class="title">$title</div>
                <div class="message">$message</div>
            </div>
            <button class="close">&times;</button>
            <div class="progress-bar-container">
                <div class="progress-bar"></div>
            </div>
        </div>
    </template>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('notificationContainer');
            const template = document.getElementById('materialTemplate');
            
            function showNotification(delay = $duration) {
                const notificationElement = template.content.cloneNode(true).children[0];
                container.appendChild(notificationElement);
                
                const progressBar = notificationElement.querySelector('.progress-bar');
                if (progressBar) {
                    progressBar.style.width = '100%';
                    progressBar.style.transition = `width {delay}ms linear`;

                    setTimeout(() => { progressBar.style.width = '0'; }, 50);
                }
                
                setTimeout(() => { notificationElement.classList.add('show'); }, 10);
                
                setTimeout(() => {
                    notificationElement.classList.remove('show');
                    setTimeout(() => { notificationElement.remove(); }, 500);
                }, delay);
                
                const closeButton = notificationElement.querySelector('.close');
                closeButton.addEventListener('click', () => {
                    notificationElement.classList.remove('show');
                    setTimeout(() => { notificationElement.remove(); }, 500);
                });
            }
            
            showNotification();
        });
    </script>
    HTML;
}
