
import preprocess as pp
import pickle
import sys, os
import getopt

currentdir = os.path.dirname(os.path.realpath(__file__))
# print(currentdir)
sys.path.append(currentdir)
# parentdir = os.path.dirname(currentdir)
# print(parentdir)
# grandparentdir = os.path.dirname(parentdir)
# print(grandparentdir)
# greatgrandparentdir = os.path.dirname(grandparentdir)
# print(greatgrandparentdir)
# sys.path.append(grandparentdir)

with open(currentdir+'/Forest.mod', 'rb') as f:
    model = pickle.load(f)

vectorizer = pickle.load(open(currentdir+"/vector.pickel", "rb"))


def remove_punctuation(text):
    final = pp.teksCleaner(text)
    final1 = pp.stopWords(final)
    # final2 = pp.normalize(final1)
    return final1


def predictFromString(inputString):
    if len(inputString):
        review = remove_punctuation(inputString)

        reviewList = []
        reviewList.append(review)

        predictions = model.predict(vectorizer.transform(reviewList))
        print(predictions)

    else:
        print("py main.py -r <review>\npy main.py  -f | --file <reviewFile.csv> ")
        sys.exit(2)


def predictFromFile(filename):
    if len(filename) and ".csv" in filename:

        import pandas as pd
        df_new = pd.read_csv(filename)
        df_new.head()

        df_new = df_new.dropna(subset=['review'])
        df_new['review'] = df_new['review'].apply(remove_punctuation)

        predictions = model.predict(vectorizer.transform(df_new['review']))
        print(predictions)

    else:
        print("py main.py -r <review>\npy main.py  -f | --file <reviewFile.csv> ")
        sys.exit(2)

def main(argv):

        # check scikit-learn version
    # import sklearn
    # print('sklearn: %s' % sklearn.__version__)

    try:
        opts, args = getopt.getopt(argv, "hr:f:", ["file"])
    except:
        print("py main.py -r <review>\npy main.py  -f | --file <reviewFile.csv> ")
        sys.exit(2)

    for opt, arg in opts:
        if opt == "-h":
            print("py main.py -r <review>\npy main.py  -f | --file <reviewFile.csv> ")
            sys.exit()
        elif opt in ("-f", "--file"):
            # print("is a file text")
            inputReview = arg
            # print(inputReview)
            predictFromFile(inputReview)
        elif opt in ("-r"):
            # print("is a  text")
            inputReview = arg
            # print(inputReview)
            predictFromString(inputReview)
    
    # print(args)


if __name__ == "__main__": 
    main(sys.argv[1:])
    # print(sys.argv[1:])
