import java.util.Arrays;
public class Intro {
   /** Takes an array of numbers.
     * Multiplies each number in the array by its position in the array, and returns the sum.
     */
   public static int crazy_sum( int[] numbers ) {
     int sum = 0; //initialize temporary return variable
     for (int i=0; i<numbers.length; i++) {
       sum = sum + (numbers[i]*i); // add the value multiplied by its index to the sum
     }
     return sum;
   }

   /** Takes a number max and returns the number of perfect squares less than max */
   public static int square_nums( int max) {
     int count=0; //initialize temporary return variable
     for (int i=1; i*i<max; i++) { //for every square less than the max
       count=count+1; //add one to the count
     }
     return count;
   }


   /** Takes a number, max, and returns an array of the integers that
     * ARE less than max
     * AND ARE divisible by either three or five
     * BUT ARE NOT divisible by _both_ three and five
     */
   public static int[] crazy_nums(int max){
     int[] array = new int[] { }; //initialize array
     for (int i=3; i<max; i++) {
       if(((i%3 == 0) ||(i%5 == 0)) && (i%15 != 0)) {
         array = Arrays.copyOf(array, array.length + 1); //create new array from old array and add one more slot
         array[array.length - 1] = i; //append new number that fits criteria
       }
     }
     return array;
   }
}