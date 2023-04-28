**Task**: Implement a program in PHP that sorts an array of integers using different sorting algorithms. The program should use a function to generate a random array of integers and display the unsorted and sorted arrays. It should also use callables to switch between different sorting algorithms.

_Here are the requirements for the program_:

The program should prompt the user for the number of elements to generate in the array.
Use a function to generate an array of random integers based on the user's input.
Display the unsorted array to the user.
Prompt the user to select a sorting algorithm. The available options are [Bubble Sort](https://en.wikipedia.org/wiki/Bubble_sort), [Insertion Sort](https://en.wikipedia.org/wiki/Insertion_sort), and [Quick Sort](https://en.wikipedia.org/wiki/Quicksort).
Use a callable to switch between the different sorting algorithms based on the user's selection.
Display the sorted array to the user.

Here's an example of the expected output:

    Enter the number of elements to generate: 10
    
    Unsorted Array:
    [72, 15, 69, 1, 62, 95, 8, 51, 55, 39]
    
    Select a sorting algorithm:
    1. Bubble Sort
    2. Insertion Sort
    3. Quick Sort
    Enter the number of your choice: 2
    
    Sorted Array:
    [1, 8, 15, 39, 51, 55, 62, 69, 72, 95]

_Note_: You have to implement the sorting algorithms using your own logic. DO NOT use PHP built-in functions.
