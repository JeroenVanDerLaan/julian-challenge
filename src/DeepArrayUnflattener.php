<?php

namespace App;

/*
--------------------------- INTRO --------------------------- 
This programing challenge was built to learn something about references. 

First of all, let's start with your solution. You wrote O.O.P. code, and solves the problem! Good!
However, there are some things I want to discuss, please don't concider this an offense. 

You wrote that you give bonus points for not using references (&). 
I understand that, on the internet you can find many sources that consider references a bad practise. 
I concider those sources half-right. 
They are right because, references can cause bugs when they are used improperly. 
They are not right to say "never use references" or "references are a bad practise, so stop using them".
I'm saying use the best tool for a given task. 

--------------------------- The programming challenge ---------------------------
The programming challenge is about converting a flat array, to a deep array. 

The combination: IntegerParser, DeepArrayFactory, and DeepArrayMerger is very O.O.P.
For this challenge O.O.P. is not the best tool, read on for my reasoning. 


--------------------------- O.O.P. vs Using references ---------------------------

The O.O.P. approeach does something like this: 
The program starts with a forach(). Every iteration does this: 
IntegerParser converts keys like '10/9/8/7/6/5/' to an indeces array: ['10', '9', '8', '7', '6', '5']. 
DeepArrayFactory creates an deep array with one value by using recursive function calls.
DeepArrayMerger merges the deep array, with other deep array's by using recursive function calls. 

Again, your solution is working, thus not wrong. 

The references method:
The method: unflatten() starts with an empty deepArray. Then it starts traversing the raw Array. 
The first thing that happens in the iteration, is to set a pointer to the deepArray. 
Next, converting '10/9/8/7/6/5/' to an indeces array: ['10', '9', '8', '7', '6', '5'].
This indeces array will be traversed over. 
Each index will be set in the deep Array through the pointer (not through the deepArray itself), 
in case a of non existing index in the deep Array. 
The next step is very important! 
The pointer is moved from the deep array variable to the next level inside the deep array.
This goes on, until every index from the indeces array is traversed. 
Next, a value like "Harry" is assigned to the deepest level inside the deep Array. 
Merging is not necessary with this method.

The method: unflatten() produces the same output as: IntegerParser, DeepArrayFactory, and DeepArrayMerger,
but the unflatten method uses only 17 lines of code. 


--------------------------- Epilogue ---------------------------

I'm not trying to win an argument, win a race, be better, or to offend you. 
I'm about choosing the best tool for a specific situation. 

*/
class DeepArrayUnflattener {
	
	public function unflatten(array $array){
		
		$deepArr = [];
		
		foreach ($array as $csvIndexes => $v) {
			$pointer = &$deepArr; 
			
			$indices = explode('/', $csvIndexes);
			foreach($indices as $index) { 
				if(!array_key_exists($index, $pointer)) { 
					$pointer[$index] = [];
				}
				$pointer = &$pointer[$index];
			}
			$pointer = $v;
		}
		
		return $deepArr;
	}
	
}