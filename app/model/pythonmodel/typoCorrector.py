#!/usr/bin/env python
# coding: utf-8

# In[10]:


import re
from collections import Counter
import os, sys

currentdir = os.path.dirname(os.path.realpath(__file__))
sys.path.append(currentdir)


# In[11]:
def words(text):
    return re.findall(r'\w+', text.lower())


# In[12]:
WORDS = Counter(words(open(currentdir+'/Corpus.txt', encoding= 'utf-8').read()))


# In[13]:
#Transformasi dgn Edit Distance 1
def trans1(word):
    letters = 'abcdefghijklmn'
    splits = [(word[:i], word[i:]) for i in range(len(word)+1)] #Cursor untuk menandakan letak huruf
    deletes = [L+R[1:] for L, R in splits if R] #Penghapusan karakter
    transposes = [L + R[1] + R[0] + R[2:] for L,R in splits if len(R)>1] #Menukar karakter
    replaces = [L + c + R[1:] for L, R in splits if R for c in letters] #Mengganti karakter
    inserts    = [L + c + R for L, R in splits for c in letters] #Menambahkan karakter
    return set(deletes + transposes + replaces + inserts)


# In[14]:
#Trnasformasi dengan Edit Distance 2
def trans2(word):
    trans1Res = trans1(word)
    return set(e2 for e1 in trans1Res for e2 in trans1(e1))


# In[15]:
#Set kata" yang di cek dalam corpus(Penyaringan)
def known(words): 
    wordSet = set()
    for word in words:
        for word_key in WORDS:
            if word==word_key:
                wordSet.add(word)
    return wordSet


# In[16]:
#Membentuk hipunan kandidat sesuai hasil penyaringan
def candidates(word):
    return known([word]) or known(trans1(word)) or known(trans2(word)) or [word]


# In[17]:
#Probabilitas setiap kata kandidat dan mengambil probabilitas tertinggi
def P(word,N=sum(WORDS.values())):
    return WORDS[word] / N


# In[18]:
#Memilih kandidat yang paling mungkin sebagai kata pengganti
def correction(word):
    return max(candidates(word), key=P)


# In[ ]:




