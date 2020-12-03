let number,
    error = ''

do {
    number = prompt(error + 'Введите положительное число!')
    error = 'Вы ввели неверное значение. '
} while (!(number % 1 == 0 && number > 9 && number < 100))