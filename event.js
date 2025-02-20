document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.register-event').forEach(function(button) {
        button.addEventListener('click', function() {
            const eventId = this.dataset.eventId;
            fetch('user/register_event.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ event_id: eventId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Successfully registered for the event.');
                    // Update the UI accordingly
                } else {
                    alert('Failed to register for the event.');
                }
            });
        });
    });
});