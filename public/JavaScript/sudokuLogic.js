var numSelected = null;
var tileSelected = null;
var buttonSelected = null;
var startIsCurrent = false;
var difButton = null;
var numcorrect = 0;

//for notes
var notesEnabled = false;
var notesButton = null;

//for difficulties
var easy = false;
var med = false;
var hard = false;
var expert = false;

var errors = 0;

var board = [...Array(9)].map(e => Array(9));

var solution = [...Array(9)].map(e => Array(9));

// JS program to implement the approach
class Sudoku {
 
    // Constructor
    constructor(N, K) {
        this.N = N;
        this.K = K;
 
        // Compute square root of N
        const SRNd = Math.sqrt(N);
        this.SRN = Math.floor(SRNd);
 
        // Initialize all entries as false to indicate
        // that there are no edges initially
        this.mat = Array.from({
            length: N
        }, () => Array.from({
            length: N
        }, () => 0));
    }
 
    // Sudoku Generator
    fillValues() {
        // Fill the diagonal of SRN x SRN matrices
        this.fillDiagonal();
 
        // Fill remaining blocks
        this.fillRemaining(0, this.SRN);
        
        //populate solution
        for (let i = 0; i < this.N; i++){
            for(let j = 0; j < this.N; j++){
                solution[i][j] = this.mat[i][j];
            }
        }

        // Remove Randomly K digits to make game
        this.removeKDigits();

        //this is the playable board
        for (let i = 0; i < this.N; i++){
            for(let j = 0; j < this.N; j++){
                board[i][j] = this.mat[i][j];
            }
        }
    }
 
    // Fill the diagonal SRN number of SRN x SRN matrices
    fillDiagonal() {
        for (let i = 0; i < this.N; i += this.SRN) {
            // for diagonal box, start coordinates->i==j
            this.fillBox(i, i);
        }
    }
 
    // Returns false if given 3 x 3 block contains num.
    unUsedInBox(rowStart, colStart, num) {
        for (let i = 0; i < this.SRN; i++) {
            for (let j = 0; j < this.SRN; j++) {
                if (this.mat[rowStart + i][colStart + j] === num) {
                    return false;
                }
            }
        }
        return true;
    }
 
    // Fill a 3 x 3 matrix.
    fillBox(row, col) {
        let num = 0;
        for (let i = 0; i < this.SRN; i++) {
            for (let j = 0; j < this.SRN; j++) {
                while (true) {
                    num = this.randomGenerator(this.N);
                    if (this.unUsedInBox(row, col, num)) {
                        break;
                    }
                }
                this.mat[row + i][col + j] = num;
            }
        }
    }
 
    // Random generator
    randomGenerator(num) {
        return Math.floor(Math.random() * num + 1);
    }
 
    // Check if safe to put in cell
    checkIfSafe(i, j, num) {
        return (
            this.unUsedInRow(i, num) &&
            this.unUsedInCol(j, num) &&
            this.unUsedInBox(i - (i % this.SRN), j - (j % this.SRN), num)
        );
    }
 
    // check in the row for existence
    unUsedInRow(i, num) {
        for (let j = 0; j < this.N; j++) {
            if (this.mat[i][j] === num) {
                return false;
            }
        }
        return true;
    }
 
    // check in the row for existence
    unUsedInCol(j, num) {
        for (let i = 0; i < this.N; i++) {
            if (this.mat[i][j] === num) {
                return false;
            }
        }
        return true;
    }
 
    // A recursive function to fill remaining
    // matrix
    fillRemaining(i, j) {
        // Check if we have reached the end of the matrix
        if (i === this.N - 1 && j === this.N) {
            return true;
        }
 
        // Move to the next row if we have reached the end of the current row
        if (j === this.N) {
            i += 1;
            j = 0;
        }
 
 
        // Skip cells that are already filled
        if (this.mat[i][j] !== 0) {
            return this.fillRemaining(i, j + 1);
        }
 
        // Try filling the current cell with a valid value
        for (let num = 1; num <= this.N; num++) {
            if (this.checkIfSafe(i, j, num)) {
                this.mat[i][j] = num;
                if (this.fillRemaining(i, j + 1)) {
                    return true;
                }
                this.mat[i][j] = 0;
            }
        }
 
        // No valid value was found, so backtrack
        return false;
    }
 
