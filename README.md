# kongfinger
# this code scans international newspapers as matrix

# sample code to populate matrix
a = open('HBCU.csv') # open file from directory
b = a.read() # read file contents as string
c = b.split('\n') # divide with \n as delimiter

# blank list variable
d = []

for x in c:             # loop through vector varible c
  e = x.split(',')      # split by comma delimiter
  d.append(e)           # append each vector into matrix row

# matrix populates d

****************************************************************************

# current uses are collocation of index terms, href text term frequency, and image & email scraping
