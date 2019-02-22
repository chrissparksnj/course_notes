## Opening and closing files

`:w new-file.txt` - writes to new file

`:e new-file.txt` - switches vim buffer to edit *new-file.txt*

`control + g`     - brings up a hidden status line

## Navigation

`H,J,K,L`         -  h = left; j = down; k = up; l = right

`10 L`            - moves right 10 times

`w`               - moves to *beginning* of the next word

`e`               - moves to the *end* of the next line

`4 e`             - moves to end of word *4 times*

` ) `             - moves to the end of the next sentence marked by `.` or `!` or `?`

` {} `            - naviagates between paragraphs


## Regular Expressions

`/tra` 		  - searches for text containing 'tra'

## Screen Movement

`shift + g`      - moves to the end of file

`gg`		 - moves to the beginning of the file

`ctrl + f` 	 - move forward one full screen

`ctrl + b`	 - moves backward one page

`:8` 		 - jumps to line 8

`7 shift+g`	 - jumps to line 7

`$` 		 - moves to the end of line

`0`		 - moves to the beginning of the line

`vim test.txt +8` - opens file to line 8

`n | *`  	  - moves to next instance of word *under cursor*

`#` 		  - searches backwards for the previous instance *under cursor*

## Changing Text

`d`		 - deletes line. delete needs to know what to delete

`dw`		 - deletes the word

`u`		 - 'undo'

`d )`		 - deletes the current sentence

`d /regexpres`   - deletes everything that the regex matches

`dd`		 - deletes the current line

`y`		 - 'yank' or copy

`yw`		 - yanks word

`p`		 - paste yanked word. *p* pastes text right after where the cursor is

`shift + p ` 	 - pastes *before* the cursor

`yy`		 - copies a whole line

`x`		 - deletes character under the cursor

`c + w`		 - changes the word

`c /h`		 - change everything that you find with an 'h'

`shift + v`	 - enters visual mode 

`cntrl + v`	 - selects blocks

`"a yy` 	 - yanks to 'a' register

`"a p` 	 - pastes from 'a' register

`:s/you/they `  - replaces the first instance of 'you' with 'they'

`:s/you/they/g` - replaces *all* instances of 'you' with 'they'

`:s/you/they/gc` - replaces *all* instances, but confirms each instance



