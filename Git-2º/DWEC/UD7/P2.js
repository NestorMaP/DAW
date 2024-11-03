Array.prototype.average = function() {
    let nItems = this.length;
    let sum = this.reduce((accumulator, currentValue) => accumulator + currentValue,0);
    
    let avg = sum/nItems;

    return avg;
}

const example = [4,8,15,16,23,42] // Avg = 108/6 = 18

console.log(`Array: ${example}`);
console.log('Avg = 108/6 = 18')
console.log(`Avg: ${example.average()}`);