    // Print sudoku
    printSudoku() {
        for (let i = 0; i < this.N; i++) {
            //solution.appendChild(this.mat[i].join(" "));
            window.alert(this.mat[i].join(" "))
        }
        window.alert(solution);
        //window.alert(count);
    }
 
    // Remove the K no. of digits to
    // complete game
    removeKDigits() {
        let count = this.K;
 
        while (count !== 0) {
            // extract coordinates i and j
            let i = Math.floor(Math.random() * this.N);
            let j = Math.floor(Math.random() * this.N);
            if (this.mat[i][j] !== 0) {
                count--;
                this.mat[i][j] = 0;
            }
        }
 
        return;
    }
}

window.onload = function() {
    startingPageSetup();
    //generatePageForPlay();
}

var startButton = null;
var easyButton = null;
var mediumButton = null;
var hardButton = null;
var expertButton = null;

function startingPageSetup() {
    //start button
    let startButton = document.createElement("div");
    startButton.innerText = "Start";
    startButton.addEventListener("click", selectButton);
    startButton.classList.add("startLooks");
    document.getElementById("startButton").appendChild(startButton);

    //difficulty buttons
    //easy button
    easyButton = document.createElement("div");
    easyButton.innerText = "Easy";
    easyButton.addEventListener("click", selectEasy);
    easyButton.classList.add("startLooks");
    document.getElementById("easyButton").appendChild(easyButton);

    //medium button
    mediumButton = document.createElement("div");
    mediumButton.innerText = "Medium";
    mediumButton.addEventListener("click", selectMedium);
    mediumButton.classList.add("startLooks");
    document.getElementById("mediumButton").appendChild(mediumButton);

    //hard button
    hardButton = document.createElement("div");
    hardButton.innerText = "Hard";
    hardButton.addEventListener("click", selectHard);
    hardButton.classList.add("startLooks");
    document.getElementById("hardButton").appendChild(hardButton);

    //expert button
    expertButton = document.createElement("div");
    expertButton.innerText = "Expert";
    expertButton.addEventListener("click", selectExpert);
    expertButton.classList.add("startLooks");
    document.getElementById("expertButton").appendChild(expertButton);

    //restart button
    restartButton();
}

//for easy select
function selectEasy(){
    if(easy){
        difButton.classList.remove("button-selected");
        difButton.classList.add("button-deselected");
        easy = false;
        difButton = null;
    }else{
        difButton = this;
        difButton.classList.remove("button-deselected");
        difButton.classList.add("button-selected");
        easy = true;
        expert = false;
        hard = false;
        med = false;
        mediumButton.classList.remove("button-selected");
        hardButton.classList.remove("button-selected");
        expertButton.classList.remove("button-selected");
    }
}

//for med select
function selectMedium(){
    if(med){
        difButton.classList.remove("button-selected");
        difButton.classList.add("button-deselected");
        med = false;
        difButton = null;
    }else{
        difButton = this;
        difButton.classList.remove("button-deselected");
        difButton.classList.add("button-selected");
        med = true;
        expert = false;
        hard = false;
        easy = false;
        easyButton.classList.remove("button-selected");
        hardButton.classList.remove("button-selected");
        expertButton.classList.remove("button-selected");
    }
}

//for hard select
function selectHard(){
    if(hard){
        difButton.classList.remove("button-selected");
        difButton.classList.add("button-deselected");
        hard = false;
        difButton = null;
    }else{
        difButton = this;
        difButton.classList.remove("button-deselected");
        difButton.classList.add("button-selected");
        hard = true;
        expert = false;
        med = false;
        easy = false;
        easyButton.classList.remove("button-selected");
        mediumButton.classList.remove("button-selected");
        expertButton.classList.remove("button-selected");
    }
}

