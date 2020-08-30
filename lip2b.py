from bs4 import BeautifulSoup
import urllib2
import urlparse
import sys
import string
#from nltk import word_tokenize
#from nltk.corpus import stopwords
a=[]
reload(sys)
sys.setdefaultencoding('utf8')
rr = open('rr5')
rr = rr.read()
rr = rr.split(',')
u = []
d = open('Africa.csv')
d2 = d.read()
d.close()
d3 = d2.split('\n')
o = {}
g = 0
dv = {}
smine = {}
#stop = set(stopwords.words('english'))
for x in d3:
#       try:
        try:
                vbn = x.split(',')
                r = urllib2.urlopen(vbn[4],timeout=30).read()
        except:
                continue
        soup = BeautifulSoup(r, "html.parser")
        if x:
                e = urlparse.urlparse(x)
        else:
                continue
        for link in soup.findAll('a'):
                print link
                if link!=None:
                        v = link.text
                        y = link.get('href')
                        if y:
                                t = urlparse.urlparse(y)
                        else:
                                a.append(y)
                                continue
                        if t[0]=='':
                                try:
                                    y = e[0]+'://'+e[1]+y
                                    if smine.has_key(e[0])==False:
                                        smine[e[1]] = []
                                except: continue
                        v = v.rstrip(' \n\t\0')
                        v = v.lstrip(' \n\t\0')
                        for x in rr:
                                if string.find(v, x)>0:
                                        if o.has_key(v)==False:
                                                o[v] = y
                                        #smine[e[1]].append([v,y])
                                        #smine[e[0]].append(v)
                                        #smine[e[0]].append(y)
                                        for e in v.lower().split():
                                                #print e
 #                                               if e not in stop:
                                                       #print e
                                            if dv.has_key(e):
                                                dv[e] = dv[e]+1
                                            else:
                                                dv[e] = 1
r = '<table>'
d2 = ''
s = open('rrr8.html', 'w')
for x in o.keys():
        r = r+'<tr>'+x+'<a href="'+o[x]+'">'+o[x]+'</a></tr><br><br>'
r=r+'</table>'
s.write(r)
s.close()
#for h in smine.keys():
 #   for n in smine[h]:
  #      d2 = d2+h+'~'+n[0]+'~'+n[1]+'\n'
#m2 = open('smine.cvs','w')
#m2.write(d2)
#m2.close()
print a
