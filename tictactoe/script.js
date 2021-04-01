const statusDisplay1 = document.querySelector('.game--status1');
const statusDisplay2 = document.querySelector('.game--status2');

let usernameA = "Chiva";
let usernameB = "João";

let usernameAscoreW = 0;
let usernameAscoreD = 0;
let usernameAscoreL = 0;

let usernameBscoreW = 0;
let usernameBscoreD = 0;
let usernameBscoreL = 0;

let gameActive = true;
let currentPlayer = "X";
let currentNameTurn = usernameA;
let gameState = ["", "", "", "", "", "", "", "", ""];

const winningMessage = () => `Player ${currentPlayer} has won!`;
const drawMessage = () => `Game ended in a draw!`;
const currentPlayerTurn = () => `It's ${currentNameTurn}'s turn.`;
const writescore = () => `W:${usernameAscoreW}/D:${usernameAscoreD}/L:${usernameAscoreL} - W:${usernameBscoreW}/D:${usernameBscoreD}/L:${usernameBscoreL}`;


statusDisplay1.innerHTML = currentPlayerTurn();
statusDisplay2.innerHTML = writescore();

const winningConditions = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6]
];

function handleCellPlayed(clickedCell, clickedCellIndex) {
    gameState[clickedCellIndex] = currentPlayer;
    clickedCell.innerHTML = currentPlayer;
}

function handlePlayerChange() {
    currentPlayer = currentPlayer === "X" ? "O" : "X";
    if(currentPlayer == "X"){
        currentNameTurn = usernameA;
    }
    else{
        currentNameTurn = usernameB;
    }
    statusDisplay1.innerHTML = currentPlayerTurn();
}

function handleResultValidation() {
    let roundWon = false;
    for (let i = 0; i <= 7; i++) {
        const winCondition = winningConditions[i];
        let a = gameState[winCondition[0]];
        let b = gameState[winCondition[1]];
        let c = gameState[winCondition[2]];
        if (a === '' || b === '' || c === '') {
            continue;
        }
        if (a === b && b === c) {
            roundWon = true;
            break
        }
    }

    if (roundWon) {
        statusDisplay1.innerHTML = winningMessage();
        if(currentPlayer == "X"){
            usernameAscoreW +=1;
            usernameBscoreL +=1;
        }
        else{
            usernameBscoreW +=1;
            usernameAscoreL +=1;
        }
        gameActive = false;
        return;
    }

    let roundDraw = !gameState.includes("");
    if (roundDraw) {
        statusDisplay1.innerHTML = drawMessage();
        usernameAscoreD += 1;
        usernameBscoreD += 1;
        gameActive = false;
        return;
    }

    handlePlayerChange();
}

function handleCellClick(clickedCellEvent) {
    const clickedCell = clickedCellEvent.target;
    const clickedCellIndex = parseInt(clickedCell.getAttribute('data-cell-index'));

    if (gameState[clickedCellIndex] !== "" || !gameActive) {
        return;
    }

    handleCellPlayed(clickedCell, clickedCellIndex);
    handleResultValidation();
}

function handleRestartGame() {
    gameActive = true;
    currentPlayer = "X";
    currentNameTurn = usernameA;
    statusDisplay2.innerHTML = writescore();
    gameState = ["", "", "", "", "", "", "", "", ""];
    statusDisplay1.innerHTML = currentPlayerTurn();
    document.querySelectorAll('.cell').forEach(cell => cell.innerHTML = "");
}

document.querySelectorAll('.cell').forEach(cell => cell.addEventListener('click', handleCellClick));
document.querySelector('.game--restart').addEventListener('click', handleRestartGame);