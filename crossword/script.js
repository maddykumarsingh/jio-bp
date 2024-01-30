document.addEventListener('DOMContentLoaded', function () {
    const crosswordContainer = document.getElementById('crossword-container');

    // Retrieve words from PHP or hardcoded array
    const words = [
        { word: 'apple', row: 1, col: 1, direction: 'across' },
        { word: 'banana', row: 2, col: 1, direction: 'down' }
        // Add more words as needed
    ];

    // Create the crossword grid
    for (let row = 1; row <= 5; row++) {
        for (let col = 1; col <= 5; col++) {
            const cell = document.createElement('div');
            cell.classList.add('cell');
            cell.dataset.row = row;
            cell.dataset.col = col;

            const word = words.find(w => w.row === row && w.col === col);
            if (word) {
                const input = document.createElement('input');
                input.maxLength = 1;
                input.dataset.word = word.word;
                input.dataset.direction = word.direction;
                cell.appendChild(input);
            }

            crosswordContainer.appendChild(cell);
        }
    }

    // Add event listener for input changes
    crosswordContainer.addEventListener('input', function (event) {
        const input = event.target;
        const inputValue = input.value.toUpperCase();
        const correctValue = input.dataset.word.toUpperCase();

        if (inputValue === correctValue) {
            input.classList.add('correct');
        } else {
            input.classList.remove('correct');
        }
    });
});