//for expert select
function selectExpert(){
    if(expert){
        difButton.classList.remove("button-selected");
        difButton.classList.add("button-deselected");
        expert = false;
        difButton = null;
    }else{
        difButton = this;
        difButton.classList.remove("button-deselected");
        difButton.classList.add("button-selected");
        expert = true;
        hard = false;
        med = false;
        easy = false;
        easyButton.classList.remove("button-selected");
        mediumButton.classList.remove("button-selected");
        hardButton.classList.remove("button-selected");
    }
}

function restartButton() {
    let hr = document.createElement("hr");
    let restartButton = document.createElement("div");
    restartButton.innerText = "Restart";
    restartButton.addEventListener("click", selectRestartButton);
    restartButton.classList.add("startLooks");
    document.getElementById("restartButton").appendChild(restartButton);

}

function generatePageForPlay() {
    //setGame();
    let N = 9;
    let K = 0;
    if(easy){
        K = 40;
        numcorrect = K;
    }else if(med){
        K = 49;
        numcorrect = K;
    }else if(hard){
        K = 58;
        numcorrect = K;
    }else if(expert){
        K = 61;
        numcorrect = K;
    }else{
        window.alert("You have to choose a gamemode first before you play");
        location.reload();
    }
    let sudoku = new Sudoku(N, K)
    sudoku.fillValues()
    //sudoku.printSudoku()
    setGame();
}

function setGame() {
    // Digits 1-9
    for (let i = 1; i <= 9; i++) {
        //<div id="1" class="number">1</div>
        let number = document.createElement("div");
        number.id = i;
        number.innerText = i;
        number.addEventListener("click", selectNumber);
        number.classList.add("number");
        document.getElementById("digits").appendChild(number);
    }

    //add in the notes button
    let note = document.createElement("div");
    note.innerText = "Notes";
    note.addEventListener("click", noteButtonClicked);
    note.classList.add("notesLooks");
    document.getElementById("notes").appendChild(note);

    // Board 9x9
    for (let r = 0; r < 9; r++) {
        for (let c = 0; c < 9; c++) {
            let tile = document.createElement("div");
            tile.id = r.toString() + "-" + c.toString();
            if (board[r][c] != "0") {
                tile.innerText = board[r][c];
                tile.classList.add("tile-start");
            }
            if (r == 2 || r == 5) {
                tile.classList.add("horizontal-line");
            }
            if (c == 2 || c == 5) {
                tile.classList.add("vertical-line");
            }

            tile.addEventListener("click", selectTile);
            tile.classList.add("tile");
            document.getElementById("board").append(tile);
        }
    }
}

function selectNumber(){
    if (numSelected != null) {
        numSelected.classList.remove("number-selected");
    }
    numSelected = this;
    numSelected.classList.add("number-selected");
}

function noteButtonClicked(){
    if(notesEnabled){
        notesButton.classList.remove("button-selected");
        notesButton.classList.add("button-deselected");
        notesEnabled = false;
        notesButton = null;
    }else{
        notesButton = this;
        notesButton.classList.remove("button-deselected");
        notesButton.classList.add("button-selected");
        notesEnabled = true;
    }

}

function selectButton(){
    if (buttonSelected != null) {
        buttonSelected.classList.remove("button-selected");
    }
    if(!startIsCurrent){
        buttonSelected = this;
        buttonSelected.classList.add("button-selected");
        generatePageForPlay();
        startTimer();
        buttonSelected = null;
        startIsCurrent = true;
    }
}

function selectRestartButton() {
    if (buttonSelected != null) {
        buttonSelected.classList.remove("button-selected");
    }

    if(startIsCurrent){
        buttonSelected = this;
        buttonSelected.classList.add("button-selected");
        location.reload();
        buttonSelected = null;
    }else{
        buttonSelected = this;
        window.alert("You cannot restart the game until you have started the game...");
    }
}

