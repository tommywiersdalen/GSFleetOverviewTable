export const sumOfArray = (array) => {
    let sum = 0;
    array.forEach(number => {
        sum += number
    });
    return sum
}

export const averageOfArray = (array) => {
    return array.reduce((a, b) => a + b) / array.length
}