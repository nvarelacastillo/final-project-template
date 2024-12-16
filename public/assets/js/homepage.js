console.log('calling homepage');

var today = new Date();
var hourNow = today.getHours();
var greeting;

if (hourNow > 18) {
    greeting = 'Good evening, welcome to my online resume!';
} else if (hourNow > 12) {
    greeting = 'Good afternoon, welcome to my online resume!';
} else if (hourNow > 0) {
    greeting = 'Good morning, welcome to my online resume!';
} else {
    greeting = 'Welcome!';
}

document.addEventListener('DOMContentLoaded', () => {
    var greetingContainer = document.getElementById('greeting');
    greetingContainer.textContent = greeting;

    greetingContainer.style.fontSize = "30";
    greetingContainer.style.fontWeight = "bold";
});