function selectTile() {
    if (numSelected) {
        // "0-0" "0-1" .. "3-1"
        let coords = this.id.split("-"); //["0", "0"]
        let r = parseInt(coords[0]);
        let c = parseInt(coords[1]);
        if(!notesEnabled){
            highlightSelection(coords, this);
            if (solution[r][c] == numSelected.id && solution[r][c] !== board[r][c]) {
                //add back the correct text
                this.innerText = numSelected.id;
                numcorrect--;
                console.log(numcorrect);
                //remove all the possible classes
                this.classList.remove("noteTile");

                //add back the base tile class
                this.classList.add("tile");

                if(numcorrect === 0){
                    stopTimer();
                    window.alert("You have won! You had a total of " + errors + " errors, and a time of " + currentTimeMin + ":" + (currentTimeSec - 1) + "!");
                }
            }
            else if(solution[r][c] !== board[r][c]){
                errors += 1;
                document.getElementById("errors").innerText = errors;
            }
        }else{
            //window.alert(numSelected.id);
            var hold1 = this.innerText;
            var hold = null;
            if(this.innerText == solution[r][c]){
                highlightSelection(coords, this);
            }else{
                highlightSelection(coords, this);
                //window.alert(hold);
                switch(numSelected.id){
                    case '1':
                        this.classList.add("noteTile");
                        hold = checkIfInNotes(hold1, numSelected.id);
                        this.innerText = hold;
                        break;
                    case '2':
                        this.classList.add("noteTile");
                        hold = checkIfInNotes(hold1, numSelected.id);
                        this.innerText = hold;
                        break;
                    case '3':
                        this.classList.add("noteTile");
                        hold = checkIfInNotes(hold1, numSelected.id);
                        this.innerText = hold;
                        break;
                    case '4':
                        this.classList.add("noteTile");
                        hold = checkIfInNotes(hold1, numSelected.id);
                        this.innerText = hold;
                        break;
                    case '5':
                        this.classList.add("noteTile");
                        hold = checkIfInNotes(hold1, numSelected.id);
                        this.innerText = hold;
                        break;
                    case '6':
                        this.classList.add("noteTile");
                        hold = checkIfInNotes(hold1, numSelected.id);
                        this.innerText = hold;
                        break;
                    case '7':
                        this.classList.add("noteTile");
                        hold = checkIfInNotes(hold1, numSelected.id);
                        this.innerText = hold;
                        break;
                    case '8':
                        this.classList.add("noteTile");
                        hold = checkIfInNotes(hold1, numSelected.id);
                        this.innerText = hold;
                        break;
                    case '9':
                        this.classList.add("noteTile");
                        hold = checkIfInNotes(hold1, numSelected.id);
                        this.innerText = hold;
                        break;
                }
            }
        }
    }else{
        let coords = this.id.split("-"); //["0", "0"]
        //console.log(coords);
        highlightSelection(coords, this);
    }
}

function checkIfInNotes(hold, currentNum) {
    var checkIfCurrentlyIn = false;
    var newString = null;

    for(let i = 0; i < hold.length; i++){
        if(hold[i] === currentNum){
            checkIfCurrentlyIn = true;
        }
    }
    //window.alert(typeof hold);
    if(!checkIfCurrentlyIn){
        //this.innerText = hold + ' ' + numSelected.id;
        hold += currentNum;
        newString = QuickSort(hold);
        return newString;
    }else{
        newString = hold.replace(currentNum, "");  
        newString = QuickSort(newString);
        //this.innerText = hold;
        return newString;
    }
}

function QuickSort(arr) {
    const str = arr;
    const strCopy = str.slice(); //compy the string
    const sortedStr = strCopy.split("").sort().join("");
    return sortedStr;
}

var lastHighlightCoord = null;

function highlightSelection(coord){
    //coord comes in [0, 0]

    let currentTile = document.getElementById(`${coord[0]}-${coord[1]}`);

    if (lastHighlightCoord !== null) {
        //lastHighlightTile.classList.remove('highlightSquare');
        unHighlightX(lastHighlightCoord);
        unHighlightY(lastHighlightCoord);
        unhighlightBox(lastHighlightCoord);
    }

    //currentTile.classList.add('highlightSquare');
    highlightX(coord);
    highlightY(coord);
    highlightBox(coord);

    lastHighlightCoord = coord;
}

function highlightX(coord){
    for( let i = 0; i < 9; i++) {
        let alterTile = document.getElementById(`${coord[0]}-${i}`);
        alterTile.classList.add('highlightSquare');
    }
}

