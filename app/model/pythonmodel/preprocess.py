#!/usr/bin/env python
# coding: utf-8

# In[1]:


import re
import typoCorrector as tc
from Sastrawi.StopWordRemover.StopWordRemoverFactory import StopWordRemoverFactory
from Sastrawi.StopWordRemover.StopWordRemoverFactory import StopWordRemover
from Sastrawi.StopWordRemover.StopWordRemoverFactory import ArrayDictionary


# In[2]:


#Teks Cleaning
def teksCleaner(txt):
    txt = txt.lower()
    txt = re.sub(r'[.,?!]', '', txt)
    txt = re.sub(' +', ' ',txt)#Menghilangkan multiple space
    #Menghilangkan link
    wordList = str(txt).split(' ')
    #for idx, word in enumerate(wordList):
    #    if (word[:4] == 'http'):
    #        wordList[idx] =''
    txt = (' ').join(wordList)
    txt = re.sub('[^A-Za-z\s]','',txt) #Menghapus karakter spesial dan angka
    return txt


# In[3]:


#TypoCorrector
def normalize(txt):
    wordList = str(txt).split(' ')
    normal=[]
    for word in wordList:
        normal.append(tc.correction(word))
    txt = (' ').join(normal)    
    return txt


# In[4]:


#Stopowords
def stopWords(txt):
    stop_factory = StopWordRemoverFactory().get_stop_words()
    more_stopword = ["k","an","nya","dan","di","ku", "le","ke","yang","ini","api","ala",
                  "v","ada","sini","lain","buka","gitu","aja","aku","no","kata","oleh","jam",
                  "anda","itu","wkwk","pas","gak","juga","dengan","untuk","disini","sama","jadi",
                  "karena","jika","kita","hmm", "km","pun","kali","dari","bisa","tapi","lagi"
                  "masih","datang","yg","ya","sih","kek","aa","saya","agak","k","an","nya","dan","di","ku",                       "le","ke","yang","ini","api","ala","v","ada","sini","lain","buka","gitu","aja","aku","no","kata","oleh","jam",
                  "anda","itu","wkwk","pas","gak","juga","dengan","untuk","disini","sama","jadi",
                  "karena","jika","kita","hmm", "km","pun","kali","dari","bisa","tapi","lagi","lg"
                  "masih","datang","yg","ya","sih","kek","aa","saya","agak","kita","lebih","jadi",
                  "kol","lihat","kei","h","benar","aa","untuk","bagi","agak","kita","lebih","jadi",
                  "kol","lihat","kei","h","benar","kalau","untuk","masih","kalian","saya","kilas",
                  "tepatnya","sedikit","no","kami","agak","adanya","sama","bagian"]
    data = stop_factory+more_stopword
    
    dictionary = ArrayDictionary(data)
    stopword = StopWordRemover(dictionary)
    txt = stopword.remove(txt) 
    #print(len(data))
    return txt


# In[5]:


#Pengujian
def main():
    text = str(input('Masukan teks:'))
    text = teksCleaner(text)
    text = normalize(text)
    #text = stopWords(text)
    print(text)

if __name__ == '__main__':
    main()


# In[ ]:




