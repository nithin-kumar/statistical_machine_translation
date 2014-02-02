Phrase based Statistical Machine Translation System for English to Malayalam and Malayalam to English
-----------------------------------------------------------------------------------------------------
Directory contains files
1)execute_e_m.sh --to run English to Malayalam translation
2)execute_m_e.sh --to run Malayalam to English Translation
3)pharaoh_e_m.ini --file needed for Pharaoh
4)pharaoh_m_e.ini --File needed for Pharaoh
5)phrase-table_m_e--Malayalam-English Phrase table
6)phrase-table_e_m--English-Malayalam phrase table
7)lang_e_m.lm --language model file for English to Malayalam translation
8)native.lm--language model file for Malayalam to  English translation


Procedure
----------
--> Bring all these files to one directory
--> Download pharaoh decoder from http://www.isi.edu/licensed-sw/pharaoh/
--> Copy the pharaoh.exe file from the downloded file and paste it in the directory that we created in the first step
--> Make an text file named in (Which contains the source language to be translated (Malayalam or English Sentences))
and save it in the main directory
--> Run ./execute_e_m.sh for English to Malayam translation
-->Run ./execute_m_e.sh for Malayalam to English transltion
-->Now a out.txt file will be generated in the working directory which contains the translated language.
