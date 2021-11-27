#!/usr/bin/env python
# coding: utf-8

# In[37]:


import pickle


# In[38]:


with open('Forest.mod', 'rb') as f:
    model = pickle.load(f)


# In[39]:


vectorizer = pickle.load(open("vector.pickel", "rb"))


# In[40]:


review = input("Masukan Review: ")


# In[41]:


import preprocess as pp
def remove_punctuation(text):
    final = pp.teksCleaner(text)
    final1 = pp.stopWords(final)
    #final2 = pp.normalize(final1)
    return final1


# In[42]:


review = remove_punctuation(review)


# In[43]:


reviewList = []
reviewList.append(review)


# In[44]:


predictions = model.predict(vectorizer.transform(reviewList))


# In[45]:


print(predictions)


# In[46]:


# Logic Expression
# Kalo predictions = 1 -> Review yang didapatkan merupakan review posotif!
# Kalo predictions = -1 -> Review yang didapatkan merupakan review negatif!


# In[47]:


# Hrusnya si user bisa inupt csv
import pandas as pd
df_new= pd.read_csv("test_case_new.csv")
df_new.head()


# In[48]:


df_new = df_new.dropna(subset=['review'])
df_new['review'] = df_new['review'].apply(remove_punctuation)


# In[49]:


predictions = model.predict(vectorizer.transform(df_new['review']))
print(predictions)


# In[50]:


df_new["sentiment"] = predictions
df_new.head()


# In[51]:


import matplotlib.pyplot as plt
import seaborn as sns
color = sns.color_palette()
get_ipython().run_line_magic('matplotlib', 'inline')

import plotly.offline as py
py.init_notebook_mode(connected=True)
import plotly.graph_objs as go
import plotly.tools as tls
import plotly.express as px

df_new['sentiment'] = df_new['sentiment'].replace({-1 : 'negative'})
df_new['sentiment'] = df_new['sentiment'].replace({1 : 'positive'})
fig = px.histogram(df_new, x="sentiment")
fig.update_traces(marker_color="indianred",marker_line_color='rgb(8,48,107)',
                  marker_line_width=1.5)
fig.update_layout(title_text='Product Sentiment')
fig.show()


# In[ ]:




