export function createArray() {
  let words = [];

  function promptWord() {
    let currentWord = prompt('Insertar palabra o dejar vacío para finalizar.');
    if (currentWord !== '' && currentWord !== null) {
      words.push(currentWord);
      promptWord();
    }
  }
  promptWord();
  return words;
}
