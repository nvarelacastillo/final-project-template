console.log('calling homepage');

// JavaScript: Greeting based on the time of day
document.addEventListener('DOMContentLoaded', () => {
    var today = new Date();
    var hourNow = today.getHours();
    var greeting;

    // Time based response
    if (hourNow > 18) {
        greeting = 'Good evening, welcome to my online resume!';
    } else if (hourNow > 12) {
        greeting = 'Good afternoon, welcome to my online resume!';
    } else if (hourNow > 0) {
        greeting = 'Good morning, welcome to my online resume!';
    } else {
        greeting = 'Welcome!';
    }


    var greetingContainer = document.getElementById('greeting');
    greetingContainer.textContent = greeting;
    greetingContainer.style.fontSize = "33px";
    greetingContainer.style.fontWeight = "bold";
    greetingContainer.style.color = "#B3A098";
});
