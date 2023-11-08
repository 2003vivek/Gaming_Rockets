let currentAmount = 100;
let rocketLaunched = false;
let earnedAmount = 0;

const decreaseButton = document.getElementById("decrease-amount");
const increaseButton = document.getElementById("increase-amount");
const currentAmountDisplay = document.getElementById("current-amount");
const startButton = document.getElementById("start-button");
const rocket = document.getElementById("rocket");
const earnedAmountDisplay = document.getElementById("earned-amount");

decreaseButton.addEventListener("click", () => {
  if (currentAmount >= 50) {
    currentAmount -= 50;
    updateAmountDisplay();
  }
});

increaseButton.addEventListener("click", () => {
  if (currentAmount < 10000) {
    currentAmount += 50;
    updateAmountDisplay();
  }
});

startButton.addEventListener("click", () => {
  let am = 10;
  if (!rocketLaunched) {

    setInterval(() => {
      am += 10;
      startRocketMove(am);
    }, 100)

    rocketLaunched = true;
    increaseAmountContinuously();
  }
});

function updateAmountDisplay() {
  startRocketMove(currentAmount);
  currentAmountDisplay.innerText = currentAmount;
}

function startRocketMove(amount) {
  rocket.style.left = "0";
  rocket.style.bottom = "0";
  rocket.style.display = "display"
  rocket.style.transition = "transform 1s cubic-bezier(0.17, 0.67, 0.83, 0.67)";
  rocket.style.transform = `translateX(${(amount % 1000) + 100}%)
  translateY(-${(amount % 1000) - 20}%) rotate(5deg)`;

  setTimeout(() => {
    rocket.style.display = "none";
    rocketLaunched = false;
    displayRandomBlast();
  }, 6000);
}

function increaseAmountContinuously() {
  const interval = 1000;
  const increaseRate = 0.5;
  const maxAmount = 10000;

  const intervalId = setInterval(() => {
    if (rocketLaunched) {
      earnedAmount += increaseRate;
      if (earnedAmount >= maxAmount) {
        earnedAmount = maxAmount;
        updateAmountDisplay();
        stopRocketMove(intervalId);
      }

      earnedAmountDisplay.innerText = earnedAmount;
    }
  }, interval);
}

function stopRocketMove(intervalId) {
  clearInterval(intervalId);
}

function displayRandomBlast() {
  // Implement the rocket blast logic, choose a random position
  // and add the earned amount to the player's total amount.
}