function unHighlightX(coord){
    for( let i = 0; i < 9; i++){
        let alterTile = document.getElementById(`${coord[0]}-${i}`);
        alterTile.classList.remove('highlightSquare');
    }
}

function highlightY(coord){
    for( let i = 0; i < 9; i++){
        let alterTile = document.getElementById(`${i}-${coord[1]}`);
        alterTile.classList.add('highlightSquare');
    }
}

function unHighlightY(coord){
    for( let i = 0; i < 9; i++){
        let alterTile = document.getElementById(`${i}-${coord[1]}`);
        alterTile.classList.remove('highlightSquare');
    }
}

function highlightBox(coord){
    let x = coord[0];
    let y = coord[1];
    //console.log(y);
    if(y < 3){
        //this is for the first three x coords
        //console.log(x);
        checkForYBox(0, 1, 2, coord);
    }else if(y < 6){
        //this is for middle three x coords
        //console.log('here2');
        checkForYBox(3, 4, 5, x);
    }else{
        //this is for the remaining x coords
        //console.log('here3');
        checkForYBox(6, 7, 8, x);
    }
}

function checkForYBox(x1, x2, x3, coord){
    let y = coord[0];
    //console.log('in the function');
    if(y < 3){
        //console.log('here');
        highlightBoxLogic(0, x1, x2, x3);
        highlightBoxLogic(1, x1, x2, x3);
        highlightBoxLogic(2, x1, x2, x3);
    }else if(y < 6){
        highlightBoxLogic(3, x1, x2, x3);
        highlightBoxLogic(4, x1, x2, x3);
        highlightBoxLogic(5, x1, x2, x3);
    }else{
        highlightBoxLogic(6, x1, x2, x3);
        highlightBoxLogic(7, x1, x2, x3);
        highlightBoxLogic(8, x1, x2, x3);
    }
}

function highlightBoxLogic(x, y1, y2, y3){
    //console.log(x, y1, y2, y3);
    let alterTile = document.getElementById(`${x}-${y1}`);
    alterTile.classList.add('highlightSquare');

    alterTile = document.getElementById(`${x}-${y2}`);
    alterTile.classList.add('highlightSquare');

    alterTile = document.getElementById(`${x}-${y3}`);
    alterTile.classList.add('highlightSquare');
}

function unhighlightBox(coord){
    let x = coord[0];
    let y = coord[1];
    //console.log(y);
    if(y < 3){
        //this is for the first three x coords
        //console.log(x);
        UncheckForYBox(0, 1, 2, coord);
    }else if(y < 6){
        //this is for middle three x coords
        //console.log('here2');
        UncheckForYBox(3, 4, 5, x);
    }else{
        //this is for the remaining x coords
        //console.log('here3');
        UncheckForYBox(6, 7, 8, x);
    }
}

function UncheckForYBox(x1, x2, x3, coord){
    let y = coord[0];
    //console.log('in the function');
    if(y < 3){
        //console.log('here');
        unhighlightBoxLogic(0, x1, x2, x3);
        unhighlightBoxLogic(1, x1, x2, x3);
        unhighlightBoxLogic(2, x1, x2, x3);
    }else if(y < 6){
        unhighlightBoxLogic(3, x1, x2, x3);
        unhighlightBoxLogic(4, x1, x2, x3);
        unhighlightBoxLogic(5, x1, x2, x3);
    }else{
        unhighlightBoxLogic(6, x1, x2, x3);
        unhighlightBoxLogic(7, x1, x2, x3);
        unhighlightBoxLogic(8, x1, x2, x3);
    }
        
}

function unhighlightBoxLogic(x, y1, y2, y3){
    //console.log(x, y1, y2, y3);
    let alterTile = document.getElementById(`${x}-${y1}`);
    alterTile.classList.remove('highlightSquare');

    alterTile = document.getElementById(`${x}-${y2}`);
    alterTile.classList.remove('highlightSquare');

    alterTile = document.getElementById(`${x}-${y3}`);
    alterTile.classList.remove('highlightSquare');
}