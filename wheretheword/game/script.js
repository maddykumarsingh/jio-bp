document.addEventListener('DOMContentLoaded', function () {
    const wordSearchContainer = document.getElementById('word-search-container');
    const predefinedWords = ['Accountability', 'Prioritize', 'Initiative', 'Communicate', 'Collaborate', 'Punctuality' , 'Procrastinate' , 'Resistance' , 'Blaming'];
    let grid = [];
    let selectedWord = [];
    const GRID_SIZE = 12;
    let timer;
    let seconds = 0;

    // Function to create the word search grid
    function createWordSearchGrid() {
        const gridSize = GRID_SIZE; // Adjust based on your grid size

        // Initialize the grid with random letters
        grid = Array.from({ length: gridSize }, () => Array.from({ length: gridSize }, () => getRandomLetter()));

        // Insert predefined words into the grid
        predefinedWords.forEach(word => {
            placeWordInGrid(word);
        });


        // Display the grid in the HTML
        grid.forEach((row, rowIndex) => {
            row.forEach((letter, colIndex) => {
                const cell = document.createElement('div');
                cell.classList.add('cell');
                cell.innerText = letter;
                cell.dataset.row = rowIndex;
                cell.dataset.col = colIndex;
                cell.addEventListener('mousedown', handleMouseDown);
                wordSearchContainer.appendChild(cell);
            });
        });

         // Start the timer
         startTimer();
    }


    // Function to start the timer
    function startTimer() {
        timer = setInterval(function () {
            seconds++;
            updateTimer();
        }, 1000);
    }

 // Function to update the timer display
 function updateTimer() {
    const timerDisplay = document.getElementById('timer');
    if (timerDisplay) {
        const minutes = Math.floor(seconds / 60);
        const remainingSeconds = seconds % 60;
        timerDisplay.innerText = `Time ${formatTime(minutes)}:${formatTime(remainingSeconds)}`;
    }
}

    // Function to format time with leading zeros
    function formatTime(time) {
        return time < 10 ? `0${time}` : time;
    }

        // Function to stop the timer
        function stopTimer() {
            clearInterval(timer);
        }

 // Function to place a word in the grid
function placeWordInGrid(word) {
    const gridSize = GRID_SIZE;
    const direction = Math.random() < 0.5 ? 'horizontal' : 'vertical';
    let row, col;

    if (direction === 'horizontal') {
        row = Math.floor(Math.random() * gridSize);
        col = Math.floor(Math.random() * (gridSize - word.length + 1));
    } else {
        row = Math.floor(Math.random() * (gridSize - word.length + 1));
        col = Math.floor(Math.random() * gridSize);
    }

    for (let i = 0; i < word.length; i++) {
        if (direction === 'horizontal') {
            if (!grid[row]) {
                grid[row] = [];
            }
            grid[row][col + i] = word[i].toUpperCase();
        } else {
            if (!grid[row + i]) {
                grid[row + i] = [];
            }
            grid[row + i][col] = word[i].toUpperCase();
        }
    }
}


    // Function to generate a random letter
    function getRandomLetter() {
        const alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return alphabet[Math.floor(Math.random() * alphabet.length)];
    }

    // Function to handle mouse down event
    function handleMouseDown(event) {
        const initialCell = event.target;
        selectedWord = [initialCell];
        initialCell.classList.add('selected');

        function handleMouseOver(event) {
            const currentCell = event.target;
            const currentRow = parseInt(currentCell.dataset.row);
            const currentCol = parseInt(currentCell.dataset.col);

            // Check if the current cell is adjacent to the last selected cell
            if (
                Math.abs(currentRow - parseInt(selectedWord[selectedWord.length - 1].dataset.row)) <= 1 &&
                Math.abs(currentCol - parseInt(selectedWord[selectedWord.length - 1].dataset.col)) <= 1 &&
                (currentRow !== parseInt(selectedWord[selectedWord.length - 1].dataset.row) ||
                    currentCol !== parseInt(selectedWord[selectedWord.length - 1].dataset.col))
            ) {
                selectedWord.push(currentCell);
                currentCell.classList.add('selected');

                // Draw a line between cells
                // drawLine(selectedWord);
            }
        }

        function handleMouseUp() {
            document.removeEventListener('mouseover', handleMouseOver);
            document.removeEventListener('mouseup', handleMouseUp);
        
            const word = selectedWord.map(cell => cell.innerText).join('');
            if (predefinedWords.includes(word.toLowerCase())) {
                console.log(`Found word: ${word}`);
                markWordAsFound(selectedWord);
                drawLine(selectedWord);
            } else {
                selectedWord.forEach(cell => {
                    cell.classList.remove('selected');
                    cell.removeEventListener('mousedown', handleMouseDown);
                });
                selectedWord = [];
                clearLine();
            }
        }
        

        document.addEventListener('mouseover', handleMouseOver);
        document.addEventListener('mouseup', handleMouseUp);
    }

    // Function to draw a line between selected cells
    function drawLine(selectedWord) {
        const line = document.createElement('div');
        line.classList.add('line');

        const firstCell = selectedWord[0];
        const lastCell = selectedWord[selectedWord.length - 1];

        const startX = firstCell.offsetLeft + firstCell.offsetWidth / 2;
        const startY = firstCell.offsetTop + firstCell.offsetHeight / 2;
        const endX = lastCell.offsetLeft + lastCell.offsetWidth / 2;
        const endY = lastCell.offsetTop + lastCell.offsetHeight / 2;

        const angle = Math.atan2(endY - startY, endX - startX) * (180 / Math.PI);
        const length = Math.sqrt(Math.pow(endX - startX, 2) + Math.pow(endY - startY, 2));

        line.style.width = `${length}px`;
        line.style.left = `${startX}px`;
        line.style.top = `${startY}px`;
        line.style.transform = `rotate(${angle}deg)`;

        wordSearchContainer.appendChild(line);
    }

        // Function to clear the drawn line
    function clearLine() {
        const existingLine = wordSearchContainer.querySelector('.line');
        if (existingLine) {
            existingLine.remove();
        }
    }


    // Function to mark the found word
    function markWordAsFound(selectedWord) {
        selectedWord.forEach(cell => {
            cell.classList.add('found');
        });
    }

    // Create the word search grid on page load
    createWordSearchGrid();
});
