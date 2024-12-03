import './bootstrap';
import Echo from "laravel-echo";
import Pusher from "pusher-js";

// Configure Pusher with the same credentials as in .env
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: "pusher",
    key: process.env.MIX_PUSHER_APP_KEY, // Key from .env file
    cluster: process.env.MIX_PUSHER_APP_CLUSTER, // Cluster from .env file
    forceTLS: true,
});

// Subscribe to the `talk-proposals` channel
window.Echo.channel("talk-proposals")
    .listen("TalkProposalSubmitted", (event) => {
        console.log("New Talk Proposal Submitted:", event.talkProposal);

        // Display notification in the UI
        const notificationContainer = document.getElementById("notifications");
        if (notificationContainer) {
            const notification = document.createElement("div");
            notification.innerText = `New Proposal Submitted: ${event.talkProposal.title}`;
            notification.className = "notification";
            notificationContainer.appendChild(notification);

            // Remove the notification after 5 seconds
            setTimeout(() => {
                notificationContainer.removeChild(notification);
            }, 5000);
        }
    });
